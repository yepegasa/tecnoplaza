<?php

/** Color Options */
$wp_customize->get_section('colors')->title = esc_html__('Color Settings', 'meta-store');
$wp_customize->get_section('colors')->priority = 2;

/** Color Settings * */
$wp_customize->add_setting('meta_store_template_color', array(
    'default' => '#FC596B',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 1
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'meta_store_template_color', array(
    'section' => 'colors',
    'label' => esc_html__('Theme Primary Color', 'meta-store')
)));

$wp_customize->add_setting('meta_store_content_color_heading', array(
    'sanitize_callback' => 'meta_store_sanitize_text',
    'priority' => 1
));

$wp_customize->add_control(new Meta_Store_Heading($wp_customize, 'meta_store_content_color_heading', array(
    'section' => 'colors',
    'label' => esc_html__('Content Color', 'meta-store'),
    'description' => esc_html__('This settings apply only in the single posts (i.e. page and post detail pages only)', 'meta-store')
)));

$wp_customize->add_setting('meta_store_content_header_color', array(
    'default' => '#000000',
    'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'meta_store_content_header_color', array(
    'section' => 'colors',
    'label' => esc_html__('Heading Color', 'meta-store'),
    'description' => esc_html__('Color applies for tags (H1, H2, H3, H4, H5, H6)', 'meta-store')
)));

$wp_customize->add_setting('meta_store_content_text_color', array(
    'default' => '#333333',
    'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'meta_store_content_text_color', array(
    'section' => 'colors',
    'label' => esc_html__('Content Text Color', 'meta-store'),
    'description' => esc_html__('Color applies for text in the content area.', 'meta-store')
)));

$wp_customize->add_setting('meta_store_content_link_color', array(
    'default' => '#000000',
    'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'meta_store_content_link_color', array(
    'section' => 'colors',
    'label' => esc_html__('Content Link Color', 'meta-store'),
    'description' => esc_html__('Color applies for link text in the content area.', 'meta-store')
)));

$wp_customize->add_setting('meta_store_content_link_hov_color', array(
    'default' => '#FC596B',
    'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'meta_store_content_link_hov_color', array(
    'section' => 'colors',
    'label' => esc_html__('Content Link Hover Color', 'meta-store'),
)));

$wp_customize->add_setting('meta_store_color_info', array(
    'sanitize_callback' => 'meta_store_sanitize_text',
    'transport' => 'refresh'
));

$wp_customize->add_control(new Meta_Store_Text_Info($wp_customize, 'meta_store_color_info', array(
    'section' => 'colors',
    'description' => esc_html__('- More advanced color customization for individual sections and elements', 'meta-store'),
    'input_attrs' => array(
        'upgrade' => 'yes'
    )
)));
