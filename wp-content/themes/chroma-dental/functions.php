<?php
/**
 * Chroma Dental functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Chroma_Dental
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'chroma_dental_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function chroma_dental_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Chroma Dental, use a find and replace
		 * to change 'chroma-dental' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'chroma-dental', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'header' => esc_html__( 'Main menu on header', 'chroma-dental' ),
				'footer' => esc_html__( 'Menu on footer', 'chroma-dental' ),
				'services' => esc_html__( 'Services list', 'chroma-dental' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'chroma_dental_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'chroma_dental_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function chroma_dental_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'chroma_dental_content_width', 640 );
}
add_action( 'after_setup_theme', 'chroma_dental_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function chroma_dental_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'chroma-dental' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'chroma-dental' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</sectioadd_theme_support( \'post-thumbnails\' );n>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'chroma_dental_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function chroma_dental_scripts(  ) {
	wp_enqueue_style( 'chroma-dental-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'chroma-dental-style', 'rtl', 'replace' );

	wp_enqueue_script( 'main-script', get_template_directory_uri() . '/dist/js/main.js', array(), _S_VERSION, true );

}
add_action( 'wp_enqueue_scripts', 'chroma_dental_scripts' );

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
	if (in_array('current-menu-item', $classes) ){
		$classes[] = 'select ';
	}
	return $classes;
}

add_action( 'wp_enqueue_scripts', 'custom_styles' );

function custom_styles() {
	if ( is_page( 20 ) ) {
		wp_enqueue_style( 'about-style', get_template_directory_uri() . '/dist/css/about-page.min.css', array(), _S_VERSION );
		wp_enqueue_script( 'fancybox', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js', array(), _S_VERSION, true );
	} elseif ( is_page( 7 ) ) {
		wp_enqueue_style( 'home-style', get_template_directory_uri() . '/dist/css/home-page.min.css', array(), _S_VERSION );
		wp_enqueue_script( 'owl-carousel', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', array(), _S_VERSION, true );
	} elseif ( is_page( 22 ) ) {
		wp_enqueue_style( 'contacts-style', get_template_directory_uri() . '/dist/css/contacts-page.min.css', array(), _S_VERSION );
	} elseif ( is_page( 449 ) ) {
		wp_enqueue_style( 'form-style', get_template_directory_uri() . '/dist/css/form-page.min.css', array(), _S_VERSION );
	} else {
		wp_enqueue_style( 'services-style', get_template_directory_uri() . '/dist/css/services.min.css', array(), _S_VERSION );
	}
}

add_action( 'init', 'true_jquery_register' );

function true_jquery_register() {
	if ( !is_admin() ) {

		if( is_page( 20 ) || is_page( 7 ) )
		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', ( 'http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js' ), false, null, true );
		wp_enqueue_script( 'jquery' );
	}
}

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'General Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Header',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'COVID Block',
		'menu_title'	=> 'Covid block',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Why We? Block',
		'menu_title'	=> 'Why we?',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'About our team',
		'menu_title'	=> 'About our team',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Sale block',
		'menu_title'	=> 'Sale block',
		'parent_slug'	=> 'theme-general-settings',
	));

}

require get_template_directory() . '/inc/sub_menu_walker.php';

