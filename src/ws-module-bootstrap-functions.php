<?php

defined('ABSPATH') || exit;

// Register Post Type.
require_once(WS_MODULE_DIR.'/src/class-ws-module-post-type.php');
add_action('init', new \Webstarters\Modules\PostType, 0);

// Add Shortcode.
require_once(WS_MODULE_DIR.'/src/class-ws-module-shortcode.php');
add_shortcode(\Webstarters\Modules\Shortcode::TAG, new \Webstarters\Modules\Shortcode);

// Add Visual Composer element / WPBakery shortcode.
if (class_exists('WPBakeryShortCode')) {
    require_once(WS_MODULE_DIR.'/src/class-ws-module-wpbakery-shortcode.php');
    $wpBakeryShortcode = new \Webstarters\Modules\WPBakeryShortcode;
}

// Register toolbar Modules menu item.
require_once(WS_MODULE_DIR.'/src/class-ws-module-toolbar.php');
add_action('admin_bar_menu', new \Webstarters\Modules\Toolbar, 999);

// Add Widget.
require_once(WS_MODULE_DIR.'/src/class-ws-module-widget.php');
$widget = new \Webstarters\Modules\Widget;

add_action('widgets_init', function () {
    register_widget('ws_module_widget');
});
