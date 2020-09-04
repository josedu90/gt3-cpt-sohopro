<?php
/*
Plugin Name: GT3 Custom Post Types for SohoPRO
Plugin URI: http://www.gt3themes.com
Description: Register Custom Post Types for GT3 Themes.
Version: 1.0.2
Author: GT3 Themes
Author URI: http://www.gt3themes.com
*/

function gt3_post_types()
{
    if (!isset($GLOBALS['gt3_post_types'])) {$GLOBALS['gt3_post_types'] = array();}

    #Gallery
    if (in_array("gallery", $GLOBALS['gt3_post_types'])) {
        register_post_type('gallery', array(
                'label' => __('Gallery', 'gt3_builder'),
                'public' => true,
                'show_ui' => true,
                'show_in_nav_menus' => true,
                'rewrite' => array(
                    'slug' => 'gallery',
                    'with_front' => false
                ),
                'hierarchical' => true,
                'menu_position' => 4,
                'supports' => array(
                    'title',
                    'thumbnail'
                )
            )
        );
        register_taxonomy('gallerycat', 'gallery', array('hierarchical' => true, 'label' => __('Category', 'gt3_builder'), 'singular_name' => 'Category'));
    }
	
    #Portfolio
    if (in_array("port", $GLOBALS['gt3_post_types'])) {
        register_post_type('port', array(
                'label' => __('Portfolio', 'gt3_builder'),
                'public' => true,
                'show_ui' => true,
                'show_in_nav_menus' => true,
                'rewrite' => array(
                    'slug' => 'port',
                    'with_front' => false
                ),
                'hierarchical' => true,
                'menu_position' => 5,
                'supports' => array(
                    'title',
                    'post-formats',
                    'comments',
                    'revisions',
                    'page-attributes',
                    'editor',
                    'excerpt',
                    'thumbnail'
                ),
            )
        );
        register_taxonomy('portcat', 'port', array('hierarchical' => true, 'label' => __('Category', 'gt3_builder'), 'singular_name' => 'Category'));
    }

    register_taxonomy_for_object_type( 'post_format', 'port' );

}

add_action('init', 'gt3_post_types');

require_once plugin_dir_path( __FILE__  ) . 'core/theme-adding-functions.php';