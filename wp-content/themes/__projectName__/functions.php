<?php
    /**
     *
     * functions.php
     * Fichier de modification du comportement du WordPress
     *
     * Appel des fonctions selon l'utilisation : ajax, admin, front ou all
     * Inclure les fonctions à utiliser sur le projet dans le fichier correspondant function/
     * Inclure la fonction dans un fichier à son nom function/front/ ou function/admin/ ou function/ajax/
     *
     * Les fonctions récurentes sur les projets sont déjà dans les répertoires associés,
     * il faut décommenter leur appel dans le fichier associé dans function/
     *
     */
    $templatepath = get_template_directory();

    if ( defined('DOING_AJAX') && DOING_AJAX && is_admin() ) {

        include( $templatepath.'/function/ajax.php' );

    } elseif ( is_admin() ) {

        include( $templatepath.'/function/admin.php' );

    } elseif ( !defined( 'XMLRPC_REQUEST' ) && !defined( 'DOING_CRON' ) ) {

        include( $templatepath.'/function/front.php' );

    } else {

        include( $templatepath.'/function/all.php' );
    }


    /**
     *
     * Liste des fonctions pour une utilisation front, back et ajax
     *
     */

    //require_once('function/all/cpt.php');
    //require_once('function/all/log_user.php');
    //require_once('function/all/menu.php');
    //require_once('function/all/wp_bootstrap_navwalker.php');


    //remove_role('subscriber');
    //remove_role('contributor');
    //remove_role('editor');
    //remove_role('author');


    /**
     * Custom theme
     */

    // CUSTOM POST TYPE
    /*function cpt_init() {
        // Valeurs entrés
        $nom = "site";
        $menu_name = "Sites";
        $genre = "M";

        $result = init($nom,$menu_name,$genre);
        CreateCPT($result);
    }
    add_action('init', 'cpt_init');*/
