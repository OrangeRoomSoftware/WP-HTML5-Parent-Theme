<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */
get_header(); ?>

<div id="main" class="container_12">
  <div class="grid_12 top-widget-zones" id="top-widget-zone">
    <?php dynamic_sidebar("top-widget-zone"); ?>
  </div>

  <?php get_sidebar(); ?>
  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
      <?php if ( is_active_sidebar( $sidebar_widget_zone_id ) or has_nav_menu('sidebar') ) { $grid = 10; } else { $grid = 12; } ?>
			<?php if ( is_active_sidebar( $sidebar_widget_zone_id ) ) {  ?>
			<aside class="grid_2">
        <section id="sidebar">
          <?php dynamic_sidebar("sidebar-widget-zone"); ?>
        </section>
			</aside>
			<?php } ?>
      <article <?php post_class('grid_' . $grid) ?> id="page-<?php the_ID(); ?>">
        <section>
          <div class="featured-image">
            <?php if ( has_post_thumbnail( $post->ID ) ) echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
          </div>
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

  <div class="grid_12 bottom-widget-zones" id="bottom-widget-zone">
    <?php dynamic_sidebar("bottom-widget-zone"); ?>
  </div>
</div>

<?php get_footer(); ?>
