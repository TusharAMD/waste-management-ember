<article <?php post_class(); ?>>
	<div class="mo-thumb">
		<?php if ( has_post_thumbnail() ) the_post_thumbnail('full'); ?>
		<div class="mo-overlay">
			<div class="mo-inner">
				<ul class="mo-action">
                  <?php $full = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) ); ?>
                  <li><a class="lightbox-gallery" href="<?php echo esc_url($full); ?>"><i class="fa fa-search"></i></a></li>
				  <li><a class="readmore" href="<?php the_permalink(); ?>"><i class="fa fa-link"></i></a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="mo-content">
		<h3 class="mo-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<div class="mo-categories"><?php the_terms(get_the_ID(), 'product_cat', '', ', ' ); ?></div>
	</div>
</article>