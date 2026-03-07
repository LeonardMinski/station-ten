<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          '_BGo~2OC9M!4!7p{uFBgFiSlnvQoD|NCUoEEM%2aJE5GUJ[*eT]t56@/d:`Dte[n' );
define( 'SECURE_AUTH_KEY',   '62l*9{c?yGv14wldf<Z=.xgKE%U/QaIA34=oN4S_J]NW{:N!`so{:@b@gx^M;6I]' );
define( 'LOGGED_IN_KEY',     '3CfZ8;o$9U=Du?obmmW^rL1&+=7S7I2ufD@:=8_l8YfThQ+{(D&h-1^J4?HG!VyE' );
define( 'NONCE_KEY',         'B/t]A!_30$!!nZ+)_YQW!l,P7(n2qI![8uCMS:rZWgKft0<wM2KI.AEtl63vB{YX' );
define( 'AUTH_SALT',         '>Q<VKO<?d#:p,QS``(vrzIMw}XM7Im 3~a pw*RWdwBncPlLNL:nDng[M9}ri1;v' );
define( 'SECURE_AUTH_SALT',  '{&wRx$ni_HA/Q7=m|az0];Ow8hMQ_~ZNFtha}8ZK$o9*8iPgvD~(UVd,NeT.HyTm' );
define( 'LOGGED_IN_SALT',    '.Kh(J_259P6iH Q/y:4^nZ$W%S4L#CFdwKqR(~f[I[&wF NV-5jQ{rsGIddtV+=(' );
define( 'NONCE_SALT',        '4fP$qG5jp#Y*WS^Es)154ibj)f-j#@+jP*0!t!Xz`[FZ)t&+X.Iy)mtH1hr;O)`!' );
define( 'WP_CACHE_KEY_SALT', 'Raa(,j`(ZB0C5#$>@cxhGQ]&t:4;[}Sg%FyDGEtQ::UU<BlJ!(.t9-UR)*{.}{{t' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
