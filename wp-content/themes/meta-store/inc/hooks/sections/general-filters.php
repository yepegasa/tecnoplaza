<?php

/** General Filter Hooks */

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function meta_store_pingback_header() {
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
    }
}

add_action('wp_head', 'meta_store_pingback_header');

/** Add Custom Classes to Body */
add_filter('body_class', 'meta_store_body_classes');
if (!function_exists('meta_store_body_classes')) {

    function meta_store_body_classes($classes) {
        // Adds a class of hfeed to non-singular pages.
        $classes[] = 'meta-store-theme';

        if (!is_singular()) {
            $classes[] = 'hfeed';
        }

        /** Website Layout */
        $website_layout = get_theme_mod('meta_store_website_layout', 'wide');
        if ($website_layout) {
            $classes[] = 'ms-' . esc_attr($website_layout);
        }

        /** Sidebar Class */
        $page_layout = $blog_layout = $post_layout = '';

        if (is_singular('page')) {
            global $post;
            $sidebar_layout = get_post_meta($post->ID, 'meta_store_sidebar_layout', true);
            $page_layout = ($sidebar_layout == 'default' || $sidebar_layout == '') ? get_theme_mod('meta_store_page_layout', 'right-sidebar') : $sidebar_layout;
        } elseif (is_singular('post')) {
            global $post;
            $sidebar_layout = get_post_meta($post->ID, 'meta_store_sidebar_layout', true);
            $page_layout = ($sidebar_layout == 'default' || $sidebar_layout == '') ? get_theme_mod('meta_store_post_layout', 'right-sidebar') : $sidebar_layout;
            $post_layout = get_meta_store_single_layout();
        } elseif (is_home()) {
            $page_layout = get_theme_mod('meta_store_home_blog_layout', 'right-sidebar');
            $blog_layout = get_theme_mod('meta_store_blog_layout', 'blog-layout1');
        } elseif (class_exists('woocommerce') && is_woocommerce()) {
            if (apply_filters('meta_store_display_woo_class', '__return_true')) {
                $page_layout = get_theme_mod('meta_store_shop_layout', 'right-sidebar');
            }
        } elseif (is_archive() && !is_search()) {
            $page_layout = get_theme_mod('meta_store_archive_layout', 'right-sidebar');
            $blog_layout = get_theme_mod('meta_store_blog_layout', 'blog-layout1');
        } elseif (is_search()) {
            $page_layout = get_theme_mod('meta_store_search_layout', 'right-sidebar');
            $blog_layout = get_theme_mod('meta_store_blog_layout', 'blog-layout1');
        }
        if (is_front_page() && is_home()) {
            $page_layout = get_theme_mod('meta_store_home_blog_layout', 'right-sidebar');
            $blog_layout = get_theme_mod('meta_store_blog_layout', 'blog-layout1');
        }

        if (!empty($page_layout)) {
            $classes[] = esc_attr('ms-' . $page_layout);
        }

        if (!empty($blog_layout)) {
            $classes[] = esc_attr('ms-' . $blog_layout);
        }

        if (!empty($post_layout)) {
            $classes[] = esc_attr('ms-' . $post_layout);
        }

        return $classes;
    }

}

/** Exclude Categories */
add_filter('pre_get_posts', 'meta_store_exclude_categories');
if (!function_exists('meta_store_exclude_categories')) {

    function meta_store_exclude_categories($query) {
        $exclude_cat = get_theme_mod('meta_store_blog_cat', 0);

        if (!$exclude_cat) {
            return;
        }

        $exclude_cat_array = explode(',', esc_attr($exclude_cat));

        if (is_array($exclude_cat_array)) {
            if ($query->is_home() || is_archive()) {
                $query->set('category__not_in', $exclude_cat_array);
            }
            return $query;
        }
    }

}