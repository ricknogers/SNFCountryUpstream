<!--<a class="countryModal btn-open-modal" role="button" data-toggle="modal" data-target="#myCountryListModal">Country List</a>-->
<a class="countryModal btn-open-modal" role="button" data-toggle="modal" data-target="#myCountryListModalMobile">Locations</a>
<!-- Modal Fullscreen xl -->
<div class="modal countryModalContent bd-example-modal-xl show" id="myCountryListModalMobile" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="myCountryListModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">SNF Regional Subsidiaries</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                $country = isset($_GET['country']) ? $_GET['country'] : null ;
                $continent =  isset($_GET['zone']) ? $_GET['zone'] : null ;
                $facilityType = isset($_GET['facility_type']) ? $_GET['facility_type'] : null ;
                $args = [
                    'post_type'   => 'locations',
                    'meta_key' => 'country',
                    'orderby' => 'country',
                    'order' => 'ASC',
                    'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
                    'posts_per_page' => -1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'facility_type',
                            'field'    => 'slug',
                            'terms'    => array( 'sales', 'production-sales' ),
                            'include_children'   => 0
                        ),
                        array(
                            'taxonomy' => 'region',
                            'field'    => 'slug',
                            'terms'    => array( 'amea', 'americas','asia','europe','oceania','africa' ),
                            'include_children'   => 0
                        ),
                    ),
                ];
                if($country){
                    $args['meta_query'][] = [
                        'key' => 'country',
                        'value' => $country ,
                        'compare' => '='
                    ];
                }
                if($continent){
                    $args['meta_query'][] = [
                        'key' => 'zone',
                        'value' => $continent ,
                        'compare' => '='
                    ];
                }
                if(isset($args['meta_query'])){
                    $args['meta_query']['relation'] = "AND";
                }
                $query = new WP_Query( $args );  ?>
                <?php if ( $query->have_posts() ) : $i = 0;?>
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <?php $numOfCols =6; $rowCount = 0; $bootstrapColWidth = 12 / $numOfCols;?>
                    <?php if ($i%6==0) { // if counter is multiple of 3 ?> <div class="row equal" id="locationRow"> <?php } ?>
                    <div class="col-md-2 col-sm-12 snf-location-list-item">
                        <?php if(get_field('new_website_url')):?>
                            <a class="locations-link" href="http://<?php echo the_field('existing_website');?>" target="_blank" class="confirmation">
                                <div class="flagLocationsContainer">
                                    <span class="flagLocations flag-icon <?php the_field('flag_code');?>"></span> <h3>SNF <?php the_field('country'); ?></h3>
                                </div>
                            </a>
                        <?php else:?>
                            <div class="flagLocationsContainer">
                                <span class="flagLocations flag-icon <?php the_field('flag_code');?>"></span> <h3>SNF  <?php the_field('country'); ?></h3>
                            </div>
                        <?php endif;?>
                    </div>
                    <?php $i++; ?>
                    <?php if($i%6==0) { // if counter is multiple of 2 ?>  </div><?php } ?>
                <?php endwhile ;?>	<?php wp_reset_query(); ?>
                <?php if($i%6!=0) { // put closing div if loop is not exactly a multiple of 2 ?> </div> <?php } ?>
            <?php else:?>
                <h3>No results match that search</h3>
            <?php endif ;?>
            <?php wp_reset_postdata(); ?>
        </div><!--Modal Body -->
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>
</div>