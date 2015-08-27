<?php
    /**
     *
     * functions.php
     * Fichier de modification du comportement du WordPress
     *
     * Appel des fonctions selon l'utilisation : ajax, admin, front
     * Inclure les fonctions à utiliser sur le projet dans le fichier correspondant inc/
     * Inclure la fonction dans un fichier à son nom inc/front/ ou inc/admin/ ou inc/ajax/
     *
     * Les fonctions récurentes sur les projets sont déjà dans les répertoires associés,
     * il faut décommenter leur appel dans leur appel dans le fichier associé dans inc/
     *
     */


    /**
     * Functions specific to the project here
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
     * Page option
     */
    /*if( function_exists('acf_add_options_page') ) {
        acf_add_options_page();
        acf_add_options_sub_page('Général');
    }*/


    /**
     * Extrait & Content
     */
    /*function excerpt($limit) {
        $excerpt = explode(' ', get_the_excerpt(), $limit);
        if (count($excerpt)>=$limit) {
            array_pop($excerpt);
            $excerpt = implode(" ",$excerpt).'...';
        } else {
            $excerpt = implode(" ",$excerpt);
        }
        $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
        return $excerpt;
    }
    function content($limit) {
        $content = explode(' ', get_the_content(), $limit);
        if (count($content)>=$limit) {
            array_pop($content);
            $content = implode(" ",$content).'...';
        } else {
            $content = implode(" ",$content);
        }
        $content = preg_replace('/\[.+\]/','', $content);
        $content = apply_filters('the_content', $content);
        $content = str_replace(']]>', ']]&gt;', $content);
        return $content;
    }*/


    /**
     * CPT
     */
    /*function cpt_init() {
        // Valeurs entrés
        $nom = "site";
        $menu_name = "Sites"; // Nom du menu. Par défaut il prend la valeur de $nom
        $genre = "M"; // Genre du mot F pour féminin, M pour masculin par défaut Masculin

        $result = init($nom,$menu_name,$genre);
        CreateCPT($result);
    } // FIN DE LA CREATION DES CUSTOM POST TYPE, IL FAUT METTRE TOUS LES CODES AVANT !
    add_action('init', 'cpt_init');

    add_action( 'init', 'create_book_tax' );
    function create_book_tax() {
        register_taxonomy(
            'Typedesite',
            'site',
            array(
                'label' => 'Type de site',
                'rewrite' => array( 'slug' => 'type_de_site'),
                'hierarchical' => true,
            )
        );
    }*/


    /**
     * ACF
     */
    /*if( function_exists('acf_add_options_page') ) {
        acf_add_options_page();
        acf_add_options_sub_page('Ajouter des slides au carousel');
    }*/


    /**
     * Affichage des erreurs dans la balise <pre>
     */
    /*function vardump($var){
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
    }*/


    /**
     * Décalaration de la varialbe pour savoir si on est en espace
     * de dev ou en prod pour l'affiche des erreurs
     */
    /*function in_dev(){
        $devAdress = ['82.227.107.39','127.0.0.1','109.190.89.92','37.162.4.188'];
        return in_array($_SERVER['REMOTE_ADDR'],$devAdress) ? true : false;
    }*/


    /**
     * @return string Get user role
     * Get user role
     */
    /*function get_current_user_role() {
        global $wp_roles;
        $current_user = wp_get_current_user();
        $roles = $current_user->roles;
        $role = array_shift($roles);
        return isset($wp_roles->role_names[$role]) ? translate_user_role($wp_roles->role_names[$role] ) : false;
    }
    // Supprime les roles inutiles
    remove_role('subscriber');
    remove_role('contributor');
    remove_role('editor');
    remove_role('author');*/

    /**
     * Logs users
     */
    /*add_action( 'init', 'wp_log_last_visit' );
    //Enregistre les visites des users connecté à wp
    function wp_log_last_visit(){
        $time_between2log = 3600;  // temps en seconde entre 2 log
        $userId = get_current_user_id();
        // Je récupère la dernière connexion si elle existe déja
        $visit = get_user_meta($userId, 'last_connexion');
        // S'il n'y a pas de note, j'entre une note
        if (empty($visit))
            add_user_meta($userId, 'last_connexion', time());
        // Sinon, j'update celle existante seulement si il s'est passé le temps entre les 2 logs
        elseif (time() > $visit[0] + $time_between2log) {
            update_user_meta($userId, 'last_connexion', time());
        }
    }
    add_filter('manage_users_columns', 'add_status_column');
    add_filter('manage_users_custom_column', 'manage_status_column', 10, 3);
    function add_status_column($columns) {
        $columns['last_connexion'] = 'Dernière connexion';
        return $columns;
    }
    function manage_status_column($empty='', $column_name, $id) {
        if( $column_name == 'last_connexion' ) {
            $visit = get_user_meta($id, 'last_connexion');
            if(!empty($visit)){
                $last_connexion = strftime('%d/%m/%Y à %Hh%M',$visit[0]);
                return $last_connexion;
            }else{
                return 'Pas encore connecté';
            }
        }
    }*/


    /**
     * A MODIFIER EN "?" en changement de permalink
     */
    //$union = isset($_GET) && !empty($_GET) ? '&' : '?';
