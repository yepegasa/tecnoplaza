<?php

/** Sidebar Options */
$wp_customize->add_section('meta_store_sidebar_settings', array(
    'title' => esc_html__('Sidebar Settings', 'meta-store'),
    'priority' => 30
));

$wp_customize->add_setting('meta_store_page_layout', array(
    'sanitize_callback' => 'sanitize_text_field',
    'default' => 'right-sidebar'
));

$wp_customize->add_control(new Meta_Store_Selector($wp_customize, 'meta_store_page_layout', array(
    'section' => 'meta_store_sidebar_settings',
    'label' => esc_html__('Page Layout', 'meta-store'),
    'class' => 'ht-one-forth-width',
    'description' => esc_html__('Applies to all the General Pages and Portfolio Pages.', 'meta-store'),
    'options' => array(
        'right-sidebar' => META_STORE_OPT_DIR_URI_IMAGES . 'sidebar-layouts/right-sidebar.jpg',
        'left-sidebar' => META_STORE_OPT_DIR_URI_IMAGES . 'sidebar-layouts/left-sidebar.jpg',
        'no-sidebar' => META_STORE_OPT_DIR_URI_IMAGES . 'sidebar-layouts/no-sidebar.jpg',
        'no-sidebar-narrow' => META_STORE_OPT_DIR_URI_IMAGES . 'sidebar-layouts/no-sidebar-narrow.jpg'
    )
)));

$wp_customize->add_setting('meta_store_post_layout', array(
    'sanitize_callback' => 'sanitize_text_field',
    'default' => 'right-sidebar'
));

$wp_customize->add_control(new Meta_Store_Selector($wp_customize, 'meta_store_post_layout', array(
    'section' => 'meta_store_sidebar_settings',
    'label' => esc_html__('Post Layout', 'meta-store'),
    'class' => 'ht-one-forth-width',
    'description' => esc_html__('Applies to all the Posts.', 'meta-store'),
    'options' => array(
        'right-sidebar' => META_STORE_OPT_DIR_URI_IMAGES . 'sidebar-layouts/right-sidebar.jpg',
        'left-sidebar' => META_STORE_OPT_DIR_URI_IMAGES . 'sidebar-layouts/left-sidebar.jpg',
        'no-sidebar' => META_STORE_OPT_DIR_URI_IMAGES . 'sidebar-layouts/no-sidebar.jpg',
        'no-sidebar-narrow' => META_STORE_OPT_DIR_URI_IMAGES . 'sidebar-layouts/no-sidebar-narrow.jpg'
    )
)));

$wp_customize->add_setting('meta_store_archive_layout', array(
    'sanitize_callback' => 'sanitize_text_field',
    'default' => 'right-sidebar'
));

$wp_customize->add_control(new Meta_Store_Selector($wp_customize, 'meta_store_archive_layout', array(
    'section' => 'meta_store_sidebar_settings',
    'label' => esc_html__('Archive Page Layout', 'meta-store'),
    'class' => 'ht-one-forth-width',
    'description' => esc_html__('Applies to all Archive Pages.', 'meta-store'),
    'options' => array(
        'right-sidebar' => META_STORE_OPT_DIR_URI_IMAGES . 'sidebar-layouts/right-sidebar.jpg',
        'left-sidebar' => META_STORE_OPT_DIR_URI_IMAGES . 'sidebar-layouts/left-sidebar.jpg',
        'no-sidebar' => META_STORE_OPT_DIR_URI_IMAGES . 'sidebar-layouts/no-sidebar.jpg',
        'no-sidebar-narrow' => META_STORE_OPT_DIR_URI_IMAGES . 'sidebar-layouts/no-sidebar-narrow.jpg'
    )
)));

$wp_customize->add_setting('meta_store_home_blog_layout', array(
    'sanitize_callback' => 'sanitize_text_field',
    'default' => 'right-sidebar'
));

$wp_customize->add_control(new Meta_Store_Selector($wp_customize, 'meta_store_home_blog_layout', array(
    'section' => 'meta_store_sidebar_settings',
    'label' => esc_html__('Blog Page Layout', 'meta-store'),
    'class' => 'ht-one-forth-width',
    'description' => esc_html__('Applies to Blog Page.', 'meta-store'),
    'options' => array(
        'right-sidebar' => META_STORE_OPT_DIR_URI_IMAGES . 'sidebar-layouts/right-sidebar.jpg',
        'left-sidebar' => META_STORE_OPT_DIR_URI_IMAGES . 'sidebar-layouts/left-sidebar.jpg',
        'no-sidebar' => META_STORE_OPT_DIR_URI_IMAGES . 'sidebar-layouts/no-sidebar.jpg',
        'no-sidebar-narrow' => META_STORE_OPT_DIR_URI_IMAGES . 'sidebar-layouts/no-sidebar-narrow.jpg'
    )
)));

$wp_customize->add_setting('meta_store_search_layout', array(
    'sanitize_callback' => 'sanitize_text_field',
    'default' => 'right-sidebar'
));

$wp_customize->add_control(new Meta_Store_Selector($wp_customize, 'meta_store_search_layout', array(
    'section' => 'meta_store_sidebar_settings',
    'label' => esc_html__('Search Page Layout', 'meta-store'),
    'class' => 'ht-one-forth-width',
    'description' => esc_html__('Applies to Search Page.', 'meta-store'),
    'options' => array(
        'right-sidebar' => META_STORE_OPT_DIR_URI_IMAGES . 'sidebar-layouts/right-sidebar.jpg',
        'left-sidebar' => META_STORE_OPT_DIR_URI_IMAGES . 'sidebar-layouts/left-sidebar.jpg',
        'no-sidebar' => META_STORE_OPT_DIR_URI_IMAGES . 'sidebar-layouts/no-sidebar.jpg',
        'no-sidebar-narrow' => META_STORE_OPT_DIR_URI_IMAGES . 'sidebar-layouts/no-sidebar-narrow.jpg'
    )
)));

$wp_customize->add_setting('meta_store_shop_layout', array(
    'sanitize_callback' => 'sanitize_text_field',
    'default' => 'right-sidebar'
));

$wp_customize->add_control(new Meta_Store_Selector($wp_customize, 'meta_store_shop_layout', array(
    'section' => 'meta_store_sidebar_settings',
    'label' => esc_html__('Shop Page Layout(WooCommerce)', 'meta-store'),
    'class' => 'ht-one-forth-width',
    'description' => esc_html__('Applies to Shop Page, Product Category, Product Tag and all Single Products Pages.', 'meta-store'),
    'options' => array(
        'right-sidebar' => META_STORE_OPT_DIR_URI_IMAGES . 'sidebar-layouts/right-sidebar.jpg',
        'left-sidebar' => META_STORE_OPT_DIR_URI_IMAGES . 'sidebar-layouts/left-sidebar.jpg',
        'no-sidebar' => META_STORE_OPT_DIR_URI_IMAGES . 'sidebar-layouts/no-sidebar.jpg',
        'no-sidebar-narrow' => META_STORE_OPT_DIR_URI_IMAGES . 'sidebar-layouts/no-sidebar-narrow.jpg'
    ),
)));

$wp_customize->add_setting('meta_store_sidebar_info', array(
    'sanitize_callback' => 'meta_store_sanitize_text',
    'transport' => 'refresh'
));

$wp_customize->add_control(new Meta_Store_Text_Info($wp_customize, 'meta_store_sidebar_info', array(
    'section' => 'meta_store_sidebar_settings',
    'description' => esc_html__('- Choose different sidebar layouts for Product Category, Tag Page and Single Product Page', 'meta-store') . '<br/>' . esc_html__('- Sticky Sidebar', 'meta-store') . '<br/>' . esc_html__('- Custom Typography', 'meta-store'),
    'input_attrs' => array(
        'upgrade' => 'yes'
    )
)));
