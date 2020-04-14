<?php
add_action( 'widgets_init', 'widget_instagram_widget' );
function widget_instagram_widget() {
	register_widget( 'Widget_Instagram' );
}
class Widget_Instagram extends WP_Widget {

	function __construct() {
		parent::__construct(
			'instagram-widget', // Base ID
			esc_html__( 'Hala - Instagram', 'hala'), // Name
			array('description' => esc_html__('Display Instagram on your site.', 'hala'),) // Args
        );
	}
		function widget( $args, $instance ) {
		$title    = empty( $instance['title'] ) ? '' : apply_filters( 'widget_title', $instance['title'] );
		$username = empty( $instance['username'] ) ? '' : $instance['username'];
		$limit    = empty( $instance['number'] ) ? 9 : $instance['number'];
		$size     = empty( $instance['size'] ) ? 'large' : $instance['size'];
		$link     = empty( $instance['link'] ) ? '' : $instance['link'];

		echo $args['before_widget'];

		if ( ! empty( $title ) ) {
			echo $args['before_title'] . wp_kses_post( $title ) . $args['after_title'];
		};

		do_action( 'hala_insta_before_widget', $instance );

		if ( '' !== $username ) {

			$media_array = $this->scrape_instagram( $username );

			if ( is_wp_error( $media_array ) ) {

				echo wp_kses_post( $media_array->get_error_message() );

			} else {

				$insta_classes = apply_filters( 'hala_insta_images_class', 'hala-instagram-images hala-instagram-size-' . $size );
				$row_classes   = apply_filters( 'hala_insta_row_class', 'hala-instagram-row' );
				$child_classes = apply_filters( 'hala_insta_image_class', 'hala-instagram-image' );
				$aclass        = apply_filters( 'hala_insta_a_class', '' );
				$imgclass      = apply_filters( 'hala_insta_imag_class', '' );
				
				// filter for images only?
				if ( $images_only = apply_filters( 'hala_insta_images_only', false ) ) {
					$media_array = array_filter( $media_array, array( $this, 'images_only' ) );
				}
				$row_count = 0;

				// slice list down to required limit.
				$media_array = array_slice( $media_array, 0, $limit );
				// filters for custom classes.

				?>
                <div class="widget-content"><?php
				foreach ( $media_array as $item ) {
					$row_count ++;
					echo ' <figure class="widget-effect grid-widget-effect portfolio-effect">
								<img src="' . esc_url( $item[ $size ] ) . '"  alt="' . esc_attr( $item['description'] ) . '" class="' . esc_attr( $imgclass ) . '"/>
								
								 <figcaption>
								  <a class="portfolio-link" href="' . esc_url( $item['link'] ) . '" target="_blank" rel="nofollow"><i class="fa fa-search"></i></a> 
								</figcaption>
                           </figure>';
				}
				?></div>
               <?php
			}
		}

		$linkaclass = apply_filters( 'hala_insta_linka_class', 'instagram-button no-rounded button-block fill small button' );

		switch ( substr( $username, 0, 1 ) ) {
			case '#':
				$url = '//instagram.com/explore/tags/' . str_replace( '#', '', $username );
				break;

			default:
				$url = '//instagram.com/' . str_replace( '@', '', $username );
				break;
		}

		do_action( 'hala_insta_after_widget', $instance );

		echo $args['after_widget'];
	}
	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array(
			'title'    => __( 'Instagram', 'hala' ),
			'username' => '',
			'size'     => 'large',
			'link'     => __( 'Follow Me!', 'hala' ),
			'number'   => 9,
			'target'   => '_self',
			'columns'  => 3
		) );
		$title    = $instance['title'];
		$username = $instance['username'];
		$number   = absint( $instance['number'] );
		$size     = $instance['size'];
		$link     = $instance['link'];
		?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'hala' ); ?>
                : <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
                         name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text"
                         value="<?php echo esc_attr( $title ); ?>"/></label></p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'username' ) ); ?>"><?php esc_html_e( '@username or #tag', 'hala' ); ?>
                : <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'username' ) ); ?>"
                         name="<?php echo esc_attr( $this->get_field_name( 'username' ) ); ?>" type="text"
                         value="<?php echo esc_attr( $username ); ?>"/></label></p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of photos', 'hala' ); ?>
                : <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"
                         name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="text"
                         value="<?php echo esc_attr( $number ); ?>"/></label></p>
		<?php
	}
	function update( $new_instance, $old_instance ) {
		$instance             = $old_instance;
		$instance['title']    = strip_tags( $new_instance['title'] );
		$instance['username'] = trim( strip_tags( $new_instance['username'] ) );
		$instance['number']   = ! absint( $new_instance['number'] ) ? 9 : $new_instance['number'];
		$instance['size']     = ( ( 'thumbnail' === $new_instance['size'] || 'large' === $new_instance['size'] || 'small' === $new_instance['size'] || 'original' === $new_instance['size'] ) ? $new_instance['size'] : 'large' );
		$instance['columns']  = ! absint( $new_instance['columns'] ) ? 3 : $new_instance['columns'];
		$instance['target']   = ( ( '_self' === $new_instance['target'] || '_blank' === $new_instance['target'] || 'lightbox' === $new_instance['target'] ) ? $new_instance['target'] : '_self' );
		$instance['link']     = strip_tags( $new_instance['link'] );
		if ( $instance['columns'] > 6 ) {
			$instance['columns'] = 6;
		}
		if ( $instance['columns'] < 1 ) {
			$instance['columns'] = 1;
		}
		return $instance;
	}

	// based on https://gist.github.com/cosmocatalano/4544576.
	function scrape_instagram( $username ) {
		$username = trim( strtolower( $username ) );
		switch ( substr( $username, 0, 1 ) ) {
			case '#':
				$url              = 'https://instagram.com/explore/tags/' . str_replace( '#', '', $username );
				$transient_prefix = 'h';
				break;

			default:
				$url              = 'https://instagram.com/' . str_replace( '@', '', $username );
				$transient_prefix = 'u';
				break;
		}

		if ( false === ( $instagram = get_transient( 'hala_insta_' . $transient_prefix . '-' . sanitize_title_with_dashes( $username ) ) ) ) {
			$remote = wp_remote_get( $url );
			if ( is_wp_error( $remote ) ) {
				return new WP_Error( 'site_down', esc_html__( 'Unable to communicate with Instagram.', 'hala' ) );
			}
			if ( 200 !== wp_remote_retrieve_response_code( $remote ) ) {
				return new WP_Error( 'invalid_response', esc_html__( 'Instagram did not return a 200.', 'hala' ) );
			}
			$shards      = explode( 'window._sharedData = ', $remote['body'] );
			$insta_json  = explode( ';</script>', $shards[1] );
			$insta_array = json_decode( $insta_json[0], true );

			if ( ! $insta_array ) {
				return new WP_Error( 'bad_json', esc_html__( 'Instagram has returned invalid data.', 'hala' ) );
			}
			if ( isset( $insta_array['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['edges'] ) ) {
				$images = $insta_array['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['edges'];
			} elseif ( isset( $insta_array['entry_data']['TagPage'][0]['graphql']['hashtag']['edge_hashtag_to_media']['edges'] ) ) {
				$images = $insta_array['entry_data']['TagPage'][0]['graphql']['hashtag']['edge_hashtag_to_media']['edges'];
			} else {
				return new WP_Error( 'bad_json_2', esc_html__( 'Instagram has returned invalid data.', 'hala' ) );
			}
			if ( ! is_array( $images ) ) {
				return new WP_Error( 'bad_array', esc_html__( 'Instagram has returned invalid data.', 'hala' ) );
			}
			$instagram = array();

			foreach ( $images as $image ) {
				if ( true === $image['node']['is_video'] ) {
					$type = 'video';
				} else {
					$type = 'image';
				}
				$caption = __( 'Instagram Image', 'hala' );
				if ( ! empty( $image['node']['edge_media_to_caption']['edges'][0]['node']['text'] ) ) {
					$caption = wp_kses( $image['node']['edge_media_to_caption']['edges'][0]['node']['text'], array() );
				}

				$instagram[] = array(
					'description' => $caption,
					'link'        => trailingslashit( '//instagram.com/p/' . $image['node']['shortcode'] ),
					'time'        => $image['node']['taken_at_timestamp'],
					'comments'    => $image['node']['edge_media_to_comment']['count'],
					'likes'       => $image['node']['edge_liked_by']['count'],
					'thumbnail'   => preg_replace( '/^https?\:/i', '', $image['node']['thumbnail_resources'][0]['src'] ),
					'small'       => preg_replace( '/^https?\:/i', '', $image['node']['thumbnail_resources'][2]['src'] ),
					'large'       => preg_replace( '/^https?\:/i', '', $image['node']['thumbnail_resources'][4]['src'] ),
					'original'    => preg_replace( '/^https?\:/i', '', $image['node']['display_url'] ),
					'type'        => $type,
				);
			}
			// do not set an empty transient - should help catch private or empty accounts.
			if ( ! empty( $instagram ) ) {
				$instagram = base64_encode( serialize( $instagram ) );
				set_transient( 'hala_insta_' . $transient_prefix . '-' . sanitize_title_with_dashes( $username ), $instagram, apply_filters( 'null_instagram_cache_time', HOUR_IN_SECONDS * 2 ) );
			} 
		}
		if ( ! empty( $instagram ) ) {
			return unserialize( base64_decode( $instagram ) );
		} else {
			return new WP_Error( 'no_images', esc_html__( 'Instagram did not return any images.', 'hala' ) );
		} 
	}
	function images_only( $media_item ) {
		if ( 'image' === $media_item['type'] ) {
			return true;
		}
		return false;
	}
}