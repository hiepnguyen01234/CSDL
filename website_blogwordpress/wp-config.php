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
define('DB_NAME', 'website');

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
define('AUTH_KEY',         'P.D%c[T!*ykpW>Q$XJJD<S}R{@.T4[<.!!j-D=cZ&T^DF.cuVLby$ocy[*ha.v[j');
define('SECURE_AUTH_KEY',  '-{+D =qG iPH>w}E5D)N<`=UqXB2bqhGCH!^QoYmqvH@%,Vm$ZCf[s$@#G=8>Z2k');
define('LOGGED_IN_KEY',    ',/p[$BX9|P0--z?P8l{}#t=Tm*b>M^r4=d?UZw`;|[=~=!4ID4!lCMaIDmKx*cZ0');
define('NONCE_KEY',        'f1;j<-Z+LD_Rx/my@tcC2.($=4bf[]t<(C^6<(d?@8d9X.o-3Rb$ v8;g?Vjc4 d');
define('AUTH_SALT',        '4f-Z*.kT58ZS&cSjHl?+CSU`mF$QyMO~ I7[?e=5M]gq?Hobi(BZ{j3T4>6c`;FF');
define('SECURE_AUTH_SALT', 'DW$RK7eKWxS_yR&u)u D0|TsVZlfJ],@~HS819Q-zoo/|V.7.<bg&7Y+kDp{Ji|q');
define('LOGGED_IN_SALT',   'bT6Vtu(]L9PL}z<yJ0Gmqldi<?rG&;ce_b|2@Z|VSi?V1<;%rjMmMca>0b;&&J1M');
define('NONCE_SALT',       'Z`Fz*^5b-D$qhiW%#cWUQ40fh$JY8iS3=Fs]ZE[]_Us6Ct~k5^t^Sp4#c_`{%}][');

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
