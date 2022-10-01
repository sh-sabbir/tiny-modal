<?php

/**
 * Plugin Name: Tiny Popup
 * Plugin URI: https://iamsabbir.dev/plugins/tiny-popup
 * Description: Learn how to use namespaces and autoload with composer in WordPress plugins.
 * Version: 0.1.0
 * Author: Sabbir Hasan
 * Author URI: https://iamsabbir.dev
 * License: GPL2
 */

// Exit if accessed directly
defined('ABSPATH') || die();

// Handle Autoload
require_once dirname(__FILE__) . "/lib/autoload.php";

/**
 * Define Plugin Constants
 */
define('TINY_POPUP_VERSION', '1.0.0');
define('TINY_POPUP_TEXTDOMAIN', 'mighty-boost');
define('TINY_POPUP__FILE__', __FILE__);
define('TINY_POPUP_DIR_PATH', plugin_dir_path(TINY_POPUP__FILE__));
define('TINY_POPUP_DIR_URL', plugin_dir_url(TINY_POPUP__FILE__));
define('TINY_POPUP_ASSETS', trailingslashit(TINY_POPUP_DIR_URL . 'assets'));


/**
 * A journey of a thousand miles begins with a single step.
 * - Chinese proverb.
 * 
 * @return void Some voids are not really void!
 */

function TINY_POPUP_let_the_journey_begin()
{
    \Sabbir\TinyPopup\Base::instance();
}
add_action('plugins_loaded', 'TINY_POPUP_let_the_journey_begin');
