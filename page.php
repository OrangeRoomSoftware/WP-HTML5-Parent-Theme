<?php
get_header(); ?>

<div id="main" class="container_12 page">
  <div class="grid_12 top-widget-zones" id="top-widget-zone">
    <?php dynamic_sidebar("top-widget-zone"); ?>
  </div>

  <?php include_once('sidebar.php'); ?>

  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
      <article <?php post_class('grid_' . $grid) ?> id="page-<?php the_ID(); ?>">
        <section>
          <?php if ( has_post_thumbnail( $post->ID ) and !strstr($content, '[slideshow') and !get_post_type() ) { ?>
          <div class="featured-image">
             <?php the_post_thumbnail( 'large' ); ?>
          </div>
          <?php } ?>
          <?php the_content(); ?>
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

  <div class="grid_12 bottom-widget-zones" id="bottom-widget-zone">
    <?php dynamic_sidebar("bottom-widget-zone"); ?>
  </div>
</div>

<?php get_footer(); ?>
