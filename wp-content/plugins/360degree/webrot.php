<?php
/*
Plugin Name: 360 Product Viewer
Plugin URI: 
Description: WebRotate 360 Product Viewer WordPress Plugin
Author: Akhil Antony
Author URI: 
License: GPLv2
*/

if (!defined("ABSPATH"))
    exit;

// require_once plugin_dir_path(__FILE__) . "lib/class-pv360-defaults.php";
// require_once plugin_dir_path(__FILE__) . "lib/class-pv360-options.php";
// require_once plugin_dir_path(__FILE__) . "lib/class-pv360-shortcodes.php";
// require_once plugin_dir_path(__FILE__) . "lib/class-pv360-woocommerce.php";

class pv360main
{
    private $pv360_woo;
    private $pv360_options;
    private $pv360_shortcodes;

    public function __construct()
    {
        if (in_array("woocommerce/woocommerce.php", apply_filters("active_plugins", get_option("active_plugins")))) {
            $this->pv360_woo = new pv360WooCommerce();
        }

        if (is_admin()) {
            $this->pv360_options = new pv360Options();
            add_action("admin_notices", [$this, "pv360_update_notice"]);
            add_action("admin_enqueue_scripts", [$this, "pv360_register_scripts_admin"]);
        } else {
            $this->pv360_shortcodes = new pv360ShortCodes();
            add_action("wp_enqueue_scripts", [$this, "pv360_register_styles"]);
            add_action("wp_footer", [$this, "pv360_register_scripts"]);
            add_filter("the_content", [$this, "pv360_content_filter"]);
        }
    }
    function pv360_update_notice()
    {
        $update_note_option = "pv360_plugin_upgraded_21";
        $update_note_value = get_option($update_note_option);

        if (!$update_note_value) {
            $update_note_value = 1;
        }

        // Show the warning twice just in case it was missed once.
        if ($update_note_value <= 2) {
            echo "<div class='updated'><p>WebRotate 360 Product Viewer for WordPress has been installed. If you have WebRotate 360 PRO or Enterprise license, please verify that it's configured
            under Settings -> WebRotate 360 -> License URL and that the URL points to an existing license file on your server.
            <br/><br/><strong>IMPORTANT: all files and folders will be deleted from the WebRotate360 plugin folder by WordPress automatically upon plugin update, so if you upload your WebRotate 360 assets (or license file) under the plugin folder,
            they will be deleted upon the next update of the plugin. We recommend to host these files outside of the WebRotate 360 plugin folder or via our optimized <a href='https://www.webrotate360.com/services/pixriot.aspx' target='_blank'>PixRiot</a> hosting.</strong>
            </p></div>";

            $update_note_value++;
            update_option($update_note_option, $update_note_value);
        }
    }

    function pv360_register_scripts_admin()
    {
        wp_enqueue_style("wp-color-picker");
        wp_enqueue_script("pv360-admin-js", plugins_url('lib/js/pv360admin.js', __FILE__), array("jquery", "wp-color-picker"), pv360_VERSION, true);
    }

    function pv360_register_styles()
    {
        $config = new pv360DefaultsConfig();
        $config->init_header();

        if ($config->includePrettyPhoto) {
            wp_register_style("prettyphoto-css", plugins_url("prettyphoto/css/prettyphoto.css", __FILE__), false, pv360_VERSION);
            wp_enqueue_style("prettyphoto-css");
        }

        wp_register_style("pv360-style", plugins_url("imagerotator/html/css/" . $config->viewerSkin . ".css", __FILE__), false, pv360_VERSION);
        wp_enqueue_style("pv360-style");

        if ($this->pv360_woo) {
            wp_register_style("pv360-swiper-css", plugins_url("gallery/swiper/swiper-bundle.min.css", __FILE__), false, pv360_VERSION);
            wp_enqueue_style("pv360-swiper-css");
            wp_register_style("pv360-gallery-css", plugins_url("gallery/pv360gallery.css", __FILE__), false, pv360_VERSION);
            wp_enqueue_style("pv360-gallery-css");
        }
    }

    function pv360_register_scripts()
    {
        $config = new pv360DefaultsConfig();
        $config->init_header();

        if ($config->includePrettyPhoto == true) {
            wp_register_script("prettyphoto-js", plugins_url("prettyphoto/js/jquery.prettyPhoto.js", __FILE__), ["jquery"], pv360_VERSION);
            wp_enqueue_script("prettyphoto-js");
        }

        wp_register_script("pv360-wp-script", plugins_url("public/webrotate360.js", __FILE__), ["jquery"], pv360_VERSION);
        wp_register_script("pv360-script", plugins_url("imagerotator/html/js/imagerotator.js", __FILE__), ["jquery"], pv360_VERSION);

        wp_enqueue_script("pv360-wp-script");
        wp_enqueue_script("pv360-script");

        if ($this->pv360_woo) {
            wp_register_script("pv360-swiper-js", plugins_url("gallery/swiper/swiper-bundle.min.js", __FILE__), [], pv360_VERSION);
            wp_enqueue_script("pv360-swiper-js");
            wp_register_script("pv360-gallery-js", plugins_url("gallery/pv360gallery.js", __FILE__), [], pv360_VERSION);
            wp_enqueue_script("pv360-gallery-js");
        }
    }

    function pv360_content_filter($content)
    {
        // This filter is called for every content block on a page. We just need it once to render our global functions, so can "unhook" it now.
        remove_filter("the_content", array($this, "pv360_content_filter"));

        $config = new pv360DefaultsConfig();
        $config->init_header();

        if ($config->includePrettyPhoto == true) {
            $content .= "<script>";
            $content .= "function getpv360PopupSkin(){return '" . $config->popupSkin . "';}";
            $content .= "</script>";
        }

        return $content;
    }
}
$pv360_main = new pv360main();