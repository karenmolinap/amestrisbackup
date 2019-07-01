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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'Karen' );

/** MySQL database password */
define( 'DB_PASSWORD', 'password' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

define('FS_METHOD', 'direct');
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'j3V!0Ik$REG=8{/?y<lcKm}r<@|}Yx17_!#<FKEYkfK.S4`TDu0>sJw&;-p*6mpu' );
define( 'SECURE_AUTH_KEY',  'Q]G7(Nb,:FG!/KmKy]cLsyID5O9Foen;|odkL#c(_*>X*ta<1B1Ej$G1%M|%[S-H' );
define( 'LOGGED_IN_KEY',    'KG6!|gM2lE%CQoBJ(m2g0Et~/y/t,[(1R/.6`d<M)vG/so=0 PwPNFnKb33s*x(y' );
define( 'NONCE_KEY',        'RovD CeX=nami^gd<|gorR{#mE9:e^0SRO]xP;8HqqS!@vYBgg((^Qe#@}(Tp3O@' );
define( 'AUTH_SALT',        '76I%tGCT$f&VL1{cg3.%!X;6(`W<vK@O]^(@deq0-{f|;B f97lp`!:/tO`Z5Y,<' );
define( 'SECURE_AUTH_SALT', 'YP?aoJR3]Vafo+YWTFq=<L1(:EhcwoGEuhV*OibN+7o~WyP}_zGrL2^CA5gNHb.,' );
define( 'LOGGED_IN_SALT',   '+rffX[W ,x,><3=#4gmp#|+jbo`:dzoKW|PDis/];zwm66:0QN!fIPkhL{<T3YGq' );
define( 'NONCE_SALT',       '%yc(N{T_]y?3A?W8El%%z].NeJ>VJuO[hUH}O0Lm%J]-U$rnG[Wuvq]1(1>;84[%' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
