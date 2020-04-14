<div <?php post_class(); ?>>
    <div class="work-img-style2">
        <?php if ( has_post_thumbnail() ) the_post_thumbnail('hala-small'); ?>
        <div class="overlay"></div>
        <div class="content-block">
            <a class="portfolio-link <?php echo esc_attr($th_is_lightbox); ?>" data-title="<?php echo esc_attr($title);?>" href="<?php echo esc_url($full); ?>"></a>
            <h4><?php echo esc_html($title); ?></h4>
            <a href="<?php echo esc_html($permalink); ?>" class="read-more"><i class="fa fa-long-arrow-right"></i></a>
        </div>
     </div>   
</div>
