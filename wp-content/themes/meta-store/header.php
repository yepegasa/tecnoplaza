<?php
/**
 * The header for our theme
 *
 * @package Meta Store
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="https://gmpg.org/xfn/11">

        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <?php wp_body_open(); ?>

        <?php do_action('meta_store_extra_elements'); ?>

        <div id="ms-page" class="ms-site">
            <a class="skip-link screen-reader-text" href="#ms-content"><?php esc_html_e('Skip to content', 'meta-store'); ?></a>

            <?php
            /** Header */
            do_action('meta_store_header');
            ?>

            <div id="ms-content" class="ms-site-content">
                <?php do_action('meta_store_container_start'); ?>