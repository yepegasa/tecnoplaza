<?php

/** Add Classes to header */
add_filter('meta_store_header_class', 'meta_store_header_class_cb');
if (!function_exists('meta_store_header_class_cb')) {

    function meta_store_header_class_cb($classes) {
        /** Header Layout */
        $header_layout = get_theme_mod('meta_store_mh_layout', 'header-style1');
        $classes[] = 'ms-' . esc_attr($header_layout);

        return $classes;
    }

}

if (!function_exists('meta_store_header_class')) {

    function meta_store_header_class() {
        $classes = array(
            'ms-site-header',
        );

        $classes = apply_filters('meta_store_header_class', $classes);

        echo 'class="' . esc_attr(implode(' ', $classes)) . '"';
    }

}