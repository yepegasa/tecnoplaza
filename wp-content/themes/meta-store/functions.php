<?php

/**
 * Meta Store functions and definitions
 *
 * @package Meta Store
 */
if (!defined('META_STORE_VERSION')) {
    $meta_store_theme = wp_get_theme();
    define('META_STORE_VERSION', $meta_store_theme->get('version'));
}

if (!function_exists('meta_store_setup')) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function meta_store_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Meta Store, use a find and replace
         * to change 'meta-store' to the name of your theme in all the template files.
         */
        load_theme_textdomain('meta-store', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');
        add_image_size('meta-store-1000x600', 1000, 600, true);

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'meta-store-main-menu' => esc_html__('Primary Menu', 'meta-store'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('meta_store_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo', array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        ));
    }

endif;
add_action('after_setup_theme', 'meta_store_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function meta_store_content_width() {
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters('meta_store_content_width', 640);
}

add_action('after_setup_theme', 'meta_store_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function meta_store_widgets_init() {
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'meta-store'),
        'id' => 'meta-store-sidebar',
        'description' => esc_html__('Add widgets here.', 'meta-store'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Shop Sidebar', 'meta-store'),
        'id' => 'meta-store-shop-sidebar',
        'description' => esc_html__('Add widgets here.', 'meta-store'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer 1', 'meta-store'),
        'id' => 'meta-store-footer-1',
        'description' => esc_html__('Add widgets for footer 1.', 'meta-store'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer 2', 'meta-store'),
        'id' => 'meta-store-footer-2',
        'description' => esc_html__('Add widgets for footer 2.', 'meta-store'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer 3', 'meta-store'),
        'id' => 'meta-store-footer-3',
        'description' => esc_html__('Add widgets for footer 3.', 'meta-store'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer 4', 'meta-store'),
        'id' => 'meta-store-footer-4',
        'description' => esc_html__('Add widgets for footer 4.', 'meta-store'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}

add_action('widgets_init', 'meta_store_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function meta_store_scripts() {
    /** Fonts */
    wp_enqueue_style('meta-store-fonts', meta_store_fonts_url(), array(), NULL);

    /** Icons */
    wp_enqueue_style('elegant-icons', get_template_directory_uri() . '/vendors/elegant-icons/elegant-icons.css', array(), META_STORE_VERSION, false);
    wp_enqueue_style('materialdesignicons', get_template_directory_uri() . '/vendors/materialdesignicons/materialdesignicons.css', array(), META_STORE_VERSION, false);
    wp_enqueue_style('icofont', get_template_directory_uri() . '/vendors/icofont/icofont.css', array(), META_STORE_VERSION, false);

    /** Custom Scripts */
    wp_enqueue_script('superfish', get_template_directory_uri() . '/js/superfish.js', array(), META_STORE_VERSION, true);
    wp_enqueue_script('meta-store-custom-scripts', get_template_directory_uri() . '/js/custom-scripts.js', array('jquery'), META_STORE_VERSION, true);
    wp_localize_script('meta-store-custom-scripts', 'meta_store_custom_script_options', array(
        'responsiveWidth' => apply_filters('meta_store_responsive_width', 1000),
        'ajax_url' => admin_url('admin-ajax.php')
    ));

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    wp_enqueue_style('meta-store-style', get_stylesheet_uri(), array(), META_STORE_VERSION, false);
}

add_action('wp_enqueue_scripts', 'meta_store_scripts');

/**
 * Enqueue Backend scripts and styles
 */
function meta_store_admin_scripts() {
    /** Admin Styles * */
    wp_enqueue_style('meta-store-admin-styles', get_template_directory_uri() . '/css/admin-styles.css', array(), META_STORE_VERSION);

    /** Admin Scripts * */
    wp_enqueue_script('meta-store-admin-script', get_template_directory_uri() . '/js/admin-scripts.js', META_STORE_VERSION, true);
}

add_action('admin_enqueue_scripts', 'meta_store_admin_scripts', 10);

/** Google Fonts * */
function meta_store_fonts_url() {
    $fonts_url = '';
    $subsets = 'latin,latin-ext';
    $fonts = $standard_font_family = $default_font_list = $font_family_array = $variants_array = $font_array = $google_fonts = array();

    $customizer_fonts = meta_store_get_customizer_fonts();
    $standard_font = meta_store_standard_font_array();
    $google_font_list = meta_store_google_font_array();
    $default_font_list = meta_store_default_font_array();

    foreach ($standard_font as $key => $value) {
        $standard_font_family[] = $value['family'];
    }

    foreach ($default_font_list as $key => $value) {
        $default_font_family[] = $value['family'];
    }

    foreach ($customizer_fonts as $key => $value) {
        $font_family_array[] = get_theme_mod('meta_store_' . $key . '_font_family', $value['font_family']);
    }

    $font_family_array = array_unique($font_family_array);
    $font_family_array = array_diff($font_family_array, array_merge($standard_font_family, $default_font_family));

    foreach ($font_family_array as $font_family) {
        $font_array = meta_store_search_key($google_font_list, 'family', $font_family);
        $variants_array = $font_array['0']['variants'];
        $variants_keys = array_keys($variants_array);
        $variants = implode(',', $variants_keys);

        $fonts[] = $font_family . ':' . str_replace('italic', 'i', $variants);
    }
    /*
     * Translators: To add an additional character subset specific to your language,
     * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
     */
    $subset = _x('no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'meta-store');

    if ('cyrillic' == $subset) {
        $subsets .= ',cyrillic,cyrillic-ext';
    } elseif ('greek' == $subset) {
        $subsets .= ',greek,greek-ext';
    } elseif ('devanagari' == $subset) {
        $subsets .= ',devanagari';
    } elseif ('vietnamese' == $subset) {
        $subsets .= ',vietnamese';
    }

    if ($fonts) {
        $fonts_url = add_query_arg(array(
            'family' => urlencode(implode('|', $fonts)),
            'subset' => urlencode($subsets),
                ), '//fonts.googleapis.com/css');
    }

    return $fonts_url;
}

/**
 * Custom Metabox
 */
require get_template_directory() . '/inc/metabox.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Meta Breadcrumb
 */
require get_template_directory() . '/inc/breadcrumbs.php';

/**
 * Hooks
 */
require get_template_directory() . '/inc/hooks/hooks.php';

/**
 * Theme Options
 */
require get_template_directory() . '/inc/theme-options/theme-options.php';

/** Dynamic Styles * */
require get_template_directory() . '/css/dynamic-styles.php';

/** Welcome Page * */
require get_template_directory() . '/welcome/welcome.php';

/** Welcome Page * */
require get_template_directory() . '/inc/tgm/meta-store-tgm.php';

/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
    require get_template_directory() . '/inc/woocommerce.php';
}