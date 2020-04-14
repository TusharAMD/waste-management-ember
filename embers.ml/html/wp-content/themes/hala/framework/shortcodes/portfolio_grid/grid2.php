<?php
 $html.='
		<div class="masonry-item '.esc_attr($column).' '.esc_attr($term_string).' wow fadeInUp " data-wow-delay=".1s">
        <div class="masonry-img work-img-style2" style="'.esc_attr($portfolio_grid).'">
		    <img src="'.esc_url($thumb).'" alt="'.esc_attr($title).'">
			<div class="overlay"></div>
			<div class="content-block">
				<a class="portfolio-link '.esc_attr($th_is_lightbox).'" data-title="'.esc_attr($title).'" href="'.esc_url($full).'"></a>
				<h4>'.esc_html($title).'</h4>
				<a href="'.esc_url($permalink).'" class="read-more"><i class="fa fa-long-arrow-right"></i></a>
			</div>
        </div>
    </div> ';