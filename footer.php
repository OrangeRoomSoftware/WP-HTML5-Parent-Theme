    <?php
    /**
     * @package WordPress
     * @subpackage HTML5_Boilerplate
     */
    ?>

    <footer class="container_12">
      <?php wp_nav_menu(array('theme_location' => 'bottom', 'container' => 'nav', 'container_id' => 'bottom-menu-container', 'container_class' => 'container_12', 'menu_id' => 'bottom-menu', 'menu_class' => 'grid_12')); ?>
      <section class="grid_12">
        <?php wp_footer(); ?>
      </section>
    </footer>
  </body>
</html>
