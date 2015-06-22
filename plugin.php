<?php

/**
 * Plugin Name: Widget Name
 * Description: This is a plugin that shows your HackerRank profile with a simple widget.
 * Version: 1.0.0
 * Author: Henrique Dias and Luís Soares (Refactors)
 * Author URI: https://github.com/refactors
 * Network: true
 * License: GPL2 or later
 *
 * [Widget Name]
 *
 *     Copyright (C) 2015 Henrique Dias     <hacdias@gmail.com>
 *     Copyright (C) 2015 Luís Soares       <lsoares@gmail.com>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */


class Widget_Name extends WP_Widget {

	protected $widget_slug = 'plugin-slug';

	/**
	 * Options
	 *
	 * The names of the options the plugin can handle.
	 */
	protected $options = array(
		"opt2"
	);

	public function __construct() {
		parent::__construct(
			'Widget Name', 'Widget Name',
			array( 'description' => 'A widget to show a small version of your HackerRank profile.' )
		);

		add_action( 'wp_enqueue_scripts', array( $this, 'register_widget_styles' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'register_widget_scripts' ) );
	}

	public function form( $config ) {
		$config = ! empty( $config ) ? unserialize( $config ) : array();
		foreach ( $this->options as $option ) {
			${$option} = isset( $config[ $option ] ) ? $config[ $option ] : null;
		}
		ob_start( "refactors_HTMLCompressor" );
		require 'views/form.php';
		ob_end_flush();
	}

	public function update( $newInstance, $oldInstance ) {
		$instance = serialize( $newInstance );

		return $instance;
	}

	public function widget( $args, $config ) {
		extract( $args, EXTR_SKIP );
		$config = ! empty( $config ) ? unserialize( $config ) : array();

		ob_start( "refactors_HTMLCompressor" );
		require 'views/widget.php';
		ob_end_flush();
	}

	public function register_widget_styles() {
    wp_enqueue_style( $this->get_widget_slug() . '-widget-parent-styles', plugins_url( 'css/refactors-widget.css', __FILE__ ) );
		//wp_enqueue_style( $this->get_widget_slug() . '-widget-styles', plugins_url( 'css/general.css', __FILE__ ) );
	}

	public function get_widget_slug() {
		return $this->widget_slug;
	}

	public function register_widget_scripts() {
		// add styles
	}
}

add_action( 'widgets_init', create_function( '', 'return register_widget("Widget_Name");' ) );
