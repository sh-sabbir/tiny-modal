<?php

namespace Sabbir\TinyPopup\Core;

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

class Shortcode
{
    private static $instance;

    public static function instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function __construct()
    {
        add_shortcode('tm', [$this, 'tm_shortcode_callback']);

        add_action('admin_menu', [$this, 'add_to_cpt_menu']);
    }

    public function tm_shortcode_callback($atts)
    {
        $atts = shortcode_atts(array(
            'id'            => 0,
            'text'          => 'Open',
            'padding'       => null,
            'margin'        => null,
            'color'         => '#FFFFFF',
            'hcolor'        => '#FFFFFF',
            'bg'            => '#F15F4F',
            'hbg'           => '#F15F4F',
            'b'             =>  0,
            'bcolor'        => "",
            'hbcolor'       => "",
            'br'            =>  0,
        ), $atts, 'tm');

        // [tm id="71" text="Open Modal" padding="1|1|1|1" margin="1|1|1|1" color="#bada55" hcolor="#bada55" bg="#bada55" hbg="#bada55" b="1" bcolor="#bada55" hbcolor="#bada55" br="1"]

        if ($atts['id'] !== 0) {
            $modal_content = get_post_meta($atts['id'], '_tm_modal_code', true);
            if ($modal_content) {
                $modal_content = html_entity_decode($modal_content);
            }
            // Push Modal to footer
            add_action('wp_footer', function () use ($atts, $modal_content) {
                $this->render_modal_code($atts, $modal_content);
            });

            // Return trigger
            return $this->render_shortcode($atts);
        }
    }

    private function render_shortcode($atts)
    {
        ob_start();
        $filename = TINY_POPUP_DIR_PATH . 'templates/trigger.php';
        if (is_file($filename)) {
            @include($filename);
        }
        return ob_get_clean();
    }

    private function render_modal_code($atts, $modal_content)
    {
        ob_start();
        $filename = TINY_POPUP_DIR_PATH . 'templates/modal.php';
        if (is_file($filename)) {
            @include($filename);
        }
        echo ob_get_clean();
    }

    public function add_to_cpt_menu()
    {
        add_submenu_page('edit.php?post_type=modal', 'Tiny Modal', 'Shortcode Generator', 'edit_posts', basename(__FILE__), [$this, 'cpt_menu_function']);
    }

    public function cpt_menu_function()
    {
        ob_start();
        $filename = TINY_POPUP_DIR_PATH . 'templates/generator.php';
        if (is_file($filename)) {
            @include($filename);
        }
        echo ob_get_clean();
    }
}
