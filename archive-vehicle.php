<?php
get_header();

global $wp_query;
$page_num = $paged;
if($pagenum='') $pagenum = 1;
$wp_query = new WP_Query( "showposts=20&post_type=vehicle&post_status=publish&paged=" . $page_num );
?>

<div id="main" class="container_12 vehicles">
  <div class="grid_12 top-widget-zones" id="top-widget-zone">
    <?php dynamic_sidebar("top-widget-zone"); ?>
  </div>

  <?php include_once('sidebar.php'); ?>

  <?php if (have_posts()) : ?>
    <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
      <article <?php post_class('inventory grid_' . $grid) ?> id="post-<?php the_ID(); ?>">
        <div class="vehicle">
          <header>
            <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
            <time datetime="<?php the_time('Y-m-d')?>"><?php the_time('F jS, Y') ?></time>
          </header>
          <section>
            <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
            <?php the_excerpt(); ?>
          </section>
        </div>
      </article>
    <?php endwhile; ?>
    <nav>
      <div id="older"><?php next_posts_link('&#9664; Older Entries') ?></div>
      <div id="newer"><?php previous_posts_link('Newer Entries &#9654;') ?></div>
      <?php posts_nav_link(); ?>
    </nav>
  <?php else : ?>
    <article <?php post_class('grid_12') ?> id="404-not-found">
      <header>
        <h2>Vehicle Not Found</h2>
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