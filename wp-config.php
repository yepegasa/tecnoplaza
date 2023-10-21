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
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
/*define( 'DB_NAME', 'tecnoplaza' );*/
define('DB_NAME', 'tecnoplaza');

/** MySQL database username */
/*define( 'DB_USER', 'db_tienda20' );*/
define('DB_USER', 'root');

/** MySQL database password */
/*define( 'DB_PASSWORD', '@MxUAiN@NUz7WpH' );*/
define('DB_PASSWORD', '');

/** MySQL hostname */
/* define('DB_HOST', 'localhost');*/
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
define('AUTH_KEY', 'B(~?f]uS%|)>/s)3W={UW8y9j6,&-xB/RY7HPxluzI/kU+WCS#[m3MfH$O|Z?^LR');
define('SECURE_AUTH_KEY', 'fNe mTz/ygF8d,Ugim`[DoNk(/w8+:rw;2 *3X3EU;Iz-dYTatH5S^fIgH;|(,zv');
define('LOGGED_IN_KEY', 'HZ:/PC9>$4|<k#oHtVXsNIS:/igNz@:w,.b+pT_mh4)gr(H@x %48A+b@30;P;RU');
define('NONCE_KEY', '*AB,+ny` E*Zo!iJBT((4m?9N^4^,K;u#|sLP|{vgk?, D(`9dVI,QaeC(5q{||}');
define('AUTH_SALT', 'y`(t,X/E^jx$x`2i?Be%%vl#oc8rO#0M%WGl5$#LR)fh3TMHF3u_d>BchlMwftVC');
define('SECURE_AUTH_SALT', '}99_F)B2Dry3q.=;;P|3rW+!nkSLx~qSqag9g|J#dqlK`fY[vvFYjMKK-rtosHv=');
define('LOGGED_IN_SALT', 'jQHg}|b6G^-jd3BWr6,q%.c~EhK|Et<bv[ly?Y4HV;/R5u`IW1JJ0&#47-hp8kmx');
define('NONCE_SALT', '4X]{v+OQwwlRP6`Xvp#gbEO5.%tNfz]+H[[65mW}l(?-{2<@~H+,UH^H6]?~IBf7');

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
define('WP_DEBUG', false);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
