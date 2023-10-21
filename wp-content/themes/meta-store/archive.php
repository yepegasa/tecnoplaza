<?php
/**
 * The template for displaying archive pages
 *
 * @package Meta Store
 */
get_header();
?>
<div class="ms-container">
    <div class="ms-content-wrap">
        <div id="ms-primary" class="ms-content-area">

            <?php if (have_posts()) : ?>

                <?php
                /* Start the Loop */
                while (have_posts()) :
                    the_post();

                    /*
                     * Include the Post-Type-specific template for the content.
                     * If you want to override this in a child theme, then include a file
                     * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                     */
                    get_template_part('template-parts/content', get_post_type());

                endwhile;

                the_posts_pagination();

            else :

                get_template_part('template-parts/content', 'none');

            endif;
            ?>

        </div><!-- #primary -->

        <?php get_sidebar(); ?>
    </div>
</div>
<?php
get_footer();
