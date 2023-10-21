<?php

require get_template_directory() . '/inc/theme-options/custom-controls/typography/google-fonts-list.php';

/**
 * Load preview scripts/styles.
 *
 */
add_action('customize_preview_init', 'meta_store_typography_customize_preview_script');

function meta_store_typography_customize_preview_script() {
    wp_enqueue_script('webfont', 'https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js', array('jquery'), META_STORE_VERSION, false);
   // wp_enqueue_script('meta-store-customize-typography-preview', get_template_directory_uri() . '/inc/theme-options/custom-controls/typography/js/customize-previews.js', array('jquery', 'customize-preview', 'webfont'), META_STORE_VERSION, false);
}

function get_google_font_variants() {

    $font_list = array_merge(meta_store_default_font_array(), meta_store_standard_font_array(), meta_store_google_font_array());

    $font_family = isset($_REQUEST['font_family']) ? sanitize_text_field(wp_unslash($_REQUEST['font_family'])) : '';
    $font_array = meta_store_search_key($font_list, 'family', $font_family);

    $variants_array = $font_array['0']['variants'];
    $options_array = "";
    foreach ($variants_array as $key => $variants) {
        $selected = $key == '400' ? 'selected="selected"' : '';
        $options_array .= '<option ' . esc_attr($selected) . ' value="' . esc_attr($key) . '">' . esc_html($variants) . '</option>';
    }

    if (!empty($options_array)) {
        echo $options_array;
    } else {
        echo $options_array = '';
    }
    die();
}

add_action("wp_ajax_get_google_font_variants", "get_google_font_variants");

function meta_store_search_key($array, $key, $value) {
    $results = array();
    if (is_array($array)) {
        if (isset($array[$key]) && $array[$key] == $value) {
            $results[] = $array;
        }
        foreach ($array as $subarray) {
            $results = array_merge($results, meta_store_search_key($subarray, $key, $value));
        }
    }
    return $results;
}
