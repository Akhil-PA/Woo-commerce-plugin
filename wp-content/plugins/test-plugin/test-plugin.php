<?php
/**
 * @package basicPlugin
 * @version 1.7.2
 */

/**
 * Plugin Name: Test1_plugin
 * Plugin URI: https://github.com/Akhil-PA/Woo-commerce-plugin
 * Description: Plugin for testing
 * Version: 1.0.0
 * Author: Akhil Antony
 * Author URI:  https://www.linkedin.com/in/akhilantonypanackal/
 * License: GPL v2.0 or later
 * Text Domain: rvps
 */

if (!defined('ABSPATH')) {
	die;
}

class basicPlugin
{
	function __construct()
	{
		add_action('init', array($this, 'custom_post_type'));
		$this->print_stuff();
	}
	function register()
	{
		add_action('admin_enqueue_scripts', array($this, 'enqueue'));
	}

	function deactivate()
	{
		flush_rewrite_rules();
	}
	protected function print_stuff()
	{
		var_dump(['test']);
	}
	// function uninstall()
	// {

	// }
	function enqueue()
	{
		wp_enqueue_style('mypluginstyle', plugins_url('/assets/mystyle.css', __FILE__));
	}
	function custom_post_type()
	{
		register_post_type('book', ['public' => true, 'label' => 'Books']);
	}
}
if (class_exists('basicPlugin')) {
	$basicPlugin = new basicPlugin;
	$basicPlugin->register();
	// $basicPlugin->custom_post_type();
}
require_once plugin_dir_path(__FILE__) . 'inc/basic_Plugin_activate.php';
register_activation_hook(__FILE__, array('basicPluginActivate', 'activate'));
require_once plugin_dir_path(__FILE__) . 'inc/basic_Plugin_deactivate.php';
register_deactivation_hook(__FILE__, array('basicPluginDeactivate', 'deactivate'));



// if (!function_exists('test')) {
// 	echo 'Not allowed';
// 	exit();
// }
// //check wp version
// if (version_compare(get_bloginfo('version'), '5.0', '<')) {
// 	$message = "Required WordPress version 5.0 or above";
// 	die($message);
// }
// //constants
// define('TEST_PATH', plugin_dir_path(__FILE__));

// define('TEST_URI', plugin_dir_url(__FILE__));
// echo TEST_PATH;
// echo '<br>';
// echo TEST_URI;

// //check if woocommerce is active or Not

// if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
// 	if (class_exists('TEST_core')) {
// 		class TEST_core
// 		{
// 			public function __construct()
// 			{
// 				// code to execute
// 			}
// 		}
// 		$TEST_core = new TEST_core();
// 	}
// }