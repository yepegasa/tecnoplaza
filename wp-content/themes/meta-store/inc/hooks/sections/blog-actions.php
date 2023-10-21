<?php
/** Blog Action Hooks */
/** Blog Posts Start Wrapper */
add_action('meta_store_blog_post', 'meta_store_blog_post_start_cb', 10);
if (!function_exists('meta_store_blog_post_start_cb')) {

    function meta_store_blog_post_start_cb() {
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('ms-archive-list'); ?>>
            <?php
        }

    }

    /** Blog Post Header */
    add_action('meta_store_blog_post', 'meta_store_post_header_cb', 20);
    if (!function_exists('meta_store_post_header_cb')) {

        function meta_store_post_header_cb() {
            $blog_layout = get_theme_mod('meta_store_blog_layout', 'blog-layout1');
            $display_category = get_theme_mod('meta_store_blog_category', '1');
            $display_date = get_theme_mod('meta_store_blog_date', '1');
            $display_comment = get_theme_mod('meta_store_blog_comment', '1');
            ?>
            <?php if ($blog_layout == 'blog-layout1') : ?>
                <header class="ms-archive-header">
                    <?php meta_store_post_feature_image('meta-store-1000x600'); ?>

                    <div class="ms-archive-meta">
                        <?php
                        /** Get Category List */
                        if ($display_category) {
                            meta_store_post_categories_list(get_the_id());
                        }
                        ?>
                    </div>
                </header>
            <?php else : ?>
                <header class="ms-archive-header">
                    <div class="ms-archive-meta">
                        <?php
                        /** Get Category List */
                        if ($display_category) {
                            meta_store_post_categories_list(get_the_id());
                        }
                        ?>
                    </div>

                    <h3 class="ms-archive-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <?php
                        if( $display_date || $display_comment ) {
                            ?>
                            <div class="ms-post-date-comment">
                                <?php
                                    /** Date */
                                    if ($display_date) {
                                        meta_store_posted_on();
                                    }

                                    /** Comment */
                                    if ($display_comment) {
                                        meta_store_post_comment();
                                    }
                                ?>
                            </div>
                            <?php
                        }
                    ?>
                </header>
            <?php endif; ?>
            <?php
        }

    }

    /** Blog Post Content */
    add_action('meta_store_blog_post', 'meta_store_post_content_cb', 30);
    if (!function_exists('meta_store_post_content_cb')) {

        function meta_store_post_content_cb() {
            $blog_layout = get_theme_mod('meta_store_blog_layout', 'blog-layout1');
            $excerpt_length = get_theme_mod('meta_store_blog_excerpt_length', 250);
            $display_date = get_theme_mod('meta_store_blog_date', '1');
            $display_comment = get_theme_mod('meta_store_blog_comment', '1');
            ?>
            <?php if ($blog_layout == 'blog-layout1') : ?>
                <div class="ms-archive-content">

                    <h3 class="ms-archive-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                    <?php
                        if( $display_date || $display_comment ) {
                            ?>
                            <div class="ms-post-date-comment">
                                <?php
                                    /** Date */
                                    if ($display_date) {
                                        meta_store_posted_on();
                                    }

                                    /** Comment */
                                    if ($display_comment) {
                                        meta_store_post_comment();
                                    }
                                ?>
                            </div>
                            <?php
                        }
                    ?>

                    <div class="ms-archive-excerpt">
                        <?php echo esc_html(meta_store_blog_post_excerpt(get_the_content(), $excerpt_length)); ?>
                    </div>
                </div>
            <?php else : ?>
                <div class="ms-archive-content">
                    <?php meta_store_post_feature_image('meta-store-1000x600'); ?>

                    <div class="ms-archive-excerpt">
                        <?php echo esc_html(meta_store_blog_post_excerpt(get_the_content(), $excerpt_length)); ?>
                    </div>
                </div>
            <?php endif; ?> 
            <?php
        }

    }

    /** Blog Post Footer */
    add_action('meta_store_blog_post', 'meta_store_post_footer_cb', 40);
    if (!function_exists('meta_store_post_footer_cb')) {

        function meta_store_post_footer_cb() {
            $display_author = get_theme_mod('meta_store_blog_author', '1');
            $read_more = get_theme_mod('meta_store_archive_readmore', esc_html__('Read More', 'meta-store'));
            ?>
            <div class="ms-archive-footer">
                <?php
                if ($display_author) {
                    meta_store_posted_by();
                }
                ?>

                <?php
                if ($read_more) {
                    ?>
                    <a class="ms-archive-read-more" href="<?php the_permalink(); ?>"><?php echo esc_html($read_more); ?></a>
                    <?php
                }
                ?>
            </div>
            <?php
        }

    }

    /** Blog Post End Wrapper */
    add_action('meta_store_blog_post', 'meta_store_blog_post_end_cb', 50);
    if (!function_exists('meta_store_blog_post_end_cb')) {

        function meta_store_blog_post_end_cb() {
            ?>
        </article>
        <?php
    }

}

/** Single Post Hooks */
/** Single Post Start */
add_action('meta_store_blog_post_single', 'meta_store_single_post_start_cb', 10);
if (!function_exists('meta_store_single_post_start_cb')) {

    function meta_store_single_post_start_cb() {
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php
        }

    }

    /** Single Post Content */
    add_action('meta_store_blog_post_single', 'meta_store_single_post_content', 20);
    if (!function_exists('meta_store_single_post_content')) {

        function meta_store_single_post_content() {
            $post_layout = get_meta_store_single_layout();
            $post_layout = str_replace('-', '_', $post_layout);

            if (function_exists('meta_store_' . $post_layout)) {
                call_user_func('meta_store_' . $post_layout);
            } else {
                meta_store_single_layout1();
            }
        }

    }

    /** Single Post End */
    add_action('meta_store_blog_post_single', 'meta_store_single_post_end_cb', 30);
    if (!function_exists('meta_store_single_post_end_cb')) {

        function meta_store_single_post_end_cb($p) {
            ?>
        </article>
        <?php
    }

}

/** Single Post Layout 1 */
if (!function_exists('meta_store_single_layout1')) {

    function meta_store_single_layout1() {
        $display_category = get_theme_mod('meta_store_single_categories', 1);
        $display_date = get_theme_mod('meta_store_single_date', 1);
        $display_comment = get_theme_mod('meta_store_single_comment_count', 1);
        $display_author = get_theme_mod('meta_store_single_author', 1);
        ?>
        <header class="ms-single-post-header">
            <?php
            if ($display_category) {
                ?>
                <div class="ms-single-header-meta">
                    <?php meta_store_single_category(); ?>
                </div>
                <?php
            }
            ?>

            <h1 class="ms-single-post-title"><?php the_title(); ?></h1>

            <?php
            if ($display_date || $display_comment || $display_author) {
                ?>
                <div class="ms-single-date-comments">
                    <?php if ($display_date) : ?>
                        <div class="ms-single-date">
                            <span class='icon_clock_alt'></span><?php echo esc_html(get_the_date()); ?>

                            <?php if ($display_author) { ?>
                                <span><?php echo sprintf('by %s', esc_html(get_the_author_meta('display_name'))); ?></span>
                            <?php } ?>
                        </div>
                        <?php
                    endif;

                    if ($display_comment) {
                        ?>
                        <div class="ms-single-comment">
                            <span class='icon_comment_alt'></span><?php comments_number(esc_html__('No Comments', 'meta-store'), esc_html__('1 Comment', 'meta-store'), esc_html__('% Comments', 'meta-store')); ?>
                        </div>
                    <?php } ?>
                </div>
                <?php
            }
            ?>
        </header>

        <?php
        /** Post Image */
        if (has_post_thumbnail()) {
            $img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
            ?>
            <div class=   "ms-single-featured-image">
                <img src="<?php echo esc_url($img[0]);
            ?>" alt="<?php echo esc_attr(meta_store_get_altofimage(absint(get_post_thumbnail_id()))); ?>" />
            </div>
            <?php
        }
        ?>

        <div class="ms-single-post-content">
            <?php the_content(); ?>
        </div>

        <?php
        $display_tags = get_theme_mod('meta_store_single_tags', 1);
        if ($display_tags) {
            ?>
            <div class="ms-single-footer-meta">
                <?php
                meta_store_single_tag();
                ?>
            </div>
            <?php
        }
    }

}

/** Single Post Layout 2 */
if (!function_exists('meta_store_single_layout2')) {

    function meta_store_single_layout2() {
        $display_author = get_theme_mod('meta_store_single_author', 1);
        $display_category = get_theme_mod('meta_store_single_categories', 1);

        if ($display_category) {
            ?>
            <div class="ms-single-header-meta">
                <?php meta_store_single_category(); ?>
            </div>
            <?php
        }
        ?>

        <div class="ms-single-post-content">
            <?php the_content(); ?>
        </div>

        <?php
        $display_tags = get_theme_mod('meta_store_single_tags', 1);
        if ($display_tags) {
            ?>
            <div class="ms-single-footer-meta">
                <?php
                /** Display Tags */
                if ($display_tags) {
                    meta_store_single_tag();
                }
                ?>
            </div>
            <?php
        }
    }

}

if (!function_exists('get_meta_store_single_layout')) {

    function get_meta_store_single_layout() {
        $post_layout = get_theme_mod('meta_store_single_layout', 'single-layout1');
        return apply_filters('meta_store_post_layout', $post_layout);
    }

}