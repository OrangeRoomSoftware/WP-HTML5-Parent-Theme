<?php

get_header(); ?>

<div id="main" class="container_12 single">
  <div class="grid_12 top-widget-zones" id="top-widget-zone">
    <?php dynamic_sidebar("top-widget-zone"); ?>
  </div>

  <?php include_once('sidebar.php'); ?>

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <article <?php post_class('grid_' . $grid) ?> id="post-<?php the_ID(); ?>">
    <header>
      <h2><?php the_title(); ?></a></h2>
      <time datetime="<?php the_time('Y-m-d')?>"><?php the_time('F jS, Y') ?></time>
    </header>
    <section>
      <?php if ( has_post_thumbnail( $post->ID ) ) { ?>
      <div class="featured-image">
        <?php the_post_thumbnail( 'large' ); ?>
      </div>
      <?php } ?>
      <?php the_content(); ?>
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

  <div class="grid_12 bottom-widget-zones" id="bottom-widget-zone">
    <?php dynamic_sidebar("bottom-widget-zone"); ?>
  </div>
</div>

<?php get_footer(); ?>
