<?php
/*
Template Name: Links
*/

get_header();
get_sidebar(); 
?>

<div id="main">

  <h2>Links:</h2>
  <ul>
    <?php wp_list_bookmarks(); ?>
  </ul>

</div>

<?php get_footer(); ?>