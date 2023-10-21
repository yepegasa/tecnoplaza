<?php
/** Header Start */
add_action('meta_store_header', 'meta_store_header_start_cb', 10);
if (!function_exists('meta_store_header_start_cb')) {

    function meta_store_header_start_cb() {
        ?>
        <header id="ms-masthead" <?php meta_store_header_class(); ?>>
            <?php
        }

    }

    /** Top Header */
    add_action('meta_store_header', 'meta_store_top_header_cb', 20);
    if (!function_exists('meta_store_top_header_cb')) {

        function meta_store_top_header_cb() {
            $top_header_display = get_theme_mod('meta_store_top_header_display', 'left-right');
            $top_header_center = get_theme_mod('meta_store_th_center_display', 'text');
            $top_header_left = get_theme_mod('meta_store_th_left_display', 'date');
            $top_header_right = get_theme_mod('meta_store_th_right_display', 'social');
            $classes[] = 'ms-top-header';

            if ($top_header_display == 'center') {
                $top_header_class = 'ms-top-header-with-center';
            } elseif ($top_header_display == 'left') {
                $top_header_class = 'ms-top-header-with-left';
            } elseif ($top_header_display == 'right') {
                $top_header_class = 'ms-top-header-with-right';
            } elseif ($top_header_display == 'left-right') {
                $top_header_class = 'ms-top-header-with-left-right';
            }

            if ($top_header_display !== 'none') {
                $classes[] = $top_header_class;
                ?>
                <div class="<?php echo esc_attr(implode(' ', apply_filters('meta_store_top_header_class', $classes))); ?>">
                    <div class="ms-container">
                        <?php if ($top_header_display == 'left' || $top_header_display == 'left-right') : ?>
                            <!-- left top header -->
                            <div class="ms-top-header-left">
                                <?php
                                switch ($top_header_left) {
                                    case 'social':
                                        meta_store_socialicons();
                                        break;

                                    case 'widget':
                                        meta_store_top_widget();
                                        break;

                                    case 'text':
                                        meta_store_top_txtblock();
                                        break;

                                    case 'date':
                                        meta_store_top_date();
                                        break;

                                    case 'menu':
                                        meta_store_menu();
                                        break;

                                    default:
                                        break;
                                }
                                ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($top_header_display == 'center') : ?>
                            <!-- center top header -->
                            <div class="ms-top-header-center">
                                <?php
                                switch ($top_header_center) {
                                    case 'social':
                                        meta_store_socialicons();
                                        break;

                                    case 'widget':
                                        meta_store_top_widget();
                                        break;

                                    case 'text':
                                        meta_store_top_txtblock();
                                        break;

                                    case 'date':
                                        meta_store_top_date();
                                        break;

                                    case 'menu':
                                        meta_store_menu();
                                        break;

                                    default:
                                        break;
                                }
                                ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($top_header_display == 'right' || $top_header_display == 'left-right') : ?>
                            <!-- right top header -->
                            <div class="ms-top-header-right">
                                <?php
                                switch ($top_header_right) {
                                    case 'social':
                                        meta_store_socialicons();
                                        break;

                                    case 'widget':
                                        meta_store_top_widget();
                                        break;

                                    case 'text':
                                        meta_store_top_txtblock();
                                        break;

                                    case 'date':
                                        meta_store_top_date();
                                        break;

                                    case 'menu':
                                        meta_store_menu();
                                        break;

                                    default:
                                        break;
                                }
                                ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php
            }
        }

    }

    /** Main Header */
    add_action('meta_store_header', 'meta_store_main_header_cb', 30);
    if (!function_exists('meta_store_main_header_cb')) {

        function meta_store_main_header_cb() {
            $header_layout = get_theme_mod('meta_store_mh_layout', 'header-style1');
            ?>
            <div class="ms-main-header">
                <?php
                /** Displays Main Header Section */
                if ($header_layout == 'header-style1') {
                    meta_store_header_layout1();
                } elseif ($header_layout == 'header-style2') {
                    meta_store_header_layout2();
                } elseif ($header_layout == 'header-style3') {
                    meta_store_header_layout3();
                }
                ?>
            </div>
            <?php
        }

    }

    /** Header End */
    add_action('meta_store_header', 'meta_store_header_end_cb', 40);
    if (!function_exists('meta_store_header_end_cb')) {

        function meta_store_header_end_cb() {
            ?>
        </header><!-- #masthead -->
        <?php
    }

}

/** Inner page Banner Section */
add_action('meta_store_header', 'meta_store_inner_page_banner_cb', 50);
if (!function_exists('meta_store_inner_page_banner_cb')) {

    function meta_store_inner_page_banner_cb() {
        if (is_front_page()) { // Don't display inner page banner in front page.
            return;
        }

        if (is_singular('post')) {
            $post_layout = get_meta_store_single_layout();
            if ($post_layout == 'single-layout2') {
                $style = '';
                $display_author = get_theme_mod('meta_store_single_author', 1);
                $display_date = get_theme_mod('meta_store_single_date', 1);
                $display_comment = get_theme_mod('meta_store_single_comment_count', 1);

                if (has_post_thumbnail()) {
                    $img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                    $style .= 'style="background-image: url(' . esc_url($img[0]) . ')"';
                }
                ?>
                <div class="ms-single-post-banner" <?php echo $style; ?>>
                    <div class="ms-single-post-banner-header">
                        <div class="ms-container">
                            <h1 class="ms-single-post-title">
                                <?php the_title(); ?>
                            </h1>

                            <?php if ($display_author || $display_date || $display_comment) { ?>
                                <div class="ms-single-post-meta">
                                    <?php
                                    if ($display_author || $display_date) {
                                        $user_id = get_current_user_id();
                                        ?>
                                        <div class="ms-single-date-author">
                                            <?php if ($display_author) { ?>
                                                <span class="ms-single-author">
                                                    <img src="<?php echo esc_url(get_avatar_url($user_id)); ?>" alt="<?php echo esc_attr(get_the_author_meta('display_name')); ?>" />
                                                    <?php echo esc_html(get_the_author_meta('display_name', $user_id)); ?>
                                                </span>
                                            <?php } ?>

                                            <?php if ($display_date) { ?>
                                                <span class="ms-single-date"><span class='icon_clock_alt'></span><?php echo esc_html(get_the_date()); ?></span>
                                            <?php } ?>
                                        </div>
                                        <?php
                                    }

                                    if ($display_comment) {
                                        ?>
                                        <div class="ms-single-comment">
                                            <span class='icon_comment_alt'></span><?php comments_number(esc_html__('No Comments', 'meta-store'), esc_html__('1 Comment', 'meta-store'), esc_html__('% Comments', 'meta-store')); ?>
                                        </div>
                                    <?php }
                                    ?>
                                </div>
                            <?php }
                            ?>
                        </div>
                    </div>
                </div>
                <?php
            }
            return;
        } elseif (is_singular('page')) {
            $display_breadcrumb = get_theme_mod('meta_store_breadcrumb', 1);
            $page_title = meta_store_get_title();
            $banner_style = 'ms-' . get_theme_mod('meta_store_page_banner_style', 'banner-style1');
            $banner_style = apply_filters('meta_store_page_banner_class', $banner_style);
            ?>
            <div class="ms-page-banner <?php echo esc_attr($banner_style); ?>">
                <div class="ms-container">
                    <h1 class="ms-page-title">
                        <?php
                        echo wp_kses($page_title, array(
                            'span' => array()
                        ));
                        ?>
                    </h1>

                    <?php
                    if (function_exists('meta_store_breadcrumb') && $display_breadcrumb) {
                        meta_store_breadcrumb(array(
                            'show_browse' => false,
                        ));
                    }
                    ?>
                </div>
            </div>
            <?php
        }
    }

}

/** Get Inner page titles */
if (!function_exists('meta_store_get_title')) {

    function meta_store_get_title() {
        $page_title = '';

        if (is_singular()) {
            $page_title = get_the_title();
        } elseif (is_home()) {
            $page_title = single_post_title('', false);
        } elseif (is_archive()) {
            $page_title = get_the_archive_title();
        } elseif (is_search()) {
            $page_title = esc_html__('Search Result for: ', 'meta-store') . '<span>' . esc_html(get_search_query()) . '</span>';
        } elseif (is_404()) {
            $page_title = esc_html__('404 Error', 'meta-store');
        }

        return $page_title;
    }

}

/** Displays Main Header (Layout 1) */
if (!function_exists('meta_store_header_layout1')) {

    function meta_store_header_layout1() {

        $show_search = get_theme_mod('meta_store_mh_show_category_search', 1);
        $show_minicart = get_theme_mod('meta_store_mh_show_minicart', 1);
        $show_toggle_menu = get_theme_mod('meta_store_show_toggle_menu', 1);
        $ms_cart_search_class = $show_minicart ? 'ms-cart-active' : 'ms-cart-inactive';
        ?>
        <div class="ms-top-main-header">
            <div class="ms-container">
                <?php meta_store_site_branding(); ?>

                <?php
                if (class_exists('woocommerce') && ($show_search || $show_minicart)) :
                    if ($show_search) :
                        ?>
                        <?php meta_store_product_search_form(); ?>
                    <?php endif; ?>

                    <div class="ms-cart-search <?php echo esc_attr($ms_cart_search_class); ?>">
                        <?php
                        if (class_exists('woocommerce') && $show_minicart) :
                            meta_store_woocommerce_header_cart();
                        endif;
                        ?>

                        <?php if (class_exists('woocommerce') && $show_search) : ?>
                            <div class="ms-mobile-search-wrap">
                                <div class="ms-search-toggle"><a href="#"><i class="icon_search"></i></a></div>
                                <?php meta_store_mobile_product_search_form(); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="ms-bottom-main-header">
            <div class="ms-container">
                <?php if ($show_toggle_menu) : ?>
                    <?php meta_store_toggle_menu_cb(); ?>
                <?php endif; ?>

                <?php meta_store_site_navigation(); ?>
            </div>
        </div>
        <?php
    }

}

/** Displays Main Header (Layout 2) */
if (!function_exists('meta_store_header_layout2')) {

    function meta_store_header_layout2() {
        $show_search = get_theme_mod('meta_store_mh_show_category_search', 1);
        $contact_no = get_theme_mod('meta_store_contact_no', '+474 876543210');
        $show_minicart = get_theme_mod('meta_store_mh_show_minicart', 1);
        $show_toggle_menu = get_theme_mod('meta_store_show_toggle_menu', 1);
        ?>
        <div class="ms-top-main-header">
            <div class="ms-container">
                <div class="ms-contact-no">
                    <?php
                    if ($contact_no) {
                        ?>
                        <div class="ms-contact-box">
                            <a href="tel:<?php echo wp_kses($contact_no, array('br' => array(), 'strong' => array())); ?>"><span class="icon_phone"></span></a>
                            <span class="ms-contact-number">
                                <a href="tel:<?php echo wp_kses($contact_no, array('br' => array(), 'strong' => array())); ?>"><?php echo wp_kses($contact_no, array('br' => array(), 'strong' => array())); ?></a>
                            </span>
                        </div>
                        <?php
                    }
                    ?>
                </div>

                <?php meta_store_site_branding(); ?>

                <div class="ms-mini-cart">
                    <?php
                    if (class_exists('woocommerce') && $show_minicart) :
                        meta_store_woocommerce_header_cart();
                    endif;
                    ?>
                </div>
            </div>
        </div>

        <div class="ms-bottom-main-header">
            <div class="ms-container">
                <?php if ($show_toggle_menu) : ?>
                    <?php meta_store_toggle_menu_cb(); ?>
                <?php endif; ?>

                <div class="ms-navigation-search">
                    <?php meta_store_site_navigation(); ?>
                    <?php if (class_exists('woocommerce') && $show_search) : ?>
                        <div class="ms-mobile-search-wrap">
                            <div class="ms-search-toggle"><a href="#"><i class="icon_search"></i></a></div>
                            <?php meta_store_mobile_product_search_form(); ?>
                        </div>
                    <?php endif; ?>

                </div>

                <?php if (class_exists('woocommerce') && $show_search) : ?>
                    <?php meta_store_product_search_form(); ?>
                <?php endif; ?>
            </div>
        </div>
        <?php
    }

}

/** Displays Main Header (Layout 3) */
if (!function_exists('meta_store_header_layout3')) {

    function meta_store_header_layout3() {
        $show_search = get_theme_mod('meta_store_mh_show_category_search', 1);
        $contact_no = get_theme_mod('meta_store_contact_no', '+474 876543210');
        $show_minicart = get_theme_mod('meta_store_mh_show_minicart', 1);
        $show_toggle_menu = get_theme_mod('meta_store_show_toggle_menu', 1);
        $ms_cart_search_class = $show_minicart ? 'ms-cart-active' : 'ms-cart-inactive';
        ?>
        <div class="ms-top-main-header">
            <div class="ms-container">
                <?php meta_store_site_branding(); ?>
                <?php meta_store_site_navigation(); ?>
            </div>
        </div>
        <?php if ($show_toggle_menu || $show_search || $show_minicart) { ?>
            <div class="ms-bottom-main-header">
                <div class="ms-container">
                    <?php if ($show_toggle_menu) : ?>
                        <?php meta_store_toggle_menu_cb(); ?>
                    <?php endif; ?>

                    <?php if (class_exists('woocommerce') && $show_search) : ?>
                        <?php meta_store_product_search_form(); ?>
                    <?php endif; ?>

                    <?php if (class_exists('woocommerce') && ($show_search || $show_minicart)) : ?>
                        <div class="ms-cart-search <?php echo esc_attr($ms_cart_search_class); ?>">
                            <?php
                            if (class_exists('woocommerce') && $show_minicart) :
                                meta_store_woocommerce_header_cart();
                            endif;
                            ?>

                            <?php if (class_exists('woocommerce') && $show_search) : ?>
                                <div class="ms-mobile-search-wrap">
                                    <div class="ms-search-toggle"><a href="#"><i class="icon_search"></i></a></div>
                                    <?php meta_store_mobile_product_search_form(); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php } ?>
        <?php
    }

}

if (!function_exists('meta_store_site_branding')) {

    function meta_store_site_branding() {
        $classes = apply_filters('meta_store_logo_classes', array('ms-site-branding'));
        ?>
        <div class="<?php echo implode(' ', $classes) ?>">
            <?php
            the_custom_logo();
            ?>
            <div class="ms-site-title-description">
                <?php
                if (is_front_page() && is_home()) :
                    ?>
                    <h1 class="ms-site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                    <?php
                else :
                    ?>
                    <p class="ms-site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
                <?php
                endif;
                $meta_store_description = get_bloginfo('description', 'display');
                if ($meta_store_description || is_customize_preview()) :
                    ?>
                    <p class="ms-site-description"><?php echo esc_html($meta_store_description); /* WPCS: xss ok. */ ?></p>
                <?php endif; ?>
            </div>
        </div><!-- .site-branding -->
        <?php
    }

}

if (!function_exists('meta_store_site_navigation')) {

    function meta_store_site_navigation() {
        ?>
        <nav id="ms-site-navigation" role="navigation" class="ms-main-navigation" aria-label="<?php _e('Main Menu', 'meta-store'); ?>">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'meta-store-main-menu',
                'menu_class' => 'ms-main-menu',
                'container' => false,
                'fallback_cb' => false,
            ));
            do_action('meta_store_after_navigation');
            ?>
            <a href="#" class="ms-menu-toggle"><span></span></a>
        </nav><!-- #site-navigation -->
        <?php
    }

}