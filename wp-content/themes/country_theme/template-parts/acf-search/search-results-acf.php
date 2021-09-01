<?php
/**
 *
 *
 * Inner Page With ACF Features Loop
 **/
;?>
<?php if( have_rows('inner_page_layouts') ):?>
    <?php // loop through the rows of data ?>
    <?php while ( have_rows('inner_page_layouts') ) : the_row();?>
        <?php if( get_row_layout() == 'picture_text_layout' ):?>
            <?php if( have_rows('picture_text_wrapper') ):?>
                <?php while ( have_rows('picture_text_wrapper') ) : the_row();?>
                    <?php if(get_sub_field('block_title')):?>
                        <h2><?php the_sub_field('block_title');?></h2>
                    <?php endif;?>
                    <?php if(get_sub_field('block_text')):?>
                        <?php the_sub_field('block_text');?>
                    <?php endif;?>
                <?php endwhile; ?>
            <?php endif;?>
        <?php else:?>
            <?php if( get_row_layout() == 'title_text_layout' ):?>
                <?php if( have_rows('title_text_container') ):?>

                    <?php while ( have_rows('title_text_container') ) : the_row();?>
                        <?php if(get_sub_field('content_title')):?>
                            <h2><?php the_sub_field('content_title');?></h2>
                        <?php endif;?>
                        <?php if(get_sub_field('content_block')):?>
                            <?php the_sub_field('content_block');?>
                        <?php endif;?>
                    <?php endwhile; ?>
                <?php endif;?>
            <?php endif;?>
        <?php endif;?>
    <?php endwhile; ?>
<?php endif;?>
<?php
/**
 *
 *
 * Front Page Subsidiary Loop ACF
 **/
;?>
<?php if(have_rows('subsididary_overview')):?>
    <?php while ( have_rows('subsididary_overview') ) : the_row(); ?>
        <?php if( get_row_layout() == 'subsididary_information_blocks' ):?>
            <?php if(get_sub_field('sub_block_title')):?>
                <h2><?php the_sub_field('sub_block_title');?></h2>
            <?php endif;?>
            <?php if(have_rows('subsididary_information_elements')):?>
                <?php while ( have_rows('subsididary_information_elements') ) : the_row(); ?>
                    <?php if(get_sub_field('subsididary_section_title')):?>
                        <h2><?php the_sub_field('subsididary_section_title'); ?></h2>
                    <?php endif;?>
                    <?php if(get_sub_field('subsididary_section_description')):?>
                        <?php the_sub_field('subsididary_section_description');?>
                    <?php endif;?>
                <?php endwhile;?>
            <?php endif;?>
        <?php endif;?>
        <?php if( get_row_layout() == 'content_wysiwyg_section' ):?>
            <?php if(get_sub_field('content_title')):?>
                <h2><?php the_sub_field('content_title');?></h2>
            <?php endif;?>
            <?php if(get_sub_field('content_block')):?>
                <?php the_sub_field('content_block');?>
            <?php endif;?>
        <?php endif;?>
        <?php if( get_row_layout() == 'call_to_action_graphics' ):?>
            <?php if(get_sub_field('call_to_action_title')):?>
                <h2><?php the_sub_field('call_to_action_title');?></h2>
            <?php endif;?>
            <?php if(get_sub_field('call_to_action_description')):?>
                <?php the_sub_field('call_to_action_description');?>
            <?php endif;?>
        <?php endif;?>
    <?php endwhile; ?>
<?php else : ?>
<?php endif;  ?>