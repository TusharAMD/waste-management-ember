<?php
add_action( 'widgets_init', 'widget_ads_widget' );
function widget_ads_widget() {
	register_widget( 'Widget_Ads' );
}
class Widget_Ads extends WP_Widget {
	 function __construct() {
		parent::__construct(
			'ads-widget', // Base ID
			esc_html__( 'Hala - Adv', 'hala'), // Name
			array('description' => esc_html__('Display Adv on your site.', 'hala'),) // Args
        );
		function widget_scripts() {
			wp_enqueue_media();
	    	wp_enqueue_script('widget_scripts', hala_JS . 'widgets.js');
		}
		add_action('admin_enqueue_scripts','widget_scripts');
	}
        
	function widget( $args, $instance ) {
		extract( $args );
		$title    = apply_filters('widget_title', $instance['title'] );
		$adv_href = esc_url($instance['adv_href']);
		$adv_img  = esc_attr($instance['adv_img']);
		$image_id = esc_attr($instance['image_id']);
		$adv_code = $instance['adv_code'];
		echo $before_widget;
		if ( $title ) { 
			echo $before_title . esc_html( $title ) . $after_title; 
		}
			echo '<div class="widget-content">';
			if ($adv_href != "")
				echo '<a href="' . esc_url($adv_href) . '" target="_blank"><img src="' . esc_url($adv_img) . '" alt="ads" /></a>';
				
			elseif ( $adv_img )
				echo '<img src="' . esc_url($adv_img) . '" alt="ads" />';
				
			else {
				echo $adv_code;
			}
			echo '</div>';
			
		echo $after_widget;
	}
	function update( $new_instance, $old_instance ) {
		$instance             = $old_instance;
		$instance['title']    = strip_tags( $new_instance['title'] );
		$instance['adv_code'] = $new_instance['adv_code'];
		$instance['adv_img']  = $new_instance['adv_img'];
		$instance['image_id'] = $new_instance['image_id'];
		$instance['adv_href'] = $new_instance['adv_href'];
		return $instance;
	}
	function form( $instance ) {
		$defaults = array( 'title' => 'Ads Widget' );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e('Title :', 'hala');?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo (isset($instance['title'])?esc_attr($instance['title']):""); ?>" class="widefat" type="text">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'adv_img' ); ?>"><?php esc_html_e('Image URL:', 'hala');?></label>
		<input id="<?php echo $this->get_field_id( 'adv_img' ); ?>" name="<?php echo $this->get_field_name( 'adv_img' ); ?>" value="<?php echo (isset($instance['adv_img'])?$instance['adv_img']:"");?>" class="widefat custom_media_url_ads" type="text">
			<br><br>
			<input type="button" value="<?php esc_html_e('Upload Image', 'hala' ); ?>" class="button custom_media_upload_ads" id="custom_image_uploader_ads"/>
			<br><br>
			<input id="<?php echo $this->get_field_id( 'image_id' ); ?>" name="<?php echo $this->get_field_name( 'image_id' ); ?>" value="<?php echo (isset($instance['image_id'])?$instance['image_id']:"");?>" class="widefat image_id" type="hidden">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'adv_href' ); ?>"><?php esc_html_e('Advertising url:', 'hala');?></label>
			<input id="<?php echo $this->get_field_id( 'adv_href' ); ?>" name="<?php echo $this->get_field_name( 'adv_href' ); ?>" value="<?php echo (isset($instance['adv_href'])?esc_attr($instance['adv_href']):""); ?>" class="widefat" type="text">
		</p>
		<em style="display:block; border-top:1px solid #CCC; padding-top:10px; margin-top:25px; text-align:center;"><?php esc_html_e('OR', 'hala');?></em>
		<p>
			<label for="<?php echo $this->get_field_id( 'adv_code' ); ?>"><?php esc_html_e('Advertising Code html ( Ex: Google ads) : ', 'hala');?></label>
			<textarea id="<?php echo $this->get_field_id( 'adv_code' ); ?>" name="<?php echo $this->get_field_name( 'adv_code' ); ?>" class="widefat"><?php echo (isset($instance['adv_code'])?esc_attr($instance['adv_code']):""); ?></textarea>
		</p>
	<?php
	}
}