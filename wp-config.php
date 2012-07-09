<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'ro_patel');

/** MySQL database username */
define('DB_USER', 'ro_patel');

/** MySQL database password */
define('DB_PASSWORD', 'ro_patel');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         '0fUS?%+jcKQ|-}!9UgyKI[DuBYD :x?Rs P%:w10lsr<{, 6-o-/Ar->]_-pr=`:');
define('SECURE_AUTH_KEY',  '?JNcFU(xJBIN:x?F0jDGg$X|);*,q]1+dQ-&=-O4Q-)T@_INc-AOA}k*$-e@;-(+');
define('LOGGED_IN_KEY',    '^1Qeq]Jf#FZKnA5#+WE9zp=L6`JN/;Sj$js+ 4cf-/]ad>m+t&CUxXO+<edtBKkZ');
define('NONCE_KEY',        'a2H?0FkOs}!%9*+j/1,PU|NH4^d</c}*Bo4gP3bl`e`a1w<-B|m6*Rr0Ih*Mp=C|');
define('AUTH_SALT',        'K0+:#L<wk wGTL PU2bP0a1ErL@|W&+Fn?M^?CUzYRTH|{se9hugiWp>v- +/:-6');
define('SECURE_AUTH_SALT', '*YQ/ieYy~fj+j6K9nWQd$`L/H>FZcBjHQ+7P>;;{?)Ohun1MWy_ku@q*ztCt;VH6');
define('LOGGED_IN_SALT',   '{*-tyC(VvB)9hEzMO{Tr7qd>x|njftq(!y@ qo36qd@%ai<Oh(%yS$:{A=}+r(|&');
define('NONCE_SALT',       't1H|[|bz^,/O1>dc4p f)-a(`!|5y(vX<kHZ=!0> k*Qb7.hies1jdvF/ZfUWp+X');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'dpd_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
