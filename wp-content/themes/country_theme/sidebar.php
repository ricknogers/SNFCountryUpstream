<?php
/**
 * For display side bar content
 *
 * @package SNF Subsidiary
 */
?>
<aside class=" list-group newsSideBar">
    <h3 class="sidebarTitle">You May Also Like:</h3>
    <?php $popular = new WP_Query(array('post_type' => 'news', 'posts_per_page'=>4, 'meta_key'=>'popular_posts', 'orderby'=>'meta_value_num', 'order'=>'DESC')); ?>
    <?php while ($popular->have_posts()) : $popular->the_post(); ?>
    <ul class="list-group">
        <li class='list-group-item'>
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </li>
        <?php endwhile; wp_reset_postdata(); ?>
    </ul>
</aside><!--newsSideBar-->