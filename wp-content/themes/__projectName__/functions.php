<?php
require_once('functions/wp_bootstrap_navwalker.php');
require_once('functions/cpt.php');

// Image à la une
if(function_exists('add_theme_support')) {
    add_theme_support( 'post-thumbnails' );
}

// Menu
function register_my_menu() {
    register_nav_menu('principal',__( 'Menu Principal' ));
}
add_action( 'init', 'register_my_menu' );

// Page option
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page();
    acf_add_options_sub_page('Général');
}


// Extrait & Content
function excerpt($limit) {
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
}

// CPT
function cpt_init() {
    /******** A COPIER COLLER ET MODIFIER POUR CREER UN NOUVEAU CUSTOM POST TYPE ***********/
    // Valeurs entrés
    $nom = "site";
    $menu_name = "Sites"; // Nom du menu. Par défaut il prend la valeur de $nom
    $genre = "M"; // Genre du mot F pour féminin, M pour masculin par défaut Masculin

    $result = init($nom,$menu_name,$genre);
    CreateCPT($result);
    /********* FIN DE LA CREATION DU CUSTOM POST TYPE *********************/


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
}
