<?php
/**
 * @package Hello_Dolly
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
	function activate()
	{
		echo "activate";
	}
	function deactivate()
	{

	}
	function uninstall()
	{

	}
}
if (class_exists('basicPlugin')) {
	$basicPlugin = new basicPlugin;
}

register_activation_hook(__FILE__, array('basicPlugin', 'activate'));

register_deactivation_hook(__FILE__, array('basicPlugin', 'deactivate'));
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