<?php
add_action( 'widgets_init', 'Widget_Post_widget' );
function Widget_Post_widget() {
	register_widget( 'Widget_Post' );
}
class Widget_Post extends WP_Widget {
	 function __construct() {
		parent::__construct(
			'post-widget', // Base ID
			esc_html__( 'Hala - Post', 'hala'), // Name
			array('description' => esc_html__('Display Post on your site.', 'hala'),) // Args
        );
		function widget_post_scripts() {
			wp_enqueue_media();
	    	wp_enqueue_script('widget_scripts', hala_JS . 'widgets.js');
		}
		add_action('admin_enqueue_scripts','widget_post_scripts');
	}
        
	function widget( $args, $instance ) {
		extract( $args );
		$title    = apply_filters('widget_title', $instance['title'] );
		$Post_href = esc_url($instance['Post_href']);
		$Post_img  = esc_attr($instance['Post_img']);
		$image_id = esc_attr($instance['image_id']);
		$Post_content = $instance['Post_content'];
		echo $before_widget;
        $printOut = '
		  <div class="widget-content">
			<div class="widget-post">
			    <div class="overlay-top"></div>
				<figure class="widget-image"><img src="' . $Post_img . '" alt="'.$title.'"></figure><!-- widget-image -->
				<div class="widget-post-detail"><div class="mo-ad-post-detail">
                    <h3>'. esc_html($title).'</h3>
                    <div class="divider"></div>
                    <p>'.substr($Post_content, 0,150).'</p>
                    <a class="link" href="'.$Post_href.'">READ MORE</a>
				</div></div><!-- widget-post-detail -->  
			</div>
		 </div>
		 ';
		echo $printOut;
		echo $after_widget;
	}
	function update( $new_instance, $old_instance ) {
		$instance             = $old_instance;
		$instance['title']    = strip_tags( $new_instance['title'] );
		$instance['Post_content'] = $new_instance['Post_content'];
		$instance['Post_img']  = $new_instance['Post_img'];
		$instance['image_id'] = $new_instance['image_id'];
		$instance['Post_href'] = $new_instance['Post_href'];
		return $instance;
	}
	function form( $instance ) {
		$defaults = array( 'title' => 'Post Widget' );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		<p>
			<label for="<?php echo $this->get_field_id( 'Post_img' ); ?>"><?php esc_html_e('Image URL :', 'hala');?></label>
			<input id="<?php echo $this->get_field_id( 'Post_img' ); ?>" name="<?php echo $this->get_field_name( 'Post_img' ); ?>" value="<?php echo (isset($instance['Post_img'])?$instance['Post_img']:"");?>" class="widefat custom_media_url_post" type="text">
			<br><br>
			<input type="button" value="<?php esc_html_e('Upload Image', 'hala') ?>" class="button custom_media_upload_post" id="custom_image_uploader_ads"/>
			<input id="<?php echo $this->get_field_id( 'image_id' ); ?>" name="<?php echo $this->get_field_name( 'image_id' ); ?>" value="<?php echo (isset($instance['image_id'])?$instance['image_id']:"");?>" class="widefat image_id" type="hidden">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e('Post title:', 'hala');?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo (isset($instance['title'])?esc_attr($instance['title']):""); ?>" class="widefat" type="text">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'Post_content' ); ?>"><?php esc_html_e('Post content:', 'hala');?></label>
			<textarea id="<?php echo $this->get_field_id( 'Post_content' ); ?>" name="<?php echo $this->get_field_name( 'Post_content' ); ?>" class="widefat"><?php echo (isset($instance['Post_content'])?esc_attr($instance['Post_content']):""); ?></textarea>
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'Post_href' ); ?>"><?php esc_html_e('Post url:', 'hala');?></label>
			<input id="<?php echo $this->get_field_id( 'Post_href' ); ?>" name="<?php echo $this->get_field_name( 'Post_href' ); ?>" value="<?php echo (isset($instance['Post_href'])?esc_attr($instance['Post_href']):""); ?>" class="widefat" type="text">
		</p>
	<?php
	}
}