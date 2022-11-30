<?php
/**
 * @package basicPlugin
 */
class basicPluginDeactivate
{
    public static function deactivate()
    {
        // $this->custom_post_type();
        flush_rewrite_rules();
        // echo "activate";
    }
} 