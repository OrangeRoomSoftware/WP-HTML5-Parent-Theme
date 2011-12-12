<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */
?>
<?php
  if ( has_nav_menu('sidebar') ) {
    echo "<div id='sidebar-container' class='grid_2'>";
    dynamic_sidebar("above-menu-widget-zone");
    wp_nav_menu( array( 'theme_location' => 'sidebar', 'container' => 'nav', 'container_id' => '', 'container_class' => '', 'menu_id' => 'sidebar-menu', 'menu_class' => ''));
    dynamic_sidebar("below-menu-widget-zone");
    echo "</div>";
  }
?>

