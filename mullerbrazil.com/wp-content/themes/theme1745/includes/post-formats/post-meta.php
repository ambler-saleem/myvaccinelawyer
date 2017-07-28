    <?php $post_meta = of_get_option('post_meta'); ?>
		<?php if ($post_meta=='true' || $post_meta=='') { ?>
			<div class="post-meta">
				<?php _e('Posted on', 'theme1745'); ?> <time datetime="<?php the_time('Y-m-d\TH:i'); ?>"><?php the_time('F j, Y'); ?> <?php _e('by', 'theme1745'); ?> <?php  the_author_posts_link() ?> <?php _e('in', 'theme1745'); ?> <?php the_category(', '); ?>
			</div><!--.post-meta-->
		<?php } ?>