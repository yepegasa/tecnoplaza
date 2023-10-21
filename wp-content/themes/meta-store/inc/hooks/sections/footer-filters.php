<?php

/** Add Classes to footer */
add_filter('meta_store_foooter_class', 'meta_store_foooter_class_cb');
if (!function_exists('meta_store_foooter_class_cb')) {

    function meta_store_foooter_class_cb($classes) {
        /** Footer Column Layout */
        $footer_column = get_theme_mod('meta_store_footer_col', 'col-4');
        $classes[] = 'ms-' . esc_attr($footer_column);

        return $classes;
    }

}

if (!function_exists('meta_store_foooter_class')) {

    function meta_store_foooter_class() {
        $classes = array(
            'ms-site-footer',
        );
        $classes_html = 'class="';

        if (has_filter('meta_store_foooter_class')) {
            $classes = apply_filters('meta_store_foooter_class', $classes);
        }

        foreach ($classes as $class) {
            $classes_html .= esc_attr($class) . ' ';
        }

        $classes_html = rtrim($classes_html);

        $classes_html .= '"';
        echo wp_kses_post($classes_html);
    }

}