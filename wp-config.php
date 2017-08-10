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
//define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/home/myvaccin/public_html/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'myvaccin_wp_t0i9');

/** MySQL database username */
define('DB_USER', 'myvaccin_wp_t0i9');

/** MySQL database password */
define('DB_PASSWORD', 'BM}D$V={(iKS');

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
define('AUTH_KEY',         '^:=kXns(%v}2Tjqn*,XWQ-=J!43b -5,:K`_HzLoeW(90i- 0tD`gl>L>56`+&+z');
define('SECURE_AUTH_KEY',  'y/.hJI+:5%+jR#f/230e708t$TNh -xG-*H(YA&PdzU: ]j->g=+&pG_ZzAWQh$/');
define('LOGGED_IN_KEY',    '+1R3N7/U-S[8=Q_},,U#(Z=E-M[#%C;i`%.D-dPfnr|RV;j}2|I-Czp/u&DaMu0?');
define('NONCE_KEY',        'X`+jkg4f[HegO+hQd503iFK<:?hN6JiJA[>[C-OAoJ-l?rUm $au=&(SBmsQBX,-');
define('AUTH_SALT',        '?kZ@yk- R~<^NrKG-We%/-V.OKpHv4Y>#BwT_FDpOflu8i!(X),wF&nEuXT`;P7K');
define('SECURE_AUTH_SALT', 'mkOC%2ahYf:x/%zYx%w0kFi6BOtx~-N7;.iG9{pFGV%]}QO{tSqq;6~kgUE8oN^Y');
define('LOGGED_IN_SALT',   '!p/g~8111:XXu}=/rr1-d!*OwPqx;iFh&R&j|_C#j>!poy&WsTi8GkS.5v~hj3*g');
define('NONCE_SALT',       'a^-[7J vk9[e9VYz<?r/sj=-~&O|%[ht#8t-)gU.<9|R,F%:p:[fX[+))A7Xd1Q]');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'p7xd735qV8_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

define('WP_MEMORY_LIMIT', '256M');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
