<?php 
/**
 * Services widget
 */
 
 

class service_widget extends WP_Widget {

    /** constructor */
    function service_widget() {
        parent::WP_Widget(false, $name = 'ابزارک سه بخشی');
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {
        extract( $args );
		global $wpdb;

        $title = apply_filters('widget_title', $instance['title']);
  		$thumbnail = $instance['thumbnail'];
		$details = $instance['details'];



        ?>
              <?php echo $before_widget; ?>
              <img class="service-widget-img" src="<?php echo $thumbnail; ?>"/>
                                <?php if ( $title )
                        echo $before_title . $title . $after_title; ?>
						
						<?php echo $details; ?>
						
						<?php echo $after_widget; ?>
        <?php
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['thumbnail'] = strip_tags($new_instance['thumbnail']);
		$instance['details'] = strip_tags($new_instance['details']);
        return $instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {	

        $title = esc_attr($instance['title']);
		$thumbnail = esc_attr($instance['thumbnail']);
		$details = esc_attr($instance['details']);

        ?>
         <p>
         <label for="<?php echo $this->get_field_id('title'); ?>">عنوان</label>
         <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
         </p>

         <p>
         <label for="<?php echo $this->get_field_id('thumbnail'); ?>">آدرس عکس بندانگشتی</label>
         <input class="widefat" id="<?php echo $this->get_field_id('thumbnail'); ?>" name="<?php echo $this->get_field_name('thumbnail'); ?>" type="text" value="<?php echo $thumbnail; ?>" />
         </p>

        <p>
    	<label for="<?php echo $this->get_field_id('details'); ?>">توضیح</label>
    	<textarea class="widefat" id="<?php echo $this->get_field_id('details'); ?>" name="<?php echo $this->get_field_name('details'); ?>"><?php echo $details; ?></textarea>
    	</p>
        
        

        
        <?php
    }

} // class utopian_recent_posts
add_action('widgets_init', create_function('', 'return register_widget("service_widget");'));
