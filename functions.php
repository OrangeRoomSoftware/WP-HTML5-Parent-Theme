<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */

define('ORS_TEMPLATE_URL', get_bloginfo('template_url'));
remove_action ('wp_head', 'rel_canonical');

# This theme uses wp_nav_menu().
if ( function_exists( 'register_nav_menu' ) ) {
	register_nav_menu( 'top', 'Top Navigation Menu' );
	register_nav_menu( 'bottom', 'Bottom Navigation Menu' );
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

/**
 * Stylesheets
 *
 * 960 and theme style
 */
function ors_stylesheets() {
  wp_enqueue_style('ors-style', get_bloginfo('stylesheet_url'), 'ors-960', null, 'all');
}
add_action('wp_print_styles', 'ors_stylesheets', 5);

/**
 * Javascripts
 *
 * jQuery, Cycle, Modernizer, and theme JS
 */
function ors_javascripts() {
  wp_enqueue_script('ors-jquery', "http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js", false, null);
  wp_enqueue_script('ors-jquery-cycle', "http://cachedcommons.org/cache/jquery-cycle/2.8.6/javascripts/jquery-cycle-min.js", 'ors-jquery', null);
  wp_enqueue_script('ors-html5-shiv', "http://html5shiv.googlecode.com/svn/trunk/html5.js", 'ors-jquery', null);
  wp_enqueue_script('ors-custom', ORS_TEMPLATE_URL . "/script.js", 'jquery', null);
}
add_action('wp_print_scripts', 'ors_javascripts', 1);

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
