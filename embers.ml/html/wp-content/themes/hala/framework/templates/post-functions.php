<?php
/*-----------------------------------------------*
   post views
/*-----------------------------------------------*/	
function hala_get_post_views($postID){
	    $count_key = 'post_views_count';
	    $count = get_post_meta($postID, $count_key, true);
	    if($count==''){
	        delete_post_meta($postID, $count_key);
	        add_post_meta($postID, $count_key, '0');
	        return 0;
	    }
	    return $count;
		}
		function hala_set_post_views($postID) {
		 if (is_single()) {
		  $count_key = 'post_views_count';
		  $count = get_post_meta($postID, $count_key, true);
		  if($count==''){
		   $count = 0;
		   delete_post_meta($postID, $count_key);
		   add_post_meta($postID, $count_key, '0');
		  }else{
		   $count++;
		   update_post_meta($postID, $count_key, $count);
		  }
		 }
	}
/*-----------------------------------------------*
  Author
/*-----------------------------------------------*/
if ( ! function_exists( 'hala_post_author_bio' ) ) :
	function hala_post_author_bio( $name = false ) {
		?>
		<div class="about-author">
			<?php echo get_avatar( get_the_author_meta( 'email' ), $size = '70' ); ?>
			<h3><?php the_author(); ?></h3>
			<div class="divider"></div>
			<p><?php the_author_meta('description'); ?></p>
		</div>
		<?php
	}
endif;
/*-----------------------------------------------*
   social share
/*-----------------------------------------------*/
	if ( ! function_exists( 'hala_social_share' ) ) :
		function hala_social_share() {
			$socials = array(
				'facebook',
				'twitter',
				'google',
				'linkedin',
			);
			$socials = apply_filters( 'hala_social_share', $socials );
			?>  
                <div class="share">
                    <i class="fa fa-share-alt"></i><span>Share</span>
                    <ul class="share-links">
                       
                        <?php if ( in_array( 'facebook', $socials ) ) : ?>
                        
						<li><a class="fa fa-facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" title="<?php echo esc_html('Facebook', 'hala'); ?>"></a></li>
					    <?php endif; 
						 if ( in_array( 'twitter', $socials ) ) : ?>
						<li><a class="fa fa-twitter" href="https://twitter.com/intent/tweet?url=<?php echo the_permalink(); ?>&text=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>" target="_blank" title="<?php echo esc_html__( 'Tweet', 'hala' ) ?>"></a></li>
				    	<?php endif; 
						if ( in_array( 'google', $socials ) ) : ?>
						<li><a class="fa fa-google-plus" href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank" title="<?php echo esc_html('Google plus', 'hala'); ?>"></a></li>
					   <?php endif; 
					   if ( in_array( 'linkedin', $socials ) ) : ?>
                        <li> <a class="fa fa-linkedin" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink();?> ?>" target="_blank" title="<?php echo esc_html__( 'LinkedIn', 'hala' ) ?>"></a>
                        </li>
                       <?php endif; ?>
                    </ul>
                </div>
			<?php
		}
	endif;
/*-----------------------------------------------*
  POST DIRECTION
/*-----------------------------------------------*/
if ( ! function_exists( 'hala_post_directions' ) ) :
function hala_post_directions( ) {
	global $wp_query, $post;
	// Don't print empty markup on single pages if there's nowhere to navigate.
	if ( is_single() ) {
		$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
		$next = get_adjacent_post( false, '', false );
		if ( ! $next && ! $previous )
			return;
	}
	$nav_class = ( is_single() ) ? 'post-directions' : 'post-directions navigation-paging';
	?>
	<nav class="<?php echo esc_attr($nav_class); ?>">
	
	<?php if ( is_single() ) : // navigation links for single posts 
	$prev_post = get_previous_post();
	$next_post = get_next_post();
	?>
        
	<div class="post-paginations">
      <div class="post-pagi prev">
		<a href="<?php echo esc_url(get_permalink( $prev_post->ID )); ?>">
		<?php
		if ( is_a( $prev_post , 'WP_Post' ) ) { ?>
				<span><i class="fa fa-long-arrow-left"></i><?php echo esc_html__( 'PREVIOUS POST', 'hala' ); ?></span>
				<h3><?php echo esc_html(get_the_title( $prev_post->ID )); ?></h3>
		<?php } ?>
		</a>
      </div><!-- post-pagi prev -->
      <div class="post-pagi next">  
		<a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>">
		<?php
		if ( is_a( $next_post , 'WP_Post' ) ) { ?>
				<span><?php echo esc_html__( 'NEXT POST', 'hala' ); ?><i class="fa fa-long-arrow-right"></i></span>
				<h3><?php echo esc_html(get_the_title( $next_post->ID )); ?></h3>
		<?php } ?>
		</a><!-- next-article -->
      </div><!-- post-pagi next -->
	</div><!-- post-paginations -->
	<?php endif; ?>
	</nav>
	<?php
}
endif;
/*-----------------------------------------------*
  Post gallery
/*-----------------------------------------------*/
if (!function_exists('Hala_grab_ids_from_gallery')) {
    function Hala_grab_ids_from_gallery() {
        global $post;
        $gallery = Hala_get_shortcode_from_content('gallery');
        $object = new stdClass();
        $object->columns = '3';
        $object->link = 'post';
        $object->ids = array();
        if ($gallery) {
            $object = Hala_extra_shortcode('gallery', $gallery, $object);
        }
        return $object;
    }
}
/*-----------------------------------------------*
  Extra shortcode
/*-----------------------------------------------*/
if (!function_exists('Hala_extra_shortcode')) {
    function Hala_extra_shortcode($name, $shortcode, $object) {
        if ($shortcode && is_object($object)) {
            $attrs = str_replace(array('[', ']', '"', $name), null, $shortcode);
            $attrs = explode(' ', $attrs);
            if (is_array($attrs)) {
                foreach ($attrs as $attr) {
                    $_attr = explode('=', $attr);
                    if (count($_attr) == 2) {
                        if ($_attr[0] == 'ids') {
                            $object->$_attr[0] = explode(',', $_attr[1]);
                        } else {
                            $object->$_attr[0] = $_attr[1];
                        }
                    }
                }
            }
        }
        return $object;
    }
}
/* Get Shortcode Content */
if (!function_exists('Hala_get_shortcode_from_content')) {
    function Hala_get_shortcode_from_content($param) {
        global $post;
        $pattern = get_shortcode_regex();
        $content = $post->post_content;
        if (preg_match_all('/' . $pattern . '/s', $content, $matches) && array_key_exists(2, $matches) && in_array($param, $matches[2])) {
            $key = array_search($param, $matches[2]);
            return $matches[0][$key];
        }
    }
}
/* Remove Shortcode */
if (!function_exists('Hala_remove_shortcode_gallery')) {
	function Hala_remove_shortcode_gallery() {
		return null;
	}
}
/*-----------------------------------------------*
  Custom comment list
/*-----------------------------------------------*/
function Hala_custom_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);
	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
	<<?php echo esc_html( $tag ); ?> <?php comment_class( empty( $args['has_children'] ) ? 'mo-comment-item clearfix' : 'mo-comment-item parent clearfix' ) ?> id="comment-<?php comment_ID() ?>">
<div class="comment-body">
    <div class="avatar">
       <?php echo get_avatar( $comment , $size = '70' ); ?>
    </div>
    <div class="comment">
        <div class="mo-name"><?php echo '<h6>'.get_comment_author( get_comment_ID() ).'</h6><div class="date">'.get_comment_date().'</div>'; ?></div>
        <div class="divider left"></div>
    <?php if ( $comment->comment_approved == '0' ) : ?>
        <em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'hala' ); ?></em>
    <?php endif; ?>
    <?php comment_text(); ?>
    <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
    </div><!-- comment -->
</div><!-- comment-body -->
<?php
}