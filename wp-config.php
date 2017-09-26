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
define('DB_NAME', 'transmedic');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'Ix$5cK|%sEsV^$o72V5#3a&RIILbdHXy,aJVv|[${q0rJWTf=Ti^kC%q=4[P%}Yw');
define('SECURE_AUTH_KEY',  'NzDS.T7OEKi=S;yPR/-0I+u3K0).4ae~-bKHB[l@b$^HC>m0y4b![ousLHQEK8Bj');
define('LOGGED_IN_KEY',    'B1djJ$EO-WfE62B?V0#4A._$;V^8Loi3Q$_E W4Gyn-Na9x_`SJ&`-Hby2Kw/i`i');
define('NONCE_KEY',        '5{_ma+/?[xY0xovm23 8jbC1V09P1]+FuoC>JVL <P::~(GK|Z^E.g|SVdpuLi`_');
define('AUTH_SALT',        'G|-+&>WxHILyo13}H|z;-s~R0vAv~_QZU74~[Q$i+,9RlQhY94<,#{$TwyH^X[aK');
define('SECURE_AUTH_SALT', '~[3dUs/t5]j,]J2^3~~WWz6y?B3O)-2,# y$9c]po#cW^ex=K|owc9W*0s>/+Alk');
define('LOGGED_IN_SALT',   'yS%~8gZ7IGTBtgZMM|NVp{I?1!X*BzzT}#vqM36B?.X_%[ 1xEC@bNn?vn-7<ux|');
define('NONCE_SALT',       'uLu:!w*>Ik7p=cYCAS??y6elCkiN}s/K3Cd=}iVHWem8B|4;,EX3[ZUZGsS`ow>S');

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
