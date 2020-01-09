<?php
/**
 * @package           webstarters-modules
 * @version           2.0.0
 * @link              https://webstarters.dk
 *
 * Plugin Name:       Webstarters Modules
 * Plugin URI:        https://webstarters.dk
 * Description:       A WordPress-plugin to create reusable components for use when page-building.
 * Version:           2.0.0
 * Author:            Webstarters A/S
 * Author URI:        https://webstarters.dk
 */

// If this file is called directly, abort.
if (! defined('ABSPATH')) {
    die;
}

if (! defined('WS_MODULE_DIR')) {
    define('WS_MODULE_DIR', dirname(__FILE__));
}

// Load in our bootstrap.
require_once(WS_MODULE_DIR.'/src/ws-module-bootstrap-functions.php');
