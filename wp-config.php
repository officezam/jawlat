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
define('DB_NAME', 'jawlat-dev');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '3yr56EVr>?%Hv?#bqIlr:FA^Ag0=4S*_])#z2G1;?nh?Je6;Z5M`}:ICbt|SRb*.');
define('SECURE_AUTH_KEY',  'e8g3$|Uk~Z@D][p9X#~NVl8<yfRTU_-J[.GC1Ud/WJWCt*BksyR@(x(g!{C9z=Oo');
define('LOGGED_IN_KEY',    ']q+-^Ue5QxKHYOMZO)`V^}9LiNE)C`k|2u!#[TtLjMG!wMHz,Ss6HJl0zHAx?^no');
define('NONCE_KEY',        'VRC!:k{QG$0kl9yy.(oXQjW/@3;$)zi)Ff)~)87n2zoMf<?hm336YVLGQP.?&eL5');
define('AUTH_SALT',        't#he%1m%u[6~&u@ad)~{fA;8y-nuZ~S:n&yz)V&#h7sBhWV[N/d;34!yGl.jYu1u');
define('SECURE_AUTH_SALT', 'onkfkgV0o.)@8$yog,a(An_}de[Hc_GG6 *~jbRmBVv^ws^x*(*`M6Mg~SCqC bw');
define('LOGGED_IN_SALT',   '3_IS4OTe^AbBV4#,5|&%x%B<4F[2jPsP8,.d]>_N%20YnPpMtkKgiZpDK-;5T:!l');
define('NONCE_SALT',       'Gvi}eyrS`${5j>z8|=wSbca/uhpr#*1TJ1e}j[ES4?!isQx#qKRV+DT{aEK>kQ)D');

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
 */

if (!session_id())
	session_start();



if (isset($_REQUEST['lang'])){  $_SESSION['language'] = $_REQUEST['lang'];}



// Set Default Language Arabic


if ( !defined('Language') ){
	if(!empty($_SESSION['language']))
	{
		define('Language', $_SESSION['language']);
	}else{
		define('Language', 'Arabic');
	}
}

define('WP_DEBUG', false);
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
