<?php
/**
 * @package basicPlugin
 */
class basicPluginActivate
{
    public static function activate()
    {
        // $this->custom_post_type();
        flush_rewrite_rules();
        // echo "activate";
    }
} 