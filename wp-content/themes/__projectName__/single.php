<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post();?>
	<div id="maincontent">

        <h1><?php the_title(); ?></h1>

        <?php the_post_thumbnail('medium'); ?>

        <div id="fb-root"></div>
        <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>

        <div class="fb-like" data-href="https://www.facebook.com/Agence.BALTAZARE?fref=nf" data-width="450"></div>


    </div><!-- #maincontent -->
<?php endwhile; endif; ?>

<?php get_footer(); ?>