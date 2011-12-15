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
add_editor_style();

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
register_sidebar( array('name' => 'Top Widget Zone',     'before_widget' => '', 'after_widget' => '', 'before_title' => '', 'after_title' => '') );
register_sidebar( array('name' => 'Sidebar Widget Zone', 'before_widget' => '', 'after_widget' => '', 'before_title' => '', 'after_title' => '') );
register_sidebar( array('name' => 'Content Widget Zone', 'before_widget' => '', 'after_widget' => '', 'before_title' => '', 'after_title' => '') );
register_sidebar( array('name' => 'Above Menu Widget Zone', 'before_widget' => '', 'after_widget' => '', 'before_title' => '', 'after_title' => '') );
register_sidebar( array('name' => 'Below Menu Widget Zone', 'before_widget' => '', 'after_widget' => '', 'before_title' => '', 'after_title' => '') );
register_sidebar( array('name' => 'Bottom Widget Zone',  'before_widget' => '', 'after_widget' => '', 'before_title' => '', 'after_title' => '') );
register_sidebar( array('name' => 'Footer Widget Zone',  'before_widget' => '', 'after_widget' => '', 'before_title' => '', 'after_title' => '') );

/**
 * Stylesheets
 *
 * 960 and theme style
 */
function ors_stylesheets() {
  wp_enqueue_style('ors-style', get_bloginfo('stylesheet_url'), 'ors-960', null, 'all');
}
add_action('wp_print_styles', 'ors_stylesheets', 1);

/**
 * Javascripts
 *
 * jQuery, Cycle, Modernizer, and theme JS
 */
if (!function_exists('ors_javascripts')) {
	function ors_javascripts() {
	  wp_deregister_script('jquery');
	  wp_enqueue_script('jquery', "http://js.s3.dealertrend.com/jquery.all.js", false, null);
	  // wp_enqueue_script('jquery', "https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js", false, null);
	  // wp_enqueue_script('jquery', "https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js", false, null);
	  wp_enqueue_script('ors-html5-shiv', "http://html5shiv.googlecode.com/svn/trunk/html5.js", 'jquery', null);
	  wp_enqueue_script('ors-custom', ORS_TEMPLATE_URL . "/script.js", 'jquery', null);
	}
	if (!is_admin()) {
	  add_action('wp_print_scripts', 'ors_javascripts', 5);
	}
}

/**
 * Roll overs
 * [rollover title='' href='' src='' width='' height='']
 */
function rollover_shortcode_handler($atts) {
  extract(
    shortcode_atts(
      array('href' => '','width' => '','height' => '','src' => '', 'title' => '', 'link_text' => '')
      , $atts
    )
  );

  return sprintf(
    "<a title='%s' href='%s' style='display:inline-block;position:static;overflow-y:hidden;width:%dpx;height:%dpx;background:url(%s) no-repeat top left;' onmouseover=\"$(this).css('background-position','bottom');\" onmouseout=\"$(this).css('background-position','top');\">%s</a>",
    $title, $href, $width, ($height / 2), $src, $link_text
  );
}
add_shortcode('rollover', 'rollover_shortcode_handler');

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
 * Slideshow shortcode
 */
function slideshow_shortcode_handler($options, $content) {
  extract(shortcode_atts(array(
    'width' => '100%',
    'height' => '100%',
    'effect' => 'fade'
  ), $options));

  $content = "<div class='slideshow' data-effect='$effect' style='width:$width;height:$height;'><p>$content</p></div>";
  $content = str_replace('<p></p>', '', $content);
  return do_shortcode($content);
}
add_shortcode('slideshow', 'slideshow_shortcode_handler');

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
