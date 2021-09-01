<?php
/**
 * Template Name: Products
 *

 */

get_header();?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <?php the_content();?>
            </div>
        </div>
        <div class="row">
            <form method="get" role="form" id="products-search" class=" products_searchForm" action="">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h2>Filter Products by Market:</h2>
                        <?php
                        $mediaTypes = get_terms(array(
                            'taxonomy' => 'market',
                            'hide_empty' => true,
                            'orderby' => 'name',
                        ) );
                        ?>
                        <?php foreach ($mediaTypes as $term) :?>
                            <div class="form-group icon-checkbox-group <?php echo $term->slug;?>-wrapper">
                                <label  >
                                    <input type="radio" id="<?php echo $term->slug;?>" class="marketing_product_type" name="marketing_product_type"  value="marketingOption-<?php echo $term->slug;?>"/>
                                    <div class="filterName"><?php echo $term->name;?></div>
                                    <span class="marketingIcon"></span>
                                </label>
                            </div>
                        <?php endforeach;?>
                    </div>
                    <div class="col-sm-12 text-right">
                        <a href="<?php the_permalink(); ?>" class="btn btn-outlined filter-btn">Reset</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col-sm-12 ">
                <?php
                // Loop through Categories and Display Posts within
                // ACF Relationship Field based on CPT 'Products' - Post ID
                $tradeName_field = $panel['trade_name'];
                // CPT 'Products'
                $post_type = 'products';
                // Get all the Markets taxonomy terms used
                $market_terms = get_terms( array(
                    'taxonomy' => 'market',
                    'hide_empty' => false,
                    'parent' => 0
                ) );
                // Foreach term, loop through Locations posts selected in the relationship field filtered via the state terms. Not actually displaying anything with this query, but creating an array of post IDs.
                foreach( $market_terms as $market_term ) : ?>
                    <?php
                    $args = array(
                        'post_type' => $post_type,
                        'posts_per_page' => -1,  //show all posts
                        'post__in' => $tradeName_field,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'market',
                                'field' => 'slug',
                                'terms' => $market_term->slug,
                            )
                        )
                    );
                    $new_posts = new WP_Query($args);
                    $ids = array(); ?>
                    <?php if( $new_posts->have_posts() ): while( $new_posts->have_posts() ) : $new_posts->the_post(); ?>
                        <?php array_push( $ids, get_the_ID() ); ?>
                    <?php endwhile; wp_reset_postdata(); endif; ?>
                    <div class="products-grouping marketingOption-<?php echo $market_term->slug;?>" id="">
                        <?php // Begin to display groups starting with the Market term
                        if (!empty($ids)) : // CHECK TO MAKE SURE THERE ARE POSTS! ?>
                            <div class="row">
                                <div class="col marketTitle">
                                    <div class="row">
                                        <div class="col-md-8 col-sm-12  ">
                                            <h2><?php echo $market_term->name; // State name ?> </h2>
                                        </div>
                                       

                                        <?php $link = get_field('market_url_redirect_link', 'category_'.$market_term->term_id); ?>
                                        <?php if (!empty($market_term->description)  ):?>
                                            <div class="col-md-4 col-sm-12  text-center marketLink">
                                                <a class="" href="<?php echo $link;?>" target="_blank">
                                                    <button class="btn-sm marketButtonLink " type="button">
                                                        <h4>Learn More</h4>
                                                    </button>
                                                </a>
                                            </div>
                                        <?php else: ?>
                                        <?php endif;?>
                                    </div><!--row-->
                                </div><!--marketTitle-->
                            </div>
                            <?php
                            // Get all the city taxonomy terms used
                            $category_terms = get_terms( array(
                                'taxonomy' => 'products-category',
                                'hide_empty' => false,
                                'parent' => 0
                            ) );
                            foreach( $category_terms as $cat ) : ?>
                                <?php
                                $args2 = array(
                                    'post_type' => $post_type,
                                    'posts_per_page' => -1,  //show all posts
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => 'products-category',
                                            'field' => 'slug',
                                            'terms' => $cat->slug,
                                        )
                                    ),
                                    'post__in' => $ids // The array of IDs previously gathered
                                );
                                $posts2 = new WP_Query($args2);
                                if( $posts2->have_posts() ): ?>
                                    <div class="products_wrapper <?php echo $market_term->slug; // State name ?>">
                                        <div class="row" id="productMovement" >
                                            <div class="col-sm-12 productsList">
                                                <h4 style=""><?php echo $cat->name; // City name ?></h4>
                                                <?php while( $posts2->have_posts() ) : $posts2->the_post(); ?>
                                                    <div class="row">
                                                        <div class="col-md-4 col-sm-12">
                                                            <p><?php  echo get_the_title(); ?> <?php if(get_field('product_range')):?> <?php the_field('product_range');?> <?php endif;?></p>
                                                        </div>
                                                        <?php if(get_field('descriptionuses')):?>
                                                            <div class="col-md-8 col-sm-12">
                                                                <?php the_field('descriptionuses');?>
                                                            </div>
                                                        <?php endif;?>
                                                    </div>
                                                <?php endwhile; wp_reset_postdata();?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php get_footer();?>
