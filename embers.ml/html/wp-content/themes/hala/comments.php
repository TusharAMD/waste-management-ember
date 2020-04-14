<?php
if ( post_password_required() ) {
	return;
} ?>
<div id="mo-comment" class="mo-comment-wrapper clearfix">
	<?php if ( have_comments() ) : ?>
		<h6 class="mo-heading-comment"><?php comments_number( esc_html__('Comment (0)', 'hala'), esc_html__('Comment (1)', 'hala'), esc_html__('Comment (%)', 'hala') ); ?></h6>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-above" class="comment-navigation col-xs-12 col-sm-12 col-md-12 col-lg-12" role="navigation">
			<h3 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'hala' ); ?></h3>
			<div class="nav-previous"><?php previous_comments_link( esc_html_e( 'Older Comments', 'hala' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( esc_html_e( 'Newer Comments', 'hala' ) ); ?></div>
		</nav><!-- #comment-nav-above -->
		<?php endif; 
			wp_list_comments( array(
				'style'      => 'div',
				'short_ping' => true,
				'avatar_size' => 90,
				'callback' => 'Hala_custom_comment',
			) );
		 if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav id="comment-nav-below" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'hala' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( esc_html_e( 'Older Comments', 'hala' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( esc_html_e( 'Newer Comments', 'hala' ) ); ?></div>
		</nav><!-- #comment-nav-below -->
		<?php endif; // check for comment navigation ?>
	<?php endif; 
	if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'hala' ); ?></p>
	<?php endif; ?>
	<?php
		$commenter = wp_get_current_commenter();
		$fields =  array(
			'author' => '<div class="row"><div class="col-md-4 comment-form-author"><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" placeholder="'. esc_html__('Name','hala').'" aria-required="true" /></div>',
			'email' => '<div class="col-md-4 comment-form-email"><input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" placeholder="'. esc_html__('Email','hala').'" aria-required="true" /></div>',
			'url' => '<div class="col-md-4 comment-form-url"><input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" placeholder="'. esc_html__('Website','hala').'" /></div></div>',
		);
		
		$args = array(
			'id_form'           => 'commentform',
			'id_submit'         => 'submit',
			'class_submit'      => 'submit',
			'name_submit'       => 'submit',
			'title_reply'		=> '<span class="mo-label-reply">' . esc_html__('Leave A Comment', 'hala') .'</span>',
			'title_reply_to'    => '<span class="mo-label-reply">' . esc_html__('Leave A Reply to %s', 'hala') .'</span>',
			'cancel_reply_link' => esc_html__( 'Cancel Reply', 'hala' ),
			'label_submit'      => esc_html__( 'Submit Comment', 'hala' ),
			'format'            => 'xhtml',
			'comment_field'     => '<div class="comment-form-comment"><textarea id="comment" name="comment" cols="60" rows="6" aria-required="true" placeholder="'.esc_html__('Comment','hala').'">' . '</textarea></div>',
			'must_log_in'       => '<div class="must-log-in">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'hala'), wp_login_url( apply_filters( 'the_permalink', get_permalink() ) ) ) . '</div>',
			'logged_in_as'      => '<div class="logged-in-as">' . sprintf( __('Logged in as <a class="mo-name" href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'hala'), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink() ) ) ) . '</div>',
			'comment_notes_before' => '',
			'comment_notes_after'  => '',
			'fields' => apply_filters( 'comment_form_default_fields', $fields ),
		  );
		comment_form($args); ?>
</div><!-- #comments -->