<?php
/**
 * The template for displaying search results pages
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

                    /**
                     * Run the loop for the search to output the results.
                     * If you want to overload this in a child theme then include a file
                     * called content-search.php and that will be used instead.
                     */
                    get_template_part('template-parts/content', 'search');

                endwhile;

                the_posts_pagination();

            else :

                get_template_part('template-parts/content', 'none');

            endif;
            ?>

        </div>

        <?php get_sidebar(); ?>
    </div>
</div>
<?php
get_footer();
