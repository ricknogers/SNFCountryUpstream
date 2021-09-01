<?php get_header();?>
    <div class="container">
        <div class="singleContent" id="">
            <div class="row">
                <div class="col-md-9 col-sm-12">
                    <?php the_content();?>
                    <div class="text-center col-sm-12">
                        <a class="btn btn-sm btn-outline-primary" href="<?php echo home_url('/');?>news">Back to All News</a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 articlesSideBar">
                    <aside class=" list-group newsSideBar">
                        <h3 class="sidebarTitle">You May Also Like:</h3>
                        <?php
                        // the query
                        $the_query = new WP_Query( array(
                            'post_type' =>  'news',
                            'posts_per_page' => 3,
                        ));
                        ?>
                        <ul>
                            <?php if ( $the_query->have_posts() ) : ?>
                                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                                    <li class="list-group-item">
                                        <a href="<?php the_permalink();?>">
                                            <h4 class="recentPosts"><?php the_title(); ?></h4>
                                        </a>
                                    </li>
                                <?php endwhile; ?>
                                <?php wp_reset_postdata(); ?>
                            <?php else : ?>
                                <p><?php __('No News'); ?></p>
                            <?php endif; ?>
                        </ul>
                    </aside><!--newsSideBar-->
                </div><!--articlesSideBar-->


            </div>
        </div>
    </div>
<?php get_footer();?>
