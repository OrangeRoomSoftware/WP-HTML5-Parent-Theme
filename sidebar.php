<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */
?>
<?php
  if ( has_nav_menu('sidebar') ) {
    wp_nav_menu( array( 'theme_location' => 'sidebar', 'container' => 'nav', 'container_id' => 'sidebar-container', 'container_class' => 'grid_2', 'menu_id' => 'sidebar-menu', 'menu_class' => ''));
  }
?>

