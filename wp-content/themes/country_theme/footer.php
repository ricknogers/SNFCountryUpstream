<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content, .container, and .row div for the main
 * content
 *
 * @package Childers YMCA
 */
?>
                    </div><!--/row-->
                </div><!--/container-->
            </div><!-- #content -->
            <section class="footerScroll">
                <span class="scroll-to-top top-button-visible">
                    <a id="back-to-top" class="" href="#" title="top">Top</a>
                </span>
                <?php if(!is_page('contact')):?>
                    <span class="email-fixed-contact top-button-visible">
                        <div class="sidebar-contact">
                            <div class="form-toggle"></div>
                                <div class="col formTitle">
                                     <h2>Contact Us</h2>
                                </div>
                            <div class="scroll"></div>
                            <div class="popout-form-container">
                                <?php dynamic_sidebar('sidebar-contact-form');?>
                            </div>
                        </div><!--sidebar-contact-->
                    </span>
                <?php else:?>
                <?php endif;?>
            </section>
            <footer id="footer" class="site-footer" role="contentinfo">
                <div class="container-fluid footerStopScroll">
                    <div class="row">
                        <div class="col-sm-12">
                            <?php snf_subsidiary_footer_menu(0); ?><!--/.navbar-collapse -->
                        </div><!--/col-->
                        <div class="col-sm-12 copyRights">
                            <ul>
                                <li>
                                    <p> &copy; <?php echo get_option('subsidiary_name') ;?> 2014-<?php echo date('Y'); ?> | A Member of SNF Group | All Rights Reserved.</p>
                                </li>
                            </ul>
                        </div>
                    </div><!--/row-->
                </div><!--/container-->
            </footer><!-- #colophon -->
        <?php wp_footer(); ?>
    </body>
</html>
<!-- Clarity tracking code for https://us.snf.com/ -->
<script defer>
    (function(c,l,a,r,i,t,y){
        c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
        t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i+"?ref=bwt";
        y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
    })(window, document, "clarity", "script", "7v1rc5p2aa");
</script>

<!-- Global site tag (gtag.js) - Google Analytics GA4 -->
<script defer src="https://www.googletagmanager.com/gtag/js?id=G-T4WZRYQ06W"></script>
<script defer>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-T4WZRYQ06W');
</script>