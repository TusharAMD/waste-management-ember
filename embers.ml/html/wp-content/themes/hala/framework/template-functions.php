<?php
if ( ! isset( $content_width ) ) $content_width = 900;
if ( is_singular() ) wp_enqueue_script( "comment-reply" );
if ( ! function_exists( 'Hala_setup' ) ) {
	function Hala_setup() {
		global $hala_options;
		load_theme_textdomain( 'hala', get_template_directory() . '/languages' );
		// Add Custom Header.
		add_theme_support('custom-header');
		// Add RSS feed links to <head> for posts and comments.
		add_theme_support( 'automatic-feed-links' );
		// Enable support for Post Thumbnails, and declare sizes.
		add_theme_support( 'post-thumbnails' );
		// Theme resize image
		add_image_size( 'hala-full'  , 1500, 730, true ); //header carousel
		add_image_size( 'hala-medium', 750 , 500, true ); //single blog
		add_image_size( 'hala-small' , 380 , 280, true ); //blog masonry
		add_image_size( 'hala-team'  , 540 , 650, true );
		add_image_size( 'hala-thumb' , 100 , 100, true );
		//Enable support for Title Tag
		 add_theme_support( "title-tag" );
		// This theme uses wp_nav_menu() in locations.
		register_nav_menus( array(
			'main_navigation'     => esc_html__( 'Main Navigation','hala' ),
			'one_page_navigation' => esc_html__( 'One Page Menu','hala' ),
		) );
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
		) );
		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'video', 'audio', 'quote', 'link', 'gallery',
		) );
		// This theme allows users to set a custom background.
		add_theme_support( 'custom-background', apply_filters( 'Hala_custom_background_args', array(
			'default-color' => 'f5f5f5',
		) ) );
		// Add support for featured content.
		add_theme_support( 'featured-content', array(
			'featured_content_filter' => 'Hala_get_featured_posts',
			'max_posts' => 6,
		) );
		
		// This theme uses its own gallery styles.
		add_filter( 'use_default_gallery_style', '__return_false' );
	}
}
add_action( 'after_setup_theme', 'Hala_setup' );
/*-----------------------------------------------*
  Customize Body Class
/*-----------------------------------------------*/
function hala_body_class( $classes ) {
	global $hala_options;
	$body_layout =& $hala_options["body_layout"];
    if ( $body_layout == 'boxed' || ( get_post_meta( get_the_ID(), 'tb_body_layout', true ) == 'boxed' ) ) 
      {
		$classes[] = 'boxed';
      }
	  else {
		$classes[] = 'wide';
	  }
    return $classes;
}
add_filter( 'body_class', 'hala_body_class' );
/*-----------------------------------------------*
  Logo
/*-----------------------------------------------*/
if (!function_exists('hala_logo')) {
	function hala_logo() {
		global $hala_options;
		$logo = get_post_meta(get_the_ID(), 'tb_logo', true);
		if($logo == '') {
			$logo = isset($hala_options['tb_logo']['url']) && $hala_options['tb_logo']['url'] ? $hala_options['tb_logo']['url'] : Hala_URI_PATH.'/assets/images/logo.png';
		}
		echo '<img class="logo" src="'.esc_url($logo).'" alt="Logo"/>';
	}
}
/*-----------------------------------------------*
  Header , Footer
/*-----------------------------------------------*/
function Hala_Header() {
    global $hala_options;
    $header_layout =& $hala_options["tb_header_layout"];
	$tb_header = get_post_meta(get_the_ID(), 'tb_header', true)?get_post_meta(get_the_ID(), 'tb_header', true):'global';
	$header_layout = $tb_header=='global'?$header_layout:$tb_header;
    switch ($header_layout) {
        case 'header-v1':
            get_template_part('framework/headers/header', 'v1');
            break;
		case 'header-v2':
            get_template_part('framework/headers/header', 'v2');
            break;
		case 'header-v3':
            get_template_part('framework/headers/header', 'v3');
            break;
		case 'header-v4':
            get_template_part('framework/headers/header', 'v4');
            break;		
		default :
			get_template_part('framework/headers/header', 'v1');
			break;
    }
}
function Hala_Footer() {
    global $hala_options;
    $footer_layout =& $hala_options["tb_footer_layout"];
	$tb_footer = get_post_meta(get_the_ID(), 'tb_footer', true)?get_post_meta(get_the_ID(), 'tb_footer', true):'global';
	$footer_layout = $tb_footer=='global'?$footer_layout:$tb_footer;
    switch ($footer_layout) {
        case 'footer-v1':
            get_template_part('framework/footers/footer', 'v1');
            break;
		case 'footer-v2':
            get_template_part('framework/footers/footer', 'v2');
            break;
		case 'footer-v3':
            get_template_part('framework/footers/footer', 'v3');
            break;	
		default :
			get_template_part('framework/footers/footer', 'v1');
			break;
    }
}
/*-----------------------------------------------*
  Custom Site Title
/*-----------------------------------------------*/
function Hala_wp_title( $title, $sep ) {
	global $paged, $page;
	if ( is_feed() ) {
		return $title;
	}
	// Add the site name.
	$title .= get_bloginfo( 'name' );
	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}
	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = sprintf( esc_html__( 'Page %s', 'hala' ), max( $paged, $page ) ) . " $sep $title";
	}
	return $title;
}
add_filter( 'wp_title', 'Hala_wp_title', 10, 2 );
/*-----------------------------------------------*
  Page title
/*-----------------------------------------------*/
if (!function_exists('Hala_page_title')) {
    function Hala_page_title() { 
            ob_start();
			if( is_home() ){ esc_html_e('Home', 'hala');
			}elseif(is_search()){ esc_html_e('Search', 'hala');
            }elseif(is_404()){ esc_html_e('Page Not Found ', 'hala');
            }elseif (!is_archive()) {
                the_title();
            } else { 
                if (is_category()){
                }elseif( get_post_type() == 'portfolio' || get_post_type() == 'product' || get_post_type() == 'team' || get_post_type() == 'Testimonials' ){
                    single_term_title();
                }elseif (is_tag()){
                    single_tag_title();
                }elseif (is_author()){
                    printf(__('Author: %s', 'hala'), '<span class="vcard">' . get_the_author() . '</span>');
                }elseif (is_day()){
                    printf(__('Day: %s', 'hala'), '<span>' . get_the_date() . '</span>');
                }elseif (is_month()){
                    printf(__('Month: %s', 'hala'), '<span>' . get_the_date() . '</span>');
                }elseif (is_year()){
                    printf(__('Year: %s', 'hala'), '<span>' . get_the_date() . '</span>');
                }elseif (is_tax('post_format', 'post-format-aside')){ esc_html_e('Asides', 'hala');
                }elseif (is_tax('post_format', 'post-format-gallery')){ esc_html_e('Galleries', 'hala');
                }elseif (is_tax('post_format', 'post-format-image')){ esc_html_e('Images', 'hala');
                }elseif (is_tax('post_format', 'post-format-video')){ esc_html_e('Videos', 'hala');
                }elseif (is_tax('post_format', 'post-format-quote')){ esc_html_e('Quotes', 'hala');
                }elseif (is_tax('post_format', 'post-format-link')){ esc_html_e('Links', 'hala');
                }elseif (is_tax('post_format', 'post-format-status')){ esc_html_e('Statuses', 'hala');
                }elseif (is_tax('post_format', 'post-format-audio')){ esc_html_e('Audios', 'hala');
                }elseif (is_tax('post_format', 'post-format-chat')){ esc_html_e('Chats', 'hala');
                }else{ esc_html_e('Archives', 'hala');
                }
            }
            return ob_get_clean();
    }
}
/*-----------------------------------------------*
  Page breadcrumb 
/*-----------------------------------------------*/
if (!function_exists('Hala_page_breadcrumb')) {
    function Hala_page_breadcrumb($delimiter) {
            ob_start();
            $home = esc_html__('Home', 'hala');
            global $post;
            $homeLink = home_url();
			if( is_home() ){
				esc_html__('Home', 'hala');
			}else{
				echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
			}
            if ( is_category() ) {
                $thisCat = get_category(get_query_var('cat'), false);
                if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
                echo '<span class="current">' . esc_html__('Archive by category: ', 'hala') . single_cat_title('', false) . '</span>';
            } elseif ( is_search() ) {
                echo '<span class="current">' . esc_html__('Search results for: ', 'hala') . get_search_query() . '</span>';
            } elseif ( is_day() ) {
                echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F').' '. get_the_time('Y') . '</a> ' . $delimiter . ' ';
                echo '<span class="current">' . get_the_time('d') . '</span>';
            } elseif ( is_month() ) {
                echo '<span class="current">' . get_the_time('F'). ' '. get_the_time('Y') . '</span>';
            } elseif ( is_single() && !is_attachment() ) {
            if ( get_post_type() != 'post' ) {
                if(get_post_type() == 'portfolio'){
                    $terms = get_the_terms(get_the_ID(), 'project-type', '' , '' );
                    if($terms) {
                        the_terms(get_the_ID(), 'project-type', '' , ', ' );
                        echo ' ' . $delimiter . ' ' . '<span class="current">' . get_the_title() . '</span>';
                    }else{
                        echo '<span class="current">' . get_the_title() . '</span>';
                    }
                }elseif(get_post_type() == 'team'){
                    echo '<span class="current">' . get_the_title() . '</span>';
                }elseif(get_post_type() == 'testimonials'){
                    echo '<span class="current">' . get_the_title() . '</span>';
                }elseif(get_post_type() == 'product'){
                    $terms = get_the_terms(get_the_ID(), 'product_cat', '' , '' );
                    if($terms) {
                        the_terms(get_the_ID(), 'product_cat', '' , ', ' );
                        echo ' ' . $delimiter . ' ' . '<span class="current">' . get_the_title() . '</span>';
                    }else{
                        echo '<span class="current">' . get_the_title() . '</span>';
                    }
                }else{
                    $post_type = get_post_type_object(get_post_type());
                    $slug = $post_type->rewrite;
                    echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
                    echo ' ' . $delimiter . ' ' . '<span class="current">' . get_the_title() . '</span>';
                }
            } else {
                $cat = get_the_category(); $cat = $cat[0];
                $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
                echo ''.$cats;
                echo '<span class="current">' . get_the_title() . '</span>';
            }
            } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
                $post_type = get_post_type_object(get_post_type());
				if($post_type) echo '<span class="current">' . $post_type->labels->singular_name . '</span>';
            } elseif ( is_attachment() ) {
                $parent = get_post($post->post_parent);
                echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
                echo ' ' . $delimiter . ' ' . '<span class="current">' . get_the_title() . '</span>';
            } elseif ( is_page() && !$post->post_parent ) {
                echo '<span class="current">' . get_the_title() . '</span>';
            } elseif ( is_page() && $post->post_parent ) {
                $parent_id  = $post->post_parent;
                $breadcrumbs = array();
                while ($parent_id) {
                    $page = get_page($parent_id);
                    $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                    $parent_id = $page->post_parent;
                }
                $breadcrumbs = array_reverse($breadcrumbs);
                for ($i = 0; $i < count($breadcrumbs); $i++) {
                    echo ''.$breadcrumbs[$i];
                    if ($i != count($breadcrumbs) - 1)
                        echo ' ' . $delimiter . ' ';
                }
                echo ' ' . $delimiter . ' ' . '<span class="current">' . get_the_title() . '</span>';
            } elseif ( is_tag() ) {
                echo '<span class="current">' . esc_html__('Posts tagged: ', 'hala') . single_tag_title('', false) . '</span>';
            } elseif ( is_author() ) {
                global $author;
                $userdata = get_userdata($author);
                echo '<span class="current">' . esc_html__('Articles posted by ', 'hala') . $userdata->display_name . '</span>';
            } elseif ( is_404() ) {
                echo '<span class="current">' . esc_html__('Error 404', 'hala') . '</span>';
            }
            if ( get_query_var('paged') ) {
                if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
                    echo ' '.$delimiter.' '.esc_html__('Page', 'hala') . ' ' . get_query_var('paged');
                if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
            }
            return ob_get_clean();
    }
}
/*-----------------------------------------------*
Title Bar
/*-----------------------------------------------*/
if ( ! function_exists( 'Hala_title_bar' ) ) {
	function Hala_title_bar() {
		global $hala_options;
		$show_page_title = (int) isset($hala_options['tb_show_page_title']) ? $hala_options['tb_show_page_title']: 1; 
        $show_page_breadcrumb = (int) isset($hala_options['tb_show_page_breadcrumb']) ? $hala_options['tb_show_page_breadcrumb']: 1; 
		$subtext = isset($hala_options['title_bar_subtext']) ? $hala_options['title_bar_subtext'] : '';
		$delimiter = isset($hala_options['page_breadcrumb_delimiter']) ? $hala_options['page_breadcrumb_delimiter'] : '/';
        $title_bar_bg_style =& $hala_options["tb_title_bar_bg_style"];
	    $tb_bg_title_style = get_post_meta(get_the_ID(), 'tb_bg_title_style', true)?get_post_meta(get_the_ID(), 'tb_bg_title_style', true):'global';
$title_bar_bg_style = $tb_bg_title_style=='global'?$title_bar_bg_style:$tb_bg_title_style;
 switch ($title_bar_bg_style) {
		case 'snow':
            wp_enqueue_script( 'canvas', Hala_URI_PATH. '/assets/js/let_it_snow.js', array( 'jquery' ), '', true );
		break;
		case 'particles':
            wp_enqueue_script( 'canvas', Hala_URI_PATH. '/assets/js/particles.min.js', array( 'jquery' ), '', true );
		break;
		case 'animator':
          	wp_enqueue_script( 'canvas', Hala_URI_PATH. '/assets/js/canvas-animator.js', array( 'jquery' ), '', true );
		break;
	}?>
    <div class="skew-section page-header">
     <?php
	 	if( $title_bar_bg_style == 'snow'){
		   echo '<canvas class="snow"></canvas>'; 
		}
		elseif( $title_bar_bg_style =='animator'){
		   echo '<canvas id="demo-canvas"></canvas>'; 
		}
	 ?>
        <div <?php if( $title_bar_bg_style == 'particles'){ echo 'id="particle-ground"'; }?> class="hero parallax wrapper mo-title-bar-wrap">
            <div class="overlay"></div>
            <div class="container parallax-container reskew">
                <div class="text-center cd-intro mo-title-bar">
                 <?php if($show_page_title){  ?>
                    <h2 class="mo-text-ellipsis"><?php echo Hala_page_title(); ?></h2>
                    <?php if($subtext) echo '<h4>'.esc_html($subtext).'</h4>'; 
					 } 
					  if($show_page_breadcrumb){  ?>
                    <div class="mo-path">
                        <div class="mo-path-inner">
                            <?php echo Hala_page_breadcrumb($delimiter); ?>
                        </div>
                    </div>
                <?php } ?>
               </div>
            </div><!-- .container.reskew -->
        </div> <!-- .hero -->
    </div>
    <?php 
	}
}
/*-----------------------------------------------*
  Custom excerpt 
/*-----------------------------------------------*/
function Hala_custom_excerpt($limit, $more) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt) >= $limit) {
        array_pop($excerpt);
        $excerpt = implode(" ", $excerpt) . $more;
    } else {
        $excerpt = implode(" ", $excerpt);
    }
    $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);
    return $excerpt;
}
/*-----------------------------------------------*
  Display navigation to next/previous set of posts
/*-----------------------------------------------*/
if ( ! function_exists( 'Hala_paging_nav' ) ) {
	function Hala_paging_nav() {
		if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
			return;
		}
		$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
		$pagenum_link = html_entity_decode( get_pagenum_link() );
		$query_args   = array();
		$url_parts    = explode( '?', $pagenum_link );
		if ( isset( $url_parts[1] ) ) {
			wp_parse_str( $url_parts[1], $query_args );
		}
		$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
		$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';
		$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
		$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';
		// Set up paginated links.
		$links = paginate_links( array(
				'base'     => $pagenum_link,
				'format'   => $format,
				'total'    => $GLOBALS['wp_query']->max_num_pages,
				'current'  => $paged,
				'mid_size' => 1,
				'add_args' => array_map( 'urlencode', $query_args ),
				'prev_text' => esc_html__( '&laquo; Prev', 'hala' ),
			    'next_text' => esc_html__( 'Next &raquo;', 'hala' )
		) );
		if ( $links ) {
		?>
		<nav class="mo-pagination" role="navigation">
			<?php echo ''.$links; ?>
		</nav>
		<?php
		}
	}
}
/*-----------------------------------------------*
   archive widget
/*-----------------------------------------------*/
/* This code filters the Categories archive widget to include the post count inside the link */
add_filter('wp_list_categories', 'Hala_cat_count_span');
function Hala_cat_count_span($links) {
	$links = str_replace('</a> (', ' <span>', $links);
	$links = str_replace('(', '', $links);
	$links = str_replace(')', '</span></a>', $links);
	return $links;
}
/* This code filters the Archive widget to include the post count inside the link */
add_filter('get_archives_link', 'Hala_archive_count_span');
function Hala_archive_count_span($links) {
	$links = str_replace('(', '<span class="count">', $links);
	$links = str_replace(')', '</span></a>', $links);
	return $links;
}
add_filter ( 'wp_tag_cloud', 'Hala_tag_cloud_count' );
function Hala_tag_cloud_count( $return ) {
	$tags = explode('</a>', $return);
	foreach( $tags as $tag ) {
		$tagn[] = '<span>'.$tag.'</a>';
	}
	$return = implode('</span>', $tagn);
	return $return;
}