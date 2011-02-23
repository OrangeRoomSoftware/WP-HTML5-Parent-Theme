<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */

get_header(); ?>

<div id="main" role="main" class="container_12">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <article <?php post_class('grid_12') ?> id="post-<?php the_ID(); ?>">
    <header>
      <h2><?php the_title(); ?></a></h2>
      <time datetime="<?php the_time('Y-m-d')?>"><?php the_time('F jS, Y') ?></time>
    </header>
    <section>
      <?php the_content('Read the rest of this entry &raquo;'); ?>
      <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
    </section>
    <footer>
      <?php edit_post_link('Edit this entry','','.'); ?>
    </footer>
    <?php comments_template(); ?>
  </article>
  <?php endwhile; else: ?>
    <p>Sorry, no posts matched your criteria.</p>
  <?php endif; ?>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
