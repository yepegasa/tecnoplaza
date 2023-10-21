<?php
/**
 * The template for displaying all pages
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

                get_template_part('template-parts/content', 'page');

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
