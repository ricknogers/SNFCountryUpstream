<?php
/**
 * Make Header Shrink on Page Scroll
 **/
add_action ('wp_footer','vr_shrink_head',1);
function vr_shrink_head() {
?>
<script>
    jQuery(document).ready(function($) {
        $(window).scroll(function () {
            var oldLogo = $(".desktop-logo");
            var newLogo = $(".scroll-logo ");
            var newLogoImg =$(".scroll-img");
            if ($(window).scrollTop() > 85) {
                $('.snf-country-menu').addClass('shrink');
                oldLogo.css("display", "none");
                newLogo.css("display", "block");
                newLogoImg.css("display", "block");
            }
            else{
                $('.snf-country-menu').removeClass('shrink');
                newLogo.css("display", "none");
                oldLogo.css("display", "block");
            }
        });
    });
</script>
    <?php
}