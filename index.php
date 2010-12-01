<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */

get_header(); ?>

<section id="main" role="main" class="container_12">
  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
      <article <?php post_class('grid_12') ?> id="post-<?php the_ID(); ?>">
        <header>
          <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
          <time datetime="<?php the_time('Y-m-d')?>"><?php the_time('F jS, Y') ?></time>
        </header>
        <section>
          <?php the_content('Read more &#9660;'); ?>
        </section>
      </article>
    <?php endwhile; ?>
    <nav>
      <div id="older"><?php next_posts_link('&#9664; Older Entries') ?></div>
      <div id="newer"><?php previous_posts_link('Newer Entries &#9654;') ?></div>
    </nav>
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