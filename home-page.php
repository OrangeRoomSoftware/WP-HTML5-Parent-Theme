<?php
/**
* @package WordPress
* @subpackage California Motors
* Template Name: Home Page
*/
get_header(); ?>

<div id="main" class="container_12">
  <div class="grid_12 top-widget-zones" id="top-widget-zone">
    <?php dynamic_sidebar("top-widget-zone"); ?>
  </div>

  <div class="grid_8 content-widget-zones" id="content-widget-zone">
    <?php dynamic_sidebar("content-widget-zone"); ?>
  </div>

  <div class="grid_4 sidebar-widget-zones" id="sidebar-widget-zone">
    <?php dynamic_sidebar("sidebar-widget-zone"); ?>
  </div>

   <div class="grid_12 bottom-widget-zones" id="bottom-widget-zone">
    <?php dynamic_sidebar("bottom-widget-zone"); ?>
  </div>
</div>

<?php get_footer(); ?>
