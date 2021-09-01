<div class="row fpMarkets">
    <div class="col-sm-12 marketSliderWrapper"  >
        <div class="slider-container">
            <div class="slider-control left inactive"></div>
            <div class="slider-control right"></div>
            <ul class="slider-pagi"></ul>
            <div class="slider">
                <?php
                    $term_list = get_terms(array(
                        'taxonomy' => 'market',
                        'orderby' => 'meta_value_num',
                        'meta_key' => 'order_number',
                        'hide_empty' => 'false',
                        "fields" => "all",

                    ) );?>
                <?php $dataSlide = 0; $counter = 1; ?>
                <?php foreach($term_list as $term_single) :?>
                    <?php $cat_image = get_field('market_featured_image', $term_single); ?>
                    <?php if($term_single->description != null):?>
                        <div class="orange markets-slide markets-slide-<?php echo $dataSlide++;?> <?php if($term_single->current_term >=0) { ?> active<?php } ?>" style="background-image: url( <?php echo $cat_image ;?> )">
                            <div class="slide__bg"></div>
                            <div class="slide__content">
                                <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
                                    <?php $marketColorSelection = get_field('market_color_scheme', 'category_'.$term_single->term_id); ?>
                                    <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" style="fill:<?php echo $marketColorSelection ;?>" />
                                </svg>
                                <div class="slide__text" style="background-color:<?php echo $marketColorSelection ;?>; opacity: .90;height: 100%;">
                                    <div class="counterMarkets">
                                        <?php
                                            $taxonomy = 'market';
                                            $args = array();
                                            $result = wp_count_terms($taxonomy, $args); ?>
                                        <p> <span> <?php echo $counter++;?> </span>  of  <span>  12<?php //echo $result;?> </span> </p>
                                    </div>
                                    <h2 class="slide__text-heading"><?php echo $term_single->name ?></h2>
                                    <p class="slide__text-desc"><?php echo $term_single->description ?></p>
                                    <?php $externalMarketRedirectURL = get_field('market_url_redirect_link', 'category_'.$term_single->term_id); ?>
                                    <?php $internalMarketRedirectURL = get_field('internal_market_url_redirect_link', 'category_'.$term_single->term_id); ?>
                                    <?php if(!empty($internalMarketRedirectURL) && is_front_page()):?>
                                        <a class="slide__text-link "  href="<?php echo $internalMarketRedirectURL ;?>">Learn More</a>
                                    <?php else:?>
                                        <a class="slide__text-link confirmation " target="_blank"  href="<?php echo $externalMarketRedirectURL ;?>">Learn More</a>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>
                    <?php endif;?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<div class="row mobileMarkets">

        <?php
        $mediaTypes = get_terms(array(
            'taxonomy' => 'market',
            'hide_empty' => true,
            'orderby' => 'name',
        ) );
        ?>
        <?php foreach ($mediaTypes as $term) :?>
            <?php $externalMarketRedirectURL = get_field('market_url_redirect_link', 'category_'.$term->term_id); ?>
            <?php $internalMarketRedirectURL = get_field('internal_market_url_redirect_link', 'category_'.$term->term_id); ?>
            <?php if(!empty($internalMarketRedirectURL) && is_front_page()):?>


                    <div class=" icon-checkbox-group <?php echo $term->slug;?>-wrapper">
                        <a class=" "  href="<?php echo $internalMarketRedirectURL ;?>">
                            <label  >
                                <input type="radio" id="<?php echo $term->slug;?>" class="marketing_product_type" name="marketing_product_type"  value="marketingOption-<?php echo $term->slug;?>"/>
                                <div class="filterName"><?php echo $term->name;?></div>
                                <span class="marketingIcon"></span>
                            </label>
                        </a>
                    </div>

            <?php else:?>

                    <div class=" icon-checkbox-group <?php echo $term->slug;?>-wrapper ">
                        <a class=" "  href="<?php echo $externalMarketRedirectURL ;?>">
                            <label  >
                                <input type="radio" id="<?php echo $term->slug;?>" class="marketing_product_type" name="marketing_product_type"  value="marketingOption-<?php echo $term->slug;?>"/>
                                <div class="filterName"><?php echo $term->name;?></div>
                                <span class="marketingIcon"></span>
                            </label>
                        </a>
                    </div>

            <?php endif;?>

        <?php endforeach;?>

</div>