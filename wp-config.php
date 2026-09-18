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
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */


define( 'WP_CACHE', true );

set_time_limit(300); 

define( 'DISALLOW_FILE_EDIT', false );

define( 'DISALLOW_FILE_MODS', false );

define('DISABLE_WP_CRON', true);

define('WP_DEBUG_LOG', true);

define('WP_DEBUG_DISPLAY', false);

define('SAVEQUERIES', false );

define('WP_MEMORY_LIMIT', '512M');

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'gloshexp_database' );

/** Database username */
define( 'DB_USER', 'gloshexp_admin' );

/** Database password */
define( 'DB_PASSWORD', 'GloShiExp@2026' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define('AUTH_KEY',         '%V5@(%tf-t5,vVs@^btW<j-Y)5oUa>1m3`az8/qy:6Kl5w!N_89|xL>0QfMgFQ]k');
define('SECURE_AUTH_KEY',  'n+~7QMUUZ_f#az>s$|@DrI {gCW+Aw-Ny{_8z0a^S_`/4kK:[59}(jh-|Inv7a5*');
define('LOGGED_IN_KEY',    '8$jV:.S?HJph~g(nh=[s(#6m+ nPuj*4E@_cTU*dzbx%Vwd3N?IDx..sGiO<}e4W');
define('NONCE_KEY',        '*4)4L6o1?# vF?|3ir:4! U%V5<v AE3*7/U$HSs~x vi]x(w0eu4c>/^NNL+<A;');
define('AUTH_SALT',        'OUdk;v^MTA{6}zQtP ZEj{*Mi3a.,t.Hj9 l>?[NIV}m?g>THM++{sR>shnLtw n');
define('SECURE_AUTH_SALT', 'A=tx<_:+.up-ri#y=:g[q:TWf@A]NDDor4P%U85e2FW9c}ufudFoSkD18l|~K~Vh');
define('LOGGED_IN_SALT',   'YhDxr/T1B=Uj27(a<ob]*#X6aTh=Q?>[aw3gp|&{I=*#gZ?h4!|7qKi=~JopPa^M');
define('NONCE_SALT',       'Llu7omLjNU~$4W@e~&!p^^i+cN[GNy./DFwYnqd|]9yj,*y+/6L/GD.A:s8T~?10');

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'ges_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */

ini_set( 'log_errors', '1' );
ini_set( 'error_log', __DIR__ . '/wp-content/debug.log' );



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
