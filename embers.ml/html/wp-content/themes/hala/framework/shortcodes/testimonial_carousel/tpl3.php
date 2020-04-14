<article <?php post_class(); ?>>
<div class="item">
    <?php echo '<p>'.get_post_meta(get_the_ID(),'testimonial_content',true).'</p>'; 
	 if (has_post_thumbnail()) the_post_thumbnail('thumbnail'); ?>
    <div class="testimonial-details">
      <h5><?php the_title(); ?></h5>
      <h6><?php echo '<span>'.get_post_meta(get_the_ID(),'role',true).'</span>'; ?></h6>
    </div>
    <!-- testimonial-details --> 
  </div>
</article>