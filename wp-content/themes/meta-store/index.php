<?php
/**
 * The main template file
 *
 * @package Meta Store
 */
get_header();
?>
<div class="ms-container">
    <div class="ms-content-wrap">
        <div id="ms-primary" class="ms-content-area">

            <?php
            if (have_posts()) :
                if (is_home() && !is_front_page()) :
                    ?>
                    <header>
                        <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                    </header>
                    <?php
                endif;

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

                the_posts_pagination(array(
                    'prev_text' => '<span class="arrow_carrot-left"></span>',
                    'next_text' => '<span class="arrow_carrot-right"></span>'
                ));

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
