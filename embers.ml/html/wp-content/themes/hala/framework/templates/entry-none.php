<div class="no-results">
	<div class="text-center">
       
        <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<h1 class="lrg"><?php printf( esc_html__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'hala' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></h1>
            
			<?php elseif ( is_search() ) : ?>
			
			<h3><?php echo esc_html__( 'Nothing Found', 'hala' ); ?></h3>
			<p><?php echo esc_html__( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'hala' ); ?></p>
			<?php get_search_form(); 
			 else : ?>

			<h3><?php echo esc_html__( 'Nothing Found', 'hala' ); ?></h3>
			<p><?php echo esc_html__( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'hala' ); ?></p>
			<?php get_search_form(); 
			 endif; ?>
    </div>
</div>
