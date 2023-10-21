<?php

// Add the typography panel.
$wp_customize->add_panel('meta_store_typography', array(
    'priority' => 3,
    'title' => esc_html__('Typography Settings', 'meta-store')
));

// Add the body typography section.
$wp_customize->add_section('meta_store_body_typography', array(
    'panel' => 'meta_store_typography',
    'title' => esc_html__('Body', 'meta-store')
));

$wp_customize->add_setting('meta_store_body_font_family', array(
    'default' => 'Varela Round',
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_setting('meta_store_body_font_style', array(
    'default' => '400',
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_setting('meta_store_body_text_decoration', array(
    'default' => 'none',
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_setting('meta_store_body_text_transform', array(
    'default' => 'none',
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_setting('meta_store_body_font_size', array(
    'default' => '16',
    'sanitize_callback' => 'absint',
));

$wp_customize->add_setting('meta_store_body_line_height', array(
    'default' => '1.6',
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_setting('meta_store_body_letter_spacing', array(
    'default' => '0',
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_setting('meta_store_body_color', array(
    'default' => '#333333',
    'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(new Meta_Store_Typography($wp_customize, 'meta_store_body_typography', array(
    'label' => esc_html__('Body Typography', 'meta-store'),
    'section' => 'meta_store_body_typography',
    'settings' => array(
        'family' => 'meta_store_body_font_family',
        'style' => 'meta_store_body_font_style',
        'text_decoration' => 'meta_store_body_text_decoration',
        'text_transform' => 'meta_store_body_text_transform',
        'size' => 'meta_store_body_font_size',
        'line_height' => 'meta_store_body_line_height',
        'letter_spacing' => 'meta_store_body_letter_spacing',
        'typocolor' => 'meta_store_body_color'
    ),
    'input_attrs' => array(
        'min' => 10,
        'max' => 40,
        'step' => 1
    )
)));

// Add H1 typography section.
$wp_customize->add_section('meta_store_header_typography', array(
    'panel' => 'meta_store_typography',
    'title' => esc_html__('Headers(H1, H2, H3, H4, H5, H6)', 'meta-store')
));

$wp_customize->add_setting('meta_store_common_header_typography', array(
    'sanitize_callback' => 'meta_store_sanitize_text',
    'default' => true
));

// Add H typography section.
$wp_customize->add_setting('meta_store_h_font_family', array(
    'default' => 'Cardo',
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_setting('meta_store_h_font_style', array(
    'default' => '700',
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_setting('meta_store_h_text_decoration', array(
    'default' => 'none',
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_setting('meta_store_h_text_transform', array(
    'default' => 'none',
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_setting('meta_store_h_line_height', array(
    'default' => '1.3',
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_setting('meta_store_h_letter_spacing', array(
    'default' => '0',
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_control(new Meta_Store_Typography($wp_customize, 'meta_store_h_typography', array(
    'label' => esc_html__('Header Typography', 'meta-store'),
    'section' => 'meta_store_header_typography',
    'settings' => array(
        'family' => 'meta_store_h_font_family',
        'style' => 'meta_store_h_font_style',
        'text_decoration' => 'meta_store_h_text_decoration',
        'text_transform' => 'meta_store_h_text_transform',
        'line_height' => 'meta_store_h_line_height',
        'letter_spacing' => 'meta_store_h_letter_spacing',
    ),
    'input_attrs' => array(
        'min' => 20,
        'max' => 100,
        'step' => 1
    )
)));

// Add the Menu typography section.
$wp_customize->add_section('meta_store_menu_typography', array(
    'panel' => 'meta_store_typography',
    'title' => esc_html__('Menu', 'meta-store')
));

$wp_customize->add_setting('meta_store_menu_font_family', array(
    'default' => 'Varela Round',
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_setting('meta_store_menu_font_style', array(
    'default' => '400',
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_setting('meta_store_menu_text_decoration', array(
    'default' => 'none',
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_setting('meta_store_menu_text_transform', array(
    'default' => 'uppercase',
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_setting('meta_store_menu_font_size', array(
    'default' => '14',
    'sanitize_callback' => 'absint',
));

$wp_customize->add_setting('meta_store_menu_line_height', array(
    'default' => '2',
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_setting('meta_store_menu_letter_spacing', array(
    'default' => '0',
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_control(new Meta_Store_Typography($wp_customize, 'meta_store_menu_typography', array(
    'label' => esc_html__('Menu Typography', 'meta-store'),
    'section' => 'meta_store_menu_typography',
    'settings' => array(
        'family' => 'meta_store_menu_font_family',
        'style' => 'meta_store_menu_font_style',
        'text_decoration' => 'meta_store_menu_text_decoration',
        'text_transform' => 'meta_store_menu_text_transform',
        'size' => 'meta_store_menu_font_size',
        'line_height' => 'meta_store_menu_line_height',
        'letter_spacing' => 'meta_store_menu_letter_spacing',
    ),
    'input_attrs' => array(
        'min' => 10,
        'max' => 40,
        'step' => 1
    )
)));

$wp_customize->add_section(new Meta_Store_Upgrade_Section($wp_customize, 'meta_store_menu_typography_info', array(
    'panel' => 'meta_store_typography',
    'options' => array(
        esc_html__('More advanced Typography Settings for individual sections and elements', 'meta-store')
    ),
    'upgrade' => true,
    'pro_text' => esc_html__('Import', 'meta-store'),
    'pro_url' => admin_url('admin.php?page=meta-store-welcome')
)));
