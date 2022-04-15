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
define( 'DB_NAME', 'qfoody' );

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
define( 'AUTH_KEY',         'FX13l5MP@/.h&3&.wX}Vr}, L#A[L:xq+##j0#0(OpSoGh3:ae]5!aeM=yWdLyig' );
define( 'SECURE_AUTH_KEY',  'sInBa!?6h`B^x4`eilV*AUg)(1EmV;=0(x(0ECB81:n<~VVJ5H=T9#un^L,+!E,q' );
define( 'LOGGED_IN_KEY',    '1?(GGU46NSGN&A{-ZIK50 :ed;KSeA$v XotId?CU9Eve2 {/@w@3[Tmg1N=R*>V' );
define( 'NONCE_KEY',        '%?dZ>K^qL$$/Kgh:UG(U>KVf44#A$$9E#$h( HT,):[:&iP=]/|UfvWGWu$uHm.Q' );
define( 'AUTH_SALT',        'cBfd50+B^?`R}?=y[%eZx]<a~w=6q|}X1*|Cd(tcA|0VLCwlXjB.0/t|UrNF}W-.' );
define( 'SECURE_AUTH_SALT', ';+.~ihdLe$w+1[wyz3U pk`EGdZG}flG7hwQ28eU~<p|nn;D{qoObwk?]tG4A)_d' );
define( 'LOGGED_IN_SALT',   '>Wzw]bB`c}ywI959t/k_W9$=tW4^r3J:~>0[7j{ybwromM]6|07Cnc$|Ect)m;Vt' );
define( 'NONCE_SALT',       'yjt++l Y;9!^Vels=+`<p*Gv9: ;)`xan~Ip1~l(m]r,-$}8nc^+E$=A,UHS9.aY' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
