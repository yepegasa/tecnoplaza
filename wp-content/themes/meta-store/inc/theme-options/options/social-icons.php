<?php
/** Social Icons */
$wp_customize->add_section('meta_store_social_icons_section', array(
    'title' => esc_html__('Social Icons', 'meta-store'),
    'description' => esc_html__('Add social icons for the header', 'meta-store'),
));

/** Social Icons */
$wp_customize->add_setting('meta_store_social_icons', array(
    'sanitize_callback' => 'meta_store_sanitize_repeater',
    'default' => json_encode(array(
        array(
            'icon' => 'icofont-facebook',
            'link' => '#',
            'enable' => 'on'
        ),
        array(
            'icon' => 'icofont-twitter',
            'link' => '#',
            'enable' => 'on'
        ),
        array(
            'icon' => 'icofont-instagram',
            'link' => '#',
            'enable' => 'on'
        ),
        array(
            'icon' => 'icofont-youtube',
            'link' => '#',
            'enable' => 'on'
        )
    ))
));

$wp_customize->add_control(new Meta_Store_Repeater($wp_customize, 'meta_store_social_icons', array(
    'label' => esc_html__('Add Social Link', 'meta-store'),
    'section' => 'meta_store_social_icons_section',
    'box_label' => esc_html__('Social Links', 'meta-store'),
    'add_label' => esc_html__('Add New', 'meta-store'),
        ), array(
    'icon' => array(
        'type' => 'icon',
        'label' => esc_html__('Select Icon', 'meta-store'),
        'default' => 'icofont-facebook'
    ),
    'link' => array(
        'type' => 'text',
        'label' => esc_html__('Add Link', 'meta-store'),
        'default' => ''
    ),
    'enable' => array(
        'type' => 'toggle',
        'label' => esc_html__('Enable', 'meta-store'),
        'default' => 'yes'
    )
)));
