<?php
/**
 * The template for displaying Tag pages
 */

get_header(); ?>

    <?php if ( have_posts() ) : ?>

        <h1><?php single_tag_title(); ?></h1>

        <?php
        // Show an optional term description.
        $term_description = term_description();
        if ( ! empty( $term_description ) ) :
            printf( '<p>%s</p>', $term_description );
        endif;
        ?>

        <?php while ( have_posts() ) : the_post(); ?>

            <?php the_title(); ?>
            <?php the_content(); ?>

        <?php endwhile; ?>

    <?php else : ?>

        <p>Aucun tag ne correspond</p>

    <?php endif; ?>

<?php get_footer(); ?>

