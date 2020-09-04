<?php
// Adding functions for theme

if (!function_exists('gt3_add_widget_to_theme')) {
    function gt3_add_widget_to_theme(){
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'core/widgets/flickr.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'core/widgets/posts.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'core/widgets/copyright.php';
    }
}

add_action('add_meta_boxes', 'gt3_page_settings_area');
if (!function_exists('gt3_page_settings_area')) {
    function gt3_page_settings_area() {
        if (is_array($GLOBALS["gt3_page_settings_area"])) {
            foreach ($GLOBALS["gt3_page_settings_area"] as $post_type) {
                add_meta_box(
                    'pb_section',
                    esc_html__('GT3 Page Settings', 'sohopro'),
                    'gt3_page_settings',
                    $post_type
                );
            }
            if (get_page_template_slug() == "page-coming-soon.php" || get_page_template_slug() == "page-with-slider-above-content.php") {
                add_meta_box(
                    'pb_section',
                    esc_html__('GT3 Page Settings', 'sohopro'),
                    'gt3_page_settings',
                    'page'
                );
            }
        }
    }
}

add_action('add_meta_boxes', 'side_sidebar_settings_meta_box');
if (!function_exists('side_sidebar_settings_meta_box')) {
    function side_sidebar_settings_meta_box() {
        $types = array('post', 'page', 'port', 'product');

        foreach ($types as $type) {
            add_meta_box(
                'side_sidebar_settings_meta_box',
                esc_html__('Custom Sidebars', 'sohopro'),
                'side_sidebar_settings_meta_box_cb',
                $type,
                'side',
                'low'
            );
        }
    }
}

add_action('add_meta_boxes', 'side_bg_settings_meta_box');
if (!function_exists('side_bg_settings_meta_box')) {
    function side_bg_settings_meta_box()
    {
        $types = array('post', 'page', 'port');

        foreach ($types as $type) {
            add_meta_box(
                'side_bg_settings_meta_box',
                esc_html__('Custom Layout', 'sohopro'),
                'side_bg_settings_meta_box_cb',
                $type,
                'side',
                'low'
            );
        }
    }
}

if (!function_exists('gt3_string_coding')) {
    function gt3_string_coding($code){
        if (!empty($code)) {
            return base64_encode($code);
        }
        return;
    }
}

if (!function_exists('gt3_string_decoding')) {
    function gt3_string_decoding($code){
        if (!empty($code)) {
            return base64_decode($code);
        }
        return;
    }
}