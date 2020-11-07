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

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
	<link rel="profile" href="https://gmpg.org/xfn/11">

  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri() . "/dist/favicon/apple-touch-icon.png";?>">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri() . "/dist/favicon/favicon-32x32.png";?>">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri() . "/dist/favicon/favicon-16x16.png";?>">
  <link rel="manifest" href="<?php echo get_template_directory_uri() . "/dist/favicon/site.webmanifest";?>">
  <link rel="mask-icon" href="<?php echo get_template_directory_uri() . "/dist/favicon/safari-pinned-tab.svg\" color=\"#5bbad5";?>">
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

      <a href="#" class="header__btn">book an appointment</a>
    </div>
  </header>

	<!--<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
/*			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				*/?>
				<h1 class="site-title"><a href="<?php /*echo esc_url( home_url( '/' ) ); */?>" rel="home"><?php /*bloginfo( 'name' ); */?></a></h1>
				<?php
/*			else :
				*/?>
				<p class="site-title"><a href="<?php /*echo esc_url( home_url( '/' ) ); */?>" rel="home"><?php /*bloginfo( 'name' ); */?></a></p>
				<?php
/*			endif; */?>
		</div>
	</header>-->