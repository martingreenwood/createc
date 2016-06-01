<?php
/**
 * createc functions and definitions
 *
 * @package createc
 */

if ( ! function_exists( 'createc_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function createc_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on createc, use a find and replace
	 * to change 'createc' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'createc', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size('hp_small', 270, 240, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'createc' ),
		'footer' => esc_html__( 'Footer Menu', 'createc' ),
		'top' => esc_html__( 'Top Menu', 'createc' ),
		'mobile' => esc_html__( 'Mobile Menu', 'createc' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );
}
endif; // createc_setup
add_action( 'after_setup_theme', 'createc_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function createc_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'createc_content_width', 640 );
}
add_action( 'after_setup_theme', 'createc_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function createc_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'createc' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );	
	register_sidebar( array(
		'name'          => esc_html__( 'Bottom Sidebar', 'createc' ),
		'id'            => 'sidebar-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'createc_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function createc_scripts() {
	wp_enqueue_style( 'font-a', '//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css');
	wp_enqueue_style( 'g-fonts', '//fonts.googleapis.com/css?family=Montserrat:400,700');
	wp_enqueue_style( 'fancypp-css', get_template_directory_uri()."/fancybox/jquery.fancybox.css");
	wp_enqueue_style( 'slickcss', get_template_directory_uri(). '/assets/slick/slick.css' );
	wp_enqueue_style( 'slickcsstheme', get_template_directory_uri(). '/assets/slick/slick-theme.css' );
	wp_enqueue_style( 'createc-style', get_stylesheet_uri());

	wp_enqueue_script( 'jquery', '//code.jquery.com/jquery-1.11.3.min.js', array(), '1.11.3', true );
	wp_enqueue_script( 'createc-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '', true );
	wp_enqueue_script( 'createc-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '', true );
	wp_enqueue_script( 'gmap', 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false', array(), '1', true );
	wp_enqueue_script( 'fancyapp', get_template_directory_uri() . '/fancybox/jquery.fancybox.pack.js', array(), '', true );
	wp_enqueue_script( 'fancyapp-media', get_template_directory_uri() . '/fancybox/helpers/jquery.fancybox-media.js', array(), '', true );
	wp_enqueue_script('slickjs', '//cdn.jsdelivr.net/jquery.slick/1.5.7/slick.min.js', array(), '', true );
	wp_enqueue_script( 'wow', get_template_directory_uri().'/js/wow.js', array(), '', true );
}
add_action( 'wp_enqueue_scripts', 'createc_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Options pages
 */
require get_template_directory() . '/inc/options.php';



// CPT

add_action( 'init', 'client_files_pt' );
add_action( 'init', 'case_study_pt' );
add_action( 'init', 'jobs_pt' );
add_action( 'init', 'profiles_pt' );
add_action( 'init', 'case_study_pt_tax' );

function client_files_pt() {
	register_post_type( 'client_files',
		array(
			'labels' => array(
				'name' => __( 'Client Files' ),
				'singular_name' => __( 'Client File' )
			),
			'public' => true,

			'supports' => array( 'title' ),
			'has_archive' => false,
			'exclude_from_search' => false,
			'publicly_queryable' => false,
			'show_in_nav_menus' => false,
			'rewrite' => array('slug' => 'downloads'),
			'menu_icon'   => 'dashicons-download',
		)
	);
}

function case_study_pt() {
	register_post_type( 'case_study',
		array(
			'labels' => array(
				'name' => __( 'Case Studies' ),
				'singular_name' => __( 'Case Study' )
			),
			'public' => true,
			'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
			'has_archive' => false,
			'menu_icon'   => 'dashicons-index-card',
		)
	);
}

function jobs_pt() {
	register_post_type( 'jobs',
		array(
			'labels' => array(
				'name' => __( 'Jobs' ),
				'singular_name' => __( 'Job' )
			),
			'public' => true,
			'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
			'has_archive' => false,
			'menu_icon'   => 'dashicons-businessman',
		)
	);
}

function profiles_pt() {
	register_post_type( 'profiles',
		array(
			'labels' => array(
				'name' => __( 'Profiles' ),
				'singular_name' => __( 'Profile' )
			),
			'public' => true,
			'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
			'has_archive' => false,
			'menu_icon'   => 'dashicons-groups',
		)
	);
}

// Custom Taxonomy

function case_study_pt_tax() {

	register_taxonomy('case_study_tax', 'case_study', array(

		// Hierarchical taxonomy (like categories)
		'hierarchical' => true,
		// This array of options controls the labels displayed in the WordPress Admin UI
		'labels' => array(
			'name' => __( 'Case Study Types' ),
			'singular_name' => __( 'Case Study Type' ),
		),

		// Control the slugs used for this taxonomy
		'rewrite' => array(
			'with_front' => false, // Don't display the category base before "/locations/"
			'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
		),
	));
}
