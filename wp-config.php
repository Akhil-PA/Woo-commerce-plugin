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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wp_test1');

/** Database username */
define('DB_USER', 'root');

/** Database password */
define('DB_PASSWORD', '');

/** Database hostname */
define('DB_HOST', 'localhost');

/** Database charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The database collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

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
define('AUTH_KEY', 'lez~A_VIf{vq45I`bDb9`Ffn5Rjl0yA $Gk-R6CWQ#`&Tx{(c0YWd3LBjvd17(iL');
define('SECURE_AUTH_KEY', 'k5+_[u~C1*LW}cW+l_w:S@m1CJyHf.SjvlKT!XR&4in] ^$D47hb)Du&KCY):-6O');
define('LOGGED_IN_KEY', 'rdSfM~l$ALr}re.pPV2:*+Hd}x!4n@.Nu%?9PE+Qu]f;5MaRs k{Y2;ieF{|cSUP');
define('NONCE_KEY', '<G/9>hc{H(Ngm:$<@T&r$n6$wB{WxF>>(|9()U^c7.VsSM :3TlxuYNl.&V;_pqS');
define('AUTH_SALT', 'iCQ &aCsA4#&LIm/a;U.k#*GBHh>PX`,74_qTM+%p7kWi$y|Yv{DP^Sx($Qn3o@:');
define('SECURE_AUTH_SALT', 'z|Z8N-X%+Sg/A& g`QZWHg0xZI*foL[B{H{|VRF]uni#+;:sLRJXOV(B[lZ*Pf6L');
define('LOGGED_IN_SALT', 'SNF|N!NX_jdL;auhI$i,[l($WVHz?pKW/%x=oB,0|CHMLkPp,76yG~{wxG*1P@68');
define('NONCE_SALT', 'b(PmCo~<W$!LcJLPmPH5TGE!<wF[hGq 5*]&U_oQ+<^-z{90y8p&!Tpa(67JjH<3');

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'test_';

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
define('WP_DEBUG', true);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';