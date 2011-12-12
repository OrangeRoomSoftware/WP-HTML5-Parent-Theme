<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */

get_header(); ?>
<div id="main" role="main" class="container_12">
  <?php if ( has_nav_menu('sidebar') ) { $grid = 10; } else { $grid = 12; } ?>
  <article class="<?php echo 'grid_' . $grid; ?>" id="404-not-found">
    <section>
      <h2>Not Found</h2>
      <p>Sorry, but you are looking for something that isn't here.</p>
      <?php get_search_form(); ?>
    </section>
  </article>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
