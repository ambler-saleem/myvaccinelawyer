<?php
// =============================== My Banners ======================================
class MY_BannersWidget extends WP_Widget {
    /** constructor */
    function MY_BannersWidget() {
        parent::WP_Widget(false, $name = 'My - Banners');	
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {		
        extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
				$url1 = apply_filters('widget_url1', $instance['url1']);
				$img1 = apply_filters('widget_img1', $instance['img1']);
        ?>
             
              <?php echo $before_widget; 
							
							if ( $title )
							echo $before_title . $title . $after_title;?>
              
              <ul class="banners-holder clearfix">
              	<?php if($img1=="") { ?>
                  <li><a href="<?php echo $url1; ?>" class="banner"><img src="<?php bloginfo('template_url'); ?>/images/empty_ad.gif" alt="" /></a></li>
                <?php } else { ?>
                  <li><a href="<?php echo $url1; ?>" class="banner"><img src="<?php echo $img1; ?>" alt="" /></a></li>
                <?php } ?>
              </ul>
              <?php echo $after_widget; ?>
        <?php
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {				
        return $new_instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {				
        $title = esc_attr($instance['title']);
				$url1 = esc_attr($instance['url1']);
				$img1 = esc_attr($instance['img1']);
        ?>
       <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'theme1745'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
       <p><label for="<?php echo $this->get_field_id('img1'); ?>"><?php _e('1st banner path:', 'theme1745'); ?> <input class="widefat" id="<?php echo $this->get_field_id('img1'); ?>" name="<?php echo $this->get_field_name('img1'); ?>" type="text" value="<?php echo $img1; ?>" /></label></p>
       <p><label for="<?php echo $this->get_field_id('url1'); ?>"><?php _e('1st banner Link:', 'theme1745'); ?> <input class="widefat" id="<?php echo $this->get_field_id('url1'); ?>" name="<?php echo $this->get_field_name('url1'); ?>" type="text" value="<?php echo $url1; ?>" /></label></p>			 
        <?php 
    }

} // class Widget

?>