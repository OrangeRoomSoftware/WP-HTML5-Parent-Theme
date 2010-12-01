<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */
?>
<aside id="sidebar">
  <nav role="navigation">
   <?php wp_nav_menu( array( 'theme_location' => 'primary','fallback_cb'=> '' ) ); ?>
  </nav>
</aside>

