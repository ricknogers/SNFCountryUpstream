<?php
$format_in = 'Ymd'; // the format your value is saved in (set in the field options)
$format_out = 'Y-m-d';
$expire_date = DateTime::createFromFormat($format_in, get_field('date_for_notification_to_expire'));
$current_date = date('Y-m-d');
?>
<?php if(is_front_page()):?>
<?php if($current_date <   $expire_date->format( $format_out )  ):?>

        <?php if(get_field('do_you_need_a_pop_up_notification')):?>
            <div id="notification-slide-down" >
                <?php if( have_rows('notification_context') ): ?>
                    <?php while( have_rows('notification_context') ): the_row();?>
                        <div id="banner-notification-wrapper" class="fade-in one" style="background-color:<?php the_sub_field('notification_background_color');?>">
                            <div class="container">
                                <div id="banner-notification-content">
                                    <a href="<?php the_sub_field('notification_button_link');?>" target="_blank">
                                        <?php if(get_sub_field('notification_title')):?>
                                            <h2><?php the_sub_field('notification_title');?></h2>
                                        <?php endif;?>
                                        <?php if(get_sub_field('notification_content')):?>
                                            <?php the_sub_field('notification_content');?>
                                        <?php endif;?>
                                    </a>
                                    <div class="text-center " style="margin:1% 0;">
                                        <a class="btn-sm pop-up-button" href="<?php the_sub_field('notification_button_link');?>" target="_blank">
                                            <?php if(get_sub_field('notification_button')):?>
                                                <?php the_sub_field('notification_button');?>
                                            <?php endif;?>
                                        </a>
                                    </div>
                                </div><!-- banner-notification-content-->

                                <div id="content-close">
                                    <button type="button" class="close" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div><!--content-close-->
                            </div>
                        </div><!--banner-notification-wrapper-->
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <script>
            (function($, window){
                $(document).ready(function(){
                    $("#content-close").click(function(){
                        document.getElementById("notification-slide-down").style.display = 'none';
                    });
                    $('#notification-slide-down').addClass('active');
                });
            })(jQuery, window);
        </script>
    <?php else:?>
    <?php endif; ?>

<?php endif; ?>
