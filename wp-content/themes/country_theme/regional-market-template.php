<?php
/**
 * Template Name: Regional Market Template
 *

 */

get_header();?>
<div class="container">
    <div class="row">
        <div class="col-md-9 col-sm-12">
            <div class="row">

                <div class="col-sm-12">
                    <?php the_content();?>
                </div>
                <div class="col-sm-12 innerpage-layout">
                    <?php $counter = 0;  // check if the flexible content field has rows of data ?>
                    <?php if( have_rows('inner_page_layouts') ):?>
                        <?php // loop through the rows of data ?>
                        <?php while ( have_rows('inner_page_layouts') ) : the_row();?>
                            <?php // check current row layout ?>
                            <?php if( get_row_layout() == 'picture_text_layout' ):?>
                                <section class="contentBlockSeperator">
                                    <?php // check if the nested repeater field has rows of data ?>
                                    <?php if( have_rows('picture_text_wrapper') ):?>
                                        <?php // loop through the rows of data ?>
                                        <?php while ( have_rows('picture_text_wrapper') ) : the_row();?>
                                            <?php if ($counter % 2 === 0) :?>
                                                <div class="row pictureTextWrapper" >
                                                    <div class="col-md-6  col-xs-12 ">
                                                        <div class="pictureTextBlockImage" style="background-image: url(<?php the_sub_field('block_picture')?>)"></div>
                                                    </div>
                                                    <div class="col-md-6 col-xs-12  pictureTextContent">
                                                        <?php if(get_sub_field('block_title')):?>
                                                            <h2><?php the_sub_field('block_title');?></h2>
                                                        <?php endif;?>
                                                        <?php if(get_sub_field('block_text')):?>
                                                            <?php the_sub_field('block_text');?>
                                                        <?php endif;?>
                                                    </div>
                                                </div>
                                            <?php else:?>
                                                <div class="row pictureTextWrapper" >
                                                    <div class="col-md-6  order-md-2  col-xs-12 ">
                                                        <div class="pictureTextBlockImage" style="background-image: url(<?php the_sub_field('block_picture')?>)"></div>
                                                    </div>
                                                    <div class="col-md-6 order-md-1  col-xs-12  pictureTextContent">
                                                        <?php if(get_sub_field('block_title')):?>
                                                            <h2><?php the_sub_field('block_title');?></h2>
                                                        <?php endif;?>
                                                        <?php if(get_sub_field('block_text')):?>
                                                            <?php the_sub_field('block_text');?>
                                                        <?php endif;?>
                                                    </div>
                                                </div>
                                            <?php endif;?>
                                            <?php $counter++; ?>
                                        <?php endwhile; ?>
                                    <?php endif;?>
                                </section>
                            <?php else:?>
                                <?php if( get_row_layout() == 'title_text_layout' ):?>
                                    <section class="contentBlockSeperator">
                                        <?php if( have_rows('title_text_container') ):?>
                                            <?php // loop through the rows of data ?>
                                            <?php while ( have_rows('title_text_container') ) : the_row();?>
                                                <div class="row titleTextWrapper">
                                                    <div class="col-sm-12">
                                                        <?php if(get_sub_field('content_title')):?>
                                                            <h2><?php the_sub_field('content_title');?></h2>
                                                        <?php endif;?>
                                                        <?php if(get_sub_field('content_block')):?>
                                                            <?php the_sub_field('content_block');?>
                                                        <?php endif;?>
                                                    </div>
                                                </div>
                                            <?php endwhile; ?>
                                        <?php endif;?>
                                    </section>
                                <?php endif;?>
                                <?php if( get_row_layout() == 'accordion_layout' ):?>
                                    <?php $accord_count = 0; $Acc_ID = uniqid(); ?>
                                    <section class="contentBlockSeperator" id="accordion">
                                        <?php if(get_sub_field('accordion_section_title')):?>
                                            <div class="row">
                                                <div class="col text-center accordionSectionTitle">
                                                    <h2><?php the_sub_field('accordion_section_title');?></h2>
                                                </div>
                                            </div>
                                        <?php endif;?>
                                        <?php if( have_rows('accordion_wrapper') ): ?>
                                            <?php  $row_count = 0; $accord_count++;?>
                                            <div class="accordion" id="accordion_<?php echo $Acc_ID; ?>">
                                                <?php while ( have_rows('accordion_wrapper') ) : the_row(); $row_count++; ?>
                                                    <div class="panel panel-default card" id="innerAccordion">
                                                        <div class="panel-heading  card-header" id="heading_<?php echo get_row_index(); ?>_<?php echo $Acc_ID; ?>">
                                                            <h2 class="panel-title">
                                                                <a class="collapsed" data-toggle="collapse" data-target="#collapse_<?php echo get_row_index(); ?>_<?php echo $Acc_ID; ?>" aria-expanded="true" aria-controls="collapse_<?php echo get_row_index(); ?>_<?php echo $Acc_ID; ?>">
                                                                    <?php the_sub_field('accordion_title'); ?>
                                                                </a>

                                                            </h2>
                                                        </div>
                                                        <div id="collapse_<?php echo get_row_index(); ?>_<?php echo $Acc_ID; ?>" class="collapse" aria-labelledby="heading_<?php echo get_row_index(); ?>_<?php echo $Acc_ID; ?>" data-parent="#accordion_<?php echo $Acc_ID; ?>">
                                                            <div class="card-body">
                                                                <?php the_sub_field('accordion_content'); ?>
                                                            </div>
                                                        </div>
                                                    </div>

                                                <?php  endwhile; ?>

                                            </div><!--#accordion-->
                                        <?php endif;?>
                                    </section>
                                <?php endif;?>
                            <?php endif;?>
                        <?php endwhile; ?>
                    <?php endif;?>
                </div><!--innerpage-layout-->
            </div>
        </div>
        <div class="col-md-3 col-sm-12">
            <div class="sticky-top backToGlobalMarketSite">
                <div class="col-sm-12" style="padding:0;">
                    <div id="side-nav-market">


                            <?php
                            if ($post->post_parent)  {
                                $ancestors=get_post_ancestors($post->ID);
                                $root=count($ancestors)-1;
                                $parent = $ancestors[$root];
                            } else {
                                $parent = $post->ID;
                            }
                            $children = wp_list_pages("title_li=&child_of=". $parent ."&echo=0");

                            if ($children) { ?>
                                <ul class="list-group">
                                    <?php echo $children; ?>
                                </ul>
                            <?php } ?>

                    </div>
                </div>
                <div class=" card  ">
                    <?php if( (has_term('', 'market') && !(is_page('markets') || is_front_page())) ):?>
                        <div class="globalMarketCTA  ">
                            <?php
                            $term_list = get_terms( array(
                                'taxonomy' => 'market',
                                'orderby' => 'meta_value_num',
                                'meta_key' => 'order_number',
                                'hide_empty' => 'false',
                                "fields" => "all",
                            ) );?>
                            <?php foreach($term_list as $term_single) :?>
                                <?php if ( has_term( $term_single->term_id, 'market')) :?>
                                    <?php $cat_image = get_field('market_featured_image', $term_single); ?>
                                    <img src="<?php echo $cat_image; ?>" class="img-fluid" />
                                    <div class="card-body">
                                        <h5 class="card-title">View SNF <?php echo $term_single->name;?> Global Site</h5>
                                        <?php $marketRedirectURL = get_field('market_url_redirect_link', 'category_'.$term_single->term_id); ?>
                                        <a class="marketFooterGlobalLink confirmation" href="<?php echo $marketRedirectURL ;?>">
                                            <button class="btn-default btn-small "> Go to SNF <?php echo $term_single->name;?> </button>
                                        </a>
                                    </div>
                                <?php endif;?>
                            <?php endforeach; ?>
                        </div><!--globalMarketCTA-->
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer();?>