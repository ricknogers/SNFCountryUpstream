
<div class="container">
    <?php if(has_post_thumbnail() && !( is_search() || is_archive() || is_single())):?>
        <div class="row">
            <div class="col inner-banner-image X" style="background-image: url(<?php echo the_post_thumbnail_url("full") ;?>)"></div>
        </div>
        <div class="row">
            <div class="col pageTitleOverlay">
                <h1><?php the_title();?></h1>
            </div>
        </div>

        <div class="row">
            <div class="col breadCrumbsWrapper">
                <?php if (function_exists('the_breadcrumb')) the_breadcrumb(); ?>
            </div>
        </div>
    <?php else:?>
        <?php if(is_404()):?>
            <?php if(is_404()):?>
                <div class="col oops-title" >
                    <h1><?php the_title();?></h1>
                </div>


            <?php endif;?>
            <?php if(is_search()):?>
                <?php
                $search=get_search_query();
                global $wp_query;
                global $post;
                ?><?php if ( have_posts() && ($search != null || is_search()) || $post->post_content != '' ) :?>
                    <section class="search-results-form " >
                        <form role="search" method="get" id="searchform-results" action="<?php echo home_url( '/' ); ?>">
                            <div class="form-group">
                                <div class="input-group">
                                    <button id="search_submit" value="" type="submit">
                                        <i class="fa fa-search" ></i>
                                    </button>
                                    <input type="text" placeholder="Search for pages, news, products or locations" value="<?php if( is_search() ){ echo get_search_query(); } else { _e('Search'); } ?>" name="s" id="s"
                                           onfocus="if(this.value == '<?php _e('Search'); ?>'){ this.value = ''; }"
                                           onblur="if(this.value == ''){ this.value = '<?php _e('Search'); ?>'; }"
                                    />
                                </div>
                            </div>
                        </form>
                    </section>
                <?php endif; wp_reset_query()?>


            <?php endif;?>
        <?php else:?>
            <?php if((is_page() && !has_post_thumbnail()  ) ):?>
                <div class="row">
                    <div class="col inner-banner-image " style="background-image:url(<?php bloginfo('template_directory'); ?>/images/default-banner/fallback-innerpage-banner_<?php echo rand(1, 6); ?>.jpg);"></div>
                </div>
                <div class="row">
                    <div class="col pageTitleOverlay na">
                        <h1><?php the_title();?></h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col breadCrumbsWrapper" >
                        <?php if (function_exists('the_breadcrumb')) the_breadcrumb(); ?>
                    </div>
                </div>
            <?php endif;?>
            <?php if(is_archive() || is_category() ):?>
                <div class="row">
                    <div class="col inner-banner-image" style="background-image:url(<?php bloginfo('template_directory'); ?>/images/default-banner/fallback-innerpage-banner_<?php echo rand(1, 6); ?>.jpg);">
                    </div>
                </div>
                <div class="row">
                    <div class="col pageTitleOverlay">
                        <?php get_template_part('template-parts/archive-headers');?>
                    </div>
                </div>
                <div class="row">
                    <div class="col breadCrumbsWrapper" >
                        <?php if (function_exists('the_breadcrumb')) the_breadcrumb(); ?>
                    </div>
                </div>
            <?php endif;?>
            <?php if(is_single()):?>
                <div class="row">
                    <div class="col inner-banner-image " style="background-image:url(<?php bloginfo('template_directory'); ?>/images/CraterLakeHeroImage.jpg);"></div>
                </div>
                <div class="row">
                    <div class="col pageTitleOverlay ">
                        <h1><?php the_title();?></h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col breadCrumbsWrapper" >
                        <?php if (function_exists('the_breadcrumb')) the_breadcrumb(); ?>
                    </div>
                </div>
            <?php endif;?>
        <?php endif;?>
    <?php endif;?>
</div>