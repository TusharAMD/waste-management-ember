<div <?php post_class(); ?>>
    <div class="work-img">
      <figure class="portfolio-effect">
        <?php if ( has_post_thumbnail() ) the_post_thumbnail('hala-small'); ?>
        <figcaption>
          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          <a class="portfolio-link <?php echo esc_attr($th_is_lightbox); ?>" href="<?php echo esc_url($full); ?>"><i class="fa fa-search"></i></a>
          </figcaption>
      </figure>
    </div>
</div>