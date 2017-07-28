<?php
/**
 * Template Name: Home Page
 */

get_header(); ?>
  <div class="page-content clearfix">
  	<div class="grid_8">
  			<div id="page-content">
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  					<div id="post-<?php the_ID(); ?>" <?php post_class('page'); ?>>
  						<?php the_content(); ?>
  					</div><!--#post-# .post-->
  				<?php endwhile; ?>
			</div>
  	</div>
  	<div class="grid_4">
  		<?php if ( ! dynamic_sidebar( 'Left Content Area' ) ) : ?>
  	    <!--Widgetized 'Left Content Area' for the home page-->
  	  <?php endif ?>
  	</div>
  </div>
<?php get_footer(); ?>