<?php

/** Footer Settings */
$wp_customize->add_section('meta_store_footer_settings', array(
    'title' => esc_html__('Footer Settings', 'meta-store'),
    'priority' => 20
));

$wp_customize->add_setting('meta_store_footer_nav', array(
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control(new Meta_Store_Tab($wp_customize, 'meta_store_footer_nav', array(
    'section' => 'meta_store_footer_settings',
    'priority' => 1,
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'meta-store'),
            'fields' => array(
                'meta_store_top_footer_heading',
                'meta_store_footer_col',
                'meta_store_footer_info',
                'meta_store_bottom_footer_heading',
                'meta_store_footer_copyright',
                'meta_store_payment_logos'
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'meta-store'),
            'fields' => array(
                'meta_store_footer_primary_color_heading',
                'meta_store_footer_border_color',
                'meta_store_footer_title_color',
                'meta_store_footer_text_color',
                'meta_store_footer_anchor_color'
            ),
        )
    ),
)));

$wp_customize->add_setting('meta_store_top_footer_heading', array(
    'sanitize_callback' => 'meta_store_sanitize_text'
));

$wp_customize->add_control(new Meta_Store_Heading($wp_customize, 'meta_store_top_footer_heading', array(
    'section' => 'meta_store_footer_settings',
    'label' => esc_html__('Top Footer', 'meta-store')
)));

$wp_customize->add_setting('meta_store_footer_col', array(
    'sanitize_callback' => 'sanitize_text_field',
    'default' => 'col-1'
));

$wp_customize->add_control(new Meta_Store_Selector($wp_customize, 'meta_store_footer_col', array(
    'section' => 'meta_store_footer_settings',
    'label' => esc_html__('Footer Columns', 'meta-store'),
    'class' => 'ht-one-third-width',
    'options' => array(
        'col-1' => META_STORE_OPT_DIR_URI_IMAGES . 'footer-columns/col-1.jpg',
        'col-2' => META_STORE_OPT_DIR_URI_IMAGES . 'footer-columns/col-2.jpg',
        'col-3' => META_STORE_OPT_DIR_URI_IMAGES . 'footer-columns/col-3.jpg',
        'col-4' => META_STORE_OPT_DIR_URI_IMAGES . 'footer-columns/col-4.jpg',
    )
)));

$wp_customize->add_setting('meta_store_footer_info', array(
    'sanitize_callback' => 'meta_store_sanitize_text',
    'transport' => 'refresh'
));

$wp_customize->add_control(new Meta_Store_Text_Info($wp_customize, 'meta_store_footer_info', array(
    'section' => 'meta_store_footer_settings',
    'description' => esc_html__('- Footer column width resizer', 'meta-store') . '<br/>' . esc_html__('- Add unlimited widget areas', 'meta-store') . '<br/>' . esc_html__('- Footer Typography', 'meta-store') . '<br/>' . esc_html__('- Footer background options', 'meta-store'),
    'input_attrs' => array(
        'upgrade' => 'yes'
    )
)));

$wp_customize->add_setting('meta_store_footer_title_color', array(
    'default' => '#c8c8c8',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'refresh'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'meta_store_footer_title_color', array(
    'section' => 'meta_store_footer_settings',
    'label' => esc_html__('Footer Title Color', 'meta-store')
)));

$wp_customize->add_setting('meta_store_footer_border_color', array(
    'default' => '#444444',
    'sanitize_callback' => 'meta_store_sanitize_color_alpha',
    'transport' => 'refresh'
));

$wp_customize->add_control(new Meta_Store_Alpha_Color($wp_customize, 'meta_store_footer_border_color', array(
    'label' => esc_html__('Footer Border Color', 'meta-store'),
    'section' => 'meta_store_footer_settings'
)));

$wp_customize->add_setting('meta_store_footer_text_color', array(
    'default' => '#969696',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'refresh'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'meta_store_footer_text_color', array(
    'section' => 'meta_store_footer_settings',
    'label' => esc_html__('Footer Text Color', 'meta-store')
)));

$wp_customize->add_setting('meta_store_footer_anchor_color', array(
    'default' => '#EEEEEE',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'refresh'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'meta_store_footer_anchor_color', array(
    'section' => 'meta_store_footer_settings',
    'label' => esc_html__('Footer Anchor Color', 'meta-store')
)));

$wp_customize->add_setting('meta_store_bottom_footer_heading', array(
    'sanitize_callback' => 'meta_store_sanitize_text'
));

$wp_customize->add_control(new Meta_Store_Heading($wp_customize, 'meta_store_bottom_footer_heading', array(
    'section' => 'meta_store_footer_settings',
    'label' => esc_html__('Bottom Footer', 'meta-store')
)));

$wp_customize->add_setting('meta_store_footer_copyright', array(
    'sanitize_callback' => 'meta_store_sanitize_text',
    'default' => esc_html__('&copy; 2021 Meta Store. All Right Reserved.', 'meta-store'),
));

$wp_customize->add_control('meta_store_footer_copyright', array(
    'section' => 'meta_store_footer_settings',
    'type' => 'textarea',
    'label' => esc_html__('Copyright Text', 'meta-store'),
    'description' => esc_html__('Custom HTMl and Shortcodes Supported', 'meta-store')
));

/** Payment Logos */
$wp_customize->add_setting('meta_store_payment_logos', array(
    'default' => '',
    'sanitize_callback' => 'meta_store_sanitize_link',
));

$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'meta_store_payment_logos', array(
    'label' => esc_html__('Payment Logos', 'meta-store'),
    'section' => 'meta_store_footer_settings',
    'settings' => 'meta_store_payment_logos',
)));
