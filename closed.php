<?php
/*
  Template Name: Closed Page
 */
?>
<html>
  <head>
    <title>Sorry, We Are Closed</title>
    <style>
      html { background: white; color: black; }
    </style>
  </head>
  <body>
    <?php if (have_posts()) : while (have_posts()) : the_post();?>
      <?php the_content(); ?>
    <?php endwhile; endif; ?>
  </body>
</html>
