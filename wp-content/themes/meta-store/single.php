<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Meta Store
 */
get_header();
?>
<div class="ms-container">
    <div class="ms-content-wrap">
        <div id="ms-primary" class="ms-content-area">

            <?php
            while (have_posts()) :
                the_post();

                get_template_part('template-parts/content', 'single');

                the_post_navigation(array(
                    'prev_text' => '<div class="ms-nav-header"><i class="arrow_carrot-left"></i>' . esc_html__('Previous Post', 'meta-store') . '</div><div class="ms-nav-post-title">%title</div>',
                    'next_text' => '<div class="ms-nav-header">' . esc_html__('Next Post', 'meta-store') . '<i class="arrow_carrot-right"></i></div><div class="ms-nav-post-title">%title</div>'
                ));

                // If comments are open or we have at least one comment, load up the comment template.
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;

            endwhile; // End of the loop.
            ?>

        </div>

        <?php
        get_sidebar();
        ?>
    </div>
</div>
<?php
get_footer();
