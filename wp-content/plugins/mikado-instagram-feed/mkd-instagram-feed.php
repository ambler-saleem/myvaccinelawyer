<?php
/*
Plugin Name: Mikado Instagram Feed
Description: Plugin that adds Instagram feed functionality to our theme
Author: Mikado Themes
Version: 1.0
*/
define('MIKADO_INSTAGRAM_FEED_VERSION', '1.0');

if(!function_exists('mkd_instagram_feed_text_domain')) {
    /**
     * Loads plugin text domain so it can be used in translation
     */
    function mkd_instagram_feed_text_domain() {
        load_plugin_textdomain('mikado_instagram_feed', false, dirname(plugin_basename(__FILE__ )).'/languages');
    }

    add_action('plugins_loaded', 'mkd_instagram_feed_text_domain');
}

include_once 'load.php';