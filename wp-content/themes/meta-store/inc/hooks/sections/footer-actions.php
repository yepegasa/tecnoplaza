<?php
/** Footer Action Hooks */
/** Footer Wrapper Start */
add_action('meta_store_footer', 'meta_store_footer_wrapper_start_cb', 10);
if (!function_exists('meta_store_footer_wrapper_start_cb')) {

    function meta_store_footer_wrapper_start_cb() {
        ?>
        <footer id="colophon" <?php meta_store_foooter_class(); ?>>
            <div class="ms-container">
                <?php
            }

        }

        /** Top Footer */
        add_action('meta_store_footer', 'meta_store_top_footer_cb', 20);
        if (!function_exists('meta_store_top_footer_cb')) {

            function meta_store_top_footer_cb() {
                $col = 4;
                $column_layout = get_theme_mod('meta_store_footer_col', 'col-4');
                if ($column_layout) {
                    $col_arr = explode('-', $column_layout);
                    $col = $col_arr[1];
                }
                ?>
                <div class="ms-top-footer">
                    <?php
                    for ($i = 1; $i <= $col; $i++) {
                        $widget_area = 'meta-store-footer-' . $i;
                        if (is_active_sidebar($widget_area)) {
                            ?>
                            <div class="ms-top-footer-col">
                                <?php
                                dynamic_sidebar($widget_area);
                                ?>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
                <?php
            }

        }

        /** Bottom Footer */
        add_action('meta_store_footer', 'meta_store_bottom_footer_cb', 40);
        if (!function_exists('meta_store_bottom_footer_cb')) {

            function meta_store_bottom_footer_cb() {

                $payment_logos = get_theme_mod('meta_store_payment_logos', '');
                ?>
                <div class="ms-bottom-footer">
                    <div class="ms-bottom-footer-left">
                        <?php
                        $copyright_text = get_theme_mod('meta_store_footer_copyright', '&copy; 2021 Meta Store. All Right Reserved.');

                        echo esc_html($copyright_text);
                        if (apply_filters('meta_store_display_footer_credit', '__return_true')) {
                            echo ' | ' . esc_html__('WordPress Theme by ', 'meta-store') . '<a href="https://mysticalthemes.com/">' . esc_html__('Mystical Themes', 'meta-store') . '</a>';
                        }
                        ?>
                    </div>

                    <?php if ($payment_logos) : ?>
                        <div class="ms-bottom-footer-right">
                            <img src="<?php echo esc_url($payment_logos); ?>" />
                        </div>
                    <?php endif; ?>
                </div><!-- .site-info -->
                <?php
            }

        }

        /** Footer Wrapper End */
        add_action('meta_store_footer', 'meta_store_footer_wrapper_end_cb', 50);
        if (!function_exists('meta_store_footer_wrapper_end_cb')) {

            function meta_store_footer_wrapper_end_cb() {
                ?>
            </div>
        </footer>
        <?php
    }

}