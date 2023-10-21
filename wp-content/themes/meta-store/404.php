<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Meta Store
 */
get_header();
?>

<div id="ms-primary" class="ms-content-area">

    <div class="error-404 not-found">

        <div class="page-content">
            <h2 class="page-title"><?php echo esc_html__('404', 'meta-store'); ?><span><?php echo esc_html__('Page Not Found', 'meta-store'); ?></span></h2>
            <p><?php esc_html_e('The page you are looking for might have been removed, had it\'s name changed or is temporarily unavailable.', 'meta-store'); ?><br/><?php esc_html_e('Try going to homepage and look for something else ?', 'meta-store'); ?></p>
            <a href="<?php echo esc_url(get_home_url()); ?>" class="home-pg-btn"><?php esc_html_e('Homepage', 'meta-store'); ?></a>					
        </div>
    </div>

</div>
<?php
get_footer();
