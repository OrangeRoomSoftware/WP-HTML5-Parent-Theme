<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */
get_header(); ?>

<div id="main" role="main" class="container_12">
  <?php get_sidebar(); ?>
  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
      <?php if ( has_nav_menu('sidebar') ) { $grid = 10; } else { $grid = 12; } ?>
      <article <?php post_class('grid_' . $grid) ?> id="page-<?php the_ID(); ?>">
        <section>
          <?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
          <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
        </section>
      </article>
    <?php endwhile; ?>
  <?php else : ?>
    <article <?php post_class('grid_' . $grid) ?> id="404-not-found">
      <header>
        <h1>Not Found</h1>
      </header>
      <section>
        <p>Sorry, but you are looking for something that isn't here.</p>
        <?php get_search_form(); ?>
      </section>
    </article>
  <?php endif; ?>

</div>

<?php get_footer(); ?>