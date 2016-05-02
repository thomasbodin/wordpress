<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Le script de création wp-config.php utilise ce fichier lors de l'installation.
 * Vous n'avez pas à utiliser l'interface web, vous pouvez directement
 * renommer ce fichier en "wp-config.php" et remplir les variables à la main.
 *
 * Ce fichier contient les configurations suivantes :
 *
 * * réglages MySQL ;
 * * clefs secrètes ;
 * * préfixe de tables de la base de données ;
 * * ABSPATH.
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'votre_nom_de_bdd');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'votre_utilisateur_de_bdd');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'votre_mdp_de_bdd');

/** Adresse de l'hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8');

/** Type de collation de la base de données.
 * N'y touchez que si vous savez ce que vous faites.
 */
define('DB_COLLATE', '');

/**#@+
 * Clefs uniques d'authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n'importe quel moment, afin d'invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '>7F{]oHmdh?:uV_AY~ia(&,uz`AIfh]3!9Tz/4. *vKB@Wfbm&eKs}}9MnFmv} ~');
define('SECURE_AUTH_KEY',  '3h/zje+@>98VQd5g#02>}nY?+.+BrzrhB~e#%$u2W/beG-w4J@Z.J9`RIT-%~VaG');
define('LOGGED_IN_KEY',    'FI-UR{41)UmYQFt92]@t6swIB<;g}/-rO)|y}~kPA!w.ILp?:Dx|6){Ks|vxxXuk');
define('NONCE_KEY',        'b2e|rK^S(At@!_H6%q,sI%`jwAhn&PJ([uA^Q~/2C=Cb!7G>hsJbWfl>;zTn=d|&');
define('AUTH_SALT',        ',GqD]hx-8)yl)U9PrlE.tIq)3eu=ig8q!#)D1CG|jg1k4Q1h@MN;~*[5D(L>-#&x');
define('SECURE_AUTH_SALT', '*CDDi%GN>fM FmV#N D&@wTLU-MAB_?JC?{Zy&n<~sYn/jPTO]n}t>-^[++|d(_m');
define('LOGGED_IN_SALT',   't)ts9cuW/JfX |do<mvmTI9cMZYpAtVZ[/d-9aJ]EE-YBUU^-Wi}4miA)6RJ]8`P');
define('NONCE_SALT',       '|@zn ]!p:sD  &)@u:+/9LhD5rKw*8T0H^c>){r!C=L8;n429T<cB]`gUsYsW9_ ');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N'utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés!
 */
$table_prefix  = 'bltzr_';

/**
 * Activation du debug WP si le site est :
 * en local
 * sur baltazarestudio.fr
 */
function in_dev(){
	$devServ = [
			'localhost',
			'bltzr.fr',
			'127.0.0.1',
	];

	return (in_array( $_SERVER['SERVER_NAME'],$devServ));
}

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l'affichage des
 * notifications d'erreurs pendant votre essais.
 * Il est fortemment recommandé que les développeurs d'extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour obtenir plus d'information sur les constantes
 * qui peuvent être utilisée pour le déboguage, consultez le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', in_dev());

/* C'est tout, ne touchez pas à ce qui suit ! Bon blogging ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');

define( 'DBI_AWS_ACCESS_KEY_ID', 'AKIAIB2VEMLN3WCY5ERA ' );
define( 'DBI_AWS_SECRET_ACCESS_KEY', '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 ' );
