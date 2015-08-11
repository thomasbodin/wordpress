<div class="col-sm-3">
    <div class="site" style="background:<?php the_field('background');?>">
        <a href="<?php the_permalink();?>">
            <?php the_post_thumbnail('medium', array('class' => 'img-responsive')); ?>
        </a>
        <a class="bouton-site" target="_blank" href="<?php the_field('url');?>">Site</a>
        <a class="bouton" target="_blank" href="<?php the_field('url_admin');?>">Admin</a>
    </div>
</div>