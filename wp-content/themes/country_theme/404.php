<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Childers YMCA
 */

get_header(); ?>
<div class="container-fluid">
    <!-- Error Page -->
    <div class="error">
        <div class="col-xs-12 ground-color text-center">
            <div class="container-error-404">
                <div class="clip"><div class="shadow"><span class="digit thirdDigit"></span></div></div>
                <div class="clip"><div class="shadow"><span class="digit secondDigit"></span></div></div>
                <div class="clip"><div class="shadow"><span class="digit firstDigit"></span></div></div>
                <div class="msg">error<span class="triangle"></span></div>
            </div>
            <h2 class="h1">Sorry! The page you're looking for does not exist.</h2>
            <p>It looks like nothing was found at this location. Maybe try a different search below?</p>
        </div>
        <div class="col-xs-12">
            <?php get_search_form();?>
        </div>
    </div><!-- Error Page -->
</div>
<?php get_footer(); ?>