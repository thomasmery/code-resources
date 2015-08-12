<?php

class FeaturedPosts_Widget extends WP_Widget {

	function FeaturedPosts_Widget() {
		parent::WP_Widget(false, __("Featured Posts Widget", 'blv'));
	}
 
	function update($new_instance, $old_instance) {  
		return $new_instance;  
	}  
 
	function form($instance) {  
		$title = esc_attr($instance["title"]);  
		echo "<br />";

?>
         <p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
         </p>

<?php

	}
 
	function widget($args, $instance) {
		
		extract( $args );

		$widget_id = "widget_" . $widget_id;

		$title = esc_attr($instance['title']);

 		echo $before_widget;

 		if($title) {

 			echo $before_title . $title . $after_title;

 		}
		
		// I like to put the HTML output for the actual widget in a seperate file
		include(realpath(dirname(__FILE__)) . "/../templates/featured_posts_widget.php");
        
        echo $after_widget;

	}
}
register_widget("FeaturedPosts_Widget");