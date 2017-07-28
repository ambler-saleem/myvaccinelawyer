</div>
  </div><!--.container-->
	<footer id="footer">
		<div class="container_12 clearfix">
			<div id="copyright" class="grid_8">
					<?php if ( of_get_option('footer_menu') == 'true') { ?>  
						<nav class="footer">
							<?php wp_nav_menu( array(
								'container'       => 'ul', 
								'menu_class'      => 'footer-nav', 
								'depth'           => 0,
								'theme_location' => 'footer_menu' 
								)); 
							?>
						</nav>
					<?php } ?>
					<div id="footer-text">
						<?php $myfooter_text = of_get_option('footer_text'); ?>						
						<?php if($myfooter_text){?>
							<?php echo of_get_option('footer_text'); ?>
						<?php } else { ?>
							<?php if(of_get_option('logo_type') == 'text_logo'){?>
								  <h2><a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a></h2>
							  <?php } else { ?>
								<?php if(of_get_option('logo_url') != ''){ ?>
									<a href="<?php bloginfo('url'); ?>/" id="footer-logo"><img src="<?php echo of_get_option('logo_url', "" ); ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('description'); ?>"></a>
								<?php } else { ?>
									<a href="<?php bloginfo('url'); ?>/" id="footer-logo"><img src="<?php bloginfo('template_url'); ?>/images/footer-logo.png" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('description'); ?>"></a>
								<?php } ?>
							  <?php }?>
							
						
						<!-- {%FOOTER_LINK} -->
						<?php } ?>
					</div>					
				</div>
				<div id="widget-footer" class="grid_4">
				<?php if ( ! dynamic_sidebar( 'Footer' ) ) : ?>
				  <!--Widgetized Footer-->
				<?php endif ?>
			  </div>
		</div><!--.container-->
	</footer>
</div><!--#main-->
<?php wp_footer(); ?> <!-- this is used by many Wordpress features and for plugins to work properly -->
<?php if(of_get_option('ga_code')) { ?>
	<script type="text/javascript">
		<?php echo stripslashes(of_get_option('ga_code')); ?>
	</script>
  <!-- Show Google Analytics -->	
<?php } ?>
</body>
</html>