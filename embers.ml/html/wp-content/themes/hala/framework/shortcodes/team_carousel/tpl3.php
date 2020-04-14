<article>
    <div class="team-member-temp3">
     <?php if (has_post_thumbnail()) the_post_thumbnail('hala-team'); ?>
    <div class="team-member-links">
	  <?php
        $facebook = get_post_meta(get_the_ID(),'member_facebook',true);
        $twitter = get_post_meta(get_the_ID(),'member_twitter',true);
        $linkedin = get_post_meta(get_the_ID(),'member_linkedin',true);
        $pinterest = get_post_meta(get_the_ID(),'member_pinterest',true);
        $google_plus = get_post_meta(get_the_ID(),'member_google_plus',true);
        $instagram = get_post_meta(get_the_ID(),'member_instagram',true);
        $flickr = get_post_meta(get_the_ID(),'member_flickr',true);
        
        $social =  array();
        if($facebook) $social[] = '<a href="'.esc_url($facebook).'"><span class="fa fa-facebook"></span></a>';
        if($twitter) $social[] = '<a href="'.esc_url($twitter).'"><span class="fa fa-twitter"></span></a>';
        if($linkedin) $social[] = '<a href="'.esc_url($linkedin).'"><span class="fa fa-linkedin"></span></a>';
        if($pinterest) $social[] = '<a href="'.esc_url($pinterest).'"><span class="fa fa-pinterest"></span></a>';
        if($google_plus) $social[] = '<a href="'.esc_url($google_plus).'"><span class="fa fa-google-plus"></span></a>';
        if($instagram) $social[] = '<a href="'.esc_url($instagram).'"><span class="fa fa-instagram"></span></a>';
        if($flickr) $social[] = '<a href="'.esc_url($flickr).'"><span class="fa fa-flickr"></span></a>';
        if(!empty($social)) echo '<div class="icon-link">'.implode(' ', $social).'</div>'
      ?>
    </div>
    <div class="team-member-details">
        <div class="team-member-details-inner">
            <h5><a href="#"><?php the_title(); ?></a></h5>
            <span><?php echo get_post_meta(get_the_ID(),'member_position',true); ?></span>
        </div>
    </div>
</div>
</article>
