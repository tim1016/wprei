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
if(file_exists(dirname(__FILE__) . '/local.php')){
	define('DB_NAME', 'resonancedb');
	define('DB_USER', 'dbuser');
	define('DB_PASSWORD', '123');
	define('DB_HOST', 'localhost');
}else{
	define('DB_NAME', 'inkanta3_db1');
	define('DB_USER', 'inkanta3_wp154');
	define('DB_PASSWORD', 'Diamondsun961@');
	define('DB_HOST', 'localhost');
	
}



/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'R*Q$2(/!#jVWrRecq{7;Wn!xJ!.@dwp/4Yq{d87dy]0w`BSay_aRl(o5uY<7}:!J');
define('SECURE_AUTH_KEY',  'ybqLl +Lm]EW4}adODlV9&Xer9=3SAqMl50vj[YfP~vyAs$F|#+<R28>#>`h{7E>');
define('LOGGED_IN_KEY',    'ZKB~nf;>#}_m;=awmpkw8s((wwg`yV&wX<Zx|F+w~$ pE*[-9er[gr)EPr=h+59|');
define('NONCE_KEY',        'Qx9DFpm4G`,Z-d|s6S~P`r+R8k?}`]MeczmNd4]EOv?i+P{2]+cz&s>@S@zNDq*L');
define('AUTH_SALT',        'jbDOQcSO+E|j1sraJDs2$h(xuObr(_.g?*oZ=.;/OBD!k^L|B0}]ngwE/(f)Qq|T');
define('SECURE_AUTH_SALT', '|%pHz$CoEmq^,;cW>g6Ly 3=~[fsyc:.>qm?V[$moul.Y[ U+q`w=zYG67$63=VB');
define('LOGGED_IN_SALT',   ':o1HEt[@U8kHn* `3g-/g,P-p}]2AI^*c 4$ccsrA.Ha>Y~|g|Y <lPZ`iyg<hxe');
define('NONCE_SALT',       't-R8x|X&,Lf+JnkdnNXPhJY0AUaWa3Ojk^SDx2:H[DHfk}ZVzGxS,NRcQH,(f#~Y');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
 
define('WP_DEBUG', true);
define( 'WP_DEBUG_DISPLAY', true );
*/



// Turn debugging on
define('WP_DEBUG', true);

// Tell WordPress to log everything to /wp-content/debug.log
define('WP_DEBUG_LOG', true);

// Turn off the display of error messages on your site
define('WP_DEBUG_DISPLAY', true);

// For good measure, you can also add the follow code, which will hide errors from being displayed on-screen
@ini_set('display_errors', 1);
@ini_set('error_prepend_string',"<div class='error'>")  ;
@ini_set('error_append_string',"</div>")  ;
@ini_set('display_errors', 1);
@ini_set('display_startup_errors', 1);


/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
