<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
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
define( 'DB_NAME', 'cyber_cafe' );

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
define( 'AUTH_KEY',         'm`E*O#.=}h.>Pb&4yOMd6T[hAfmnprA{CW:{NYX~*.T0p38L}CMkQ0&#`Us$P>.4' );
define( 'SECURE_AUTH_KEY',  '<oLA76%J&-wC[,*$}yIMCEWv[f4a@s=mOyiYP&3H+HjNWdd%T+.bNW@J}n_rWmGv' );
define( 'LOGGED_IN_KEY',    'x:lMdi3.-}4X<y%;@fOHa_2`#iI4X-u__]1qm7hJS`YtpP}}EQq3Dj$2F3!%cck3' );
define( 'NONCE_KEY',        'W#P&jc^yJnRk_=WPRD(})o%|wJL(vWS51A -3WWa4,e=:Fn;;ewDa,[ tLBtoC,2' );
define( 'AUTH_SALT',        'Ig}C/^}LJCG>)zUH$F];=kK;u^c3p#5`QA70Z`to>LHF`x{oGmzg&m%G`Yt%C`*-' );
define( 'SECURE_AUTH_SALT', '_-j.u2$fp&b{R.U-Dytys^5F,l|Kt3=[C_^?VBOh1r%.evp{Yh}aA.a(1[U(/j^E' );
define( 'LOGGED_IN_SALT',   'AIQk7_6cA#7BEQZunpx#sJpuWl@3SpU[H?B1_IN9jvW#}pdZ<HA >?pQr2zrr}E<' );
define( 'NONCE_SALT',       'fCUbraM%PCNTQ4]r),RZzG1-<MSrif;pm2`qZrfikj/H|QuFCoT#l!XuH^G}J!qp' );

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
