<?php $count = 0; ?>
<?php if(have_rows('subsididary_overview')):?>
    <?php while ( have_rows('subsididary_overview') ) : the_row(); ?>
        <!------------------------- Call to Action Text on Image ------------------------->
        <?php if( get_row_layout() == 'call_to_action_graphics' ):?>
            <?php if ($count === 0) :?>
                <section class="marketsCTActionWrapper <?php echo $count;?>" >
                    <div class="cta-card card">
                        <div class="row">
                            <div class="col-md-7 col-sm-12">
                                <section class="cta-card-content-wrapper">
                                    <div class="cta-card-title">
                                        <?php if(get_sub_field('call_to_action_title')):?>
                                            <h2><?php the_sub_field('call_to_action_title');?></h2>
                                        <?php endif;?>
                                    </div>
                                    <div class="cta-card-content">
                                        <?php if(get_sub_field('call_to_action_description')):?>
                                            <?php the_sub_field('call_to_action_description');?>
                                        <?php endif;?>
                                    </div>
                                    <div class="cta-card-button">
                                        <?php if(get_sub_field('call_to_action_button_text')):?>
                                            <a href="<?php the_sub_field('call_to_action_button_link');?>">
                                                <button class="btn-default cta-card-button" style="background-color:#002d73; border:none;">
                                                    <?php the_sub_field('call_to_action_button_text');?>
                                                </button>
                                            </a>
                                        <?php endif;?>
                                    </div>
                                </section>
                            </div><!-- col-md-7-->
                            <div class="col-md-5 col-sm-12 cta-background-wrapper">
                                <a href="<?php the_sub_field('call_to_action_button_link');?>">
                                    <div class="cta-card-background" style="background-image: url(<?php the_sub_field("call_to_action_background_image") ;?>);">
                                    </div>
                                </a>
                            </div>
                        </div><!--row-->
                    </div><!--cta-card-->
                </section>
            <?php else:?>
                <?php if ($count === 1) :?>
                    <section class="marketsCTActionWrapper layoutTallOne <?php echo $count;?>" >
                        <div class="col-md-6 col-sm-12 " id="card-cta-textRight">
                            <div class="card card-default">
                                <div class="card-body-market col-md-6 col-sm-12">
                                    <div class="card-header">
                                        <?php if(get_sub_field('call_to_action_title')):?>
                                            <h2><?php the_sub_field('call_to_action_title');?></h2>
                                        <?php endif;?>
                                    </div>
                                    <div class="card-right col-md-12 col-sm-12">
                                        <a href="<?php the_sub_field('call_to_action_button_link');?>">
                                            <?php if( get_sub_field('call_to_action_background_image') ): ?>
                                                <div class="cta-card-background-right" style="background-image: url(<?php the_sub_field("call_to_action_background_image") ;?>);">
                                                </div>
                                            <?php endif; ?>
                                        </a>
                                    </div>
                                    <div class="card-content col-md-12  col-sm-12">
                                        <div class="card-body-content ">
                                            <?php if(get_sub_field('call_to_action_description')):?>
                                                <?php the_sub_field('call_to_action_description');?>
                                            <?php endif;?>
                                        </div>
                                        <div class="cta-card-button">
                                            <?php if(get_sub_field('call_to_action_button_text')):?>
                                                <a href="<?php the_sub_field('call_to_action_button_link');?>">
                                                    <button class="btn-default cta-card-button" style="background-color:<?php the_sub_field('button_color');?>">
                                                        <?php the_sub_field('call_to_action_button_text');?>
                                                    </button>
                                                </a>
                                            <?php endif;?>
                                        </div>
                                    </div><!-- card-content-->
                                </div>
                            </div>
                        </div>
                    </section>
                <?php else:?>
                    <?php if($count === 2):?>
                        <section class="marketsCTActionWrapper layoutTallOne-Two <?php echo $count;?>" >
                            <div class="col-md-6 col-sm-12  " id="card-cta-textLeft">
                                <div class="card card-default">
                                    <div class="card-body-market col-md-6 col-sm-12">
                                        <div class="card-header">
                                            <?php if(get_sub_field('call_to_action_title')):?>
                                                <h2><?php the_sub_field('call_to_action_title');?></h2>
                                            <?php endif;?>
                                        </div>
                                        <div class="card-right col-md-12 col-sm-12">
                                            <a href="<?php the_sub_field('call_to_action_button_link');?>">
                                                <?php if( get_sub_field('call_to_action_background_image') ): ?>
                                                    <div class="cta-card-background-right" style="background-image: url(<?php the_sub_field("call_to_action_background_image") ;?>);">
                                                    </div>
                                                <?php endif; ?>
                                            </a>
                                        </div>
                                        <div class="card-content col-md-12 col-sm-12">
                                            <div class="card-body-content ">
                                                <?php if(get_sub_field('call_to_action_description')):?>
                                                    <?php the_sub_field('call_to_action_description');?>
                                                <?php endif;?>
                                            </div>
                                            <div class="cta-card-button">
                                                <?php if(get_sub_field('call_to_action_button_text')):?>
                                                    <a href="<?php the_sub_field('call_to_action_button_link');?>">
                                                        <button class="btn-default cta-card-button" style="background-color:<?php the_sub_field('button_color');?>">
                                                            <?php the_sub_field('call_to_action_button_text');?>
                                                        </button>
                                                    </a>
                                                <?php endif;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    <?php endif;?>
                <?php endif;?>
                <?php if($count == 3):?>
                    <section class="col-sm-12 marketsCTActionWrapper addon-cta" >
                        <div class="cta-card card card-addon" style="background-color:<?php the_sub_field('call_to_action_overlay_color');?>" >
                            <div class="row">
                                <div class="col-md-3  col-sm-12 cta-background-wrapper">
                                    <a href="<?php the_sub_field('call_to_action_button_link');?>">
                                        <img src="<?php the_sub_field('call_to_action_background_image');?>" class="img-responsive" />
                                    </a>
                                </div>
                                <div class="col-md-9  col-sm-12">
                                    <section class="cta-card-content-wrapper">
                                        <div class="cta-card-title">
                                            <?php if(get_sub_field('call_to_action_title')):?>
                                                <h2><?php the_sub_field('call_to_action_title');?></h2>
                                            <?php endif;?>
                                        </div>
                                        <div class="cta-card-content-addon">
                                            <?php if(get_sub_field('call_to_action_description')):?>
                                                <?php the_sub_field('call_to_action_description');?>
                                            <?php endif;?>
                                        </div>
                                        <div class="cta-card-button">
                                            <?php if(get_sub_field('call_to_action_button_text')):?>
                                                <a href="<?php the_sub_field('call_to_action_button_link');?>">
                                                    <button class="btn-default cta-card-button" style="background-color:<?php the_sub_field('button_color');?>; border:none;">
                                                        <?php the_sub_field('call_to_action_button_text');?>
                                                    </button>
                                                </a>
                                            <?php endif;?>
                                        </div>
                                    </section>
                                </div><!-- col-md-7-->
                            </div><!--row-->
                        </div><!--cta-card-->
                    </section>
                <?php else:?>
                <?php endif;?>
            <?php endif;?>
        <?php endif;?>
        <?php $count++; ?>
        <!------------------End of Call to Action Text on Image ------------------------->
        <!------------------------- subsididary_information_blocks ------------------------->
        <?php $counter = 0; ?>
        <?php if( get_row_layout() == 'subsididary_information_blocks' ):?>
            <div class="row">
                <div class="col-sm-12">
                    <?php if(get_sub_field('sub_block_title')):?>
                        <h2><?php the_sub_field('sub_block_title');?></h2>
                    <?php endif;?>
                </div>
            </div>
            <?php if(have_rows('subsididary_information_elements')):?>

                    <?php while ( have_rows('subsididary_information_elements') ) : the_row(); ?>
                        <?php if ($counter % 3 === 0) :?>
                            <div class="row subsidiaryItem">
                                <div class="col-md-6 order-md-2   col-sm-12 subsidiaryItemContent">
                                    <div class=" subsidiaryItemGraphic">
                                        <div class="subsidiaryGraphic" style="background-image: url('<?php the_sub_field('subsididary_section_image'); ?>')"></div>
                                    </div>
                                </div>
                                <div class="col-md-6 order-md-1 col-sm-12 subsidiaryItemContent">
                                    <?php if(get_sub_field('subsididary_section_title')):?>
                                        <h2><?php the_sub_field('subsididary_section_title'); ?></h2>
                                    <?php endif;?>
                                    <?php if(get_sub_field('subsididary_secondary_title')):?>
                                        <h3><?php the_sub_field('subsididary_secondary_title');?></h3>
                                    <?php endif;?>
                                    <div class="subsidiaryItemContent">
                                        <?php if(get_sub_field('subsididary_section_description')):?>
                                            <?php the_sub_field('subsididary_section_description');?>
                                        <?php endif;?>
                                        <?php if(get_sub_field('subsididary_section_page_link')):?>
                                            <a href="<?php the_sub_field('subsididary_section_page_link');?>">
                                                <button class="subsidiary-url-btn">
                                                    Read More
                                                </button>
                                            </a>
                                        <?php endif;?>
                                    </div>
                                </div>
                            </div>
                        <?php else:?>
                            <div class="row subsidiaryItem">
                                <div class="col-md-6 order-md-1   col-sm-12 subsidiaryItemContent">
                                    <div class=" subsidiaryItemGraphic">
                                        <div class="subsidiaryGraphic" style="background-image: url('<?php the_sub_field('subsididary_section_image'); ?>')"></div>
                                    </div>
                                </div>
                                <div class="col-md-6 order-md-2 col-sm-12 subsidiaryItemContent">
                                    <?php if(get_sub_field('subsididary_section_title')):?>
                                        <h2><?php the_sub_field('subsididary_section_title'); ?></h2>
                                    <?php endif;?>
                                    <?php if(get_sub_field('subsididary_secondary_title')):?>
                                        <h3><?php the_sub_field('subsididary_secondary_title');?></h3>
                                    <?php endif;?>
                                    <div class="subsidiaryItemContent">
                                        <?php if(get_sub_field('subsididary_section_description')):?>
                                            <?php the_sub_field('subsididary_section_description');?>
                                        <?php endif;?>
                                        <?php if(get_sub_field('subsididary_section_page_link')):?>
                                            <a href="<?php the_sub_field('subsididary_section_page_link');?>">
                                                <button class="subsidiary-url-btn">
                                                    Read More
                                                </button>
                                            </a>
                                        <?php endif;?>
                                    </div>
                                </div>
                            </div>
                        <?php endif;  ?>
                        <?php $counter++; ?>
                    <?php endwhile;?>

            <?php endif;?>
        <?php endif;?>
        <!------------------------------------ End of subsididary_information_blocks ------------------------------------------->
        <!------------------------- WYSIWYG Content ------------------------->
        <?php if( get_row_layout() == 'content_wysiwyg_section' ):?>
            <div class="row">
                <div class="col-sm-12 sectionTitle">
                    <?php if(get_sub_field('content_title')):?>
                        <h2><?php the_sub_field('content_title');?></h2>
                    <?php endif;?>
                </div>
                <div class="col-sm-12">
                    <?php if(get_sub_field('content_block')):?>
                        <?php the_sub_field('content_block');?>
                    <?php endif;?>
                </div>
            </div>
        <?php endif;?>
        <!------------------------- WYSIWYG Content ------------------------->
    <?php endwhile; ?>
<?php else : ?>
<?php endif;  ?>