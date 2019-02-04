<?php
/**
 * @package           webstarters-moduler
 * @version           1.1.2
 * @link              https://webstarters.dk
 *
 * Plugin Name:       Webstarters Moduler
 * Plugin URI:        https://webstarters.dk
 * Description:       Et plugin til at opbygge moduler og indsætte dem via Visual Composer på sider
 * Version:           1.1.2
 * Author:            Webstarters
 * Author URI:        https://webstarters.dk
 */

// If this file is called directly, abort.
if (! defined('ABSPATH')) {
    die;
}

if (! defined('MODUL_DIR')) {
    define('MODUL_DIR', dirname(__FILE__));
}

// Load in our classes.
require_once(MODUL_DIR . '/lib/modul.php');
require_once(MODUL_DIR . '/lib/visualcomposer.php');
require_once(MODUL_DIR . '/lib/toolbar.php');
require_once(MODUL_DIR . '/lib/widget.php');
require_once(MODUL_DIR . '/lib/shortcode.php');

// Instantiate classes
new Modul();
new ModulWPBakeryShortCode();

// Register the systems.
add_action('widgets_init', function () {
  register_widget('modulWidget');
});

?>
