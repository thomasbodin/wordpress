<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post();?>
	<div id="maincontent">


        <?php the_post_thumbnail('medium'); ?>


    </div><!-- #maincontent -->
<?php endwhile; endif; ?>

<?php get_footer(); ?>