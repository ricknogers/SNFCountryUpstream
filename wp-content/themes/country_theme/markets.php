<?php
/**
 * Template Name: Markets
 *
@SNF Product
 */

get_header(); ?>
    <div class="container desktopCountryLayout">
        <?php if(get_field('secondary_title')):?>
            <div class="row ">
                <div class="col-sm-12 animated ">
                    <div class="secondaryTitleInner">
                        <h2><?php the_field('secondary_title');?></h2>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 innerContent  ">
                            <?php the_content();?>
                        </div>
                    </div>
                </div>
            </div><!--row-->
        <?php endif;?>
        <div class=" " style="margin:10px 0;">
            <?php
            $numOfCols = 3;
            $rowCount = 0;
            $bootstrapColWidth = 12 / $numOfCols;
            $term_list = get_terms( array(
                'taxonomy' => 'market',
                'orderby' => 'meta_value_num',
                'meta_key' => 'order_number',
                'hide_empty' => 'false',
                "fields" => "all",
            ) );?>
            <?php foreach($term_list as $term_single) :?>
                <?php if($term_single->description != null):?>
                    <?php if($rowCount % $numOfCols == 0  ) { ?> <div class="row"> <?php } $rowCount++;  ?>
                    <?php $termLink = get_field('market_redirect_link', $term_single); ?>
                    <?php $cat_image = get_field('market_featured_image', $term_single); ?>
                    <div class="col-md-<?php echo $bootstrapColWidth;?> col-sm-12 markets-container">
                        <figure class="marketItem" id="<?php echo $term_single->slug ?>">
                            <div class="marketImage" style="background-image: url( <?php echo $cat_image ;?> )"></div>
                            <figcaption>
                                <h2 ><?php echo $term_single->name ?></h2>
                                <p><?php echo $term_single->description;?></p>
                                <?php $externalMarketRedirectURL = get_field('market_url_redirect_link', 'category_'.$term_single->term_id); ?>
                                <?php $internalMarketRedirectURL = get_field('internal_market_url_redirect_link', 'category_'.$term_single->term_id); ?>
                                <?php if(!empty($internalMarketRedirectURL) ):?>
                                    <a class=" "  href="<?php echo $internalMarketRedirectURL ;?>"> </a>
                                <?php else:?>
                                    <a class="confirmation " target="_blank"  href="<?php echo $externalMarketRedirectURL ;?>"> </a>
                                <?php endif;?>


                            </figcaption>
                        </figure>
                        <h4 class="text-center"><?php echo $term_single->name ?></h4>
                    </div>
                    <?php if($rowCount % $numOfCols == 0) { ?> </div> <?php }  ?>
                <?php endif;?>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="container-fluid mobileCountryLayout">
        <div class="row">
            <div class="col-xs-5" style="padding-left:0">
                <?php
                $term_list = get_terms( array(
                    'taxonomy' => 'market',
                    'orderby' => 'meta_value_num',
                    'meta_key' => 'order_number',
                    'hide_empty' => 'false',
                    "fields" => "all",
                ) );?>
                <!-- Tabs nav -->
                <ul class="nav nav-tabs" role="tablist">
                    <?php $count = 0;?>
                    <?php foreach($term_list as $term_single): $count ++; ?>
                        <li role="presentation" class="<?php if($count == 1) { ?> active<?php } ?> nav-link ">
                            <a href="#home-<?php echo $term_single->slug ?>-tab" aria-controls="home" role="tab" data-toggle="tab"><?php echo $term_single->name ?></a>
                        </li>
                    <?php endforeach;?>
                </ul>
            </div>
            <div class="col-xs-7" style="padding-right:0">
                <!-- Tabs content -->
                <div class="tab-content" id="v-pills-tabContent">
                    <?php
                    $term_list = get_terms( array(
                        'taxonomy' => 'market',
                        'orderby' => 'meta_value_num',
                        'meta_key' => 'order_number',
                        'hide_empty' => 'false',
                        "fields" => "all",
                    ) );?>
                    <?php $count = 0;?>
                    <?php foreach($term_list as $term_single): $count ++; ?>
                        <?php if($term_single->description != null):?>
                            <div role="tabpanel" class="shadow tab-pane <?php if($count == 1) { ?> active<?php } ?>" id="home-<?php echo $term_single->slug ?>-tab">
                                <?php $cat_image = get_field('market_featured_image', $term_single); ?>
                                <div class="card">
                                    <img src="<?php echo $cat_image; ?>" alt="SNF serves many markets and  <?php echo $term_single->name;?> is just one " loading="lazy" class="img-responsive" style="height:auto; max-width:100%;" />
                                    <div class="card-content-">
                                        <h4 class="font-italic mb-4"><?php echo $term_single->name ?></h4>
                                        <p class="font-italic text-muted mb-2"><?php echo $term_single->description;?></p>
                                        <?php $marketRedirectURL = get_field('market_url_redirect_link', 'category_'.$term_single->term_id); ?>
                                        <a class="" href="<?php echo $marketRedirectURL ;?>">Learn More</a>
                                    </div>
                                </div>
                            </div>
                        <?php else:?>
                        <?php endif;?>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
<?php get_footer();?>