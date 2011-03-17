<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */
?><!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <?php if (file_exists(ORS_TEMPLATE_DIR.'/images/favicon.ico')) { ?><link rel="shortcut icon" href="<?php echo ORS_TEMPLATE_URL; ?>/images/favicon.ico"><?php } ?>
    <title><?php wp_title('-', true, 'right'); ?><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <header class='container_12'>
      <hgroup class="grid_12">
        <?php // Is there a header image?
				if (get_header_image() != '') {
				  echo '<a href="' . get_option("home") . '/"><img src="' . get_header_image() . '" width="' . HEADER_IMAGE_WIDTH . '" height="' . HEADER_IMAGE_HEIGHT . '" alt="Home" /></a>';
				} else { 
          echo '<h1><a href="' . get_option("home") . '/">' . get_bloginfo("name") . '</a></h1>';
				} 
				?>
        <h2><?php bloginfo('description'); ?></h2>
      </hgroup>
      <?php wp_nav_menu(array('theme_location' => 'top', 'container' => 'nav', 'container_id' => 'top-menu-container', 'container_class' => 'grid_12', 'menu_id' => 'top-menu', 'menu_class' => '')); ?>
    </header>
