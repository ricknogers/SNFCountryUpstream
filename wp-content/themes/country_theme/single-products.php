<?php get_header();?>
<div class="container">
    <div class="row">
        <div class="col-md-9 col-md-push-3 col-sm-12">
            <?php
                $tradeName = get_field_object('trade_name');
                $application = get_field_object('application');
                $marketAssociation = get_field_object('market_association');
                $productCategory = get_field_object('product_category');
                $descriptionUses = get_field_object('descriptionuses');
                $productRange = get_field_object('product_range');
                $inciName = get_field_object('inci_name');
                $percentActive = get_field_object('%_active');
                $dosagePHRange = get_field_object('recommnded_dosage_&_ph_range');
            ?>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-dark">
                    <caption>
                        <?php if(get_field('descriptionuses')):?>
                            <?php the_field('descriptionuses');?>
                        <?php endif;?>
                    </caption>
                    <tbody>
                        <?php if(get_field('trade_name')):?>
                            <tr>
                                <th scope="col"><?php echo $tradeName['label']; ?></th>
                                <td><?php the_field('trade_name');?></td>
                            </tr>
                        <?php endif;?>
                        <?php if(get_field('application')):?>
                            <tr>
                                <th scope="col"><?php echo $application['label']; ?></th>
                                <td><?php the_field('application');?></td>
                            </tr>
                        <?php endif;?>
                        <?php if(get_field('market_association')):?>
                            <tr>
                                <th scope="col"><?php echo $marketAssociation['label']; ?></th>
                                <td><?php the_field('market_association');?></td>
                            </tr>
                        <?php endif;?>
                        <?php if(get_field('product_category')):?>
                            <tr>
                                <th scope="col"><?php echo $productCategory['label']; ?></th>
                                <td><?php the_field('product_category');?></td>
                            </tr>
                        <?php endif;?>
                        <?php if(get_field('product_range')):?>
                            <tr>
                                <th scope="col"><?php echo $productRange['label']; ?></th>
                                <td><?php the_field('product_range');?></td>
                            </tr>
                        <?php endif;?>
                        <?php if(get_field('inci_name')):?>
                            <tr>
                                <th scope="col"><?php echo $inciName['label']; ?></th>
                                <td><?php the_field('inci_name');?></td>
                            </tr>
                        <?php endif;?>
                        <?php if(get_field('%_active')):?>
                            <tr>
                                <th scope="col"><?php echo $percentActive['label']; ?></th>
                                <td><?php the_field('%_active');?></td>
                            </tr>
                        <?php endif;?>
                        <?php if(get_field('recommnded_dosage_&_ph_range')):?>
                            <tr>
                                <th scope="col"><?php echo $dosagePHRange['label']; ?></th>
                                <td><?php the_field('recommnded_dosage_&_ph_range');?></td>
                            </tr>
                        <?php endif;?>
                    </tbody>
                </table>
            </div><!--table-responsive-->
            <a class="btn btn-sm btn-primary" href="<?php echo home_url('/');?>products">Back to All Products</a>
        </div>
        <aside class="col-md-3 col-md-pull-9 col-sm-12 articlesSideBar" id="sidebar" role="complementary">
            <?php get_sidebar('products'); ?>
        </aside>
    </div>
</div>
<?php get_footer();?>