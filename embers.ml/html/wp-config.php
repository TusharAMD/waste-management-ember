<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'embers' );

/** MySQL database username */
define( 'DB_USER', 'userx' );

/** MySQL database password */
define( 'DB_PASSWORD', 'Embers@100' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

define('FS_METHOD', 'direct');
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */

define('AUTH_KEY',         'D^jm,v(04!&(]xx>e?pNZI6>I@~Uw;|-#{nx3YV0]CMEFKI`x&st_ou`Tg+8%NoN');
define('SECURE_AUTH_KEY',  '[Tpb}7x#?GH+[m,5}k2U:CJ}eHvm6se5?Q3C:[H|ZG*q`0)?l;h;:n-n _&&]ML{');
define('LOGGED_IN_KEY',    'x??2{5>dB%QWJ~?[.lyT`>jw8ay_mnaR* a8B~S^=PZki8}u+z|;~QE^8RV.#Lw|');
define('NONCE_KEY',        'jRp3-; <AflNJwAV+.*uP$O[gn6`=.)Vw=GX/Q-B)5P?AqDNef A7^-ZC]`@-lu(');
define('AUTH_SALT',        'm9p{0%Q;>lYJjCRoy@W=)8<)LaIHX`u^P#?TJO}#bo?7lTBH=-=W_ CnZ${@:+p-');
define('SECURE_AUTH_SALT', '+@L!0#JM9*-rP(y[G^s_pI-,YFPO1g97#+x]2.khU.e#H$keHNtME];)Ve:+(Nyt');
define('LOGGED_IN_SALT',   'W*+|E|8r|RZHq=F75Ch|oYo1-XPAMK@%)60OUuW?P_$5PEHbGo(j,~VhJ%Au|!b5');
define('NONCE_SALT',       '1eKq1|=8i_<I92 -8@ACjKAinB rE};z!=AE:;-7Npq9K}3[e&llm_x~2c<=|``8');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
