<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */

// Do not delete these lines
  if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die ('Please do not load this page directly. Thanks!');

  if ( post_password_required() ) { ?>
    <p class="nocomments">This post is password protected. Enter the password to view comments.</p>
  <?php
    return;
  }
?>

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>
  <h3 id="comments"><?php the_title(); ?></h3>

  <ol class="commentlist">
  <?php wp_list_comments('type=comment'); ?>
  </ol>

 <?php else : // this is displayed if there are no comments so far ?>
  <?php if ( comments_open() ) : ?>
    <!-- If comments are open, but there are no comments. -->
  <?php endif; ?>
<?php endif; ?>


<?php if ( comments_open() ) : ?>
<section id="respond">
  <?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
  <p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
  <?php else : ?>

  <?php comment_form(); ?>

  <?php endif; // If registration required and not logged in ?>
</section>

<?php endif; // if you delete this the sky will fall on your head ?>
