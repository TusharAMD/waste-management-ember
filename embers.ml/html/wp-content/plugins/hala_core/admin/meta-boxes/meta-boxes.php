<?php
$prefix = 'mo_';
$args = array();
global $custom_post_box ;
$custom_post_box = array(
    'id' => 'post-meta-box',
    'title' => esc_html__('Post Options','hala'),
    'page' => 'post',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
       
        array(
            'name' => esc_html__('Slider Images','hala'),
            'desc' => esc_html__('If you would like to add more images for a slider, you can add them here.','hala'),
            'id' => $prefix.'image_fields',
            'type' => 'image-blocks',
            'std' => '',
            'options' => array()
        ),
        array(
            'name' => '',
            'desc' => '',
            'id' => $prefix.'portfolio_gallery',
            'type' => 'button',
            'std' => 'Browse'
        ),
       
    )
);
class motivowebFrameworkMetaboxes {
	public function __construct(){
		global $hala_options;
		$this->data = $hala_options;
		add_action('add_meta_boxes', array($this, 'add_meta_boxes'));
		add_action('save_post', array($this, 'save_meta_boxes'));
		add_action('admin_enqueue_scripts', array($this, 'admin_script_loader'));
	}
	function admin_script_loader() {
		global $pagenow;
		if (is_admin() && ($pagenow=='post-new.php' || $pagenow=='post.php')) {
			wp_enqueue_style('tb-metabox', hala_ADMIN_URI.'meta-boxes/assets/css/metabox.css');
			wp_enqueue_style('thickbox');
			//wp_enqueue_style('colorpicker', Hala_URI_PATH_FR.'/meta-boxes/assets/css/colorpicker.css');
			wp_enqueue_script('jcolpick', hala_ADMIN_URI.'meta-boxes/assets/js/colpick.js'); 
			wp_enqueue_script('jquery-easytabs', hala_ADMIN_URI.'meta-boxes/assets/js/jquery.easytabs.min.js');//page tab
			wp_enqueue_script('blog-tabs', hala_ADMIN_URI.'meta-boxes/assets/js/blog.tab.js'); //page tab
			wp_enqueue_script('portfolio', hala_ADMIN_URI.'meta-boxes/assets/js/portfolio.js'); //portfolio type
			wp_enqueue_script('meta-box', hala_ADMIN_URI.'meta-boxes/assets/js/meta.box.js'); //post type
			wp_enqueue_script('gallery-upload', hala_ADMIN_URI.'meta-boxes/assets/js/upload-meta-box.js');//upload gallery
			wp_enqueue_script('media-upload');
			wp_enqueue_script('thickbox');
		}
	}
	public function add_meta_boxes()
	{
		$post_types = get_post_types( array( 'public' => true ) );
		$this->add_meta_box('post_options', esc_html__('Page Options','hala'), 'page');
		$this->add_meta_box('post_video', esc_html__('Video Settings','hala'), 'post');
		$this->add_meta_box('post_audio', esc_html__('Audio Settings','hala'), 'post');
		$this->add_meta_box('post_quote', esc_html__('Quote Settings','hala'), 'post');
		$this->add_meta_box('post_link', esc_html__('Link Settings','hala'), 'post');
		$this->add_meta_box('post_gallery', esc_html__('Gallery Settings','hala'), 'post');
	}
	public function save_meta_boxes($post_id)
	{    
	    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return;
		}
		
		foreach($_POST as $key => $value) {
			if(strstr($key, 'tb_')) {
				update_post_meta($post_id, $key, $value);
			}
		}
		global $post , $custom_post_box;
        $new = '';
        // check permissions
        if (isset($_POST['post_type']) && 'page' == $_POST['post_type']) {
            if (!current_user_can('edit_page', $post_id)) {
                return $post_id;
            }
        } elseif (!current_user_can('edit_post', $post_id)) {
            return $post_id;
        }
        foreach ($custom_post_box['fields'] as $field) {
            $old = get_post_meta($post_id, $field['id'], true);
            if (isset($_POST[$field['id']])) {
                $new = $_POST[$field['id']];
                
            }
            if ($new && $new != $old) {
                update_post_meta($post_id, $field['id'], $new);
            } elseif ('' == $new && $old) {
                delete_post_meta($post_id, $field['id'], $old);
            }
        }
	}
	
	public function add_meta_box($id, $label, $post_type)
	{
		add_meta_box(
		'tb_' . $id,
		$label,
		array($this, $id),
		$post_type
		);
	}
	public function post_options()
	{
		$data = $this->data;
		include dirname( __FILE__ ) . '/blog_options.php';

	}
	public function post_video()
	{
		include dirname( __FILE__ ) . '/post_video.php';
	}
	public function post_audio()
	{
		include dirname( __FILE__ ) . '/post_audio.php';
	}
	public function post_quote()
	{
		include dirname( __FILE__ ). '/post_quote.php';
	}
	public function post_link()
	{
		include dirname( __FILE__ ) . '/post_link.php';
	}
	public function post_gallery()
	{
		include dirname( __FILE__ ) . '/post_gallery.php';
	}
	public function text($id, $label, $default, $desc = '')
	{
		global $post;
		$value = get_post_meta($post->ID, 'tb_' . $id, true);
		if (!$value){
			$value = $default;
		}
		$html = '';
		$html .= '<div id="tb_metabox_field_'.$id.'" class="tb_metabox_field">';
		$html .= '<label for="tb_' . $id . '">';
		$html .= $label;
		$html .= '</label>';
		$html .= '<div class="field">';
		$html .= '<input type="text" id="tb_' . $id . '" name="tb_' . $id . '" value="' . $value . '" />';
		if($desc) {
			$html .= '<p>' . $desc . '</p>';
		}
		$html .= '</div>';
		$html .= '</div>';
		echo ''.$html;
	}
	public function checkbox($id, $label, $default, $desc = '')
	{
		global $post;
		$value = get_post_meta($post->ID, 'tb_' . $id, true);
		if (!$value){
			$value = $default;
		}
		$html = '';
		$html .= '<div id="tb_metabox_field_'.$id.'" class="tb_metabox_field">';
		$html .= '<label for="tb_' . $id . '">';
		$html .= $label;
		$html .= '</label>';
		$html .= '<div class="field tb-checkbox">';
		$html .= '<input type="hidden" id="tb_' . $id . '" name="tb_' . $id . '" value="' . $value . '" />';
		$html .= '<input type="checkbox"/>';
		if($desc) {
			$html .= '<p>' . $desc . '</p>';
		}
		$html .= '</div>';
		$html .= '</div>';
		echo ''.$html;
	}
	public function text_date($id, $label, $default, $desc = '')
	{
		global $post;
		$value = get_post_meta($post->ID, 'tb_' . $id, true);
		if (!$value){
			$value = $default;
		}
		$html = '';
		$html .= '<div id="tb_metabox_field_'.$id.'" class="tb_metabox_field">';
		$html .= '<label for="tb_' . $id . '">';
		$html .= $label;
		$html .= '</label>';
		$html .= '<div class="field">';
		$html .= '<input type="text" id="tb_' . $id . '" class="mo-date-picker" name="tb_' . $id . '" value="' . $value . '" />';
		if($desc) {
			$html .= '<p>' . $desc . '</p>';
		}
		$html .= '</div>';
		$html .= '</div>';
		echo ''.$html;
	}
	public function hidden($id){
		global $post;
		$html = '<input type="hidden" id="tb_' . $id . '" name="tb_' . $id . '" value="' . get_post_meta($post->ID, 'tb_' . $id, true) . '" />';
		echo ''.$html;
	}
	public function select($id, $label, $options,$default, $desc = '')
	{
		global $post;
		$html = null;
		$html .= '<div id="tb_metabox_field_'.$id.'" class="tb_metabox_field">';
		$html .= '<label for="tb_' . $id . '">';
		$html .= $label;
		$html .= '</label>';
		$html .= '<div class="field">';
		$html .= '<select id="tb_' . $id . '" name="tb_' . $id . '">';                
		$value = get_post_meta($post->ID, 'tb_' . $id, true);
		$default = $value == '' ? $default ='global': $value;
                
		foreach($options as $key => $option) {
                    $selected = $default === (string)$key?'selected="selected"':null;
                    $html .= '<option ' . $selected . 'value="' . $key . '">' . $option . '</option>';
		}
		$html .= '</select>';
		if($desc) {
			$html .= '<p>' . $desc . '</p>';
		}
		$html .= '</div>';
		$html .= '</div>';
		echo ''.$html;
	}
	public function multiple($id, $label, $options, $desc = '')
	{
		global $post;
		$html = '';
		$html .= '<div id="tb_metabox_field_'.$id.'" class="tb_metabox_field">';
		$html .= '<label for="tb_' . $id . '">';
		$html .= $label;
		$html .= '</label>';
		$html .= '<div class="field">';
		$html .= '<select multiple="multiple" id="tb_' . $id . '" name="tb_' . $id . '[]">';
		foreach($options as $key => $option) {
			if(is_array(get_post_meta($post->ID, 'tb_' . $id, true)) && in_array($key, get_post_meta($post->ID, 'tb_' . $id, true))) {
				$selected = 'selected="selected"';
			} else {
				$selected = '';
			}
			$html .= '<option ' . $selected . 'value="' . $key . '">' . $option . '</option>';
		}
		$html .= '</select>';
		if($desc) {
			$html .= '<p>' . $desc . '</p>';
		}
		$html .= '</div>';
		$html .= '</div>';
		echo ''.$html;
	}
	public function textarea($id, $label, $desc = '')
	{
		global $post;
		$html = '';
		$html = '';
		$html .= '<div id="tb_metabox_field_'.$id.'" class="tb_metabox_field">';
		$html .= '<label for="tb_' . $id . '">';
		$html .= $label;
		$html .= '</label>';
		$html .= '<div class="field">';
		$html .= '<textarea cols="30" rows="5" id="tb_' . $id . '" name="tb_' . $id . '">' . get_post_meta($post->ID, 'tb_' . $id, true) . '</textarea>';
		if($desc) {
			$html .= '<p>' . $desc . '</p>';
		}
		$html .= '</div>';
		$html .= '</div>';
		echo ''.$html;
	}
	
	public function upload($id, $label, $desc = '')
	{
		global $post;
		$html = '';
		$html = '';
		$html .= '<div id="tb_metabox_field_'.$id.'" class="tb_metabox_field">';
		$html .= '<label for="tb_' . $id . '">';
		$html .= $label;
		$html .= '</label>';
		$html .= '<div class="field">';
		$html .= '<input name="tb_' . $id . '" class="upload_field" id="tb_' . $id . '" type="text" value="' . get_post_meta($post->ID, 'tb_' . $id, true) . '" />';
		$html .= '<input class="tb_upload_button button button-primary button-large" type="button" value="Browse" />';
		if($desc) {
			$html .= '<p>' . $desc . '</p>';
		}
		$html .= '</div>';
		$html .= '</div>';
		echo ''.$html;
	}
	public function uploadimage($id, $label, $options, $desc = '' )
	{
		 global $custom_post_box, $post;
		
        $html = '';
		$html = '';
		$html .= '<div id="tb_metabox_field_'.$id.'" class="tb_metabox_field">';
		$html .= '<label for="tb_' . $id . '">';
		$html .= $label;
		$html .= '</label>';
		$html .= '<div class="field">';
         foreach ($custom_post_box['fields'] as $field) {
            // get current post meta data
            $meta = get_post_meta($post->ID, $field['id'], true);
            switch ($field['type']) {
				
                case 'image-blocks':
                        echo'<ul id="image-holder" style="overflow:hidden;">';
                         if(is_array($meta)){
                        foreach ($meta as $key => $option) {
                            $image_attributes = wp_get_attachment_image_src( $option ,'editor-thumbs');
                            if($image_attributes[0]){
                                echo '<li>';
                                echo '<input type="hidden" name="mo_image_fields[]" value="'.$option.'" />';
                                echo '<img style="padding:3px;margin:5px;background-color:#fff;box-shadow:1px 1px 2px #d8d8d8;" width="150" height="150" class="thumbnail" src="'.$image_attributes[0].'" /><br/>';
                                echo '<a href="#" class="remove-image" style="text-decoration:none; color:red; float:right">remove</a></li>';
                            }
                        }
                    }
                     echo'</ul>';
                    break;
                case 'button':
                    echo '<input type="button" class="button button-primary button-large" name="', $field['id'], '" id="', $field['id'], '" value="Upload Slider Images" />';
                   ;
                    break;
            }
        }
	if($desc) {
		$html .= '<p>' . $desc . '</p>';
	}	
	$html .= '</div>';
	$html .= '</div>';		
	echo ''.$html;
	}
}
$valueboxes = new motivowebFrameworkMetaboxes();