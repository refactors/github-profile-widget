<?php

/**
 * Plugin Name: GitHub Profile Widget
 * Description: This is a plugin that shows your GitHub profile with a simple widget.
 * Version: 0.0.9
 * Author: Henrique Dias and Luís Soares (Refactors)
 * Author URI: https://github.com/refactors
 * Network: true
 * License: GPL2 or later
 */

// prevent direct file access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once( 'lib/htmlcompressor.php' );

class GitHub_Profile extends WP_Widget {

	const API_PATH = "https://api.github.com";
	const API_CACHE_SECONDS = 3600; // 1h

	protected $widget_slug = 'github-profile';
	protected $checkboxes = array(
		"meta_info"           => "Meta Info",
		"followers_following" => "Followers and Following",
			"repositories"        => "Repositories",
			"gists"               => "Gists",
			"organizations"       => "Organizations",
			"feed"                => "Feed"
	);


	public function __construct() {
		parent::__construct(
			$this->widget_slug,
			'GitHub Profile',
			$this->widget_slug,
			array(
				'classname' => $this->widget_slug . '-class',
				'description' => 'A widget to show a small version of your GitHub profile',
				$this->widget_slug
			)
		);

		add_action( 'wp_enqueue_scripts', array( $this, 'register_widget_styles' ) );
	}

	public function form( $config ) {
		$config = ! empty( $config ) ? unserialize( $config ) : array();

		foreach ( $config as $key => $value ) {
			${$key} = esc_attr( $value );
		}

		ob_start( "refactors_HTMLCompressor" );
		require 'views/options.php';
		ob_end_flush();
	}

	public function update( $new_instance, $old_instance ) {
		return serialize( $new_instance );
	}

	public function widget( $args, $config ) {
		extract( $args, EXTR_SKIP );
		$config = ! empty( $config ) ? unserialize( $config ) : array();

		ob_start( "refactors_HTMLCompressor" );

		if ( ! isset( $config['username'] ) ) {
			echo 'You need to first configure the plugin :)';
		} else {
			$profile       = $this->get_github_api_content( self::API_PATH . "/users/" . $config['username'], $config );
			$profile->created_at = new DateTime( $profile->created_at );
			$repos         = $this->get_github_api_content( $profile->repos_url, $config );
			$organizations = $this->get_github_api_content( $profile->organizations_url, $config );
			require 'views/widget.php';
		}

		ob_end_flush();
	}

	private function get_github_api_content( $apiPath, $config ) {
		$file = get_option( $apiPath ); // $apiPath is auto sanitized
		$timestamp = get_option( $apiPath . 'time' );
		$now  = round( microtime( true ) );

		if ( ! $file || ! $timestamp || $now - $timestamp > self::API_CACHE_SECONDS ) {
			$header = "User-Agent: {$config[ 'username' ]}\r\n";

			if ( isset( $config['oAuth'] ) ) {
				$header = "Authorization: token {$config[ 'oAuth' ]}\r\n" . $header;
			}

			$context = stream_context_create( array(
				'http' => array(
					'method' => "GET",
					'header' => $header
				)
			) );

			$file = file_get_contents( $apiPath, false, $context );

			update_option( $apiPath, $file );
			update_option( $apiPath . 'time', $now );
		}

		return json_decode( $file );
	}

	public function is_checked( $conf, $name ) {
		return isset( $conf[ $name ] ) && $conf[ $name ] == 'on';
	}

	public function register_widget_styles() {
		wp_enqueue_style( $this->widget_slug . '-widget-styles', plugins_url( 'css/widget.css', __FILE__ ) );
		wp_enqueue_style( $this->widget_slug . '-octicons', plugins_url( 'css/octicons/octicons.css', __FILE__ ) );
	}

}

add_action( 'widgets_init', create_function( '', 'return register_widget("GitHub_Profile");' ) );
