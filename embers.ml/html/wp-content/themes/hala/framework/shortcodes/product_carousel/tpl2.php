<article <?php post_class(); ?>>
	<div class="mo-thumb">
		<?php if ( has_post_thumbnail() ) the_post_thumbnail('full'); ?>
	</div>
	<div class="mo-overlay">
		<div class="mo-content">
			<h3 class="mo-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<a class="mo-buy-product" href="<?php the_permalink(); ?>"><i class="fa fa-link"></i></a>
		</div>
	</div>
</article>