<?php

/** Header Options Panel */
$wp_customize->add_panel('meta_store_header_settings', array(
    'title' => esc_html__('Header Settings', 'meta-store'),
    'description' => esc_html__('Configure header settings', 'meta-store'),
    'priority' => 10,
));

$wp_customize->add_section(new Meta_Store_Upgrade_Section($wp_customize, 'meta_store_header_sep1_section', array(
    'panel' => 'meta_store_header_settings',
)));

/** Header Layouts */
$wp_customize->add_section('meta_store_header_layouts_section', array(
    'title' => esc_html__('Header Layouts', 'meta-store'),
    'panel' => 'meta_store_header_settings',
));

$wp_customize->add_setting('meta_store_mh_layout', array(
    'sanitize_callback' => 'sanitize_text_field',
    'default' => 'header-style1'
));

$wp_customize->add_control(new Meta_Store_Selector($wp_customize, 'meta_store_mh_layout', array(
    'section' => 'meta_store_header_layouts_section',
    'label' => esc_html__('Header Layouts', 'meta-store'),
    'class' => 'ht-full-width',
    'options' => array(
        'header-style1' => META_STORE_OPT_DIR_URI_IMAGES . 'headers/header-1.jpg',
        'header-style2' => META_STORE_OPT_DIR_URI_IMAGES . 'headers/header-2.jpg',
        'header-style3' => META_STORE_OPT_DIR_URI_IMAGES . 'headers/header-3.jpg',
    )
)));

$wp_customize->add_setting('meta_store_header_layout_info', array(
    'sanitize_callback' => 'meta_store_sanitize_text',
));

$wp_customize->add_control(new Meta_Store_Text_Info($wp_customize, 'meta_store_header_layout_info', array(
    'section' => 'meta_store_header_layouts_section',
    'input_attrs' => array(
        'upgrade' => 'yes'
    ),
    'description' => __('More Header layouts and Customization Options', 'meta-store')
)));

/** Top Header Options */
$wp_customize->add_section('meta_store_top_header_options', array(
    'title' => esc_html__('Top Header', 'meta-store'),
    'panel' => 'meta_store_header_settings',
));

$wp_customize->add_setting('meta_store_top_header_nav', array(
    'transport' => 'refresh',
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control(new Meta_Store_Tab($wp_customize, 'meta_store_top_header_nav', array(
    'section' => 'meta_store_top_header_options',
    'priority' => 1,
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'meta-store'),
            'fields' => array(
                'meta_store_top_header_display',
                'meta_store_th_separator1',
                'meta_store_th_center_display',
                'meta_store_th_left_display',
                'meta_store_th_right_display',
                'meta_store_th_separator2',
                'meta_store_th_heading',
                'meta_store_th_social_link',
                'meta_store_th_menu',
                'meta_store_th_widget',
                'meta_store_th_text',
                'meta_store_top_header_info',
                'meta_store_th_ticker_title',
                'meta_store_th_ticker_category',
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'meta-store'),
            'fields' => array(
                'meta_store_th_height',
                'meta_store_th_bg_color',
                'meta_store_th_bottom_border_color',
                'meta_store_th_text_color',
                'meta_store_th_anchor_color',
            ),
        ),
    ),
)));

$wp_customize->add_setting('meta_store_top_header_display', array(
    'sanitize_callback' => 'meta_store_sanitize_choices',
    'default' => 'left-right'
));

$wp_customize->add_control('meta_store_top_header_display', array(
    'section' => 'meta_store_top_header_options',
    'type' => 'select',
    'label' => esc_html__('Display Options', 'meta-store'),
    'choices' => array(
        'none' => esc_html__('None', 'meta-store'),
        'center' => esc_html__('Center', 'meta-store'),
        'left' => esc_html__('Left', 'meta-store'),
        'right' => esc_html__('Right', 'meta-store'),
        'left-right' => esc_html__('Left & Right', 'meta-store'),
    )
));

$wp_customize->add_setting('meta_store_th_separator1', array(
    'sanitize_callback' => 'meta_store_sanitize_text',
    'transport' => 'refresh'
));

$wp_customize->add_control(new Meta_Store_Separator($wp_customize, 'meta_store_th_separator1', array(
    'section' => 'meta_store_top_header_options',
)));

$wp_customize->add_setting('meta_store_th_center_display', array(
    'default' => 'text',
    'sanitize_callback' => 'meta_store_sanitize_choices',
    'transport' => 'refresh'
));

$wp_customize->add_control('meta_store_th_center_display', array(
    'section' => 'meta_store_top_header_options',
    'type' => 'select',
    'label' => esc_html__('Display in Center Header', 'meta-store'),
    'choices' => array(
        'social' => esc_html__('Social Icons', 'meta-store'),
        'widget' => esc_html__('Widget', 'meta-store'),
        'text' => esc_html__('HTML Text', 'meta-store'),
        'date' => esc_html__('Date', 'meta-store'),
        'menu' => esc_html__('Menu', 'meta-store')
    )
));

$wp_customize->add_setting('meta_store_th_left_display', array(
    'default' => 'date',
    'sanitize_callback' => 'meta_store_sanitize_choices',
    'transport' => 'refresh'
));

$wp_customize->add_control('meta_store_th_left_display', array(
    'section' => 'meta_store_top_header_options',
    'type' => 'select',
    'label' => esc_html__('Display in Left Header', 'meta-store'),
    'choices' => array(
        'social' => esc_html__('Social Icons', 'meta-store'),
        'widget' => esc_html__('Widget', 'meta-store'),
        'text' => esc_html__('HTML Text', 'meta-store'),
        'date' => esc_html__('Date & Time', 'meta-store'),
        'menu' => esc_html__('Menu', 'meta-store')
    )
));

$wp_customize->add_setting('meta_store_th_right_display', array(
    'default' => 'social',
    'sanitize_callback' => 'meta_store_sanitize_choices',
    'transport' => 'refresh'
));

$wp_customize->add_control('meta_store_th_right_display', array(
    'section' => 'meta_store_top_header_options',
    'type' => 'select',
    'label' => esc_html__('Display in Right Header', 'meta-store'),
    'choices' => array(
        'social' => esc_html__('Social Icons', 'meta-store'),
        'widget' => esc_html__('Widget', 'meta-store'),
        'text' => esc_html__('HTML Text', 'meta-store'),
        'date' => esc_html__('Date & Time', 'meta-store'),
        'menu' => esc_html__('Menu', 'meta-store')
    )
));

$wp_customize->add_setting('meta_store_th_separator2', array(
    'sanitize_callback' => 'meta_store_sanitize_text',
    'transport' => 'refresh'
));

$wp_customize->add_control(new Meta_Store_Separator($wp_customize, 'meta_store_th_separator2', array(
    'section' => 'meta_store_top_header_options',
)));

$wp_customize->add_setting('meta_store_th_heading', array(
    'sanitize_callback' => 'meta_store_sanitize_text',
    'transport' => 'refresh'
));

$wp_customize->add_control(new Meta_Store_Heading($wp_customize, 'meta_store_th_heading', array(
    'section' => 'meta_store_top_header_options',
    'label' => esc_html__('Top Header Contents', 'meta-store')
)));

$wp_customize->add_setting('meta_store_th_menu', array(
    'sanitize_callback' => 'meta_store_sanitize_choices',
    'default' => 'none',
    'transport' => 'refresh'
));

$wp_customize->add_control('meta_store_th_menu', array(
    'section' => 'meta_store_top_header_options',
    'type' => 'select',
    'label' => esc_html__('Select Menu', 'meta-store'),
    'choices' => meta_store_get_menulist()
));

$wp_customize->add_setting('meta_store_th_widget', array(
    'sanitize_callback' => 'meta_store_sanitize_choices',
    'default' => 'none',
    'transport' => 'refresh'
));

$wp_customize->add_control('meta_store_th_widget', array(
    'section' => 'meta_store_top_header_options',
    'type' => 'select',
    'label' => esc_html__('Select Widget', 'meta-store'),
    'choices' => meta_store_widget_lists()
));

$wp_customize->add_setting('meta_store_th_text', array(
    'sanitize_callback' => 'meta_store_sanitize_text',
    'default' => esc_html__('Welcome To Meta Store', 'meta-store'),
    'transport' => 'refresh'
));

$wp_customize->add_control(new Meta_Store_Page_Editor($wp_customize, 'meta_store_th_text', array(
    'section' => 'meta_store_top_header_options',
    'label' => esc_html__('Html Text', 'meta-store'),
    'include_admin_print_footer' => true
)));

$wp_customize->add_setting('meta_store_th_social_link', array(
    'sanitize_callback' => 'meta_store_sanitize_text',
    'transport' => 'refresh'
));

$wp_customize->add_control(new Meta_Store_Text_Info($wp_customize, 'meta_store_th_social_link', array(
    'label' => esc_html__('Social Icons', 'meta-store'),
    'section' => 'meta_store_top_header_options',
    'description' => sprintf(esc_html__('Add your %s here', 'meta-store'), '<a href="#" target="_blank">Social Icons</a>')
)));

$wp_customize->add_setting('meta_store_top_header_info', array(
    'sanitize_callback' => 'meta_store_sanitize_text',
    'transport' => 'refresh'
));

$wp_customize->add_control(new Meta_Store_Text_Info($wp_customize, 'meta_store_top_header_info', array(
    'section' => 'meta_store_top_header_options',
    'input_attrs' => array(
        'upgrade' => 'yes'
    ),
    'description' => esc_html__('- Full Width Option', 'meta-store') . '<br/>' . esc_html__('- Gradient Background Option', 'meta-store') . '<br/>' . esc_html__('- Custom Unique Typography Option', 'meta-store')
)));

$wp_customize->add_setting('meta_store_th_height', array(
    'sanitize_callback' => 'meta_store_sanitize_integer',
    'default' => 42,
    'transport' => 'refresh'
));

$wp_customize->add_control(new Meta_Store_Range_Slider($wp_customize, 'meta_store_th_height', array(
    'section' => 'meta_store_top_header_options',
    'label' => esc_html__('Height', 'meta-store'),
    'input_attrs' => array(
        'min' => 5,
        'max' => 100,
        'step' => 1
    )
)));

$wp_customize->add_setting('meta_store_th_bg_color', array(
    'default' => '#FC596B',
    'sanitize_callback' => 'meta_store_sanitize_color_alpha',
    'transport' => 'refresh'
));

$wp_customize->add_control(new Meta_Store_Alpha_Color($wp_customize, 'meta_store_th_bg_color', array(
    'label' => esc_html__('Background Color', 'meta-store'),
    'section' => 'meta_store_top_header_options',
    'palette' => array(
        '#FFFFFF',
        '#000000',
        '#f5245f',
        '#1267b3',
        '#feb600',
        '#00C569',
        'rgba( 255, 255, 255, 0.2 )',
        'rgba( 0, 0, 0, 0.2 )'
    )
)));

$wp_customize->add_setting('meta_store_th_bottom_border_color', array(
    'default' => '',
    'sanitize_callback' => 'meta_store_sanitize_color_alpha',
    'transport' => 'refresh'
));

$wp_customize->add_control(new Meta_Store_Alpha_Color($wp_customize, 'meta_store_th_bottom_border_color', array(
    'label' => esc_html__('Bottom Border Color', 'meta-store'),
    'description' => esc_html__('Leave Empty to Hide Border', 'meta-store'),
    'section' => 'meta_store_top_header_options'
)));

$wp_customize->add_setting('meta_store_th_text_color', array(
    'default' => '#FFFFFF',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'refresh'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'meta_store_th_text_color', array(
    'section' => 'meta_store_top_header_options',
    'label' => esc_html__('Text Color', 'meta-store')
)));

$wp_customize->add_setting('meta_store_th_anchor_color', array(
    'default' => '#EEEEEE',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'refresh'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'meta_store_th_anchor_color', array(
    'section' => 'meta_store_top_header_options',
    'label' => esc_html__('Anchor(Link) Color', 'meta-store')
)));

/** Middle Header Options */
$wp_customize->add_section('meta_store_main_header_options', array(
    'title' => esc_html__('Middle Header', 'meta-store'),
    'panel' => 'meta_store_header_settings',
));

$wp_customize->add_setting('meta_store_mh_spacing_right', array(
    'sanitize_callback' => 'meta_store_sanitize_number_blank',
));

$wp_customize->add_setting('meta_store_mh_spacing_top', array(
    'sanitize_callback' => 'meta_store_sanitize_number_blank',
));

$wp_customize->add_setting('meta_store_mh_spacing_bottom', array(
    'sanitize_callback' => 'meta_store_sanitize_number_blank',
));

$wp_customize->add_setting('meta_store_mh_spacing_left', array(
    'sanitize_callback' => 'meta_store_sanitize_number_blank',
));

$wp_customize->add_setting('meta_store_mh_spacing_right_tablet', array(
    'sanitize_callback' => 'meta_store_sanitize_number_blank',
));

$wp_customize->add_setting('meta_store_mh_spacing_top_tablet', array(
    'sanitize_callback' => 'meta_store_sanitize_number_blank',
));

$wp_customize->add_setting('meta_store_mh_spacing_bottom_tablet', array(
    'sanitize_callback' => 'meta_store_sanitize_number_blank',
));

$wp_customize->add_setting('meta_store_mh_spacing_left_tablet', array(
    'sanitize_callback' => 'meta_store_sanitize_number_blank',
));

$wp_customize->add_setting('meta_store_mh_spacing_right_mobile', array(
    'sanitize_callback' => 'meta_store_sanitize_number_blank',
));

$wp_customize->add_setting('meta_store_mh_spacing_top_mobile', array(
    'sanitize_callback' => 'meta_store_sanitize_number_blank',
));

$wp_customize->add_setting('meta_store_mh_spacing_bottom_mobile', array(
    'sanitize_callback' => 'meta_store_sanitize_number_blank',
));

$wp_customize->add_setting('meta_store_mh_spacing_left_mobile', array(
    'sanitize_callback' => 'meta_store_sanitize_number_blank',
));

$wp_customize->add_control(new Meta_Store_Dimensions($wp_customize, 'meta_store_mh_spacing', array(
    'section' => 'meta_store_main_header_options',
    'label' => esc_html__('Middle Header Spacing(px)', 'meta-store'),
    'settings' => array(
        'desktop_right' => 'meta_store_mh_spacing_right',
        'desktop_top' => 'meta_store_mh_spacing_top',
        'desktop_bottom' => 'meta_store_mh_spacing_bottom',
        'desktop_left' => 'meta_store_mh_spacing_left',
        'tablet_right' => 'meta_store_mh_spacing_right_tablet',
        'tablet_top' => 'meta_store_mh_spacing_top_tablet',
        'tablet_bottom' => 'meta_store_mh_spacing_bottom_tablet',
        'tablet_left' => 'meta_store_mh_spacing_left_tablet',
        'mobile_right' => 'meta_store_mh_spacing_right_mobile',
        'mobile_top' => 'meta_store_mh_spacing_top_mobile',
        'mobile_bottom' => 'meta_store_mh_spacing_bottom_mobile',
        'mobile_left' => 'meta_store_mh_spacing_left_mobile'
    ),
    'input_attrs' => array(
        'min' => 0,
        'max' => 400,
        'step' => 1,
    )
)));

$wp_customize->add_setting('meta_store_main_header_info', array(
    'sanitize_callback' => 'meta_store_sanitize_text',
    'transport' => 'refresh'
));

$wp_customize->add_control(new Meta_Store_Text_Info($wp_customize, 'meta_store_main_header_info', array(
    'section' => 'meta_store_main_header_options',
    'input_attrs' => array(
        'upgrade' => 'yes'
    ),
    'description' => esc_html__('- Full Width Option', 'meta-store') . '<br/>' . esc_html__('- Image or Gradient Background Option', 'meta-store')
)));

/** Bottom Header Options */
$wp_customize->add_section('meta_store_bottom_header_options', array(
    'title' => esc_html__('Bottom Header', 'meta-store'),
    'panel' => 'meta_store_header_settings',
));

$wp_customize->add_setting('meta_store_ms_bg_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'refresh'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'meta_store_ms_bg_color', array(
    'section' => 'meta_store_bottom_header_options',
    'label' => esc_html__('Background Color', 'meta-store')
)));

$wp_customize->add_setting('meta_store_bottom_header_info', array(
    'sanitize_callback' => 'meta_store_sanitize_text',
    'transport' => 'refresh'
));

$wp_customize->add_control(new Meta_Store_Text_Info($wp_customize, 'meta_store_bottom_header_info', array(
    'section' => 'meta_store_bottom_header_options',
    'input_attrs' => array(
        'upgrade' => 'yes'
    ),
    'description' => esc_html__('- Full Width Option', 'meta-store') . '<br/>' . esc_html__('- Sticky Header', 'meta-store') . '<br/>' . esc_html__('- Add Search & CTA button in menu', 'meta-store') . '<br/>' . esc_html__('- Various Menu Hover styles', 'meta-store') . '<br/>' . esc_html__('- Display different menu in mobile', 'meta-store') . '<br/>' . esc_html__('- Full Color and Spacing Customization option for menu', 'meta-store')
)));

$wp_customize->add_section(new Meta_Store_Upgrade_Section($wp_customize, 'meta_store_header_sep2_section', array(
    'panel' => 'meta_store_header_settings',
)));

/** Header Contents Options */
$wp_customize->add_section('meta_store_header_content', array(
    'title' => esc_html__('Header Contents', 'meta-store'),
    'panel' => 'meta_store_header_settings',
));

$wp_customize->add_setting('meta_store_mh_show_category_search', array(
    'sanitize_callback' => 'meta_store_sanitize_boolean',
    'default' => true
));

$wp_customize->add_control(new Meta_Store_Toggle($wp_customize, 'meta_store_mh_show_category_search', array(
    'section' => 'meta_store_header_content',
    'label' => esc_html__('Show Category Search', 'meta-store')
)));

$wp_customize->add_setting('meta_store_mh_show_minicart', array(
    'sanitize_callback' => 'meta_store_sanitize_boolean',
    'default' => true
));

$wp_customize->add_control(new Meta_Store_Toggle($wp_customize, 'meta_store_mh_show_minicart', array(
    'section' => 'meta_store_header_content',
    'label' => esc_html__('Show Mini Cart', 'meta-store')
)));

$wp_customize->add_setting('meta_store_show_toggle_menu', array(
    'sanitize_callback' => 'meta_store_sanitize_boolean',
    'default' => true
));

$wp_customize->add_control(new Meta_Store_Toggle($wp_customize, 'meta_store_show_toggle_menu', array(
    'section' => 'meta_store_header_content',
    'label' => esc_html__('Show Toggle Menu', 'meta-store')
)));

$wp_customize->add_setting('meta_store_hc_separator1', array(
    'sanitize_callback' => 'meta_store_sanitize_text',
    'transport' => 'refresh'
));

$wp_customize->add_control(new Meta_Store_Separator($wp_customize, 'meta_store_hc_separator1', array(
    'section' => 'meta_store_header_content',
)));

$wp_customize->add_setting('meta_store_contact_no', array(
    'sanitize_callback' => 'meta_store_sanitize_text',
    'default' => esc_html__('+ 474 876543210', 'meta-store'),
));

$wp_customize->add_control('meta_store_contact_no', array(
    'section' => 'meta_store_header_content',
    'type' => 'text',
    'label' => esc_html__('Contact No.', 'meta-store'),
));


$wp_customize->add_setting('meta_store_toggle_menu_label', array(
    'sanitize_callback' => 'meta_store_sanitize_text',
    'default' => esc_html__('Categories', 'meta-store'),
));

$wp_customize->add_control('meta_store_toggle_menu_label', array(
    'section' => 'meta_store_header_content',
    'type' => 'text',
    'label' => esc_html__('Toggle Menu Label', 'meta-store'),
));

$wp_customize->add_setting('meta_store_toggle_menu', array(
    'sanitize_callback' => 'meta_store_sanitize_choices',
    'default' => 'none',
    'transport' => 'refresh'
));

$wp_customize->add_control('meta_store_toggle_menu', array(
    'section' => 'meta_store_header_content',
    'type' => 'select',
    'label' => esc_html__('Select Toggle Menu', 'meta-store'),
    'choices' => meta_store_get_menulist()
));

$wp_customize->add_setting('meta_store_show_menu_on', array(
    'sanitize_callback' => 'meta_store_sanitize_choices',
    'default' => 'click',
    'transport' => 'refresh'
));

$wp_customize->add_control('meta_store_show_menu_on', array(
    'section' => 'meta_store_header_content',
    'type' => 'select',
    'label' => esc_html__('Show Toggle Menu Dropdown on', 'meta-store'),
    'choices' => array(
        'click' => esc_html__('Click', 'meta-store'),
        'hover' => esc_html__('Hover', 'meta-store'),
    )
));

$wp_customize->add_setting('meta_store_toggle_menu_info', array(
    'sanitize_callback' => 'meta_store_sanitize_text',
    'transport' => 'refresh'
));

$wp_customize->add_control(new Meta_Store_Text_Info($wp_customize, 'meta_store_toggle_menu_info', array(
    'section' => 'meta_store_header_content',
    'description' => __('Advanced Customization options with separate typography options for toggle section.', 'meta-store'),
    'input_attrs' => array(
        'upgrade' => 'yes'
    )
)));

/** Title & Tagline */
$wp_customize->get_section('title_tagline')->panel = 'meta_store_header_settings';
$wp_customize->get_section('title_tagline')->title = esc_html__('Title & Logo', 'meta-store');

$wp_customize->add_setting('meta_store_display_title', array(
    'default' => true,
    'transport' => 'postMessage',
    'sanitize_callback' => 'meta_store_sanitize_checkbox',
));

$wp_customize->add_control('meta_store_display_title', array(
    'label' => esc_html__('Display Site Title', 'meta-store'),
    'section' => 'title_tagline',
    'type' => 'checkbox'
));

$wp_customize->add_setting('meta_store_display_tagline', array(
    'default' => true,
    'transport' => 'postMessage',
    'sanitize_callback' => 'meta_store_sanitize_checkbox',
));

$wp_customize->add_control('meta_store_display_tagline', array(
    'label' => esc_html__('Display Site Tagline', 'meta-store'),
    'section' => 'title_tagline',
    'type' => 'checkbox'
));

$wp_customize->add_setting('meta_store_logo_width', array(
    'sanitize_callback' => 'meta_store_sanitize_number_blank',
));

$wp_customize->add_setting('meta_store_logo_width_tablet', array(
    'sanitize_callback' => 'meta_store_sanitize_number_blank',
));

$wp_customize->add_setting('meta_store_logo_width_mobile', array(
    'sanitize_callback' => 'meta_store_sanitize_number_blank',
));

$wp_customize->add_control(new Meta_Store_Responsive_Range_Slider($wp_customize, 'meta_store_logo_width', array(
    'section' => 'title_tagline',
    'label' => esc_html__('Logo Width(px)', 'meta-store'),
    'input_attrs' => array(
        'min' => 0,
        'max' => 1000,
        'step' => 1,
    ),
    'settings' => array(
        'desktop' => 'meta_store_logo_width',
        'tablet' => 'meta_store_logo_width_tablet',
        'mobile' => 'meta_store_logo_width_mobile',
    ),
)));

$wp_customize->add_setting('meta_store_title_color', array(
    'default' => '#000000',
    'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'meta_store_title_color', array(
    'section' => 'title_tagline',
    'label' => esc_html__('Site Title Color', 'meta-store')
)));

$wp_customize->add_setting('meta_store_tagline_color', array(
    'default' => '#000000',
    'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'meta_store_tagline_color', array(
    'section' => 'title_tagline',
    'label' => esc_html__('Site Tagline Color', 'meta-store')
)));

$wp_customize->add_setting('meta_store_title_logo_info', array(
    'sanitize_callback' => 'meta_store_sanitize_text',
    'transport' => 'refresh'
));

$wp_customize->add_control(new Meta_Store_Text_Info($wp_customize, 'meta_store_title_logo_info', array(
    'section' => 'title_tagline',
    'description' => esc_html__('- Advanced Color & Typography Options for Title & Tagline texts.', 'meta-store') . '<br/>' . esc_html__('- Display logo along with title and tagline in same line', 'meta-store'),
    'input_attrs' => array(
        'upgrade' => 'yes'
    )
)));

$wp_customize->add_section('meta_store_page_banner_options', array(
    'title' => esc_html__('Page Banner', 'meta-store'),
    'panel' => 'meta_store_header_settings',
));

$wp_customize->add_setting('meta_store_page_banner_heading', array(
    'sanitize_callback' => 'meta_store_sanitize_text',
));

$wp_customize->add_control(new Meta_Store_Heading($wp_customize, 'meta_store_page_banner_heading', array(
    'section' => 'meta_store_page_banner_options',
    'label' => esc_html__('Page Banner', 'meta-store')
)));

$wp_customize->add_setting('meta_store_page_banner_style', array(
    'sanitize_callback' => 'meta_store_sanitize_text',
    'default' => 'banner-style1'
));

$wp_customize->add_control(new Meta_Store_Selector($wp_customize, 'meta_store_page_banner_style', array(
    'section' => 'meta_store_page_banner_options',
    'label' => esc_html__('Page Banner Style', 'meta-store'),
    'class' => 'ht-full-width',
    'description' => esc_html__('Applies to all the General Pages.', 'meta-store'),
    'options' => array(
        'banner-style1' => META_STORE_OPT_DIR_URI_IMAGES . 'page-banners/banner-style1.jpg',
        'banner-style2' => META_STORE_OPT_DIR_URI_IMAGES . 'page-banners/banner-style2.jpg',
    )
)));

$wp_customize->add_setting('meta_store_page_banner_bg_url', array(
    'sanitize_callback' => 'meta_store_sanitize_link',
));

$wp_customize->add_setting('meta_store_page_banner_bg_id', array(
    'sanitize_callback' => 'meta_store_sanitize_integer',
));

$wp_customize->add_setting('meta_store_page_banner_bg_repeat', array(
    'default' => 'no-repeat',
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_setting('meta_store_page_banner_bg_size', array(
    'default' => 'cover',
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_setting('meta_store_page_banner_bg_position', array(
    'default' => 'center-center',
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_setting('meta_store_page_banner_bg_attach', array(
    'default' => 'scroll',
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_setting('meta_store_page_banner_bg_color', array(
    'default' => '#ddc6aa',
    'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_setting('meta_store_page_banner_bg_overlay', array(
    'sanitize_callback' => 'meta_store_sanitize_color_alpha',
));

// Registers example_background control
$wp_customize->add_control(new Meta_Store_Background_Image($wp_customize, 'meta_store_page_banner_bg', array(
    'label' => esc_html__('Page Banner Image', 'meta-store'),
    'section' => 'meta_store_page_banner_options',
    'settings' => array(
        'image_url' => 'meta_store_page_banner_bg_url',
        'image_id' => 'meta_store_page_banner_bg_id',
        'repeat' => 'meta_store_page_banner_bg_repeat',
        'size' => 'meta_store_page_banner_bg_size',
        'position' => 'meta_store_page_banner_bg_position',
        'attach' => 'meta_store_page_banner_bg_attach',
        'color' => 'meta_store_page_banner_bg_color',
        'overlay' => 'meta_store_page_banner_bg_overlay'
    )
)));

$wp_customize->add_setting('meta_store_page_banner_title_color', array(
    'default' => '#FFFFFF',
    'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'meta_store_page_banner_title_color', array(
    'label' => esc_html__('Page Title Color', 'meta-store'),
    'section' => 'meta_store_page_banner_options',
    'settings' => 'meta_store_page_banner_title_color',
)));

$wp_customize->add_setting('meta_store_page_banner_padding', array(
    'sanitize_callback' => 'meta_store_sanitize_number_absint',
    'default' => 40,
    'transport' => 'refresh'
));

$wp_customize->add_control(new Meta_Store_Range_Slider($wp_customize, 'meta_store_page_banner_padding', array(
    'section' => 'meta_store_page_banner_options',
    'label' => esc_html__('Page Banner Padding (Top/Bottom)', 'meta-store'),
    'input_attrs' => array(
        'min' => 10,
        'max' => 250,
        'step' => 1
    )
)));

$wp_customize->add_setting('meta_store_breacrumb_heading', array(
    'sanitize_callback' => 'meta_store_sanitize_text',
    'transport' => 'refresh'
));

$wp_customize->add_control(new Meta_Store_Heading($wp_customize, 'meta_store_breacrumb_heading', array(
    'section' => 'meta_store_page_banner_options',
    'label' => esc_html__('Breadcrumb', 'meta-store')
)));

$wp_customize->add_setting('meta_store_breadcrumb', array(
    'sanitize_callback' => 'meta_store_sanitize_boolean',
    'default' => true
));

$wp_customize->add_control(new Meta_Store_Toggle($wp_customize, 'meta_store_breadcrumb', array(
    'section' => 'meta_store_page_banner_options',
    'label' => esc_html__('BreadCrumb', 'meta-store'),
    'description' => esc_html__('Breadcrumbs are a great way of letting your visitors find out where they are on your site.', 'meta-store')
)));

$wp_customize->add_setting('meta_store_breadcrumb_text_color', array(
    'default' => '#FFFFFF',
    'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'meta_store_breadcrumb_text_color', array(
    'label' => esc_html__('Breadcrumb Text Color', 'meta-store'),
    'section' => 'meta_store_page_banner_options',
)));

$wp_customize->add_setting('meta_store_breadcrumb_link_color', array(
    'default' => '#FFFFFF',
    'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'meta_store_breadcrumb_link_color', array(
    'label' => esc_html__('Breadcrumb Link Color', 'meta-store'),
    'section' => 'meta_store_page_banner_options',
)));
