<?php
/**
 * For display side bar content
 *
 * @package SNF Subsidiary
 */
?>
    <aside class=" list-group newsSideBar">
        <h3 class="sidebarTitle">Similar Products:</h3>
        <?php
        if ( function_exists( 'get_related_posts' ) ) {
            $related_posts = get_related_posts( 'market', array( 'posts_per_page' => -1) );
            if ( $related_posts ) {
                foreach ( $related_posts as $post ) {
                    setup_postdata( $post );?>
                    <ul class="list-group">
                        <li class='list-group-item'>
                            <a href="<?php the_permalink()?>">
                                <?php if(get_field('trade_name')):?>
                                    <?php the_field('trade_name');?>
                                <?php endif;?>
                            </a>
                        </li>
                    </ul>
                <?php  }
                wp_reset_postdata();
            }
        }?>
    </aside><!--newsSideBar-->