<?php

/** Helper Functions */
function meta_store_load_helper_functions() {
    if (!function_exists('meta_store_widget_lists')) {

        function meta_store_widget_lists() {
            global $wp_registered_sidebars;

            $widget_list['none'] = esc_html__('-- Choose Widget --', 'meta-store');

            foreach ($wp_registered_sidebars as $sidebar) {
                $widget_list[$sidebar['id']] = $sidebar['name'];
            }

            return $widget_list;
        }

    }

    /** Get List of Menus */
    if (!function_exists('meta_store_get_menulist')) {

        function meta_store_get_menulist() {
            $menus = wp_get_nav_menus();

            $menu_list['none'] = esc_html__(' -- Choose Menu -- ', 'meta-store');
            foreach ($menus as $menu) {
                $menu_list[$menu->slug] = $menu->name;
            }

            return $menu_list;
        }

    }

    /** Categories List */
    if (!function_exists('meta_store_categories_list')) {

        function meta_store_categories_list() {

            $categories = get_categories(array('hide_empty' => true));
            $categories_list = array();
            if (!empty($categories)) {
                foreach ($categories as $category) {
                    $categories_list[$category->term_id] = $category->name;
                }
            }

            return $categories_list;
        }

    }
}

add_action('init', 'meta_store_load_helper_functions');
