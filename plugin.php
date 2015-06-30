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
if (!defined('ABSPATH')) {
    exit;
}

require_once('lib/htmlcompressor.php');

class GitHub_Profile extends WP_Widget
{

    const API_PATH = "https://api.github.com";

    protected $widget_slug = 'github-profile';
    protected $checkboxes = array(
        "avatar_and_name",
        "meta_info",
        "followers_and_following",
        "repositories",
        "gists",
        "organizations",
		"feed"
    );


    public function __construct()
    {
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

        // Register admin scripts
        add_action('admin_enqueue_scripts', array($this, 'register_admin_scripts'));

        // Register widget styles
        add_action('wp_enqueue_scripts', array($this, 'register_widget_styles'));
    }

    public function form($config)
    {
        $default = array(
            "avatar_and_name" => "on",
            "meta_info" => "on",
            "followers_following" => "on",
            "organizations" => "on",
            "cache" => "5"
        );

        $config = !isset($config['first_time']) ? $default : $config;

        foreach ($config as $key => $value) {
            ${$key} = esc_attr($value);
        }

        ob_start("refactors_HTMLCompressor");
        require 'views/options.php';
        ob_end_flush();
    }

    public function update($new_instance, $old_instance)
    {
        $new_instance['first_time'] = false;

        return $new_instance;
    }

    public function widget($args, $config)
    {
        extract($args, EXTR_SKIP);
        ob_start("refactors_HTMLCompressor");

        if (empty($config['username'])) {
            echo 'Please configure the plugin first';
        } else {
            $profile = $this->get_github_api_content(self::API_PATH . "/users/" . $config['username'], $config);
            $profile->created_at = new DateTime($profile->created_at);

            if ($this->is_checked($config, 'repositories')) {
                $repos = $this->get_github_api_content($profile->repos_url, $config);
            }
            if ($this->is_checked($config, 'organizations')) {
                $organizations = $this->get_github_api_content($profile->organizations_url, $config);
            }
            if ($this->is_checked($config, 'feed')) {
                $profile->events_url = str_replace('{/privacy}', '/public', $profile->events_url);
                $feed = $this->get_github_api_content($profile->events_url, $config);
            }
            require 'views/widget.php';
        }

        ob_end_flush();
    }

    private function get_github_api_content($apiPath, $config)
    {
        $file = get_option($apiPath); // $apiPath is auto sanitized
        $timestamp = get_option($apiPath . 'time');
		$timeDiff = microtime(true) - $timestamp + rand(-4, 4); // 9 random results, prevents simultaneous expiring

		if (!$file || !$timestamp || $timeDiff > $config['cache'] * 60) {
            $header = "User-Agent: {$config[ 'username' ]}\r\n";
            if (isset($config['oAuth'])) {
                $header = "Authorization: token {$config[ 'oAuth' ]}\r\n" . $header;
            }
            $context = stream_context_create(array(
                'http' => array(
                    'method' => "GET",
                    'header' => $header
                )
            ));
            $file = file_get_contents($apiPath, false, $context);
            update_option($apiPath, $file);
            update_option($apiPath . 'time', microtime(true));
        }

        return json_decode($file);
    }

    public function is_checked($conf, $name)
    {
        return isset($conf[$name]) && $conf[$name] == 'on';
    }

    public function register_widget_styles()
    {
        wp_enqueue_style($this->widget_slug . '-octicons', plugins_url('css/octicons/octicons.css', __FILE__));
        wp_enqueue_style($this->widget_slug . '-widget-styles', plugins_url('css/widget.css', __FILE__));
    }

    public function register_admin_scripts()
    {
        wp_enqueue_script($this->widget_slug . '-admin-script', plugins_url('js/admin.js', __FILE__), array('jquery'));
    }
}

add_action('widgets_init', create_function('', 'return register_widget("GitHub_Profile");'));
