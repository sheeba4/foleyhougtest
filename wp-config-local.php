<?php
switch (@getenv("ENV"))
{
    case "local":
        // define('WP_HOME','http://local.foleyhoag.com');
        // define('WP_SITEURL','http://local.foleyhoag.com');
        define('DB_NAME','foleyhoag');
        define('DB_USER','foleyhoaguser');
        define('DB_PASSWORD','mysql1');
        define('DB_HOST','127.0.0.1');
        define('DB_CHARSET','utf8');
        define('DB_COLLATE','utf8_unicode_ci');
        define('WP_DEBUG',TRUE);
        define('WP_CACHE',FALSE);
        define('WPLANG','');
        break;
    case "prod": default:
        // define('WP_HOME','http://northpoint.wpengine.com');
        // define('WP_SITEURL','http://northpoint.wpengine.com');
        // # Database Configuration
        // define('DB_NAME','wp_northpoint');
        // define('DB_USER','northpoint');
        // define('DB_PASSWORD','ytl2A2WxtdZlf56CjOIK');
        // define('DB_HOST','127.0.0.1');
        // define('DB_HOST_SLAVE','localhost');
        define('DB_CHARSET', 'utf8');
        define('DB_COLLATE', 'utf8_unicode_ci');
        define('WP_DEBUG',FALSE);
        define('WP_CACHE',TRUE);
        define('WPLANG','');
        break;
}
$table_prefix = 'fh_';

# Security Salts, Keys, Etc
define('AUTH_KEY',         '.xz|u+_-w||31|&/$[6H^=`)kW.1a+cs`6ue&/Hj<=TK}USi`LM]op_9G^0#N:H9');
define('SECURE_AUTH_KEY',  ' 2_vU-q_1+OV@C+!<6+C.&alB}86V(m9dp-jAasYb]P_VGdG9ZS`L6CGjQ]Z}|3 ');
define('LOGGED_IN_KEY',    '+oM=P+-#811]L+8WxR-pH.m)}US&,#V-&vd1_y)+2UsW=,JL~Ryw$r-uMuBo|0tq');
define('NONCE_KEY',        '#_l2ED1&m0@flK$(-Pn9|+77~!3Ik}|cQP *P(Iu</$/  5jjBSY+=g08.O1z}aT');
define('AUTH_SALT',        '{o5/LD& `-Y#u[#aDlM6,Sp-Ty3s- f*rAyL z6Oz2VTt(D71)C{L4c=1OrUH<9u');
define('SECURE_AUTH_SALT', 's:gF?Yb ,+N*.N~V?w^LG0Vx++_bi7-9=|tiwhvW|,z:~!I)6 =/}}gH1BIh_}4k');
define('LOGGED_IN_SALT',   ' VUj*!!uDOjSsAHo+~+~`sR=cWE|Q^)1~d#T3_F$y9Xh]3S|}wmif!@,|qZNEg<I');
define('NONCE_SALT',       'LMTko*L.=|eW|*^oS,0As6w2t#4u;4[+3QAGp-y[3:ksSURMaAPC4nEl|3p}La}/');

# Localized Language Stuff

define('DISABLE_WP_CRON',false);

define('FORCE_SSL_LOGIN',false);

/*SSLSTART*/ if ( isset($_SERVER['HTTP_X_WPE_SSL']) && $_SERVER['HTTP_X_WPE_SSL'] ) $_SERVER['HTTPS'] = 'on'; /*SSLEND*/

define('WP_POST_REVISIONS',FALSE);

define('WP_TURN_OFF_ADMIN_BAR',false);

umask(0002);

define('DISALLOW_FILE_EDIT',FALSE);

define('DISALLOW_FILE_MODS',FALSE);

define('WP_AUTO_UPDATE_CORE',false);


#jetpack disable wordpress connection
define('JETPACK_DEV_DEBUG', true);

/* Multisite */
define( 'WP_ALLOW_MULTISITE', true );
// Should be enabled as a part of multisite set up. follow instructions on http://codex.wordpress.org/Create_A_Network
// define('MULTISITE', true);
// define('SUBDOMAIN_INSTALL', true);
// define('DOMAIN_CURRENT_SITE', 'local.foleyhoag.com');
// define('PATH_CURRENT_SITE', '/');
// define('SITE_ID_CURRENT_SITE', 1);
// define('BLOG_ID_CURRENT_SITE', 1);

/* Domain Mapping */
define( 'SUNRISE', 'on' );

# That's It. Pencils down
if ( !defined('ABSPATH') )
    define('ABSPATH', dirname(__FILE__) . '/');
require_once(ABSPATH . 'wp-settings.php');
