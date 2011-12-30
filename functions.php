<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */

define('ORS_TEMPLATE_URL', get_bloginfo('template_url'));
define('ORS_TEMPLATE_DIR', dirname(__FILE__));

// Setup upload paths
$uploads = wp_upload_dir();
define('ORS_UPLOAD_DIR', $uploads['path']);
define('ORS_UPLOAD_URL', $uploads['url']);

// rel_cononical kinda messes up some dynamic links
remove_action ('wp_head', 'rel_canonical');

// This theme uses post thumbnails
add_theme_support( 'post-thumbnails' );

// Add default posts and comments RSS feed links to head
add_theme_support( 'automatic-feed-links' );

// Shortcodes in widgets and excerpts
add_filter( 'widget_text', 'do_shortcode' );
add_filter( 'the_excerpt', 'do_shortcode' );
add_filter( 'get_the_excerpt', 'do_shortcode' );

// Add my editor style
if (is_admin()) {
  add_editor_style();
}

# This theme uses wp_nav_menu().
if ( function_exists( 'register_nav_menu' ) ) {
  register_nav_menu( 'top', 'Top Navigation Menu' );
  register_nav_menu( 'bottom', 'Bottom Navigation Menu' );
  register_nav_menu( 'sidebar', 'Sidebar Navigation Menu' );
}

// Widgetized Sidebar HTML5 Markup
if ( function_exists('register_sidebar') ) {
  register_sidebar(array(
    'before_widget' => '<section>',
    'after_widget' => '</section>',
    'before_title' => '<h2 class="widgettitle">',
    'after_title' => '</h2>',
  ));
}

// Register widget zones for Home Page template
$top_widget_zone_id = register_sidebar( array('name' => 'Top Widget Zone',     'before_widget' => '', 'after_widget' => '', 'before_title' => '', 'after_title' => '') );
$sidebar_widget_zone_id = register_sidebar( array('name' => 'Sidebar Widget Zone', 'before_widget' => '', 'after_widget' => '', 'before_title' => '', 'after_title' => '') );
$content_widget_zone_id = register_sidebar( array('name' => 'Content Widget Zone', 'before_widget' => '', 'after_widget' => '', 'before_title' => '', 'after_title' => '') );
$above_menu_widget_zone_id = register_sidebar( array('name' => 'Above Menu Widget Zone', 'before_widget' => '', 'after_widget' => '', 'before_title' => '', 'after_title' => '') );
$below_menu_widget_zone_id = register_sidebar( array('name' => 'Below Menu Widget Zone', 'before_widget' => '', 'after_widget' => '', 'before_title' => '', 'after_title' => '') );
$bottom_widget_zone_id = register_sidebar( array('name' => 'Bottom Widget Zone',  'before_widget' => '', 'after_widget' => '', 'before_title' => '', 'after_title' => '') );
$footer_widget_zone_id = register_sidebar( array('name' => 'Footer Widget Zone',  'before_widget' => '', 'after_widget' => '', 'before_title' => '', 'after_title' => '') );

/**
 * Stylesheets
 *
 * 960 and theme style
 */
function ors_stylesheets() {
  wp_enqueue_style('ors-style', get_bloginfo('stylesheet_url'), 'ors-960', null, 'all');
}
if (!is_admin()) {
  add_action('wp_print_styles', 'ors_stylesheets', 1);
}

/**
 * Javascripts
 *
 * jQuery, Cycle, Modernizer, and theme JS
 */
if (!function_exists('ors_javascripts')) {
	function ors_javascripts() {
	  wp_enqueue_script('ors-html5-shiv', "http://html5shiv.googlecode.com/svn/trunk/html5.js", 'jquery', null);
	  wp_enqueue_script('ors-custom', ORS_TEMPLATE_URL . "/script.js", 'jquery', null);
	}
	if (!is_admin()) {
	  add_action('wp_print_scripts', 'ors_javascripts', 5);
	}
}

/**
 * Increase the excerpt length
 */
function twentyten_excerpt_length( $length ) {
  return 500;
}
add_filter( 'excerpt_length', 'twentyten_excerpt_length' );

/**
 * Get your CSS out of my Content!
 */
add_filter('gallery_style', create_function('$a', 'return "<div class=\'gallery\'>";'));

/**
 * Permalink shortcode
 * [permalink text='Click to see more']
 */
if ( !function_exists('permalink_shortcode_handler') ) {
  function permalink_shortcode_handler($atts) {
    extract(shortcode_atts(array('text' => ''), $atts));
    return sprintf(
      "<a title='%s' href='%s'>%s</a>",
      $text, get_permalink(), $text
    );
  }
  add_shortcode('permalink', 'permalink_shortcode_handler');
}
