<?php

/**
 * Plugin base class
 *
 * @package TinyPopup
 */

namespace Sabbir\TinyPopup;

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

class Base
{

    /**
     * @var mixed
     */
    private static $instance = null;

    public static function instance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
            self::$instance->init();
        }
        return self::$instance;
    }

    private function __construct()
    {
        add_action('init', [$this, 'i18n']);
    }

    public function i18n()
    {
        load_plugin_textdomain(
            'tiny-popup',
            false,
            dirname(plugin_basename(TINY_POPUP__FILE__)) . '/i18n/'
        );
    }

    public function init()
    {

        // Load Frontend Assets
        Core\AssetManager::init();

        // // Register All Ajax handles
        // Core\AjaxHandler::init();

        // Decalre Shortcodes
        Core\Shortcode::instance();

        // Register Post Type
        new Core\Cpt();

        if (is_admin()) {
            // Load Admin Dashboard
            // Core\Dashboard::instance();
        }
    }
}
