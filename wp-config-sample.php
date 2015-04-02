<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'noddle');

/** MySQL database username */
define('DB_USER', 'noddle_user');

/** MySQL database password */
define('DB_PASSWORD', 'noddle_pass');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/** Eases database migrations */
define('WP_HOME', 'http://dev.noddle.com');
define('WP_SITEURL', 'http://dev.noddle.com');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'D~Hf!7=$;(VlDu]@jn%>6!IenIb,PjeiKiz9Vnz1oK$`@r|f!]~_zS%#) +BI0 z');
define('SECURE_AUTH_KEY',  'K{e!W){9| Kb1|OjDGnWJ?zSq+=0{VY*|,h]R MF?w|{U^XDX>=U8|?C{E8DNc6~');
define('LOGGED_IN_KEY',    '-eU#J7J~e$JUf-oT(mC|@+jJ1pR|)3^{0Tf(/G#[v/iCt$Dgb%>AyfMuVv! ZLY9');
define('NONCE_KEY',        '%o62e*:og<HtB(FcX+R`nU]Ol2N4X%LStL+zEkCBf.7#|sMxUknB6MD8Lprb|m=V');
define('AUTH_SALT',        '/6pxL|,4Ko#Y5K /%o$_7I-]oI+ $0*iWMC&/?(TPK.a9+ x)chu$?6VeH`JK~/>');
define('SECURE_AUTH_SALT', 'Bk-|/&*l@ tMFPZB1 }-$M-pTtlcmh~Q@Qh|[hxs6^N8[|R4fa=61ak~CW|-%g<x');
define('LOGGED_IN_SALT',   '+hC1nMoz LpB464 [cYh,x/+))rqRgKyx<9y+EdYf_Arn@~UW;1Tu>dPhS~_.!q+');
define('NONCE_SALT',       'O=O0LZ5].Q< u*iKv/#6;@E<0Mw+6|&#~bv(Sm()Wp0I1TD-Tmu@Mt9.awCw ?Ku');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
