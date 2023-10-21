<?php
/** Blog Page Options */
$wp_customize->add_panel('meta_store_blog_settings_panel', array(
    'title' => esc_html__('Blog/Single Post Settings', 'meta-store'),
    'priority' => 40
));

$wp_customize->add_section('meta_store_blog_page_settings', array(
    'panel' => 'meta_store_blog_settings_panel',
    'title' => esc_html__('Blog/Archive Page Settings', 'meta-store'),
));

$wp_customize->add_setting('meta_store_blog_layout', array(
    'sanitize_callback' => 'meta_store_sanitize_select',
    'default' => 'blog-layout1'
));

$wp_customize->add_control(new Meta_Store_Image_Selector($wp_customize, 'meta_store_blog_layout', array(
    'section' => 'meta_store_blog_page_settings',
    'label' => esc_html__('Blog & Archive Layout', 'meta-store'),
    'image_path' => META_STORE_OPT_DIR_URI_IMAGES . 'blog-layouts/',
    'choices' => array(
        'blog-layout1' => esc_html__('Layout 1', 'meta-store'),
        'blog-layout2' => esc_html__('Layout 2', 'meta-store'),
    )
)));

$wp_customize->add_setting('meta_store_blog_cat', array(
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control(new Meta_Store_Multiple_Checkbox($wp_customize, 'meta_store_blog_cat', array(
    'label' => esc_html__('Exclude Category', 'meta-store'),
    'section' => 'meta_store_blog_page_settings',
    'choices' => meta_store_categories_list(),
    'description' => esc_html__('Post with selected category will not display in the blog page', 'meta-store')
)));

$wp_customize->add_setting('meta_store_archive_content', array(
    'default' => 'excerpt',
    'sanitize_callback' => 'meta_store_sanitize_choices'
));

$wp_customize->add_control('meta_store_archive_content', array(
    'section' => 'meta_store_blog_page_settings',
    'type' => 'radio',
    'label' => esc_html__('Archive Content', 'meta-store'),
    'choices' => array(
        'full-content' => esc_html__('Full Content', 'meta-store'),
        'excerpt' => esc_html__('Excerpt', 'meta-store')
    )
));

$wp_customize->add_setting('meta_store_archive_readmore', array(
    'default' => esc_html__('Read More', 'meta-store'),
    'sanitize_callback' => 'meta_store_sanitize_text'
));

$wp_customize->add_control('meta_store_archive_readmore', array(
    'section' => 'meta_store_blog_page_settings',
    'type' => 'text',
    'label' => esc_html__('Read More Text', 'meta-store')
));

$wp_customize->add_setting('meta_store_blog_excerpt_length', array(
    'default' => 250,
    'sanitize_callback' => 'meta_store_sanitize_number_absint',
));

$wp_customize->add_control(new Meta_Store_Range_Slider($wp_customize, 'meta_store_blog_excerpt_length', array(
    'section' => 'meta_store_blog_page_settings',
    'label' => esc_html__('Excerpt Length(Letters)', 'meta-store'),
    'input_attrs' => array(
        'min' => 0,
        'max' => 500,
        'step' => 1
    )
)));

$wp_customize->add_setting('meta_store_blog_date', array(
    'sanitize_callback' => 'meta_store_sanitize_boolean',
    'default' => true
));

$wp_customize->add_control(new Meta_Store_Toggle($wp_customize, 'meta_store_blog_date', array(
    'section' => 'meta_store_blog_page_settings',
    'label' => esc_html__('Display Posted Date', 'meta-store')
)));

$wp_customize->add_setting('meta_store_blog_author', array(
    'sanitize_callback' => 'meta_store_sanitize_boolean',
    'default' => true
));

$wp_customize->add_control(new Meta_Store_Toggle($wp_customize, 'meta_store_blog_author', array(
    'section' => 'meta_store_blog_page_settings',
    'label' => esc_html__('Display Author', 'meta-store')
)));

$wp_customize->add_setting('meta_store_blog_comment', array(
    'sanitize_callback' => 'meta_store_sanitize_boolean',
    'default' => true
));

$wp_customize->add_control(new Meta_Store_Toggle($wp_customize, 'meta_store_blog_comment', array(
    'section' => 'meta_store_blog_page_settings',
    'label' => esc_html__('Display Comment', 'meta-store')
)));

$wp_customize->add_setting('meta_store_blog_category', array(
    'sanitize_callback' => 'meta_store_sanitize_boolean',
    'default' => true
));

$wp_customize->add_control(new Meta_Store_Toggle($wp_customize, 'meta_store_blog_category', array(
    'section' => 'meta_store_blog_page_settings',
    'label' => esc_html__('Display Category', 'meta-store')
)));

$wp_customize->add_setting('meta_store_blog_tag', array(
    'sanitize_callback' => 'meta_store_sanitize_boolean',
    'default' => true
));

$wp_customize->add_control(new Meta_Store_Toggle($wp_customize, 'meta_store_blog_tag', array(
    'section' => 'meta_store_blog_page_settings',
    'label' => esc_html__('Display Tag', 'meta-store')
)));

$wp_customize->add_setting('meta_store_blog_page_info', array(
    'sanitize_callback' => 'meta_store_sanitize_text',
    'transport' => 'refresh'
));

$wp_customize->add_control(new Meta_Store_Text_Info($wp_customize, 'meta_store_blog_page_info', array(
    'section' => 'meta_store_blog_page_settings',
    'description' => esc_html__('- More Blog Page layouts', 'meta-store'),
    'input_attrs' => array(
        'upgrade' => 'yes'
    )
)));

/** Single Post Settings **/
$wp_customize->add_section('meta_store_single_post_settings', array(
    'title' => esc_html__('Single Post Settings', 'meta-store'),
    'panel' => 'meta_store_blog_settings_panel',
));

$wp_customize->add_setting('meta_store_single_layout', array(
    'sanitize_callback' => 'meta_store_sanitize_select',
    'default' => 'single-layout1'
));

$wp_customize->add_control(new Meta_Store_Image_Selector($wp_customize, 'meta_store_single_layout', array(
    'section' => 'meta_store_single_post_settings',
    'label' => esc_html__('Single Post Layout', 'meta-store'),
    'description' => esc_html__('This option can be overwritten in single page settings.', 'meta-store'),
    'image_path' => META_STORE_OPT_DIR_URI_IMAGES . 'single-layouts/',
    'choices' => array(
        'single-layout1' => esc_html__('Layout 1', 'meta-store'),
        'single-layout2' => esc_html__('Layout 2', 'meta-store'),
    )
)));

$wp_customize->add_setting('meta_store_single_categories', array(
    'sanitize_callback' => 'meta_store_sanitize_boolean',
    'default' => true
));

$wp_customize->add_control(new Meta_Store_Toggle($wp_customize, 'meta_store_single_categories', array(
    'section' => 'meta_store_single_post_settings',
    'label' => esc_html__('Display Categories', 'meta-store')
)));

$wp_customize->add_setting('meta_store_single_author', array(
    'sanitize_callback' => 'meta_store_sanitize_boolean',
    'default' => true
));

$wp_customize->add_control(new Meta_Store_Toggle($wp_customize, 'meta_store_single_author', array(
    'section' => 'meta_store_single_post_settings',
    'label' => esc_html__('Display Author', 'meta-store')
)));

$wp_customize->add_setting('meta_store_single_date', array(
    'sanitize_callback' => 'meta_store_sanitize_boolean',
    'default' => true
));

$wp_customize->add_control(new Meta_Store_Toggle($wp_customize, 'meta_store_single_date', array(
    'section' => 'meta_store_single_post_settings',
    'label' => esc_html__('Display Posted Date', 'meta-store')
)));

$wp_customize->add_setting('meta_store_single_comment_count', array(
    'sanitize_callback' => 'meta_store_sanitize_boolean',
    'default' => true
));

$wp_customize->add_control(new Meta_Store_Toggle($wp_customize, 'meta_store_single_comment_count', array(
    'section' => 'meta_store_single_post_settings',
    'label' => esc_html__('Display Comment Count', 'meta-store')
)));

$wp_customize->add_setting('meta_store_single_tags', array(
    'sanitize_callback' => 'meta_store_sanitize_boolean',
    'default' => true
));

$wp_customize->add_control(new Meta_Store_Toggle($wp_customize, 'meta_store_single_tags', array(
    'section' => 'meta_store_single_post_settings',
    'label' => esc_html__('Display Tags', 'meta-store')
)));

$wp_customize->add_setting('meta_store_single_post_info', array(
    'sanitize_callback' => 'meta_store_sanitize_text',
    'transport' => 'refresh'
));

$wp_customize->add_control(new Meta_Store_Text_Info($wp_customize, 'meta_store_single_post_info', array(
    'section' => 'meta_store_single_post_settings',
    'description' => esc_html__('- More Single Post layouts', 'meta-store'),
    'input_attrs' => array(
        'upgrade' => 'yes'
    )
)));
