<?php
/**
 * asu_s functions and definitions
 *
 * @package asu_s
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'asu_s_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function asu_s_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on _s, use a find and replace
	 * to change '_s' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'asu_s', get_template_directory() . '/languages' );

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
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'asu_s' ),
        'secondary' => esc_html__( 'Footer Menu', 'asu_s' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'asu_s_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // asu_s_setup
add_action( 'after_setup_theme', 'asu_s_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function asu_s_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'asu_s' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'asu_s_widgets_init' );

/**
 * Custom Navigation Walker to output JSON for ASU Header Menu.
 */
class JSON_Walker_Nav_Menu extends Walker_Nav_Menu {
	static $counter = 0;

	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        if(self::$counter > 0) {
            $output .= ",";
        }
		$output .= "{";
		$output .= '"title":"' . $item->title . '",';
		if (array_search('menu-item-has-children', $item->classes)) {
			$output .= '"path":"' . $item->url . '",';
		} else {
			$output .= '"path":"' . $item->url . '"';
		}
	}
   function end_el(&$output, $item, $depth=0, $args=array()) {

        $output .= "}";
        self::$counter ++;
    }
	function start_lvl(&$output, $depth = 0, $args = array()) {
		$output .= '"children":[';
		self::$counter = 0;
	}

    function end_lvl(&$output, $depth=0, $args=array()) {
        $output .= "]";
    }
}

function json_wp_nav_menu_array($location, $menu_id) {

    $echo			= 0;		// true for yes, 0 for no
    $fallback_cb	= false;	// false for no fallback
    $items_wrap		= '[%3$s]';	// %3$s as parameter excludes items wrap
    $container		= false;
    $depth			= 0;
	$output			= "";

    // Create a new instance of JSON_Walker_Nav_Menu
    $JSON_Walker_Nav_Menu = new JSON_Walker_Nav_Menu();
    
	// Prepare the argument for wp_nav_menu
    $args = array(
      'theme_location'	=> $location,
      'menu_id'			=> $menu_id,
      'echo'			=> $echo,
      'fallback_cb'		=> $fallback_cb,
      'items_wrap'		=> $items_wrap,
      'container'		=> $container,
      'depth'			=> $depth,
      'output'			=> $output,
      'walker'			=> $JSON_Walker_Nav_Menu,
    );

	$output = wp_nav_menu( $args);

    return $output;
}

/**
 * build Google Fonts URLs.
 */
function asu_s_fonts_url() {
    $fonts_url = '';
 
    /* Translators: If there are characters in your language that are not
    * supported by Roboto, translate this to 'off'. Do not translate
    * into your own language.
    */
    $roboto = _x( 'on', 'Roboto font: on or off', 'asu_s' );
 
    if ( 'off' !== $roboto ) {
        $font_families = array();
 
        if ( 'off' !== $roboto ) {
            $font_families[] = 'Roboto:400,700,400italic,700italic';
        }
 
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
    }
 
    return esc_url_raw( $fonts_url );
}

/**
 * Enqueue scripts and styles.
 */
function asu_s_scripts() {
	wp_enqueue_style( 'asu_s-style', get_stylesheet_uri() );

	wp_enqueue_script( 'asu_s-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'asu_s-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_register_script( 'asu_s-searchbox', get_template_directory_uri() . '/js/searchbox.js', array(), '20150506', true );
	wp_enqueue_script( 'asu_s-searchbox' );

	wp_register_script( 'asu-searchbox', get_template_directory_uri() . '/js/asu-searchbox.js', array( 'jquery' ), '20150522', true );
	wp_enqueue_script( 'asu-searchbox' );

	wp_register_script( 'asu-header-config', get_template_directory_uri() . '/js/asu-header-config.js', array( 'jquery' ), '20150522', true );
	wp_enqueue_script( 'asu-header-config' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'asu_s_scripts' );

/**
 * Enqueue external styles.
 */
function asu_s_scripts_styles() {
    wp_enqueue_style( 'asu_s-fonts', asu_s_fonts_url(), array(), null );
    wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'); 
}
add_action( 'wp_enqueue_scripts', 'asu_s_scripts_styles' );

function asu_s_editor_styles() {
    add_editor_style( array( 'editor-style.css', asu_s_fonts_url() ) );
    add_editor_style( array( 'editor-style.css', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' ) );
}
add_action( 'after_setup_theme', 'asu_s_editor_styles' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

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
