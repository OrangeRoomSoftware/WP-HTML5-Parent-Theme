<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */
?><!doctype html>
<html lang="en" class="no-js">
  <head>
    <meta charset="utf-8">
    <!--[if IE]><![endif]-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
    <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo ORS_TEMPLATE_URL; ?>/images/favicon.ico">
    <link rel="apple-touch-icon" href="<?php echo ORS_TEMPLATE_URL; ?>/images/apple-touch-icon.png">
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <header class='container_12'>
      <section class="grid_12">
        <?php // Is there a header image?
				if (get_header_image() != '') {
				  echo '<a href="' . get_option("home") . '/"><img src="' . get_header_image() . '" width="' . HEADER_IMAGE_WIDTH . '" height="' . HEADER_IMAGE_HEIGHT . '" alt="Home" /></a>';
				} else { 
          echo '<h1><a href="' . get_option("home") . '/">' . get_bloginfo("name") . '</a></h1>';
				} 
				?>
        <h2><?php bloginfo('description'); ?></h2>
      </section>
    </header>
    <?php wp_nav_menu(array('theme_location' => 'top', 'container' => 'nav', 'container_id' => 'top-menu-container', 'container_class' => 'container_12', 'menu_id' => 'top-menu', 'menu_class' => 'grid_12')); ?>
