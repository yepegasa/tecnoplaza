<?php

/**
 * Theme Options File
 *
 * @package Meta Store
 */
define('META_STORE_OPT_DIR', get_template_directory() . '/inc/theme-options/');
define('META_STORE_OPT_DIR_URI_IMAGES', get_template_directory_uri() . '/inc/theme-options/images/');
define('META_STORE_OPT_DIR_URI_JS', get_template_directory_uri() . '/inc/theme-options/js/');
define('META_STORE_OPT_DIR_URI_CSS', get_template_directory_uri() . '/inc/theme-options/css/');

/** Necessary Styles & Scripts for customizer controls */
function meta_store_customizer_script() {
    wp_enqueue_script('chosen-jquery', META_STORE_OPT_DIR_URI_JS . 'chosen.jquery.js', array("jquery"), '1.0.0', true);
    wp_enqueue_script('select2', META_STORE_OPT_DIR_URI_JS . 'select2.js', array("jquery"), '1.0.0', true);
    wp_enqueue_script('wp-color-picker-alpha', META_STORE_OPT_DIR_URI_JS . 'wp-color-picker-alpha.js', array('jquery', 'wp-color-picker'), '1.0.0', true);
    wp_enqueue_script('meta-store-customizer-script', META_STORE_OPT_DIR_URI_JS . 'customizer-controls.js', array('jquery', 'jquery-ui-datepicker'), META_STORE_VERSION, true);

    /** Icons */
    wp_enqueue_style('elegant-icons', get_template_directory_uri() . '/vendors/elegant-icons/elegant-icons.css', array(), META_STORE_VERSION, false);
    wp_enqueue_style('materialdesignicons', get_template_directory_uri() . '/vendors/materialdesignicons/materialdesignicons.css', array(), META_STORE_VERSION, false);
    wp_enqueue_style('icofont', get_template_directory_uri() . '/vendors/icofont/icofont.css', array(), META_STORE_VERSION, false);

    wp_enqueue_style('chosen', META_STORE_OPT_DIR_URI_CSS . 'chosen.css', array(), '1.0.0');
    wp_enqueue_style('select2', META_STORE_OPT_DIR_URI_CSS . 'select2.css', array(), '1.0.0');
    wp_enqueue_style('meta-store-customizer-style', META_STORE_OPT_DIR_URI_CSS . 'customizer-controls.css', array('wp-color-picker'), '1.0.0');
}

add_action('customize_controls_enqueue_scripts', 'meta_store_customizer_script');

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function meta_store_customize_preview_js() {
    wp_enqueue_script('meta-store-customizer-preview', META_STORE_OPT_DIR_URI_JS . '/customizer-preview.js', array('customize-preview'), META_STORE_VERSION, true);
}

add_action('customize_preview_init', 'meta_store_customize_preview_js');

/** Customizer Theme Options */
function meta_store_theme_options($wp_customize) {
    /** Custom Controls */
    require META_STORE_OPT_DIR . 'custom-controls/custom-controls.php';

    /** Sanitization Functions */
    require META_STORE_OPT_DIR . 'includes/sanitization.php';

    $wp_customize->get_section('static_front_page')->priority = 1;
    $wp_customize->get_control('background_color')->section = 'background_image';

    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial('blogname', array(
            'selector' => '.ms-site-title a',
            'render_callback' => 'meta_store_customize_partial_blogname',
        ));
        $wp_customize->selective_refresh->add_partial('blogdescription', array(
            'selector' => '.ms-site-description',
            'render_callback' => 'meta_store_customize_partial_blogdescription',
        ));
    }

    // Register custom section types.
    $wp_customize->register_section_type('Meta_Store_Upgrade_Section');

    $wp_customize->add_section(new Meta_Store_Upgrade_Section($wp_customize, 'meta-store-pro-section', array(
        'priority' => 0,
        'pro_text' => esc_html__('Upgrade to Pro', 'meta-store'),
        'pro_url' => 'https://mysticalthemes.com/theme/meta-store/'
    )));

    $wp_customize->add_section(new Meta_Store_Upgrade_Section($wp_customize, 'meta-store-import-section', array(
        'title' => esc_html__('Import Demo Content', 'meta-store'),
        'priority' => 0,
        'pro_text' => esc_html__('Import', 'meta-store'),
        'pro_url' => admin_url('admin.php?page=meta-store-welcome')
    )));
    
    $wp_customize->add_section(new Meta_Store_Upgrade_Section($wp_customize, 'meta-store-doc-section', array(
        'title' => esc_html__('Documentation', 'meta-store'),
        'priority' => 1000,
        'pro_text' => esc_html__('View', 'meta-store'),
        'pro_url' => 'https://doc.mysticalthemes.com/meta-store/'
    )));

    /** Theme Options */
    require META_STORE_OPT_DIR . 'options/general-settings.php'; // General Options
    require META_STORE_OPT_DIR . 'options/color-settings.php'; // Color Options
    require META_STORE_OPT_DIR . 'options/header-settings.php'; // Header Options
    require META_STORE_OPT_DIR . 'options/footer-settings.php'; // Footer Options
    require META_STORE_OPT_DIR . 'options/sidebar-settings.php'; // Sidebar Options
    require META_STORE_OPT_DIR . 'options/blog-settings.php'; // Blog Options
    require META_STORE_OPT_DIR . 'options/social-icons.php'; // Sidebar Options
    require META_STORE_OPT_DIR . 'options/typography.php'; // Typography Options
    require META_STORE_OPT_DIR . 'options/pro-features.php'; // Pro Features

    do_action('meta_store_new_options', $wp_customize);
}

add_action('customize_register', 'meta_store_theme_options');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function meta_store_customize_partial_blogname() {
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function meta_store_customize_partial_blogdescription() {
    bloginfo('description');
}

/** Helper Functions */
require META_STORE_OPT_DIR . 'custom-controls/typography/typography.php';
require META_STORE_OPT_DIR . 'includes/helpers.php';
require META_STORE_OPT_DIR . 'includes/fonts.php';
