<?php
/**
 *
 * @package Meta Store
 */

/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
function meta_store_sidebar_layout_meta_box() {

    $screens = array('post', 'page');

    add_meta_box(
            'meta_store_sidebar_layout', esc_html__('Sidebar Layout', 'meta-store'), 'meta_store_sidebar_layout_meta_box_callback', $screens, 'side', 'high'
    );
}

add_action('add_meta_boxes', 'meta_store_sidebar_layout_meta_box');

/**
 * Prints the box content.
 * 
 * @param WP_Post $post The object for the current post/page.
 */
function meta_store_sidebar_layout_meta_box_callback($post) {

    // Add a nonce field so we can check for it later.
    wp_nonce_field('meta_store_sidebar_layout_save_meta_box', 'meta_store_sidebar_layout_meta_box_nonce');

    /*
     * Use get_post_meta() to retrieve an existing value
     * from the database and use the value for the form.
     */
    $meta_store_sidebar_layout = get_post_meta($post->ID, 'meta_store_sidebar_layout', true);

    if (!$meta_store_sidebar_layout) {
        $meta_store_sidebar_layout = 'default';
    }

    echo '<label>';
    echo '<input type="radio" name="meta_store_sidebar_layout" value="default" ' . checked($meta_store_sidebar_layout, 'default', false) . ' />';
    echo '<img src="' . esc_url(META_STORE_OPT_DIR_URI_IMAGES) . 'sidebar-layouts/default-sidebar.jpg"/>';
    echo '</label>';

    echo '<label>';
    echo '<input type="radio" name="meta_store_sidebar_layout" value="right-sidebar" ' . checked($meta_store_sidebar_layout, 'right-sidebar', false) . ' />';
    echo '<img src="' . esc_url(META_STORE_OPT_DIR_URI_IMAGES) . 'sidebar-layouts/right-sidebar.jpg"/>';
    echo '</label>';

    echo '<label>';
    echo '<input type="radio" name="meta_store_sidebar_layout" value="left-sidebar" ' . checked($meta_store_sidebar_layout, 'left-sidebar', false) . ' />';
    echo '<img src="' . esc_url(META_STORE_OPT_DIR_URI_IMAGES) . 'sidebar-layouts/left-sidebar.jpg"/>';
    echo '</label>';

    echo '<label>';
    echo '<input type="radio" name="meta_store_sidebar_layout" value="no-sidebar" ' . checked($meta_store_sidebar_layout, 'no-sidebar', false) . ' />';
    echo '<img src="' . esc_url(META_STORE_OPT_DIR_URI_IMAGES) . 'sidebar-layouts/no-sidebar.jpg"/>';
    echo '</label>';

    echo '<label>';
    echo '<input type="radio" name="meta_store_sidebar_layout" value="no-sidebar-narrow" ' . checked($meta_store_sidebar_layout, 'no-sidebar-narrow', false) . ' />';
    echo '<img src="' . esc_url(META_STORE_OPT_DIR_URI_IMAGES) . 'sidebar-layouts/no-sidebar-narrow.jpg"/>';
    echo '</label>';
}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function meta_store_sidebar_layout_save_meta_box($post_id) {

    /*
     * We need to verify this came from our screen and with proper authorization,
     * because the save_post action can be triggered at other times.
     */

    // Check if our nonce is set.
    if (!isset($_POST['meta_store_sidebar_layout_meta_box_nonce'])) {
        return;
    }

    // Verify that the nonce is valid.
    if (!wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['meta_store_sidebar_layout_meta_box_nonce'] ) ), 'meta_store_sidebar_layout_save_meta_box')) {
        return;
    }

    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Check the user's permissions.
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    /* OK, it's safe for us to save the data now. */

    // Make sure that it is set.
    if (isset($_POST['meta_store_sidebar_layout'])) {
        // Sanitize user input.
        $meta_store_data = sanitize_text_field( wp_unslash( $_POST['meta_store_sidebar_layout']) );
        // Update the meta field in the database.
        update_post_meta($post_id, 'meta_store_sidebar_layout', $meta_store_data);
    }
}

add_action('save_post', 'meta_store_sidebar_layout_save_meta_box');
