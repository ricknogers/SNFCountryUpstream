<?php
/**
 * Template Name: Generic WYSIWYG Template
 *

 */

get_header();?>
<div class="container">
    <div class="row">
        <div class="col-sm-12 innerpage-layout">
            <?php the_content(); ?>

            <?php if(is_page('forms')):?>
                <?php

                $args = array(
                    'post_type'      => 'page',
                    'posts_per_page' => -1,
                    'post_parent'    => $post->ID,
                    'order'          => 'ASC',
                    'orderby'        => 'menu_order'
                );


                $parent = new WP_Query( $args );

                if ( $parent->have_posts() ) : ?>

                    <?php while ( $parent->have_posts() ) : $parent->the_post(); ?>

                        <div id="parent-<?php the_ID(); ?>" class="parent-page">

                            <h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>


                        </div>

                    <?php endwhile; ?>

                <?php endif; wp_reset_postdata(); ?>
            <?php endif;?>

        </div>
    </div>
</div>
<?php get_footer();?>
