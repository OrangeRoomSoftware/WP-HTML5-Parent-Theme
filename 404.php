<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */

get_header(); ?>
<section id="main" role="main" class="container_12">
  <article <?php post_class('grid_12') ?> id="404-not-found">
    <header>
      <h1>Not Found</h1>
    </header>
    <section>
      <p>Sorry, but you are looking for something that isn't here.</p>
      <?php get_search_form(); ?>
    </section>
  </article>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>