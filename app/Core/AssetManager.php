<?php

namespace Sabbir\TinyPopup\Core;

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

class AssetManager
{
    public static function init()
    {
        add_action('wp_enqueue_scripts', [__CLASS__, 'register_frontend_scripts']);
        add_action('admin_enqueue_scripts', [__CLASS__, 'register_admin_scripts']);
    }

    /**
     * Register frontend assets.
     *
     * @return void
     */
    public static function register_frontend_scripts()
    {
        wp_enqueue_style('tinypopup-style', TINY_POPUP_ASSETS . 'css/tiny-popup.css');

        wp_enqueue_script('tiny-micromodal-lib-js', 'https://unpkg.com/micromodal/dist/micromodal.min.js', [], TINY_POPUP_VERSION);
        wp_enqueue_script('tinypopup-js', TINY_POPUP_ASSETS . 'js/app.js', [], TINY_POPUP_VERSION);
    }


    /**
     * Register admin assets.
     *
     * @return void
     */
    public static function register_admin_scripts()
    {
        wp_enqueue_style('tinypopup-code-editor-style', TINY_POPUP_ASSETS . 'admin/css/code-editor.css');
        wp_enqueue_style('wp-color-picker');

        wp_enqueue_script('tiny-vue-lib-js', 'https://cdn.jsdelivr.net/npm/vue/dist/vue.js', [], TINY_POPUP_VERSION);
        wp_enqueue_script('wp-color-picker');
        wp_enqueue_script('tinypopup-admin-js', TINY_POPUP_ASSETS . 'admin/js/admin.js', ['jquery','wp-color-picker'], TINY_POPUP_VERSION);
    }
}
