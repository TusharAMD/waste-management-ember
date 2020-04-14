<div class="<?php echo esc_attr($class_columns); ?>">
    <figure class="team-member-temp2">
        <div class="team-member-img">
        <?php if (has_post_thumbnail()) the_post_thumbnail('hala-team'); ?>
        </div>
        <figcaption class="team-member-details">
          <div class="team-member-info">
            <div class="team-member-social">
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
            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
            <p class="team-member-position"> <?php echo get_post_meta(get_the_ID(),'member_position',true); ?> </p>
            <div class="divider white"></div>
          </div>
        </figcaption>
    </figure>
</div>