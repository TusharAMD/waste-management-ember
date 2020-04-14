<?php
 $html.= '
		<div class="masonry-item '.esc_attr($column).' '.esc_attr($term_string).' wow fadeInUp " data-wow-delay=".1s">
        <div class="masonry-img work-img" style="'.esc_attr($portfolio_grid).'">
          <figure class="portfolio-effect">
		    <img src="'.esc_url($thumb).'" alt="'.esc_attr($title).'">
            <figcaption>
			  <h3><a href="'.esc_url($permalink).'">'.esc_html($title).'</a></h3>
       <a class="portfolio-link '.esc_attr($th_is_lightbox).'" data-title="'.esc_attr($title).'" href="'.esc_url($full).'"><i class="fa fa-search"></i></a>
			  </figcaption>
          </figure>
        </div>
      </div> ';	