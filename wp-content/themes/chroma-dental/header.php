<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Chroma_Dental
 */

session_start();
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <meta property="og:title" content="<?= get_field('page_title'); ?>">
  <meta name="title" content="<?= get_field('page_title'); ?>">
  <meta property="og:site_name" content="Chroma Dental">
  <meta property="og:url" content="<?= get_permalink(); ?>">
  <meta name="url" content="<?= get_permalink(); ?>">
  <meta property="og:description" content="<?= get_field( 'page_description'); ?>">
  <meta name="description" content="<?= get_field( 'page_description'); ?>">
  <meta property="og:image" content="<?= get_template_directory_uri() . '/dist/img/home-page/slider/first-slide-mob.png' ?>">
  <meta name="image" content="<?= get_template_directory_uri() . '/dist/img/home-page/slider/first-slide-mob.png' ?>">
  <meta name="keywords" content="<?= get_field('page_keywords'); ?>">
  <?php if( get_the_title() == 'Home page' ) : ?>
      <meta name="google-site-verification" content="pT28wfTasiZC-SejuLPOvswaFIYCmG_lkc-CjWsaN_8" />
  <?php endif; ?>

	<link rel="profile" href="https://gmpg.org/xfn/11">

  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri() . "/favicon/apple-touch-icon.png";?>">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri() . "/favicon/favicon-32x32.png";?>">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri() . "/favicon/favicon-16x16.png";?>">
  <link rel="manifest" href="<?php echo get_template_directory_uri() . "/favicon/site.webmanifest";?>">
  <link rel="mask-icon" href="<?php echo get_template_directory_uri() . "/favicon/safari-pinned-tab.svg\" color=\"#5bbad5";?>">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">

  <title>
	  <?php
	  if( ! is_home() ):
		  wp_title( '|', true, 'right' );
	  endif;
	  bloginfo( 'name' );
	  ?>
  </title>
	<?php if( ! is_home() ): ?>
    <script src="<?= get_template_directory_uri() . '/dist/libs/wow.js' ?>"></script>
    <script>

        //- new WOW().init();

        wow = new WOW({
            boxClass: 'wow',
            animateClass: 'animated',
            offset: 0,
            mobile: false,
            live: true
        });
        wow.init();

    </script>
	<?php endif; ?>

  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
              new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
          j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
          'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','GTM-5GLJCS4');</script>
  <!-- End Google Tag Manager -->


	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
  <header class="header">
    <div class="container header__wrap">
      <a class="header__logo" href="<?= get_home_url(); ?>">
        <img src="<?php the_field('logo_for_green_header', 'option'); ?>" alt="chroma dental" class="header__logo_img">
      </a>
      <div class="header-menu__btn">
        <span class="header-menu__burger"></span>
      </div>

	    <?php if( has_nav_menu('header') ) :

        wp_nav_menu(
		      array(
            'theme_location' => 'header',
            'menu_id'        => 'main-menu',
            'container_class' => 'header__menu',
            'menu_class' => 'menu',
          )
	    ); ?>
	    <?php endif; ?>

      <a href="<?= get_field('external_link', 'option'); ?>" class="header__btn">book an appointment</a>
    </div>
  </header>
