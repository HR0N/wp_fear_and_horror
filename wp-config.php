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
define('WP_CACHE', true);
define( 'WPCACHEHOME', '/home/pr435071/anakim.space/wp/wp-content/plugins/wp-super-cache/' );
define( 'DB_NAME', 'pr435071_wp' );

/** Database username */
define( 'DB_USER', 'pr435071_wp' );

/** Database password */
define( 'DB_PASSWORD', 'T^ni4P4^7t' );

/** Database hostname */
define( 'DB_HOST', 'pr435071.mysql.tools' );

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
define( 'AUTH_KEY',         'sRXAIWtEy9cYNVYT?<v,OxN9ghFs}A :l+&+0>rdAtQ/`qb]fV<0PJ*Q_C/R8Mlt' );
define( 'SECURE_AUTH_KEY',  '<S;aDDCx1cl?oKy4)4B[5uiLZ2VU^}.Q{p0o&fAg^;^+tt#_(jl[/?}9@TL W${k' );
define( 'LOGGED_IN_KEY',    '7T)yh>=j*q 8&*z01&2gp&{RVzG0AQTE#56`m7j)?pE;*~OU!Dbo}y!}AT;DrN@<' );
define( 'NONCE_KEY',        ')^]p XBP5y2s&^Xw0mbsC-$7cS&f<<Z]IK/v.8KR ,0DgX) ]Rs0tN.y;TM!_mEk' );
define( 'AUTH_SALT',        'og`<V$b&-h3=y{KEDB<vQJ^J`A`$Gh{@eV, =(cQl+w7fzvV=N$ S)1k>WAQx^S|' );
define( 'SECURE_AUTH_SALT', 'snL>@VX@e-!B:yUh?;[j~,V+WU, Obrj!I-ojMI!;en_D)`mpxW1SK(gbKr<~hcW' );
define( 'LOGGED_IN_SALT',   '!lcx.wG(aUP8~qajByC,o1_my/MV?@u<plpWX]>j;1MMBtukc=a{@[1-SiwH1N~3' );
define( 'NONCE_SALT',       ';S2po_8d(SRjtm8?Z#-g{&d.bo78n1Uk]fB!?5Zw_Pj0IENk=NPd-# VoL}c=q^!' );

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
