<?php
/**
 * Template Name: News
 *

 */

get_header();?>

<div class="container">
    <div class="row">
        <div class="col-md-9 col-xs-12 latestNews">
            <div class=" newsCategoryWrapper">
                <?php
                /*
                 * Loop through Categories and Display Posts within
                 */
                $post_type = 'news';
                // Get all the taxonomies for this post type
                $taxonomies = get_object_taxonomies( array( 'post_type' => $post_type ) );
                foreach( $taxonomies as $taxonomy ) :
                    // Gets every "category" (term) in this taxonomy to get the respective posts
                    $terms = get_terms( $taxonomy );
                    foreach( $terms as $term ) : ?>
                        <?php
                        $args = array(
                            'post_type' => $post_type,
                            'posts_per_page' => 5,  //show all posts
                            'tax_query' => array(
                                array(
                                    'taxonomy' => $taxonomy,
                                    'field' => 'slug',
                                    'terms' => $term->slug,
                                )
                            )
                        );
                        $posts = new WP_Query($args);
                        if( $posts->have_posts() ): ?>
                            <section class="newsCategoryWarpper">
                                <!-- Output Category Name in Blue Bar and Display # of Post included in Category -->
                                <div class="col-sm-12 newsCategoryTitle" id="<?php echo $term->slug; ?>">
                                    <div class="catLable">
                                        <a href="<?php echo get_term_link($term);?>">
                                            <h2><?php echo $term->name; ?> <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                                            </h2>
                                        </a>
                                    </div> <div class="catCount"><span class="newsCategoryCount">(<?php echo $posts->found_posts;?>) </span></div>
                                </div>
                                <?php while( $posts->have_posts() ) : $posts->the_post(); ?>
                                    <div class="col-sm-12 newsCategoryListings">
                                        <ul class="list-unstyled">
                                            <?php if(has_post_thumbnail()) :?>
                                                <a href="<?php the_permalink();?>">
                                                    <li class="media">
                                                        <?php the_post_thumbnail('thumbnail', array( 'class' => 'mr-3 ')); ?>
                                                        <div class="media-body">
                                                            <h5 class="mt-0 mb-1"><?php  echo get_the_title(); ?></h5>
                                                            <p class="card-text"><?php echo wp_trim_words( get_the_content(), 25, '' );?></p>
                                                            <p class="text-muted"><?php echo get_the_date('j M, Y');?></p>
                                                        </div>
                                                    </li>
                                                </a>
                                                <hr />
                                            <?php else:?>
                                                <a href="<?php the_permalink();?>">
                                                    <li class="media">
                                                        <div class="img-card-top">
                                                            <img src="<?php bloginfo('template_url'); ?>/images/SNF-Logo-Blue.png" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>" class="img-fluid mr-3" width="110" height="110" />
                                                        </div>
                                                        <div class="media-body">
                                                            <h5 class="mt-0 mb-1"><?php  echo get_the_title(); ?></h5>
                                                            <p class="card-text"><?php echo wp_trim_words( get_the_content(), 25, '' );?></p>
                                                            <p class="text-muted"><?php echo get_the_date('j M, Y');?></p>
                                                        </div>
                                                    </li>
                                                </a>
                                                <hr />
                                            <?php endif;?>
                                        </ul>
                                    </div>
                                <?php endwhile; ?>
                                <div class="text-center col-sm-12">
                                    <a class="btn btn-sm  btn-outline-primary" href="<?php echo get_term_link($term);?>">
                                        See All From <?php echo $term->name;?>
                                    </a>
                                </div>

                            </section>
                        <?php endif;?>
                    <?php endforeach;?>
                <?php endforeach;?>
            </div>
        </div><!-- latestNews -->
        <div class="col-md-3 col-xs-12 newsSidebarWrapper">
            <div class="latestNews">
                <section class="topLevelSidebar">
                    <h2 class="font-weight-bold">Latest News</h2>
                    <hr class="newsBlue">
                    <div class="col-sm-12 newsCategoryList">
                        <?php
                        // the query
                        $latestNews = new WP_Query( array(
                            'post_type' =>  'news',
                            'post_status' => 'publish',
                            'posts_per_page'=>4,
                            'orderby' => 'date',
                            'order' => 'DESC',
                        ));
                        ?>
                        <?php if ( $latestNews->have_posts() ) : ?>
                            <?php while ( $latestNews->have_posts() ) : $latestNews->the_post(); ?>
                                <ul class="list-group">
                                    <li class='list-group-item'>
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </li>
                                </ul>
                            <?php endwhile;  ?>
                        <?php endif; wp_reset_query();?>
                    </div><!--news category list-->
                </section>
            </div><!--latestNews-->
            <div class="newsSidebarCategories">
                <section class="topLevelSidebar">
                    <h2 class="font-weight-bold">Categories</h2>
                    <hr class="newsBlue">
                    <div class="col-sm-12 newsCategoryList">
                        <?php $cats = get_categories();  // Get categories ?>
                        <?php if ($cats) : ?>
                            <ul class="list-group">
                                <?php // Loop through categories to print name and count excluding CPTs ?>
                                <?php foreach ($cats as $cat) {
                                    // Create a query for the category to determine the number of posts
                                    $category_id= $cat->term_id;
                                    $cat_query = new WP_Query( array( 'post_type' => 'news',
                                        'posts_per_page' => -1,
                                        'cat' => $category_id
                                    ) );
                                    $count = $cat_query->found_posts; ?>
                                    <a href="#<?php echo $cat->slug ;?>">
                                        <li class='list-group-item'> <?php echo $cat->name ;?> (<?php echo $count ;?>)</li>
                                    </a>
                                <?php } ?>
                                <?php wp_reset_query();  // Restore global post data  ?>
                            </ul>
                        <?php endif; ?>
                    </div><!--news category list-->
                </section>
            </div><!--newsSidebarCategories-->
            <div class="newsSidebarMostReadNews">
                <section>
                    <h2 class="font-weight-bold">Most Read News</h2>
                    <hr class="newsBlue">
                    <div class="col-sm-12 newsCategoryList">
                        <?php $popular = new WP_Query(array('post_type' => 'news', 'posts_per_page'=>4, 'meta_key'=>'popular_posts', 'orderby'=>'meta_value_num', 'order'=>'DESC')); ?>
                        <?php while ($popular->have_posts()) : $popular->the_post(); ?>
                        <ul class="list-group">
                            <li class='list-group-item'>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </li>
                            <?php endwhile; wp_reset_postdata(); ?>
                        </ul>
                    </div><!--news category list-->
                </section>
            </div><!--newsSidebarMostReadNews-->
        </div><!--newsSidebarWrapper-->
    </div><!--row-->

</div>

<?php get_footer();?>
