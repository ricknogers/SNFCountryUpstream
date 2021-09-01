<?php
/**
 * The template for displaying Archive pages.
 *
 * @package Childers YMCA
 */

get_header(); ?>
<div class="container">
    <div class="row">
        <div id="primary" class="content-area col-md-8 ">
            <?php
            global $query_string;
            query_posts( $query_string . '&posts_per_page=-1' );
            ?>
            <?php if(have_posts()):?>
                <div class="article-list">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php
                        /* Include the Post-Format-specific template for the content.
                        * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                         */
                        get_template_part( 'content', 'archive');
                        ?>
                    <?php endwhile; ?>
                </div>
            <?php else : ?>
            <?php endif; wp_reset_query(); ?>
        </div><!-- #primary -->
        <aside class="col-md-4 " id="sidebar" role="complementary">
            <?php get_sidebar('archive'); ?>
        </aside>
    </div>
</div>
<?php get_footer(); ?>