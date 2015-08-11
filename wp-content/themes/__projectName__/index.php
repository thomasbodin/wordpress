<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post();?>
    <div  id="maincontent">


        <div id="actifs" class="list_sites">
            <div class="container">

                <?php $sites = new WP_Query(array('post_type' => 'site', 'orderby' => 'date', 'order' => 'ASC', 'posts_per_page' => '-1','tax_query' => array(
                    array(
                        'taxonomy' => 'Typedesite',
                        'field'    => 'slug',
                        'terms'    => 'actifs',
                    )
                ),)); ?>

                <div id="valide" class="row typesite">
                    <div class="col-md-12">
                        <h2>Sites <span>Actifs</span> <em class="pull-right"><?php echo $sites->found_posts; ?></em></h2>
                    </div>
                </div>
                <div class="row">

                    <?php while ($sites->have_posts()) : $sites->the_post();?>

                        <?php include('templates/site.php'); ?>

                    <?php endwhile; ?>

                </div>
            </div>
        </div><!-- .actifs -->


        <div id="studio" class="list_sites">
            <div class="container">

                <?php $sites = new WP_Query(array('post_type' => 'site', 'orderby' => 'date', 'order' => 'ASC', 'posts_per_page' => '-1','tax_query' => array(
                    array(
                        'taxonomy' => 'Typedesite',
                        'field'    => 'slug',
                        'terms'    => 'studio',
                    )
                ),)); ?>

                <div id="valide" class="row typesite">
                    <div class="col-md-12">
                        <h2> <span>studio</span> <em class="pull-right"><?php echo $sites->found_posts; ?></em></h2>
                    </div>
                </div>
                <div class="row">

                    <?php while ($sites->have_posts()) : $sites->the_post();?>

                        <?php include('templates/site.php'); ?>

                    <?php endwhile; ?>

                </div>
            </div>
        </div><!-- .studio -->



        <div id="ecommerce" class="list_sites">
            <div class="container">

                <?php $sites = new WP_Query(array('post_type' => 'site', 'orderby' => 'date', 'order' => 'ASC', 'posts_per_page' => '-1','tax_query' => array(
                    array(
                        'taxonomy' => 'Typedesite',
                        'field'    => 'slug',
                        'terms'    => 'ecommerce',
                    )
                ),)); ?>


                <div id="ecommerce" class="row typesite">
                    <div class="col-md-12">
                        <h2>Sites <span>eCommerce</span> <em class="pull-right"><?php echo $sites->found_posts; ?></em></h2>
                    </div>
                </div>
                <div class="row">

                    <?php while ($sites->have_posts()) : $sites->the_post();?>

                        <?php include('templates/site.php'); ?>

                    <?php endwhile; ?>

                </div>
            </div>
        </div><!-- ecommerce -->


        <div id="dev" class="list_sites">
            <div class="container">

                <?php $sites = new WP_Query(array('post_type' => 'site', 'orderby' => 'date', 'order' => 'ASC', 'posts_per_page' => '-1','tax_query' => array(
                    array(
                        'taxonomy' => 'Typedesite',
                        'field'    => 'slug',
                        'terms'    => 'developpement',
                    )
                ),)); ?>

                <div id="developpement" class="row typesite">
                    <div class="col-md-12">
                        <h2>Sites en <span>Développement</span> <em class="pull-right"><?php echo $sites->found_posts; ?></em></h2>
                    </div>
                </div>
                <div class="row">

                    <?php while ($sites->have_posts()) : $sites->the_post();?>

                        <?php include('templates/site.php'); ?>

                    <?php endwhile; ?>

                </div>
            </div>
        </div><!-- .developpement -->


        <div id="valide" class="list_sites">
            <div class="container">

                <?php $sites = new WP_Query(array('post_type' => 'site', 'orderby' => 'date', 'order' => 'ASC', 'posts_per_page' => '-1','tax_query' => array(
                    array(
                        'taxonomy' => 'Typedesite',
                        'field'    => 'slug',
                        'terms'    => 'valides',
                    )
                ),)); ?>


                <div id="valide" class="row typesite">
                    <div class="col-md-12">
                        <h2>Sites <span>validés</span> <em class="pull-right"><?php echo $sites->found_posts; ?></em></h2>
                    </div>
                </div>
                <div class="row">

                    <?php while ($sites->have_posts()) : $sites->the_post();?>

                        <?php include('templates/site.php'); ?>

                    <?php endwhile; ?>

                </div>
            </div>
        </div><!-- #valides -->

    </div><!-- #maincontent -->
<?php endwhile; endif; ?>

<?php get_footer(); ?>

Actif
Studio
Ecommerce
Dev
Valide