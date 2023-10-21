<?php

/**
 *
 * @package Meta Store
 */
if (class_exists('WP_Customize_Control')) {
    require META_STORE_OPT_DIR . 'custom-controls/alpha-color-control.php';
    require META_STORE_OPT_DIR . 'custom-controls/background-image-control.php';
    require META_STORE_OPT_DIR . 'custom-controls/category-dropdown-control.php';
    require META_STORE_OPT_DIR . 'custom-controls/color-tab-control.php';
    require META_STORE_OPT_DIR . 'custom-controls/date-control.php';
    require META_STORE_OPT_DIR . 'custom-controls/dimensions-control.php';
    require META_STORE_OPT_DIR . 'custom-controls/graident-control.php';
    require META_STORE_OPT_DIR . 'custom-controls/heading-control.php';
    require META_STORE_OPT_DIR . 'custom-controls/icon-selector-control.php';
    require META_STORE_OPT_DIR . 'custom-controls/image-selector-control.php';
    require META_STORE_OPT_DIR . 'custom-controls/multiple-checkbox-control.php';
    require META_STORE_OPT_DIR . 'custom-controls/multiple-select-control.php';
    require META_STORE_OPT_DIR . 'custom-controls/page-editor-control.php';
    require META_STORE_OPT_DIR . 'custom-controls/range-slider-control.php';
    require META_STORE_OPT_DIR . 'custom-controls/repeater-control.php';
    require META_STORE_OPT_DIR . 'custom-controls/responsive-range-slider-control.php';
    require META_STORE_OPT_DIR . 'custom-controls/select2-control.php';
    require META_STORE_OPT_DIR . 'custom-controls/selector-control.php';
    require META_STORE_OPT_DIR . 'custom-controls/separator-control.php';
    require META_STORE_OPT_DIR . 'custom-controls/sortable-control.php';
    require META_STORE_OPT_DIR . 'custom-controls/switch-control.php';
    require META_STORE_OPT_DIR . 'custom-controls/tab-control.php';
    require META_STORE_OPT_DIR . 'custom-controls/text-info-control.php';
    require META_STORE_OPT_DIR . 'custom-controls/text-selector-control.php';
    require META_STORE_OPT_DIR . 'custom-controls/toggle-control.php';
    require META_STORE_OPT_DIR . 'custom-controls/typography/typography-control-class.php';
    require META_STORE_OPT_DIR . 'custom-controls/upgrade-section.php';

    /** Register Control Type */
    $wp_customize->register_control_type('Meta_Store_Color_Tab');
    $wp_customize->register_control_type('Meta_Store_Background_Image');
    $wp_customize->register_control_type('Meta_Store_Tab');
    $wp_customize->register_control_type('Meta_Store_Dimensions');
    $wp_customize->register_control_type('Meta_Store_Responsive_Range_Slider');
    $wp_customize->register_control_type('Meta_Store_Sortable');
    $wp_customize->register_control_type('Meta_Store_Tab');
    $wp_customize->register_control_type('Meta_Store_Typography');
}