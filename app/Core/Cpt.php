<?php

namespace Sabbir\TinyPopup\Core;

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

class Cpt
{

    public function __construct()
    {
        add_action('init', [$this, 'create_modal_cpt'], 0);
        add_action('add_meta_boxes', [$this, 'cpt_modal_html_box']);
        add_action('save_post', [$this, 'cpt_modal_html_save_postdata']);
    }

    // Register Custom Post Type Modal
    public function create_modal_cpt()
    {

        $labels = array(
            'name' => _x('Modals', 'Post Type General Name', 'textdomain'),
            'singular_name' => _x('Modal', 'Post Type Singular Name', 'textdomain'),
            'menu_name' => _x('Modals', 'Admin Menu text', 'textdomain'),
            'name_admin_bar' => _x('Modal', 'Add New on Toolbar', 'textdomain'),
            'archives' => __('Modal Archives', 'textdomain'),
            'attributes' => __('Modal Attributes', 'textdomain'),
            'parent_item_colon' => __('Parent Modal:', 'textdomain'),
            'all_items' => __('All Modals', 'textdomain'),
            'add_new_item' => __('Add New Modal', 'textdomain'),
            'add_new' => __('Add New', 'textdomain'),
            'new_item' => __('New Modal', 'textdomain'),
            'edit_item' => __('Edit Modal', 'textdomain'),
            'update_item' => __('Update Modal', 'textdomain'),
            'view_item' => __('View Modal', 'textdomain'),
            'view_items' => __('View Modals', 'textdomain'),
            'search_items' => __('Search Modal', 'textdomain'),
            'not_found' => __('Not found', 'textdomain'),
            'not_found_in_trash' => __('Not found in Trash', 'textdomain'),
            'featured_image' => __('Featured Image', 'textdomain'),
            'set_featured_image' => __('Set featured image', 'textdomain'),
            'remove_featured_image' => __('Remove featured image', 'textdomain'),
            'use_featured_image' => __('Use as featured image', 'textdomain'),
            'insert_into_item' => __('Insert into Modal', 'textdomain'),
            'uploaded_to_this_item' => __('Uploaded to this Modal', 'textdomain'),
            'items_list' => __('Modals list', 'textdomain'),
            'items_list_navigation' => __('Modals list navigation', 'textdomain'),
            'filter_items_list' => __('Filter Modals list', 'textdomain'),
        );
        $args = array(
            'label' => __('Modal', 'textdomain'),
            'description' => __('', 'textdomain'),
            'labels' => $labels,
            'menu_icon' => 'dashicons-align-wide',
            'supports' => array('title'),
            'taxonomies' => array(),
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 5,
            'show_in_admin_bar' => false,
            'show_in_nav_menus' => false,
            'can_export' => true,
            'has_archive' => false,
            'hierarchical' => false,
            'exclude_from_search' => true,
            'show_in_rest' => false,
            'publicly_queryable' => false,
            'capability_type' => 'post',
        );
        register_post_type('modal', $args);
    }

    public function cpt_modal_html_box()
    {
        $screens = ['modal'];
        foreach ($screens as $screen) {
            add_meta_box(
                'modal_html_code',
                'HTML Code',
                [$this, 'cpt_modal_html_render'],
                $screen
            );
        }
    }

    function cpt_modal_html_render($post)
    {
        $modal_code = get_post_meta($post->ID, '_tm_modal_code', true);
        if (!$modal_code) {
            $modal_code = "//Enter Form Html Code Here";
        }
        echo '<textarea name="tiny_modal_code" id="codeArea" rows="20" class="large-text code codearea" spellcheck="false">' . html_entity_decode($modal_code) . '</textarea>';
    }

    public function cpt_modal_html_save_postdata($post_id)
    {
        if (array_key_exists('tiny_modal_code', $_POST)) {
            update_post_meta(
                $post_id,
                '_tm_modal_code',
                htmlentities($_POST['tiny_modal_code'])
            );
        }
    }
}
