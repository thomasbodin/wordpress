<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post();?>
    <div id="maincontent">

        <div class="container">

            <div class="row">

                <div class="col-md-12">

                </div>

            </div>

        </div>


    </div><!-- #maincontent -->
<?php endwhile; endif; ?>

<?php get_footer(); ?>