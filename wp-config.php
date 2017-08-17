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
define('DB_NAME', 'suite');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'password');

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
define('AUTH_KEY',         'am)P9|w:IZNl#|S&.$?M0r#,a=qJVE><Zt0fWloqqg}PR?X#P))CJtrrqHMS<;Uf');
define('SECURE_AUTH_KEY',  '^x[vdWHg*fUUB47I@%~3je}7/n5q9XkQ.]:Z8Bt*4zyfU#POBs5ehNHF0DyE{&a!');
define('LOGGED_IN_KEY',    '}7t&l;?jqv56:RQAS_]pOWzv8h:0FDHj3/Ee1u#)0VN;u#}[aS*PD,06nWsT^)b5');
define('NONCE_KEY',        'Sq=~A6ULKr2o<jJm?-Yo2GZx#+O#:&J@S`:.lO/PL#j>TYJh[2ksi;2xP6|neduy');
define('AUTH_SALT',        ']n*^Al!|ZQ51%xfQ228(KEW3gqWaYLBfINi*?Z)We2#<<(/20,-sm=gF=q|txCrN');
define('SECURE_AUTH_SALT', 'H69&R#nKHGBVy*ZDR^@6bHu>blF}?T/KDi>f)6m#>|C<iIT^,WpP}JB#N0k>fv,N');
define('LOGGED_IN_SALT',   '4(iTi}MX//yue_KPO@/h_ JY-|O=c3`btVExKb1LwgTDnqx]C %k?!a^_3j5ML$D');
define('NONCE_SALT',       'REo`dj(u$>>~4(.gkEv%,M.6z=ZfffsyS]V Vk)LPJ?itAy/mS-s/pC;147#qv]R');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
