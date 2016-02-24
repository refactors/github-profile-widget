<?php

/**
 * Plugin Name: GitHub Profile Widget
 * Description: This is a plugin that shows your GitHub profile with a simple widget.
 * Version: 1.0.6
 * Author: Henrique Dias and Luís Soares (Refactors)
 * Author URI: https://github.com/refactors
 * License: GPL2 or later
 */
// prevent direct file access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once( 'lib/htmlcompressor.php' );

class GitHub_Profile extends WP_Widget {

	const API_PATH = "https://api.github.com";
	const API_VERSION = "v3";

	protected $widget_slug = 'github-profile';
	protected $checkboxes = array(
		"avatar_and_name",
		"meta_info",
		"followers_and_following",
		"repositories",
		/*"gists", */
		"organizations"/* ,
		"feed" */
	);

	public function __construct() {
		parent::__construct(
			$this->widget_slug, 'GitHub Profile', $this->widget_slug, array(
				'classname'   => $this->widget_slug . '-class',
				'description' => 'A widget to show a small version of your GitHub profile',
				$this->widget_slug
			)
		);
		add_action( 'admin_enqueue_scripts', array( $this, 'register_admin_scripts' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'register_widget_styles' ) );
	}

	public function form( $config ) {
		$default = array(
			"avatar_and_name"     => "on",
			"meta_info"           => "on",
			"followers_following" => "on",
			"organizations"       => "on",
			"cache"               => "50"
		);

		$config = ! isset( $config['first_time'] ) ? $default : $config;

		foreach ( $config as $key => $value ) {
			${$key} = esc_attr( $value );
		}

		ob_start( "refactors_HTMLCompressor" );
		require 'views/options.php';
		ob_end_flush();
	}

	public function update( $new_instance, $old_instance ) {
		$new_instance['first_time'] = false;

		return $new_instance;
	}

	public function widget( $args, $config ) {
		if ( empty( $config['username'] ) ) {
			return;
		}

		$url     = self::API_PATH . '/users/' . $config['username'];
		$profile = $this->get_github_api_content( $url, $config );
		$profile->created_at = new DateTime( $profile->created_at );
		$profile->events_url = str_replace( '{/privacy}', '', $profile->events_url );

		$optionsToUrls = array(
			'repositories'  => 'repos',
			'organizations' => 'organizations',
			'feed'          => 'events'
		);

		foreach ( $optionsToUrls as $option => $url ) {
			if ( $this->is_checked( $config, $option ) ) {
				${$option} = $this->get_github_api_content( $profile->{$url . '_url'}, $config );
			}
		}

		extract( $args, EXTR_SKIP );
		ob_start( "refactors_HTMLCompressor" );
		require 'views/widget.php';
		ob_end_flush();
	}

	private function get_github_api_content( $apiPath, $config ) {
		$file         = get_option( $apiPath ); // $apiPath is auto sanitized
		$timestamp    = get_option( $apiPath . 'time' );
		$fileCacheAge = time() - $timestamp + rand( - 4, 4 ); // 9 random results prevents simultaneous expiring

		if ( ! $file || ! $timestamp || $fileCacheAge > $config['cache'] * 60 ) {
			$context = stream_context_create( array(
				'http' => array(
					'method' => "GET",
					'header' =>
						"Accept: application/vnd.github." . self::API_VERSION . "+json\r\n" .
						"User-Agent: {$config['username']}\r\n" .
						( empty( $config['token'] ) ? '' : "Authorization: token {$config['token']}\r\n" )
				)
			) );
			$file    = file_get_contents( $apiPath, false, $context );
			if ( ! $file ) {
				echo 'Error with API; please provide '
				     . ( empty ( $config['token'] ) ? 'a token or increase cache time.' : 'a new token.' );

				return "";
			}
			update_option( $apiPath, $file );
			update_option( $apiPath . 'time', time() );
		}

		return json_decode( $file );
	}

	public function is_checked( $conf, $name ) {
		return isset( $conf[ $name ] ) && $conf[ $name ] == 'on';
	}

	public function register_widget_styles() {
		wp_enqueue_style( $this->widget_slug . '-octicons', plugins_url( 'css/octicons/octicons.css', __FILE__ ) );
		wp_enqueue_style( $this->widget_slug . '-widget-styles', plugins_url( 'css/widget.css', __FILE__ ) );
	}

	public function register_admin_scripts() {
		wp_enqueue_script( $this->widget_slug . '-admin-script', plugins_url( 'js/admin.js', __FILE__ ), array( 'jquery' ) );
	}
}

add_action( 'widgets_init', create_function( '', 'return register_widget("GitHub_Profile");' ) );
