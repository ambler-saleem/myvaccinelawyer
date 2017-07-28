<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta name="google-site-verification" content="p-57ifluLFPkwRu2eNJPCjHWwZ_qCGgaZNLJQyCuBnA" />
<meta name="google-site-verification" content="gYmCyqsRbRb4PYTPlBHzWFqL1DSo1s1Kl6iGn5w1Zn0" />
	<link rel="icon" type="image/png" href="/wp-content/uploads/2016/08/favicon.ico">
    <?php libero_mikado_wp_title(); ?>
    <?php
    /**
     * @see libero_mikado_header_meta() - hooked with 10
     * @see mkd_user_scalable - hooked with 10
     */
    ?>
	<?php do_action('libero_mikado_header_meta'); ?>

	<?php wp_head(); ?>

<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '435275646860363', {
em: 'insert_email_variable'
});
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=435275646860363&ev=PageView&noscript=1"
/></noscript>
<!-- DO NOT MODIFY -->
<!-- End Facebook Pixel Code -->


</head>

<body <?php body_class(); ?>>
<?php libero_mikado_get_side_area(); ?>

<div class="mkd-wrapper">
    <div class="mkd-wrapper-inner">
        <?php libero_mikado_get_header(); ?>

        <?php if(libero_mikado_options()->getOptionValue('show_back_button') == "yes") { ?>
            <a id='mkd-back-to-top'  href='#'>
                <span class="mkd-icon-stack">
                     <?php
                        libero_mikado_icon_collections()->getBackToTopIcon('font_elegant');
                    ?>
                </span>
            </a>
        <?php } ?>

        <div class="mkd-content" <?php libero_mikado_content_elem_style_attr(); ?>>
            <div class="mkd-content-inner">