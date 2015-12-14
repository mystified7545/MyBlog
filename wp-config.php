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
define('DB_NAME', 'blogdemo');

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
define('AUTH_KEY',         '*S*LbO#:igEX?Ep+B=~zD7-D[?-_D+e23}dRk@xi=SYdtQC:V~8G-U,q/SmLt3^y');
define('SECURE_AUTH_KEY',  'uz[|cng%tt P2nUlpp*+,bQ[J1F}yC41I>^udA.+r6/^KFrF8^t~|zD -)a}d&MH');
define('LOGGED_IN_KEY',    '=MQ=7P/9!(@W<u$w.k?BO8nV]=WNoYRHbMd],3.-{4$%QYi]f@}^/qpUq;]$VCSY');
define('NONCE_KEY',        'N35)q;1 }Vg8^LTW)3<_-c~(-nZRh(1VY,l}0@N5zXPl[Fb|3 Z}B-13yQz!4mr6');
define('AUTH_SALT',        'SVA0o51)p7#}&V@8yL7p+%a5`.+cn@vAyae_/mPKbIL`GoZ`B|u6ngie+<Ss*9f0');
define('SECURE_AUTH_SALT', 'e}p8aSPFm]JFej+!{W||k@B 4(IKoI:BH^H*+fZ>^-i6>V4t}B*IC;(ta&=H#{t|');
define('LOGGED_IN_SALT',   'B7e{?:<[MYZ<xf2n^Li7;bT| @egTM9WgM5ZdH-TClR0G)+$!G$~-!T{f_<1Af&U');
define('NONCE_SALT',       '-csJ-k:+;/i02SY_8FxG+/SUz!YF%~a9ay0@Av%K0,TIZ4qVvqg6|U{,qja!R.b3');

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


/*define('WP_HOME','http://localhost/InnoculateIT');
define('WP_SITEURL','http://localhost/InnoculateIT');*/