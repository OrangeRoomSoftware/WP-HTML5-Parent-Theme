<?php
// Change number or products per row to 3
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
  function loop_columns() {
    return 3; // 3 products per row
  }
}

get_header(); ?>

<div id="main" class="container_12 page">
  <div class="grid_12 top-widget-zones" id="top-widget-zone">
    <?php dynamic_sidebar("top-widget-zone"); ?>
  </div>

  <?php include_once('sidebar.php'); ?>

  <article <?php post_class('grid_' . $grid) ?> id="page-<?php the_ID(); ?>">
    <section>
      <?php if (woocommerce_content()) : ?>
        <?php while (have_posts()) : the_post(); ?>
          <?php if ( has_post_thumbnail( $post->ID ) ) { ?>
            <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
          <?php } ?>
          <?php the_content(); ?>
        <?php endwhile; ?>
      <?php endif; ?>
      </div>
    </section>
  </article>

  <div class="grid_12 bottom-widget-zones" id="bottom-widget-zone">
    <?php dynamic_sidebar("bottom-widget-zone"); ?>
  </div>
</div>

<?php get_footer(); ?>
