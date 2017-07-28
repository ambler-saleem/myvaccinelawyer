<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" <?php language_attributes();?>> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" <?php language_attributes();?>> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" <?php language_attributes();?>> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" <?php language_attributes();?>> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html <?php language_attributes();?>> <!--<![endif]-->
<head>
	<title><?php if ( is_category() ) {
		echo __('Category Archive for &quot;', 'theme1745'); single_cat_title(); echo __('&quot; | ', 'theme1745'); bloginfo( 'name' );
	} elseif ( is_tag() ) {
		echo __('Tag Archive for &quot;', 'theme1745'); single_tag_title(); echo __('&quot; | ', 'theme1745'); bloginfo( 'name' );
	} elseif ( is_archive() ) {
		wp_title(''); echo __(' Archive | ', 'theme1745'); bloginfo( 'name' );
	} elseif ( is_search() ) {
		echo __('Search for &quot;', 'theme1745').wp_specialchars($s).__('&quot; | ', 'theme1745'); bloginfo( 'name' );
	} elseif ( is_home() || is_front_page()) {
		bloginfo( 'name' ); echo ' | '; bloginfo( 'description' );
	}  elseif ( is_404() ) {
		echo __('Error 404 Not Found | ', 'theme1745'); bloginfo( 'name' );
	} elseif ( is_single() ) {
		wp_title('');
	} else {
		echo wp_title( ' | ', false, right ); bloginfo( 'name' );
	} ?></title>
	<meta name="description" content="<?php wp_title(); echo ' | '; bloginfo( 'description' ); ?>" />
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="icon" href="<?php bloginfo( 'template_url' ); ?>/favicon.ico" type="image/x-icon" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'rss2_url' ); ?>" />
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'atom_url' ); ?>" />
	<?php /* The HTML5 Shim is required for older browsers, mainly older versions IE */ ?>
  <!--[if lt IE 8]>
    <div style=' clear: both; text-align:center; position: relative;'>
    	<a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" alt="" /></a>
    </div>
  <![endif]-->
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/normalize.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/colorstheme.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/prettyPhoto.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/prettySociable.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/grid.css" />
	<?php
		/* We add some JavaScript to pages with the comment form
		 * to support sites with threaded comments (when in use).
		 */
		if ( is_singular() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );
	
		/* Always have wp_head() just before the closing </head>
		 * tag of your theme, or you will break many plugins, which
		 * generally use this hook to add elements to <head> such
		 * as styles, scripts, and meta tags.
		 */
		wp_head();
	?>
  <!--[if lt IE 9]>
  <style type="text/css">
  .submit-wrap input, .nsu-submit,
    .sf-menu,
	.sf-menu > li > a,
	.latestpost li time,
	.vcard,
	.button,
	#footer,
	.wp-pagenavi a, 
	.wp-pagenavi span {
      behavior:url(<?php bloginfo('stylesheet_directory'); ?>/PIE.php)
      }
  </style>
  <![endif]-->
  
  <script type="text/javascript">
  	// initialise plugins
		jQuery(function(){
			// main navigation init
			jQuery('ul.sf-menu').superfish({
				delay:       <?php echo of_get_option('sf_delay'); ?>, 		// one second delay on mouseout 
				animation:   {opacity:'<?php echo of_get_option('sf_f_animation'); ?>'<?php if (of_get_option('sf_sl_animation')=='show') { ?>,height:'<?php echo of_get_option('sf_sl_animation'); ?>'<?php } ?>}, // fade-in and slide-down animation
				speed:       '<?php echo of_get_option('sf_speed'); ?>',  // faster animation speed 
				autoArrows:  <?php echo of_get_option('sf_arrows'); ?>,   // generation of arrow mark-up (for submenu) 
				dropShadows: <?php echo of_get_option('sf_shadows'); ?>   // drop shadows (for submenu)
			});
			
			// prettyphoto init
			jQuery("a[rel^='prettyPhoto']").prettyPhoto({
				animation_speed:'normal',
				slideshow:5000,
				autoplay_slideshow: false,
				overlay_gallery: true
			});	
		});
		
		// Init for audiojs
		audiojs.events.ready(function() {
			var as = audiojs.createAll();
		});
  </script>
  
  <script type="text/javascript">
		jQuery(window).load(function() {
			// nivoslider init
			jQuery('#slider').nivoSlider({
				effect: '<?php echo of_get_option('sl_effect'); ?>',
				slices:<?php echo of_get_option('sl_slices'); ?>,
				boxCols:<?php echo of_get_option('sl_box_columns'); ?>,
				boxRows:<?php echo of_get_option('sl_box_rows'); ?>,
				animSpeed:<?php echo of_get_option('sl_animation_speed'); ?>,
				pauseTime:<?php echo of_get_option('sl_pausetime'); ?>,
				directionNav:<?php echo of_get_option('sl_dir_nav'); ?>,
				directionNavHide:<?php echo of_get_option('sl_dir_nav_hide'); ?>,
				controlNav:<?php echo of_get_option('sl_control_nav'); ?>,
				captionOpacity:<?php $sl_caption_opacity = of_get_option('sl_caption_opacity'); if ($sl_caption_opacity != '') { echo of_get_option('sl_caption_opacity'); } else { echo '0'; } ?>
			});
		});
	</script>
	
	<script type="text/javascript" charset="utf-8">

	$(document).ready(function(){
		$.prettySociable({
			websites: {
				facebook : {
					'active': true,
					'encode':true, // If sharing is not working, try to turn to false
					'title': 'Facebook',
					'url': 'http://www.facebook.com/share.php?u=',
					'icon':'<?php bloginfo('url'); ?>/wp-content/themes/theme1745/images/prettySociable/large_icons/facebook.png',
					'sizes':{'width':70,'height':70}
				},
				twitter : {
					'active': true,
					'encode':true, // If sharing is not working, try to turn to false
					'title': 'Twitter',
					'url': 'http://twitter.com/home?status=',
					'icon':'<?php bloginfo('url'); ?>/wp-content/themes/theme1745/images/prettySociable/large_icons/twitter.png',
					'sizes':{'width':70,'height':70}
				},
				delicious : {
					'active': true,
					'encode':true, // If sharing is not working, try to turn to false
					'title': 'Delicious',
					'url': 'http://del.icio.us/post?url=',
					'icon':'<?php bloginfo('url'); ?>/wp-content/themes/theme1745/images/prettySociable/large_icons/delicious.png',
					'sizes':{'width':70,'height':70}
				},
				digg : {
					'active': true,
					'encode':true, // If sharing is not working, try to turn to false
					'title': 'Digg',
					'url': 'http://digg.com/submit?phase=2&url=',
					'icon':'<?php bloginfo('url'); ?>/wp-content/themes/theme1745/images/prettySociable/large_icons/digg.png',
					'sizes':{'width':70,'height':70}
				},
				linkedin : {
					'active': true,
					'encode':true, // If sharing is not working, try to turn to false
					'title': 'LinkedIn',
					'url': 'http://www.linkedin.com/shareArticle?mini=true&ro=true&url=',
					'icon':'<?php bloginfo('url'); ?>/wp-content/themes/theme1745/images/prettySociable/large_icons/linkedin.png',
					'sizes':{'width':70,'height':70}
				},
				reddit : {
					'active': true,
					'encode':true, // If sharing is not working, try to turn to false
					'title': 'Reddit',
					'url': 'http://reddit.com/submit?url=',
					'icon':'<?php bloginfo('url'); ?>/wp-content/themes/theme1745/images/prettySociable/large_icons/reddit.png',
					'sizes':{'width':70,'height':70}
				},
				stumbleupon : {
					'active': true,
					'encode':false, // If sharing is not working, try to turn to false
					'title': 'StumbleUpon',
					'url': 'http://stumbleupon.com/submit?url=',
					'icon':'<?php bloginfo('url'); ?>/wp-content/themes/theme1745/images/prettySociable/large_icons/stumbleupon.png',
					'sizes':{'width':70,'height':70}
				},
				tumblr : {
					'active': true,
					'encode':true, // If sharing is not working, try to turn to false
					'title': 'tumblr',
					'url': 'http://www.tumblr.com/share?v=3&u=',
					'icon':'<?php bloginfo('url'); ?>/wp-content/themes/theme1745/images/prettySociable/large_icons/tumblr.png',
					'sizes':{'width':70,'height':70}
				}
			},
			urlshortener : {
				/*
					To get started you'll need a free bit.ly user account and API key - sign up at:

			http://bit.ly/account/register?rd=/

								Quickly access your private API key once you are signed in at:

			http://bit.ly/account/your_api_key

							*/
							bitly : {
								'active' : false
							}
						},
						tooltip: {
							offsetTop:0,
							offsetLeft: 15
						},
						popup: {
							width: 900,
							height: 500
						},
						callback: function(){} /* Called when prettySociable is closed */
					});
				});
			</script>
  <!-- Custom CSS -->
	<?php if(of_get_option('custom_css') != ''){?>
  <style type="text/css">
  	<?php echo of_get_option('custom_css' ) ?>
  </style>
  <?php }?>  
  
  <style type="text/css">
		
		<?php $background = of_get_option('body_background');
			if ($background != '') {
				if ($background['image'] != '') {
					echo 'body { background-image:url('.$background['image']. '); background-repeat:'.$background['repeat'].'; background-position:'.$background['position'].';  background-attachment:'.$background['attachment'].'; }';
				}
				if($background['color'] != '') {
					echo 'body { background-color:'.$background['color']. '}';
				}
			};
		?>
		
		<?php $header_styling = of_get_option('header_color'); 
			if($header_styling != '') {
				echo '#header {background-color:'.$header_styling.'}';
			}
		?>
		
		<?php $links_styling = of_get_option('links_color'); 
			if($links_styling) {
				echo 'a{color:'.$links_styling.'}';
				echo '.button {background:'.$links_styling.'}';
			}
		?>
		
		<?php $body_typography = of_get_option('body_typography'); 
			if($body_typography) {
				echo 'body {font-family:'.$body_typography['face'].'; color:'.$body_typography['color'].'}';
				echo '#main {font-size:'.$body_typography['size'].'; font-style:'.$body_typography['style'].';}';
			}
		?>
  </style>
</head>

<body <?php body_class(); ?>>
<div id="main"><!-- this encompasses the entire Web site -->
	<header id="header">
				<div class="logo">
				  <?php if(of_get_option('logo_type') == 'text_logo'){?>
					<?php if( is_front_page() || is_home() || is_404() ) { ?>
					  <h1><a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a></h1>
					<?php } else { ?>
					  <h2><a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a></h2>
					<?php } ?>
				  <?php } else { ?>
					<?php if(of_get_option('logo_url') != ''){ ?>
						<a href="<?php bloginfo('url'); ?>/" id="logo"><img src="<?php echo of_get_option('logo_url', "" ); ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('description'); ?>"></a>
					<?php } else { ?>
						<a href="<?php bloginfo('url'); ?>/" id="logo"><img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('description'); ?>"></a>
					<?php } ?>
				  <?php }?>
				  <p class="tagline"><?php bloginfo('description'); ?></p>
				</div>
				<div class="fright">
					<div id="widget-header">
						<?php if ( ! dynamic_sidebar( 'Header' ) ) : ?><!-- Wigitized Header --><?php endif ?>
					</div><!--#widget-header-->
					<?php if ( of_get_option('g_search_box_id') == 'yes') { ?>  
					  <div id="top-search">
						<form method="get" action="<?php echo get_option('home'); ?>/">
						  <input type="text" name="s"  class="input-search"/><input type="submit" value="<?php _e('GO', 'theme1745'); ?>" id="submit">
						</form>
					  </div>  
					<?php } ?>
				</div>
				<div class="clear"></div>
				<nav class="primary">
				  <?php wp_nav_menu( array(
					'container'       => 'ul', 
					'menu_class'      => 'sf-menu', 
					'menu_id'         => 'topnav',
					'depth'           => 0,
					'theme_location' => 'header_menu' 
					)); 
				  ?>
				</nav><!--.primary-->
				<div class="clear"></div>
	</header>
  <?php if( is_front_page() ) { ?>
  <section id="slider-wrapper">
    <?php include_once(TEMPLATEPATH . '/slider.php'); ?>
  </section><!--#slider-->
  <?php } ?>
	<div class="primary_content_wrap">
		<div class="container_12 clearfix">