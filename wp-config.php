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

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'web-wrapper' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '_oKvG5Y1^k((CENjb]iG5Ho.3_yn:LZI+Q#{kJZh{q{7CFH`q`Ri%~%80PTvqx26' );
define( 'SECURE_AUTH_KEY',  'aAAz}ubkx& Av0>hFXx?Jt!)]suP3[QKs0u}}c9nx{$sd|Oz8t*V#kZ>3)/!-tEc' );
define( 'LOGGED_IN_KEY',    'J!d|QTJSpNOw1DKEZl=<Q-,.AE!j#5J2iTQ1ii{!xuzjQHQj@)6kCr&g9E[oIf3W' );
define( 'NONCE_KEY',        'T5dij!~}?MW&o.Tukh9OHNRO^g|$F{NPPhRnSk;B8} P4oGM%f~ayGD tKwmq`P=' );
define( 'AUTH_SALT',        'A1_g,I#zV{P~UvUse?6V|UF]iGcg6axo^[v~eX:.B%1;x]J6PHZR6XCZ}%wqiAu/' );
define( 'SECURE_AUTH_SALT', '57k9[*7lj<v&o=@6ZA)n0[VN^yL)kklRfvgnI4DY_I4`}/tZ2G}|rBtAMz`zJfX8' );
define( 'LOGGED_IN_SALT',   '2kc4/C2vzNYH_e6YH134xaX~DrVd`+jMG|(l_>=H~5-0JYW-%0`!7nCHf)lcgVA^' );
define( 'NONCE_SALT',       '1F. lm&K5UU%5p.RQ8JF61cx!L}b{P9C#nA]3/Ie^y>V4~|Rd`m0U:*IQg)Z_sl7' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
