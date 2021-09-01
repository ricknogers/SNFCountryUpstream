<?php $counter = 0;  // check if the flexible content field has rows of data ?>
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