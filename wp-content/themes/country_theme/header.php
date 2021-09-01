<?php
/**
 * The Header for SNF Subsidiary
 *
 * Displays <head>, opening <body>, the <header> amd <nav>, and the opening tags
 * for tha main content.
 *
 * @package SNF Subsidiary
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <title>
        <?php wp_title( '|', true, 'right' ); ?>

    </title>
    <meta name="google-site-verification" content="kZJWqTUOOX2VlJRCdWXCu8HIO0LMwoTxZgC-PVCBbLE" />
   

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php get_template_part('template-parts/header-notification')?>
<header id="header" class="site-header" role="banner">

    <div class="subsidiaryTopBar container-fluid">
        <div class="row desktopTopBar">
            <div class="col companyTagLine">
                <?php if(is_front_page()):?>
                    <h3><?php echo get_option('subsidiary_name') ;?></h3>
                <?php else:?>
                    <h3><?php echo get_option('corporate_tag_line');?></h3>
                <?php endif;?>
            </div>
            <div class="col-md-8" id="country-top-wrapper">
                <div class="  itemsRight">
                    <ul class="list-unstyled d-flex flex-wrap  ">
                        <li class="menu-item">
                            <a href="https://snf.com/" target="_blank" class="confirmation">SNF Global</a>
                        </li>
                        <li class="menu-item">
                            <?php get_template_part('country-list');?>
                        </li>
                        <li class="menu-item">
                            <a href="https://www.snf.com/sustainability/" target="_blank" class="confirmation">Sustainability</a>
                        </li>
                        <li class="linkedinIcon socialDesktop menu-item">
                            <a href="<?php echo get_option('linkedin_url') ;?>" target="_blank"><i class="fa fa-linkedin-square social" aria-hidden="true"></i> </a>
                        </li>
                        <li class="linkedinIcon socialDesktop menu-item">
                            <a href="<?php echo get_option('facebook_url') ;?>" target="_blank"><i class="fa fa-facebook-square social" aria-hidden="true"></i> </a>
                        </li>
                        <li class="search-header menu-item">
                            <?php get_template_part( 'search-header' ); ?>
                        </li>
                        <?php if ( is_plugin_active('translatepress-multilingual/index.php') ):?>
                            <li class="socialDesk topmenu-item">
                                <?php get_template_part('language-select');?>
                            </li>
                        <?php endif;?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid" id="desktopNavigation">
        <div class=" snf-country-menu subsidiary-menu ">
            <div class="row logo-navigation-container">
                <div class="">
                    <div class=" desktop-logo country-logo  navbar-brand-centered">
                        <a class="" href="<?php echo home_url( '/' ); ?>">
                            <?php include( locate_template( 'images/start-logo.php', false, false ) );?>
                        </a>
                    </div>
                    <div class=" scroll-logo country-logo  navbar-brand-centered">
                        <a class="" href="<?php echo home_url( '/' ); ?>">
                            <?php include( locate_template( 'images/scroll-logo.php', false, false ) );?>
                        </a>
                    </div>
                </div>
                <div class="">
                    <div class="county-nav-wrapper">
                        <nav class="navbar navbar-expand-md navbar-dark bg-light text-center" role="navigation">
                            <div class="toggleWrapper">
                                <button class="navbar-toggler x" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div><!--toggleWrapper-->
                            <?php snf_subsidiary_main_nav(0); ?><!--/.navbar-collapse -->
                        </nav>
                    </div><!--county-nav-wrapper-->
                </div>
            </div>
        </div><!--snf-country-menu-->
    </div><!--mobileNavigation-->
    <div class="container-fluid" id="mobileNavigation">
        <div class=" flex-row justify-content-between mobileTopBar">
            <ul class="list-unstyled d-flex flex-wrap  ">
                <li class="col menu-item mobileTopBarItems">
                    <a href="<?php echo home_url('');?>?s">Search</a>
                </li>
                <li class="col menu-item mobileTopBarItems">
                    <a href="https://snf.com/" target="_blank" class="confirmation">SNF Global</a>
                </li>
                <li class="col menu-item mobileTopBarItems">
                    <?php get_template_part('country-list-mobile');?>
                </li>
                <?php if ( is_plugin_active('translatepress-multilingual/index.php') ):?>
                    <?php get_template_part('language-select-mobile');?>
                <?php endif;?>
            </ul>
        </div><!--MobileTopBar-->
        <div class=" snf-country-menu subsidiary-menu ">
            <div class="row logo-navigation-container">
                <div class="">
                    <div class=" desktop-logo country-logo  navbar-brand-centered">
                        <a class="" href="<?php echo home_url( '/' ); ?>">
                            <?php include( locate_template( 'images/start-logo.php', false, false ) );?>
                        </a>
                    </div><!--desktop-logo country-logo-->
                    <div class=" scroll-logo country-logo  navbar-brand-centered">
                        <a class="" href="<?php echo home_url( '/' ); ?>">
                            <?php include( locate_template( 'images/scroll-logo.php', false, false ) );?>
                        </a>
                    </div><!--scroll-logo country-logo-->
                </div>
            </div><!--logo-navigation-container-->
            <div class="flex-row justify-content-between navigationContainer">
                <div class=" county-nav-wrapper">
                    <nav class="navbar navbar-expand-md navbar-dark bg-light text-center" role="navigation">
                        <div class="toggleWrapper">
                            <button class="navbar-toggler x" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div><!--toggleWrapper-->
                        <div class="navigation-mobile-wrapper">
                            <?php snf_subsidiary_main_nav(0); ?><!--/.navbar-collapse -->
                        </div>
                    </nav>
                </div><!--county-nav-wrapper-->
            </div><!--navigationContainer-->
        </div><!--snf-country-menu-->
    </div><!--container-->
    <div class="taglineMobile">
        <div class="inner-tagline-top">
            <h3 class="countryName"><?php echo get_option('country_name') ;?> </h3> <span></span>
            <h3><?php echo get_option('corporate_tag_line');?></h3>
        </div><!--inner-tagline-top-->
    </div><!--taglineMobile-->
</header>
<?php if(is_front_page()):?>
    <div class="container-fluid">
        <div class="row front-page-hero-wrapper">
            <?php
            $the_query = new WP_Query(array(
                "post_type" => "slide",
                "posts_per_page" =>1,
            ));
            while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <div class="wrapper ">
                    <section class="splitCard">
                        <style>
                            @media (min-width: 992px){
                                .card__img {
                                    background-size: cover;
                                    background-repeat: no-repeat;
                                    background-position: bottom right;
                                    position: relative;
                                    background-image: url("<?php echo the_post_thumbnail_url("full") ;?>");
                                }
                            }
                        </style>
                        <div class="card__img col-lg-7 col-sm-12 " >
                            <div class="card__text " data-aos="fade-right" data-aos-duration="1000">
                            </div> <!-- .card__text -->
                        </div> <!-- .card__img -->
                        <div class="card__content col-lg-5 col-sm-12" >
                            <div class="splitHeader-right desktop" >
                                <div class="card__headline" data-aos="fade-left" data-aos-duration="1000">
                                    <div class="top-slogan">
                                        <h1> <?php echo get_option('country_name') ;?></h1>
                                    </div>
                                    <div class="bottom-slogan">
                                    <h2 class="skinnyTitle"><?php the_field('main_title_tagline');?></h2>
                                    <h2 class="thickTitle"><?php the_field('second_title_tagline');?></h2>
                                    </div>
                                </div> <!-- .card__headline -->
                                <div class="card__excerpt" id="mobileTitle">
                                    <h2 class="skinnyTitle"><?php the_field('main_title_tagline');?></h2>
                                    <h2 class="thickTitle"><?php the_field('second_title_tagline');?></h2>
                                    <?php if(get_field('banner_excerpt')):?>
                                        <p><?php the_field('banner_excerpt');?></p>
                                    <?php endif;?>
                                    <?php if(get_field('banner_button_text')):?>
                                        <div class="snf-link-wrapper ">
                                            <div class="snf-link">
                                                <a href="<?php the_field('button_link');?>" class="product-list-link" ><?php the_field('banner_button_text');?></a>
                                            </div>
                                        </div><!--snf-link-wrapper-->
                                    <?php endif;?>
                                </div><!--card__excerpt-->
                            </div><!--splitHeader-right-->
                        </div> <!-- .card__content -->
                    </section> <!-- .card -->
                </div> <!-- .wrapper -->
            <?php endwhile; wp_reset_postdata(); ?>
        </div><!--front-page-hero-wrapper-->
        <div class="row " id="mobile-title">
            <div class="header-site-title col">
                <h1> <?php echo get_option('country_name') ;?></h1>
            </div><!--header-site-title-->
        </div><!--mobile-title-->
    </div><!--container-fluid-->
<?php else:?>
    <?php get_template_part('template-parts/inner-pages-header-image');?>
<?php endif;?>
<div id="content" class="site-content">