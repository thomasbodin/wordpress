<?php
/*
Template Name: Statistiques
*/

get_header(); ?>


    <div id="maincontent">

        <?php the_content(); ?>

        <?php

        $budget = 0;

        $sites = new WP_Query(array('post_type' => 'site', 'posts_per_page' => '-1'));

        while ($sites->have_posts()) : $sites->the_post();

        $budget += get_field('prix');

        endwhile; ?>

        <h1 style="color:white; margin-top: 0;"> Statistiques Baltazare </h1>

        <h2> Nombres de site = <?php echo $sites->found_posts; ?></h2>

        <h2> Total argent cummulé = <?php echo $budget ?></h2>

        <h2> Moyenne par site =  <?php echo round($budget / $sites->found_posts) ; ?></h2>

        <h2> Meilleur employé = Victor C. </h2>






    </div><!-- #maincontent -->


<?php get_footer(); ?>