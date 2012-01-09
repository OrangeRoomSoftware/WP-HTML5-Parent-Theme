<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */

if ( has_nav_menu('sidebar') or is_active_sidebar( $sidebar_widget_zone_id ) ) { $grid = 10; } else { $grid = 12; }

if ( $grid == 10 ) echo "<aside id='sidebar-container' class='grid_2'>";

if ( has_nav_menu('sidebar') ) {  
  dynamic_sidebar("above-menu-widget-zone");
  wp_nav_menu( array( 'theme_location' => 'sidebar', 'container' => 'nav', 'container_id' => 'sidebar-menu-container', 'container_class' => '', 'menu_id' => 'sidebar-menu', 'menu_class' => ''));
  dynamic_sidebar("below-menu-widget-zone");
}

if ( is_active_sidebar( $sidebar_widget_zone_id ) ) {
  ?>
	<section id="sidebar-widget-zone">
	<?php dynamic_sidebar("sidebar-widget-zone"); ?>
	</section>
  <?php
}

if ( $grid == 10 ) echo "</aside>";
