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
    <?php if (file_exists(ORS_UPLOAD_DIR."/background.jpg")) { ?>
    <style type="text/css" media="screen">
      <?php echo 'html{background-image:url("' . ORS_UPLOAD_URL . '/background.jpg");}'; ?>
    </style>
    <?php } ?>
  </head>
  <body <?php body_class(); ?>>
    <?php
    if (file_exists(ORS_UPLOAD_DIR.'/header.png')) {
      $background_image = ORS_UPLOAD_URL . '/header.png';
    } elseif (file_exists(ORS_UPLOAD_DIR.'/header.jpg')) {
      $background_image = ORS_UPLOAD_URL . '/header.jpg';
    }
    if ($background_image) {
      $background_size = getimagesize(str_replace(ORS_UPLOAD_URL, ORS_UPLOAD_DIR, $background_image));
    }
    ?>
    <header class='container_12' <?php if ($background_image) echo 'style="background:url('.$background_image.') top left no-repeat;min-height:'.$background_size[1].'px;"'; ?>>
      <hgroup class="grid_12">
        <?php 
        if (!$background_image) {
          echo '<h1><a href="' . get_option("home") . '/">' . get_bloginfo("name") . '</a></h1>';
          echo '<h2>' . get_bloginfo('description') . '</h2>';
        } else {
	  echo '<a href="' . get_option("home") . '/" style="display:block;width:100%; height:' . $background_size[1] . 'px"></a>';
        }
        ?>
      </hgroup>
      <?php
        if ( has_nav_menu('top') ) {
          wp_nav_menu(array('theme_location' => 'top', 'container' => 'nav', 'container_id' => 'top-menu-container', 'container_class' => 'grid_12', 'menu_id' => 'top-menu', 'menu_class' => ''));
        }
      ?>
    </header>

