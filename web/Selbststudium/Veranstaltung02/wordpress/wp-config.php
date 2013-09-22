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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'wordpress');

/** MySQL database password */
define('DB_PASSWORD', 'password');

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
define('AUTH_KEY',         '{^f;3R[=QPw[tl^q@nUc=^na.YDjJ?Z{vC2P(J>1PR|N0_+CV%FZ$T{mi~^2/#d>');
define('SECURE_AUTH_KEY',  '.7^@(+|?DK/T$2gSg>[ye/s_At$|U_8:*(ecZqvT3h4MW+k-]Xm9#eI/dL|n%8-8');
define('LOGGED_IN_KEY',    'Qxkl-_@Qr8S)EFWZ%NvhWy-Eg&/)Q,x0PiW{tLI=9`Tssn]TC28s3V_^Kqak<JdX');
define('NONCE_KEY',        'AT9ZV4nKIzPS%<;*NOlt!T2z.:Za~px;:y{Gb0,+-rPcz(3K~T1oDC11qN65E~6]');
define('AUTH_SALT',        'j:-fqg=NHEE*WxE)z{ret33mAIIMG*Tq3k+A~PPJbywBr/a(rDq{W`~y<)|-!%Uz');
define('SECURE_AUTH_SALT', 'DT@j6P/e+|EdSu< {+{5,VMOn5!pX%S*LnY4c^_Jbfx:A(|`R;Zg*PMH%]|wx[rI');
define('LOGGED_IN_SALT',   '(qhOIJauTe[l%c00eIo%h*=VHr)*m+8wfw`eu*t(;~BgJ4].mqR[=ItNYU~@(/6O');
define('NONCE_SALT',       'bFux)i/P+k#rHuNRD(v`:{+Gb4d+|ju[7}c[G}U6A]L=3*s>~?N5VV-W#8!ecD-Z');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
