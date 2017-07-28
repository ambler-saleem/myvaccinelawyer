<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'Genesis Sample Theme' );
define( 'CHILD_THEME_URL', 'http://www.studiopress.com/' );
define( 'CHILD_THEME_VERSION', '2.1.2' );

//* Enqueue Google Fonts
add_action( 'wp_enqueue_scripts', 'genesis_sample_google_fonts' );
function genesis_sample_google_fonts() {

	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Lato:300,400,700', array(), CHILD_THEME_VERSION );

}

//* Add HTML5 markup structure
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Add support for custom background
add_theme_support( 'custom-background' );

//* Add support for 2-column footer widgets
add_theme_support( 'genesis-footer-widgets', 2 );

// Replace header hook to include SuperLawyers badge
remove_action( 'genesis_header', 'genesis_do_header' );
add_action( 'genesis_header', 'genesis_do_new_header' );
function genesis_do_new_header() {

	global $wp_registered_sidebars;

	genesis_markup( array(
		'html5'   => '<div %s>',
		'xhtml'   => '<div id="title-area">',
		'context' => 'title-area',
	) );
	do_action( 'genesis_site_title' );
	do_action( 'genesis_site_description' );
	echo '<!-- begin super lawyers badge -->
          <a href="http://www.superlawyers.com/redir?r=http://profiles.superlawyers.com/pennsylvania/philadelphia/lawyer/maximillian-j-muller/5fbd385f-9cc4-450c-bde4-a69187012208.html&amp;c=email_Small_badge&amp;i=5fbd385f-9cc4-450c-bde4-a69187012208" alt="Visit the official website of Super Lawyers" title="Visit the official website of Super Lawyers" class="super-lawyers-badge"><img src="http://i.superlawyers.com/shared/badge/lawyer/super_lawyers_badge/small_orange.png" alt="Rated by Super Lawyers" title="Rated by Super Lawyers" />&#160;</a>
          <div style="display:none;"><img src="http://www.superlawyers.com/services/badge/beacon/5fbd385f-9cc4-450c-bde4-a69187012208/l/11.gif" width="1" height="1" border="0" /></div>
          <!-- end super lawyers badge -->';
    echo '</div>';

	if ( ( isset( $wp_registered_sidebars['header-right'] ) && is_active_sidebar( 'header-right' ) ) || has_action( 'genesis_header_right' ) ) {

		genesis_markup( array(
			'html5'   => '<div %s>' . genesis_sidebar_title( 'header-right' ),
			'xhtml'   => '<div class="widget-area header-widget-area">',
			'context' => 'header-widget-area',
		) );

			do_action( 'genesis_header_right' );
			add_filter( 'wp_nav_menu_args', 'genesis_header_menu_args' );
			add_filter( 'wp_nav_menu', 'genesis_header_menu_wrap' );
			dynamic_sidebar( 'header-right' );
			remove_filter( 'wp_nav_menu_args', 'genesis_header_menu_args' );
			remove_filter( 'wp_nav_menu', 'genesis_header_menu_wrap' );

		echo '</div>';

	}

}

/**
* Add Page Title Widget Area Below Header.
*/
 
//* Add the Page Hero section 
add_action( 'genesis_after_header', 'giga_pagehero' );
function giga_pagehero() {
 
    if (is_active_sidebar( 'pagehero' )) {
        genesis_widget_area( 'pagehero', array(
            'before' => '<div class="pagehero widget-area"><div class="wrap">',
            'after' => '</div></div>'
            ) );
    }
}
 
//* Register widget areas
genesis_register_sidebar( array(
    'id' 			=> 'pagehero',
    'name' 			=> __( 'Page Hero', 'giga' ),
    'description' 	=> __( 'This is the page hero section.', 'giga' ),
) );

//* Show featured image
add_action( 'genesis_entry_header', 'single_post_featured_image', 15 );

function single_post_featured_image() {
	
	if ( ! is_singular( 'post' ) )
		return;
	
	$img = genesis_get_image( array( 'format' => 'html', 'size' => genesis_get_option( 'image_size' ), 'attr' => array( 'class' => 'post-image' ) ) );
	printf( '<a href="%s" title="%s">%s</a>', get_permalink(), the_title_attribute( 'echo=0' ), $img );
	
}

// Register responsive menu script
add_action( 'wp_enqueue_scripts', 'genesis_enqueue_scripts' );
/**
 * Enqueue responsive javascript
 * @author Ozzy Rodriguez
 * @todo Change 'prefix' to your theme's prefix
 */
function genesis_enqueue_scripts() {
 
	wp_enqueue_script( 'genesis-responsive-menu', get_stylesheet_directory_uri() . '/lib/js/responsive-menu.js', array( 'jquery' ), '1.0.0', true ); // Change 'prefix' to your theme's prefix
 
}