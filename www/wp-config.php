<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
    $_SERVER['HTTPS'] = 'on';
    define('FORCE_SSL_ADMIN', true);
}

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'wordpress' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'password' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'db' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'Z:Q8^}G_d`lw0l &o_r?K1`}Q8BR,Dj0.JRQu)htj`8dh%TId==pG+/-LL)BR;5~' );
define( 'SECURE_AUTH_KEY',  ' wVjN*SN@pU)zu)eb%XR6Uxs.ch>#TRS*XxF@j3!L>5fGf*#JpV8Oy0O_0>~Ggkb' );
define( 'LOGGED_IN_KEY',    ',i$|Yz!UsL{-wNum0ox#18,^BDtj.uE!PIXgIZ|4QQD1r(oGyLA+WiUI{.[uG~Kf' );
define( 'NONCE_KEY',        'D[HnO#,8|>H2~g]<aEHGMa?HF*GrNz  mhgnlybUrZQo,w?*x(us~r^SY0bPVV9@' );
define( 'AUTH_SALT',        'x&&(`H>:mxrLak~{OG,;Vn|Js84NU)]>?6,>  FB3EfG&EkG$^&7/[+^0tK81C1P' );
define( 'SECURE_AUTH_SALT', 'Ynf6!xj~ -hRL>d=IkMp;m((]Ty6Yb-d=sn5J9OskFC9#2NUFrbS<%p;Y*@J$p.I' );
define( 'LOGGED_IN_SALT',   'u.mj}AjW(==,| N3GG|J,%f-<NP e@._`Sv:im_$)(p>Th.QaaNet??~mZb-nt2h' );
define( 'NONCE_SALT',       '|&y1i<$ Oiu,_SbA2R^:~S|pOaVoEhSe!y8TLHV.)I$=fN^M~J02?SDrQp3c#?Te' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );