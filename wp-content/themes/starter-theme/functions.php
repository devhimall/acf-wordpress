<?php

/**
 * Starter Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Starter_Theme
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
// test

function new_posttype_pet()
{
	$supports = array(
		'title',
		'editor',
		'author',
		'thumbnail',
		'excerpt',
		'custom-fields',
		'comments',
		'revisions',
		'post-formats',
	);
	$labels = array(
		'name' => _x('pets', 'plural'),
		'singular_name' => _x('pet', 'singular'),
		'menu_name' => _x('Pets', 'admin menu'),
		'name_admin_bar' => _x('Pet', 'admin bar'),
		'add_new' => _x('Add Pet', 'add new pet'),
		'add_new_item' => __('Add New Pet'),
		'new_item' => __('New pet', 'New Pet'),
		'edit_item' => __('Edit pet'),
		'view_item' => __('View pet'),
		'all_items' => __('All pets'),
		'search_items' => __('Search pets'),
		'not_found' => __('No pets found.'),
	);

	$args = array(
		'supports' => $supports,
		'labels' => $labels,
		'public' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'pets'),
		'has_archive' => true,
		'hierarchical' => false,
	);
	register_post_type('pets', $args);
}

add_action('init', 'new_posttype_pet');



// creating first post type
/* Custom Post Type Start */
function create_posttype()
{
	register_post_type(
		'news',
		// CPT Options
		array(
			'labels' => array(
				'name' => __('news'),
				'singular_name' => __('News')
			),
			'public' => true,
			'has_archive' => false,
			'rewrite' => array('slug' => 'news'),
		)
	);
}
// Hooking up our function to theme setup
add_action('init', 'create_posttype');
/* Custom Post Type End */



// adding taxonomy in posttype teams
function create_team_taxonomies()
{
	$labels = array(
		'name' => 'Team Category',
		'singular_name' => 'Category',
		'menu_name' => 'Category'
	);

	register_taxonomy('team_category', array('team'), array(
		'hierarchical' => true,
		'labels' => $labels,
		'rewrite' => array('slug' => 'team-category'),
	));
}

add_action('init', 'create_team_taxonomies', 0);








function starter_theme_setup()
{
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Starter Theme, use a find and replace
	 * to change 'starter-theme' to the name of your theme in all the template files.
	 */
	load_theme_textdomain('starter-theme', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support('title-tag');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'primary-menu' => esc_html__('Primary', 'starter-theme'),
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
			'starter_theme_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height' => 250,
			'width' => 250,
			'flex-width' => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'starter_theme_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function starter_theme_content_width()
{
	$GLOBALS['content_width'] = apply_filters('starter_theme_content_width', 640);
}
add_action('after_setup_theme', 'starter_theme_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function starter_theme_widgets_init()
{
	register_sidebar(
		array(
			'name' => esc_html__('Sidebar', 'starter-theme'),
			'id' => 'sidebar-1',
			'description' => esc_html__('Add widgets here.', 'starter-theme'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);
}
add_action('widgets_init', 'starter_theme_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function portfolio_scripts()
{
	wp_enqueue_style('font-css', 'https://fonts.googleapis.com/css?family=Open+Sans:300,400%7CSolway:400,700&display=swap', array(), _S_VERSION);
	wp_enqueue_style('custom-main-css1', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css', array(), _S_VERSION);
	wp_enqueue_style('custom-main-css2', 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), _S_VERSION);
	wp_enqueue_style('custom-main-css3', get_template_directory_uri() . '/assets/lib/owlcarousel/assets/owl.carousel.min.css', array(), _S_VERSION);
	wp_enqueue_style('custom-main-css4', get_template_directory_uri() . '/assets/lib/lightbox/css/lightbox.min.css', array(), _S_VERSION);
	wp_enqueue_style('custom-main-css', get_template_directory_uri() . '/assets/css/main.css', array(), _S_VERSION);
	wp_enqueue_style('portfolio-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('portfolio-style5', 'rtl', 'replace');
	wp_enqueue_script('portfolio-navigation1', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js', array('jquery'), _S_VERSION, true);
	wp_enqueue_script('portfolio-navigation2', get_template_directory_uri() . '/assets/lib/typed/typed.min.js', array('jquery'), _S_VERSION, true);
	wp_enqueue_script('portfolio-navigation3', get_template_directory_uri() . '/assets/lib/easing/easing.min.js', array('jquery'), _S_VERSION, true);
	wp_enqueue_script('portfolio-navigation4', get_template_directory_uri() . '/assets/lib/stickyjs/sticky.js', array('jquery'), _S_VERSION, true);
	wp_enqueue_script('portfolio-navigation5', get_template_directory_uri() . '/assets/lib/superfish/hoverIntent.js', array('jquery'), _S_VERSION, true);
	wp_enqueue_script('portfolio-navigation6', get_template_directory_uri() . '/assets/lib/superfish/superfish.min.js', array('jquery'), _S_VERSION, true);
	wp_enqueue_script('portfolio-navigation7', get_template_directory_uri() . '/assets/lib/waypoints/waypoints.min.js', array('jquery'), _S_VERSION, true);
	wp_enqueue_script('portfolio-navigation8', get_template_directory_uri() . '/assets/lib/counterup/counterup.min.js', array('jquery'), _S_VERSION, true);
	wp_enqueue_script('portfolio-navigation9', get_template_directory_uri() . '/assets/lib/owlcarousel/owl.carousel.min.js', array('jquery'), _S_VERSION, true);
	wp_enqueue_script('portfolio-navigation10', get_template_directory_uri() . '/assets/lib/isotope/isotope.pkgd.min.js', array('jquery'), _S_VERSION, true);
	wp_enqueue_script('portfolio-navigation11', get_template_directory_uri() . '/assets/lib/lightbox/js/lightbox.min.js', array('jquery'), _S_VERSION, true);
	// wp_enqueue_script( 'portfolio-navigation12', get_template_directory_uri() . '/js/customizer.js', array(), _S_VERSION, true );
	wp_enqueue_script('portfolio-navigation13', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);
	wp_enqueue_script('portfolio-navigation', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), _S_VERSION, true);
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'portfolio_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

// slider

// Registering a slider block
add_action('acf/init', 'my_register_blocks');
function my_register_blocks()
{

	// check function exists.
	if (function_exists('acf_register_block_type')) {

		// register a testimonial block.
		acf_register_block_type(array(
			'name'              => 'Testimonial Slider',
			'title'             => __('Testimonial Slider'),
			'description'       => __('A custom slider block.'),
			'render_template'   => 'template-parts/blocks/slider/testimonial-slider.php',
			'category'          => 'formatting',
			'icon'              => 'images-alt2',
			// 'align'             => 'full',
			'enqueue_assets'    => function () {
				// wp_enqueue_style('slick', 'http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), '1.8.1');
				// wp_enqueue_style('slick-theme-css', 'http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css', array(), '1.8.1');
				// wp_enqueue_script('slick', 'http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), '1.8.1', true);
				wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11.0.0');
				wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js', array(), '11.0.0', true);

				wp_enqueue_style('block-slider', get_template_directory_uri() . '/assets/css/slider/testimonial-slider.css', array(), '1.0.0');
				// wp_enqueue_script('block-slider', get_template_directory_uri() . '/assets/js/swiper.js', array(), '1.0.0', true);
			},
		));
	}
}
