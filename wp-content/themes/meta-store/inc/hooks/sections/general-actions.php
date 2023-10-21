<?php
/** Displays Preloader */
add_action('meta_store_extra_elements', 'meta_store_preloader_cb', 10);
if (!function_exists('meta_store_preloader_cb')) {

    function meta_store_preloader_cb() {
        $enable_preloader = get_theme_mod('meta_store_enable_preloader', 1);
        if ($enable_preloader) {
            ?>
            <div class="ms-preloader">
                <div class="ms-loader1">
                    <div class="ms-spinnerblock">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
            <?php
        }
    }

}

/** Displays go to Top */
add_action('meta_store_extra_elements', 'meta_store_gotop_cb', 20);
if (!function_exists('meta_store_gotop_cb')) {

    function meta_store_gotop_cb() {
        $enable_gotop = get_theme_mod('meta_store_backtotop', 1);

        if ($enable_gotop) {
            ?>
            <a href="#" id="ms-gotop"><i class="arrow_carrot-up"></i></a>
            <?php
        }
    }

}

/** Displays Sidebar */
add_action('meta_store_display_sidebar', 'meta_store_display_sidebar_cb');
if (!function_exists('meta_store_display_sidebar_cb')) {

    function meta_store_display_sidebar_cb() {
        $page_layout = 'right-sidebar';

        if (is_page()) {
            global $post;
            $sidebar_layout = get_post_meta($post->ID, 'meta_store_sidebar_layout', true);
            $page_layout = ($sidebar_layout == 'default' || $sidebar_layout == '') ? $page_layout = get_theme_mod('meta_store_page_layout', 'right-sidebar') : $sidebar_layout;
        } elseif (is_singular('post')) {
            global $post;
            $sidebar_layout = get_post_meta($post->ID, 'meta_store_sidebar_layout', true);
            $page_layout = ($sidebar_layout == 'default' || $sidebar_layout == '') ? $page_layout = get_theme_mod('meta_store_post_layout', 'right-sidebar') : $sidebar_layout;
        } elseif (class_exists('woocommerce') && is_woocommerce()) {
            $page_layout = get_theme_mod('meta_store_shop_layout', 'right-sidebar');
        } elseif (is_archive()) {
            $page_layout = get_theme_mod('meta_store_archive_layout', 'right-sidebar');
        } elseif (is_home()) {
            $page_layout = get_theme_mod('meta_store_home_blog_layout', 'right-sidebar');
        } elseif (is_search()) {
            $page_layout = get_theme_mod('meta_store_search_layout', 'right-sidebar');
        }


        if ($page_layout == 'no-sidebar-narrow' || $page_layout == 'no-sidebar') {
            return;
        }
        ?>
        <aside id="ms-secondary" class="ms-widget-area">
            <?php
            if (class_exists('woocommerce') && is_woocommerce() && is_active_sidebar('meta-store-shop-sidebar')) {
                dynamic_sidebar('meta-store-shop-sidebar');
            } elseif (is_active_sidebar('meta-store-sidebar')) {
                dynamic_sidebar('meta-store-sidebar');
            }
            ?>
        </aside>
        <?php
    }

}

add_action('init', 'meta_store_create_elementor_kit');

function meta_store_create_elementor_kit() {
    if (!did_action('elementor/loaded')) {
        return;
    }

    $kit = Elementor\Plugin::$instance->kits_manager->get_active_kit();

    if (!$kit->get_id()) {
        $created_default_kit = Elementor\Plugin::$instance->kits_manager->create_default();
        update_option('elementor_active_kit', $created_default_kit);
    }
}

add_action('init', 'meta_store_overwrite_elementor_settings');

function meta_store_overwrite_elementor_settings() {
    // Check if Elementor installed and activated
    if (!did_action('elementor/loaded')) {
        return;
    }

    $options = get_option('meta_store_elementor_overwrite');

    if (!$options) {
        if ('yes' !== get_option('elementor_disable_color_schemes')) {
            update_option('elementor_disable_color_schemes', 'yes');
        }

        if ('yes' !== get_option('elementor_disable_typography_schemes')) {
            update_option('elementor_disable_typography_schemes', 'yes');
        }

        if ('inactive' !== get_option('elementor_experiment-e_dom_optimization')) {
            update_option('elementor_experiment-e_dom_optimization', 'inactive');
        }
    }
    update_option('meta_store_elementor_overwrite', 'yes');
}
