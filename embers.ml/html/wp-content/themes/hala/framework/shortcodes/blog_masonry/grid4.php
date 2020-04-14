<article class="news">
 <div  <?php post_class(); ?>>
    <div class="item-news">
      <div class="overlay-top"></div>
      <div class="img-news">
        <?php if (has_post_thumbnail()) {
		echo '<figure>
			   <a href="'.get_the_permalink().'">'.get_the_post_thumbnail(get_the_ID(), "hala-medium").'</a>
			  </figure>';
		}
		?>
      </div>
      <!-- /.img-news -->
      <div class="info-news">
        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <div class="divider"></div>
        <span><?php echo get_the_date('d M, Y'); ?></span>
        <a href="<?php the_permalink(); ?>" class="link"><?php echo esc_html($readmore_text); ?></a>
      <!-- /.info-news -->
    </div>
    <!-- item-news -->
  </div>
  </div>
</article>
