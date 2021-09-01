<?php
/**
 * The main template file for the Home Page of the site.
 *
 *
 * @package Childers YMCA
 */

get_header(); ?>
    <div id="call-to-action"></div>
    <div class="container" >
        <div class="row homepage-introBlock">
            <div class="col-sm-12">
                <h2 class="homepage-title"><?php the_title();?></h2>
            </div>
            <div class="col-md-6 col-sm-12 ">

                <p><?php the_content();?></p>
            </div>
            <div class="col-md-6 col-sm-12">
                <section class="videoTabs">
                    <?php $videoUrl = get_field('video_url'); ?>

                    <div class="tab-content">
                        <?php if($videoUrl):?>
                            <div role="tabpanel" class="tab-pane active" id="english-video">
                                <div class="embed-container">
                                    <?php echo $videoUrl;?>
                                </div>
                            </div>
                        <?php endif;?>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <div class="container-fluid homepage-marketsBlock">
        <div class="row" id="marketOverview"  >
            <div class="col-sm-12">
                <h2>Markets</h2>
            </div>
        </div><!--marketOverview-->
        <section>
            <?php get_template_part('template-parts/snf-market-slider');?>
        </section>
    </div>
    <div class="container">
        <section class="homepage-subsidiaryBlock">
            <div class="col-sm-12" id="countryOverview"  >
                <h2>Explore <?php echo get_option('country_name') ;?></h2>
            </div>
            <?php get_template_part('template-parts/homepage-subsidiary-country-block');?>
        </section>
        <section class="homepage-subsidiaryNews">
            <?php get_template_part('template-parts/homepage-subsidiary-news');?>
        </section>
    </div>
<?php get_footer(); ?>