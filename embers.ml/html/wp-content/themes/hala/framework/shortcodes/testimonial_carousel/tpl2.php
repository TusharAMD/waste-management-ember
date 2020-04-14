<article <?php post_class(); ?>>
<div class="item">
    <?php if (has_post_thumbnail()) the_post_thumbnail('thumbnail'); ?>
    <div class="testimonial-details">
      <h3><?php the_title(); ?> , <?php echo '<span>'.get_post_meta(get_the_ID(),'role',true).'</span>'; ?></h3>
      <div class="divider white"></div>
      <?php echo '<p class="textdetails">'.get_post_meta(get_the_ID(),'testimonial_content',true).'</p>'; ?>
    </div>
  </div>
</article>
