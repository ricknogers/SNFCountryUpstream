<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Childers YMCA
 */

get_header(); ?>
<div class="container" id="search-container">
    <div class="row">
        <div class="col-md-12 col-sm-12 search-results-container">
            <div class="" id="numeric-results">
                <div class=" pag-container">
                    <div class="row">
                        <div class="col-md-9 col-sm-12 searchQueryTitle ">
                            <h2>Search Results for: <?php echo get_search_query();?></h2>
                        </div>
                        <div class="col-md-3 col-sm-12 results-numbered-output">
                            <?php
                            $first_post = $wp_query->post_count;
                            $last_post = $first_post + $wp_query->post_count;
                            $all_posts = $wp_query->found_posts;
                            ?>
                            <p class="small text-uppercase">Showing <?php echo $first_post ?> of <strong><?php echo $all_posts; ?> results</strong></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12" >
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <?php if (  in_array( get_post_type(), array( 'post', 'news', 'products', 'page', 'locations' ) ) )  { ?>
                            <div class="row single-result" style="">
                                <div class="single-result-wrapper">
                                    <div class="col-sm-12 card service-card">
                                        <div class="card-block ">
                                            <a  href="<?php the_permalink(); ?>" title="View">
                                                <h5 class="mt-0"><?php the_title(); ?></h5>
                                                <?php
                                                    if (has_excerpt() ){
                                                        the_excerpt();
                                                    } else {
                                                        echo custom_field_excerpt();;
                                                    }?>
                                                <span class="search-post-link"><a href="<?php the_permalink(); ?>"><?php the_permalink(); ?></a></span>
                                            </a>
                                        </div><!--card-block-->
                                    </div><!--service-card-->
                                </div><!--single-result-wrapper-->
                            </div><!--single-result-->
                        <?php } ?>
                    <?php endwhile; wp_reset_query(); else: ?>
                        <p>Sorry, no posts matched your criteria.</p>
                        <div class="col-xs-12">
                            <?php get_search_form();?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class=" col-sm-12 pagination-wrapper">
                    <?php echo bootstrap_pagination(); ?>
                </div>
            </div>
            <div class="row">
                <div class=" col-sm-12 reSearch">
                    <?php get_search_form();?>
                </div>
            </div>
        </div><!--search-results-container-->
    </div>
</div>
<?php get_footer(); ?>
