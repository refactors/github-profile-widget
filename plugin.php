<?php

/**
 * Plugin Name: [Plugin Name]
 * Description: This is a plugin that shows your HackerRank profile with a simple widget.
 * Version: 1.0.0
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

class Widget_Name extends WP_Widget {

	protected $widget_slug = 'widget-name';
	protected $options = array(
		"title",
		"username"
	);
	protected $config;
	protected $optionsShow = array(
		'bio',
		'member since',
		'picture',
		'badges',
		'watchlist',
		'lists',
		'ratings',
		'reviews',
		'boards'
	);

	public function __construct() {
		parent::__construct(
			$this->get_widget_slug(), __( 'Widget Name', $this->get_widget_slug() ), array(
				'classname'   => $this->get_widget_slug() . '-class',
				'description' => __( 'Widget Description', $this->get_widget_slug() )
			)
		);

		add_action( 'wp_enqueue_scripts', array( $this, 'register_widget_styles' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'register_widget_scripts' ) );
	}

	public function get_widget_slug() {
		return $this->widget_slug;
	}

	public function form( $config ) {
		$config = ! empty( $config ) ? unserialize( $config ) : array();

		foreach ( $config as $key => $value ) { // recover options
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
			require 'views/widget.php';
		}

		ob_end_flush();
	}

	public function isChecked( $conf, $name ) {
		return isset( $conf[ $name ] ) && $conf[ $name ] == 'on';
	}

	public function register_widget_styles() {
		wp_enqueue_style( $this->get_widget_slug() . '-common-styles', plugins_url( 'css/common.css', __FILE__ ) );
		wp_enqueue_style( $this->get_widget_slug() . '-widget-styles', plugins_url( 'css/widget.css', __FILE__ ) );
	}

	public function register_widget_scripts() {
		wp_enqueue_script( $this->get_widget_slug() . '-script', plugins_url( 'js/widget.js', __FILE__ ), array( 'jquery' ), null, true );
	}

}

add_action( 'widgets_init', create_function( '', 'return register_widget("Widget_Name");' ) );