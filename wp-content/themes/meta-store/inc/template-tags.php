<?php
/**
 * Custom template tags for this theme
 *
 * @package Meta Store
 */
if (!function_exists('meta_store_posted_on')) :

    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function meta_store_posted_on() {
        ?>
        <div class="ms-post-date">
            <span class="icon_clock_alt"></span> <?php echo esc_html(get_the_date()); ?>
        </div>
        <?php
    }

endif;

if (!function_exists('meta_store_post_comment')) :

    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function meta_store_post_comment() {
        ?>
        <div class="ms-post-comment">
            <span class="icon_comment_alt"></span> <?php echo esc_html(get_comments_number()); ?>
        </div>
        <?php
    }

endif;

if (!function_exists('meta_store_posted_by')) :

    function meta_store_posted_by() {
        $avatar = get_avatar(get_the_author_meta('ID'), '25');
        $author_name = get_the_author();
        ?>
        <div class="ms-author-card">
            <?php
            echo wp_kses($avatar, array(
                'img' => array(
                    'alt' => array(),
                    'src' => array(),
                    'srcset' => array(),
                    'class' => array(),
                    'height' => array(),
                    'width' => array()
                )
            ));
            ?>
            <?php echo esc_html($author_name); ?>
        </div>
        <?php
    }

endif;

if (!function_exists('meta_store_post_thumbnail')) :

    /**
     * Displays an optional post thumbnail.
     *
     * Wraps the post thumbnail in an anchor element on index views, or a div
     * element when on single views.
     */
    function meta_store_post_thumbnail() {
        if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
            return;
        }

        if (is_singular()) :
            ?>

            <div class="post-thumbnail">
                <?php the_post_thumbnail(); ?>
            </div><!-- .post-thumbnail -->

        <?php else : ?>

            <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                <?php
                the_post_thumbnail('post-thumbnail', array(
                    'alt' => the_title_attribute(array(
                        'echo' => false,
                    )),
                ));
                ?>
            </a>

        <?php
        endif; // End is_singular().
    }

endif;

/** Displays Categories in list format */
if (!function_exists('meta_store_post_categories_list')) {

    function meta_store_post_categories_list($post_id = 0) {
        if (!$post_id) {
            return;
        }

        $categories = get_the_category($post_id);

        if (empty($categories)) {
            return;
        }
        ?>
        <div class="ms-post-categories">
            <?php
            foreach ($categories as $category) {
                ?>
                <a href="<?php echo esc_url(get_category_link($category)); ?>"><?php echo esc_html($category->name); ?></a>
                <?php
            }
            ?>
        </div>
        <?php
    }

}

/** Displays Tags in list format */
if (!function_exists('meta_store_post_tags_list')) {

    function meta_store_post_tags_list($post_id = 0) {
        if (!$post_id) {
            return;
        }

        $tags = get_the_tags($post_id);

        if (empty($tags)) {
            return;
        }
        ?>
        <div class="ms-post-tags">
            <?php
            foreach ($tags as $tag) {
                ?>
                <a href="<?php echo esc_url(get_tag_link($tag)); ?>"><?php echo esc_html($tag->name); ?></a>
                <?php
            }
            ?>
        </div>
        <?php
    }

}

if (!function_exists('meta_store_single_category')) {

    function meta_store_single_category() {

        $categories_list = get_the_category_list(', ');
        if ($categories_list) {
            echo '<div class="ms-single-post-category">';
            echo '<span class="icon_archive_alt"></span>';
            echo wp_kses($categories_list, array('a' => array('href' => array(), 'rel' => array())));
            echo '</div>';
        }
    }

}

if (!function_exists('meta_store_single_tag')) {

    function meta_store_single_tag() {

        $tags_list = get_the_tag_list('', ', ');
        if ($tags_list) {
            echo '<div class="ms-single-post-tags">';
            echo "<span class='icon_tag_alt'></span>";
            echo wp_kses($tags_list, array('a' => array('href' => array(), 'rel' => array())));
            echo '</div>';
        }
    }

}

/** Blog Post Excerpt */
if (!function_exists('meta_store_blog_post_excerpt')) {

    function meta_store_blog_post_excerpt($content = '', $excerpt_length = 250) {
        if (!$content) {
            return '';
        }
        return substr(strip_tags(strip_shortcodes($content)), 0, $excerpt_length) . '...';
    }

}


/** Get Attachment Alt Tag using attachment url or attachment id */
if (!function_exists('meta_store_get_altofimage')) {

    function meta_store_get_altofimage($attachment) {
        $alt_text = '';
        $attachment_id = '';
        if ($attachment) {
            if (is_string($attachment)) {
                $attachment_id = attachment_url_to_postid($attachment);
            } elseif (is_int($attachment)) {
                $attachment_id = $attachment;
            }
            return get_post_meta($attachment_id, '_wp_attachment_image_alt', true);
        }
    }

}

/** Post Feature Image */
if (!function_exists('meta_store_post_feature_image')) {

    function meta_store_post_feature_image($size = 'full') {
        if (has_post_thumbnail()) {
            $img = wp_get_attachment_image_src(get_post_thumbnail_id(), $size);
            ?>
            <div class="ms-post-image">
                <a href="<?php the_permalink(); ?>">
                    <div class="ms-thumb-container">
                        <img src="<?php echo esc_url($img[0]); ?>" alt="<?php echo esc_attr(meta_store_get_altofimage(get_post_thumbnail_id())); ?>" />
                    </div>
                </a>
            </div>
            <?php
        }
    }

}