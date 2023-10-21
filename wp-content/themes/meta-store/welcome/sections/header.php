<div class="welcome-header clearfix">
    <div class="welcome-intro">
        <h2><?php
            printf(// WPCS: XSS OK.
                    /* translators: 1-theme name, 2-theme version */
                    esc_html__('Welcome to %1$s - Version %2$s', 'meta-store'), $this->theme_name, $this->theme_version);
            ?></h2>
        <div class="welcome-text">
            <?php
            printf(// WPCS: XSS OK.
                    /* translators: 1-theme name */
                    esc_html__('Welcome and thank you for installing %1$s. Getting started with %1$s is very easy. Here you will find all the necessary information required to get started with the theme.', 'meta-store'), $this->theme_name);
            ?>
        </div>

        <div class="free-pro-demos">
            <a class="button button-primary" href="https://demo.mysticalthemes.com/<?php echo get_option('stylesheet'); ?>/" target="_blank"><span class="icofont-eye-alt"></span><?php esc_html_e('Free Demos Previews', 'meta-store'); ?></a>

        </div>
    </div>

    <div class="welcome-promo-banner">
        <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/screenshot.png'); ?>" alt="">
    </div>
</div>