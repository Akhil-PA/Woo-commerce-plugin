<?php
/**
 * Plugin Name: Test1_plugin
 * Plugin URI: https://github.com/Akhil-PA/Woo-commerce-plugin
 * Description: Plugin for testing
 * Version: 1.0.0
 * Author: Akhil Antony
 * Author URI:  https://www.linkedin.com/in/akhilantonypanackal/
 * License: GNU General Public License v3.0
 * Text Domain: rvps
 */

if (!function_exists('test')) {
	echo 'Not allowed';
	exit();
}
//check wp version
if (version_compare(get_bloginfo('version'), '5.0', '<')) {
	$message = "Required WordPress version 5.0 or above";
	die($message);
}
//constants
define('TEST_PATH', plugin_dir_path(__FILE__));

define('TEST_URI', plugin_dir_url(__FILE__));
echo TEST_PATH;
echo '<br>';
echo TEST_URI;

//check if woocommerce is active or Not

if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
	if (class_exists('TEST_core')) {
		class TEST_core
		{
			public function __construct()
			{
				// code to execute
			}
		}
		$TEST_core = new TEST_core();
	}
}

?>