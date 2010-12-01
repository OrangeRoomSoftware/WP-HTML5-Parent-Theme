<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */
get_header(); ?>

<section id="main" role="main" class="container_12">
  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
      <article <?php post_class('grid_12') ?> id="page-<?php the_ID(); ?>">
        <section>
          <?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
          <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
        </section>
      </article>
    <?php endwhile; ?>
  <?php else : ?>
    <article <?php post_class('grid_12') ?> id="404-not-found">
      <header>
        <h1>Not Found</h1>
      </header>
      <section>
        <p>Sorry, but you are looking for something that isn't here.</p>
        <?php get_search_form(); ?>
      </section>
    </article>
  <?php endif; ?>
</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
