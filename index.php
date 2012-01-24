<?php
get_header(); ?>

<div id="main" class="container_12 blog">
  <div class="grid_12 top-widget-zones" id="top-widget-zone">
    <?php dynamic_sidebar("top-widget-zone"); ?>
  </div>

  <?php include_once('sidebar.php'); ?>

  <?php if (have_posts()) : ?>
    <div class="articles grid_<?php echo $grid; ?>">
      <?php while (have_posts()) : the_post(); ?>
        <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
          <header>
            <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
            <time datetime="<?php the_time('Y-m-d')?>"><?php the_time('F jS, Y') ?></time>
          </header>
          <section>
            <?php if ( has_post_thumbnail( $post->ID ) and !strstr($content, '[slideshow') and !get_post_type() ) { ?>
              <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
            <?php } ?>
            <?php
            if ( $ors_theme_options['use_excerpts'] == 0 ) {
              the_content();
            } else {
              the_excerpt();
            }
            ?>
          </section>
        </article>
      <?php endwhile; ?>
      <nav>
        <div id="older"><?php next_posts_link('&#9664; Older Entries') ?></div>
        <div id="newer"><?php previous_posts_link('Newer Entries &#9654;') ?></div>
      </nav>
    </div>
  <?php else : ?>
    <article <?php post_class('grid_12') ?> id="404-not-found">
      <header>
        <h2>Not Found</h2>
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