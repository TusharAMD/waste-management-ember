<?php
class hala_New_Tabs_Widget extends WP_Widget {
    function __construct() {
        parent::__construct(
                'mo_news_tabs_widget', // Base ID
                esc_html__( 'Hala - Tabs Widget' , 'hala'), // Name
                array('description' => esc_html__('News Tabs Widget', 'hala'),) // Args
        );
    }
    function widget($args, $instance) {
        extract($args);
        $posts = $instance['posts'];
        $extra_class = !empty($instance['extra_class']) ? $instance['extra_class'] : "";
        // no 'class' attribute - add one with the value of width
        if( strpos($before_widget, 'class') === false ) {
            $before_widget = str_replace('>', 'class="'. $extra_class . '"', $before_widget);
        }
        // there is 'class' attribute - append width value to it
        else {
            $before_widget = str_replace('class="', 'class="'. $extra_class . ' ', $before_widget);
        }
        echo ''.$before_widget;
        ?>
        <div class="tab-holder">
            <div class="tab-hold tabs-wrapper">
                <ul id="tabs" class="nav nav-tabs">
					<li class="active mo-tab" ><a href="#tab1" data-toggle="tab" ><?php echo esc_html__('Recent Post', 'hala'); ?></a></li>
					<li class="mo-tab"><a href="#tab2" data-toggle="tab" ><?php echo esc_html__('Popular Post', 'hala'); ?></a></li>
                </ul>
                <div class="tab-content">
					<div id="tab1" class="tab-pane active">
						<?php
							$recent_posts = new WP_Query('showposts=' . $posts);
							if ($recent_posts->have_posts()):
						?>
							<ul class="mo-news-list mo-recent">
								<?php while ($recent_posts->have_posts()): $recent_posts->the_post(); ?>
									<li>
										<div class="mo-thumb">
											<a class="post-featured-img" href="<?php the_permalink(); ?>">
											   <?php if(has_post_thumbnail()) the_post_thumbnail('thumbnail'); ?>
											</a>
										</div>
										<div class="mo-details">
											<div class="mo-inner">
												<h3 class="mo-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
												<ul class="mo-meta">
													<li class="mo-author"><?php echo esc_html__('By ', 'hala').get_the_author(); ?></li>
													<li class="mo-public"><?php echo get_the_date('d M, Y'); ?></li>
												</ul>
											</div>
										</div>
									</li>
								<?php endwhile; ?>
							</ul>
						<?php endif; ?>
					</div>
					<div id="tab2" class="tab-pane">
						<?php
							$popular_posts = new WP_Query('showposts=' . $posts . '&orderby=comment_count&order=DESC');
							if ($popular_posts->have_posts()):
						?>
							<ul class="mo-news-list mo-popular">
								<?php while ($popular_posts->have_posts()): $popular_posts->the_post(); ?>
									<li>
										<div class="mo-thumb">
											<a class="post-featured-img" href="<?php the_permalink(); ?>">
											   <?php if(has_post_thumbnail()) the_post_thumbnail('thumbnail'); ?>
											</a>
										</div>
										<div class="mo-details">
											<div class="mo-inner">
												<h3 class="mo-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
												<ul class="mo-meta">
													<li class="mo-author"><?php echo esc_html__('By ', 'hala').get_the_author(); ?></li>
													<li class="mo-public"><?php echo get_the_date('d M, Y'); ?></li>
												</ul>
											</div>
										</div>
									</li>
								<?php endwhile; ?>
							</ul>
						<?php endif; ?>
					</div>
                </div>
            </div>
        </div>
        <?php
        echo ''.$after_widget;
    }
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['posts'] = $new_instance['posts'];
        $instance['extra_class'] = $new_instance['extra_class'];
        return $instance;
    }
    function form($instance) {
        $defaults = array('posts' => 3);
        $instance = wp_parse_args((array) $instance, $defaults);
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('posts')); ?>">Number of popular posts:</label>
            <input class="widefat" style="width: 30px;" id="<?php echo esc_attr($this->get_field_id('posts')); ?>" name="<?php echo esc_attr($this->get_field_name('posts')); ?>" value="<?php echo esc_attr($instance['posts']); ?>" />
        </p>
        <?php
    }
}
function register_new_tabs_widget() {
    register_widget('hala_New_Tabs_Widget');
}
add_action('widgets_init', 'register_new_tabs_widget');