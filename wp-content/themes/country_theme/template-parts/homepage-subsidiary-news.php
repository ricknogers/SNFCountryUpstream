<div class="newsEvents">
    <div class="col-sm-12 homeNewsWrapper">
        <div class="newsTitleWrapper">
            <h2 class="homeNewsSectionTitle">News & Events</h2>
        </div>
        <?php
        $args = array(
            'post_type' =>  'news',
            'posts_per_page' => 4,
            'order' => 'ASC',
            'orderby' => 'DATE',
        );
        $query = new WP_Query( $args );?>
        <section class="slide-wrapper">
            <div class="containerSlider">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <div class="col-sm-12">
                        <ol class="carousel-indicators">
                            <?php if ( $query->have_posts() ) : ?>
                                <?php $counter = 0;?>
                                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                                    <!-- Indicators -->
                                    <li data-target="#myCarousel" data-slide-to="<?php echo $counter ?>" class=" <?php if ($counter === 0):?> active <?php endif;?>"></li>
                                    <?php $counter++; ?>
                                <?php endwhile;  ?>
                            <?php endif; wp_reset_postdata();?>
                        </ol>
                    </div>
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <?php
                        $args = array(
                            'post_type' =>  'news',
                            'posts_per_page' => 4,
                            'order' => 'DESV',
                            'orderby' => 'DATE',
                        );
                        $query = new WP_Query( $args );?>
                        <?php if($query->have_posts()) : ?>
                            <?php $counter = 0;?>
                            <?php while($query->have_posts()) : $query->the_post() ?>
                                <div class="carousel-item <?php if ($counter === 0):?> active <?php endif;?>">
                                    <div class="fill row" >
                                        <div class="fillContent col-lg-6 col-sm-12">
                                            <h2><?php the_title();?></h2>
                                            <p><?php echo wp_trim_words( get_the_content(), 40, '...' );?> <br><br></p>
                                            <?php if(get_field('news_url_change')):?>
                                                <a href="<?php the_field('news_url_change');?>">
                                                    <button class="homeNewsButton bnt-lg">Read More</button>
                                                </a>
                                            <?php else:?>
                                                <a href="<?php the_permalink();?>">
                                                    <button class="homeNewsButton bnt-lg">Read More</button>
                                                </a>
                                            <?php endif;?>
                                        </div>
                                        <?php if(has_post_thumbnail()):?>
                                            <div class="fillImage col-lg-6 col-sm-12" style="background-image: url(<?php echo the_post_thumbnail_url("full") ;?>);">
                                                <span class="news-type">
                                                    <?php  the_category(); ?>
                                                </span>
                                            </div>
                                        <?php else:?>
                                            <div class="fillImage col-lg-6 col-sm-12" style="background-image:url(<?php bloginfo('template_directory'); ?>/images/news/news_fallback_<?php echo rand(1, 4); ?>.jpg);">
                                                <span class="news-type">
                                                    <?php  the_category(); ?>
                                                </span>
                                            </div>
                                        <?php endif;?>
                                    </div>
                                </div>
                            <?php $counter++; ?>
                        <?php endwhile; wp_reset_postdata(); ?>
                    <?php endif;?>
                </div>
            </div>
        </section>
        <div class="col-sm-12 text-center">
            <a style="" href="<?php echo home_url( '/' ); ?>news">
                <button class="homeNewsButton bnt-lg "> View All News Articles</button>
            </a>
        </div>
    </div><!--homeNewsWrapper-->
</div>
<script>

</script>