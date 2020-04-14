<?php
global $hala_options;
$tb_post_show_post_share = (int) isset($hala_options['tb_post_show_post_share']) ?  $hala_options['tb_post_show_post_share']: 1;?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="grid-post">
	  <div class="format-post <?php echo get_post_format(); ?>">
				<?php
					$media_output = '';
					$format = get_post_format() ? get_post_format() : 'standard';
					switch ($format) {
						case 'gallery':
							$media_output = '';
							$attachment_ids = array();
							$attachment_ids = get_post_meta(get_the_ID(), 'mo_portfolio_gallery', true);
							if(!empty($attachment_ids)) {
								$date = time() . '_' . uniqid(true);
								$media_output .= '<div id="carousel-generic'.esc_attr($date).'" class="carousel-post dots-nav-dark" >';
								
								foreach($attachment_ids as $attachment_id ) {
									$image_attributes = wp_get_attachment_image_src($attachment_id, 'hala-medium');
									if($image_attributes[0]){
										$media_output .= '<div class="item">
										                  <figure>
															<img src="'.esc_url($image_attributes[0]).'" alt="blog image" height="260"/>
														   </figure>
														</div>';
									}
								}
								$media_output .= '</div>';
							}
							break;
							
							
						case 'video':
							$media_output = '';
							$video_url = get_post_meta(get_the_ID(), 'tb_post_video_url', true);
							if (has_post_thumbnail()) {
								$media_output .= '
								  <figure>'.get_the_post_thumbnail(get_the_ID(), "hala-medium").'
									  <figcaption>
										<a class="lightbox-video" href="'.esc_url($video_url).'"><i class="fa fa-play"></i></a>
									  </figcaption>
								  </figure>';
							}
							else {
								$media_output .= ' 
								<div class="embed-responsive embed-responsive-16by9">
									<iframe id="vimeo-video" src="'.esc_url($video_url).'"></iframe>
								</div>';
							}
							break;
							
							
						case 'quote':
							$media_output = '';
							if (has_post_thumbnail()) {
								echo '<figure>
								       <a href="'.get_the_permalink().'">'.get_the_post_thumbnail(get_the_ID(), "hala-medium").'</a>
								      </figure>';
							}
							$quote_content = get_post_meta(get_the_ID(), 'tb_post_quote', true);
							if($quote_content) {
								$media_output .= '<div class="blockquote-post"><blockquote>'.esc_html($quote_content).'</blockquote></div>';
							}
							break;
							
							
						case 'audio':
							$media_output = '';
							$audio_source_from = get_post_meta(get_the_ID(), 'tb_audio_type', true);
							$audio_type = get_post_meta(get_the_ID(), 'tb_post_audio_type', true);
							$audio_url = get_post_meta(get_the_ID(), 'tb_post_audio_url', true);
							
							if (has_post_thumbnail()) {
								echo '<figure>
								       <a href="'.get_the_permalink().'">'.get_the_post_thumbnail(get_the_ID(), "hala-medium").'</a>
								      </figure>';
							}
							if($audio_source_from == 'soundcloud') {
								$media_output .= '<div class="audio-post"><div class="embed-responsive embed-responsive-16by9">'. get_post_meta(get_the_ID(), 'tb_post_audio_iframe', true).'</div> </div>';
							} else {
								if($audio_url) echo '<div class="audio-post">
								'. do_shortcode('[audio '.$audio_type.'="'.$audio_url.'"][/audio]') .'</div>';
							} 
							break;
					
					
						case 'link':
							$media_output = '';
							if (has_post_thumbnail()) {
								echo '<figure>
								       <a href="'.get_the_permalink().'">'.get_the_post_thumbnail(get_the_ID(), "hala-medium").'</a>
								      </figure>';
							}
							$link = get_post_meta(get_the_ID(), 'tb_post_link', true);
							if($link) {
								$media_output = '<a class="mo-link" href="'.esc_url($link).'">'.esc_html($link).'</a>';
							}
							break;
							
							
						default:
							if (has_post_thumbnail()) {
								$media_output = '
								 <figure>
								   <a href="'.get_the_permalink().'">'.get_the_post_thumbnail(get_the_ID(), "hala-medium").'</a>
								 </figure>';
							}
							break;
					}
		         echo '<div class="format-post">'.$media_output.'</div>'?>
			</div>
      <div class="info-post">
        <h5 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
        <ul class="meta-post">
            <li><?php echo get_the_date('d M, Y'); ?></li>
            <li><?php echo esc_html__('By ', 'hala').get_the_author(); ?></li><li><a href="<?php comments_link(); ?>"><?php comments_number( '0', '1', '%' );?> <?php echo esc_html__('Comments ', 'hala'); ?> </a></li>
            <li><?php if( function_exists('Hala_post_favorite') ) Hala_post_favorite(); ?></li>
        </ul>
        <p><?php echo hala_custom_excerpt($excerpt_lenght, $excerpt_more); ?></p>
        <?php if ( $tb_post_show_post_share ) { hala_social_share(); }?>                
        <a href="<?php the_permalink(); ?>" class="btn btn-post"><i class="fa fa-long-arrow-right"></i><?php echo esc_html($readmore_text); ?></a>
    </div>
   </div>
</article>