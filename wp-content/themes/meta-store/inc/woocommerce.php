<?php
/**
 * WooCommerce Compatibility File
 *
 * @package Meta Store
 */
if (!function_exists('meta_store_woocommerce_setup')) {

    function meta_store_woocommerce_setup() {
        add_theme_support('woocommerce');
        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');
    }

}

add_action('after_setup_theme', 'meta_store_woocommerce_setup');

if (!function_exists('meta_store_woocommerce_remove_actions')) {

    function meta_store_woocommerce_remove_actions() {
        remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
        remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
        remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
        remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
        remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
        remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
        remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
        remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
        remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
        remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
        remove_action('woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');
    }

}

add_action('init', 'meta_store_woocommerce_remove_actions');

add_action('woocommerce_after_cart', 'woocommerce_cross_sell_display');

if (!function_exists('meta_store_woocommerce_result_count_catalog_ordering')) {

    function meta_store_woocommerce_result_count_catalog_ordering() {
        echo '<div class="ms-product-sorting">';
        woocommerce_result_count();
        woocommerce_catalog_ordering();
        echo '</div>';
    }

}

add_action('woocommerce_before_shop_loop', 'meta_store_woocommerce_result_count_catalog_ordering', 30);

if (!function_exists('meta_store_woocommerce_breadcrumb')) {

    function meta_store_woocommerce_breadcrumb() {
        if (is_woocommerce()) {
            echo '<div class="ms-woocommerce-breadcrumb">';
            echo '<div class="ms-container">';
            woocommerce_breadcrumb();
            echo '</div>';
            echo '</div>';
        }
    }

}

add_action('meta_store_header', 'meta_store_woocommerce_breadcrumb', 50);

if (!function_exists('meta_store_woocommerce_scripts')) {

    /**
     * WooCommerce specific scripts & stylesheets.
     *
     * @return void
     */
    function meta_store_woocommerce_scripts() {
        wp_enqueue_style('meta-store-woocommerce-style', get_template_directory_uri() . '/woocommerce.css');

        $font_path = esc_url(WC()->plugin_url() . '/assets/fonts/');
        $inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';

        wp_add_inline_style('meta-store-woocommerce-style', $inline_font);
    }

}

add_action('wp_enqueue_scripts', 'meta_store_woocommerce_scripts', 5);

/**
 * Disable the default WooCommerce stylesheet.
 */
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

if (!function_exists('meta_store_woocommerce_active_body_class')) {

    /**
     * Add 'woocommerce-active' class to the body tag.
     */
    function meta_store_woocommerce_active_body_class($classes) {
        $classes[] = 'woocommerce-active';

        return $classes;
    }

}

add_filter('body_class', 'meta_store_woocommerce_active_body_class');


if (!function_exists('meta_store_woocommerce_wrapper_before')) {

    /**
     * Before Content.
     *
     * Wraps all WooCommerce content in wrappers which match the theme markup.
     *
     * @return void
     */
    function meta_store_woocommerce_wrapper_before() {
        echo '<div class="ms-container">';
        echo '<div class="ms-content-wrap">';
        echo '<div id="ms-primary" class="ms-content-area">';
    }

}

add_action('woocommerce_before_main_content', 'meta_store_woocommerce_wrapper_before');

if (!function_exists('meta_store_woocommerce_wrapper_after')) {

    /**
     * After Content.
     *
     * Closes the wrapping divs.
     *
     * @return void
     */
    function meta_store_woocommerce_wrapper_after() {
        echo '</div>';
        get_sidebar();
        echo '</div>';
        echo '</div>';
    }

}

add_action('woocommerce_after_main_content', 'meta_store_woocommerce_wrapper_after');

if (!function_exists('meta_store_woocommerce_cart_link_fragment')) {

    /**
     * Cart Fragments.
     *
     * Ensure cart contents update when products are added to the cart via AJAX.
     *
     * @param array $fragments Fragments to refresh via AJAX.
     * @return array Fragments to refresh via AJAX.
     */
    function meta_store_woocommerce_cart_link_fragment($fragments) {
        ob_start();
        meta_store_woocommerce_cart_link();
        $fragments['a.ms-cart-contents'] = ob_get_clean();

        return $fragments;
    }

}

add_filter('woocommerce_add_to_cart_fragments', 'meta_store_woocommerce_cart_link_fragment');

if (!function_exists('meta_store_woocommerce_cart_link')) {

    /**
     * Cart Link.
     *
     * Displayed a link to the cart including the number of items present and the cart total.
     *
     * @return void
     */
    function meta_store_woocommerce_cart_link() {
        ?>
        <a class="ms-cart-contents" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_attr_e('View your shopping cart', 'meta-store'); ?>">
            <?php
            $item_count_text = sprintf(
                    /* translators: number of items in the mini cart. */
                    _n('%d item', '%d items', absint(WC()->cart->get_cart_contents_count()), 'meta-store'), absint(WC()->cart->get_cart_contents_count())
            );
            ?>
            <span class="ms-cart-amount"><?php echo wp_kses_data(WC()->cart->get_cart_subtotal()); ?></span> - <span class="ms-cart-count"><?php echo esc_html($item_count_text); ?></span>
        </a>
        <?php
    }

}

if (!function_exists('meta_store_woocommerce_header_cart')) {

    /**
     * Display Header Cart.
     *
     * @return void
     */
    function meta_store_woocommerce_header_cart() {
        if (is_cart()) {
            $class = ' current-menu-item';
        } else {
            $class = '';
        }
        ?>
        <div id="ms-site-header-cart" class="ms-site-header-cart">
            <a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="ms-cart-icon"><span class="icon_cart_alt"></span></a>
            <div class="ms-cart-price <?php echo esc_attr($class); ?>">
                <?php meta_store_woocommerce_cart_link(); ?>
            </div>
        </div>
        <?php
    }

}

if (!function_exists('meta_store_product_search_form')) {

    /** Product Search Form */
    function meta_store_product_search_form() {
        $selected_category = isset($_REQUEST['product_category']) ? sanitize_text_field(wp_unslash($_REQUEST['product_category'])) : 0;
        ?>
        <form method="get" class="ms-product-search-form" action="<?php echo esc_url(home_url('/')); ?>">
            <?php
            if (taxonomy_exists('product_cat')) {
                $cat_args = array(
                    'taxonomy' => 'product_cat',
                    'show_option_all' => __('All Category', 'meta-store'),
                    'name' => 'product_category',
                    'selected' => $selected_category,
                    'id' => 'ms-product-category',
                    'class' => 'ms-postform',
                    'hide_if_empty' => true
                );
                wp_dropdown_categories($cat_args);
            }
            ?>
            <input type="search" class="ms-search-field" placeholder="<?php esc_attr_e('Search...', 'meta-store'); ?>" value="<?php echo esc_attr(get_search_query()); ?>" name="s" title="<?php esc_attr_e('Search for:', 'meta-store'); ?>" />
            <input type="hidden" name="post_type" value="product" />
            <button type="submit" class="ms-search-submit" type="search"><i class="icon_search"></i></button>
        </form>
        <?php
    }

}

if (!function_exists('meta_store_mobile_product_search_form')) {

    /** Product Search Form */
    function meta_store_mobile_product_search_form() {
        $selected_category = isset($_REQUEST['product_category']) ? sanitize_text_field(wp_unslash($_REQUEST['product_category'])) : 0;
        ?>
        <div class="ms-mobile-product-search-form-wrap">
            <form method="get" class="ms-product-search-form ms-mobile-product-search-form" action="<?php echo esc_url(home_url('/')); ?>">
                <?php
                if (taxonomy_exists('product_cat')) {
                    $cat_args = array(
                        'taxonomy' => 'product_cat',
                        'show_option_all' => __('All Category', 'meta-store'),
                        'name' => 'product_category',
                        'selected' => $selected_category,
                        'id' => 'ms-product-category',
                        'class' => 'ms-postform',
                        'hide_if_empty' => true
                    );
                    wp_dropdown_categories($cat_args);
                }
                ?>
                <input type="search" class="ms-search-field" placeholder="<?php esc_attr_e('Search...', 'meta-store'); ?>" value="<?php echo esc_attr(get_search_query()); ?>" name="s" title="<?php esc_attr_e('Search for:', 'meta-store'); ?>" />
                <input type="hidden" name="post_type" value="product" />
                <button type="submit" class="ms-search-submit" type="search"><i class="icon_search"></i></button>
            </form>
            <a class="ms-mobile-search-form-close" href="#"><i class="icon_close"></i></a>
        </div>
        <?php
    }

}

add_action('woocommerce_before_shop_loop_item_title_before', 'meta_store_product_thumb_wrap_open', 5);
add_action('woocommerce_before_shop_loop_item_title_before', 'woocommerce_template_loop_product_link_open', 10);
add_action('woocommerce_before_shop_loop_item_title_after', 'woocommerce_template_loop_product_link_close', 10);
add_action('woocommerce_before_shop_loop_item_title_after', 'meta_store_product_thumb_wrap_close', 15);
add_action('woocommerce_shop_loop_item_title', 'meta_store_template_loop_product_title', 10);
add_action('woocommerce_shop_loop_item_title_before', 'meta_store_product_title_wrap_open', 10);
add_action('woocommerce_after_shop_loop_item_after', 'meta_store_product_title_wrap_close', 10);
add_filter('woocommerce_sale_flash', 'meta_store_flash_sale');

if (!function_exists('meta_store_template_loop_product_title')) {

    /**
     * Show the product title in the product loop. By default this is an H2.
     */
    function meta_store_template_loop_product_title() {
        global $product;
        $link = apply_filters('woocommerce_loop_product_link', get_the_permalink(), $product);

        echo '<h2 class="' . esc_attr(apply_filters('woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title')) . '">';
        echo '<a href="' . esc_url($link) . '" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">';
        echo esc_html(get_the_title());
        echo '</a>';
        echo '</h2>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }

}

if (!function_exists('meta_store_product_thumb_wrap_open')) {

    function meta_store_product_thumb_wrap_open() {
        echo '<div class="ms-woocommerce-product-image">';
    }

}

if (!function_exists('meta_store_product_thumb_wrap_close')) {

    function meta_store_product_thumb_wrap_close() {
        echo '</div>';
    }

}

if (!function_exists('meta_store_product_title_wrap_open')) {

    function meta_store_product_title_wrap_open() {
        echo '<div class="ms-woocommerce-product-info">';
    }

}

if (!function_exists('meta_store_product_title_wrap_close')) {

    function meta_store_product_title_wrap_close() {
        echo '</div>';
    }

}

if (!function_exists('meta_store_flash_sale')) {

    function meta_store_flash_sale() {
        echo '<div class="onsale"><span>' . esc_html__('Sale', 'meta-store') . '<span></div>';
    }

}

add_filter('woocommerce_get_image_size_thumbnail', function( $size ) {
    return array(
        'width' => 400,
        'height' => 400,
        'crop' => 1,
    );
});
