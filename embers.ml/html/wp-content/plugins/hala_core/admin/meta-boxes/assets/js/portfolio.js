(function ($, window, document, undefined) {
    'use strict';
    jQuery(document).ready(function ($) {
		// Portfolio Select
		jQuery( "select#nnn" ).change(function() {
			var str = "";
			str +=jQuery( "#nnn" ).val();
			if( str == "default"){
				jQuery(".ext-link , .video-link ").fadeOut(300);
			}
		 
			 if( str == "direct"){
				  jQuery(".video-link").fadeIn(500).css("display","block");
				  jQuery(".ext-link ").css("display","none");
			}
			
			if( str == "external"){
				jQuery(".ext-link").fadeIn(500).css("display","block");
				jQuery(".video-link ").css("display","none");
			}
            if( str == "single_page"){
                jQuery(".ext-link").fadeOut(300);
				jQuery(".video-link ").css("display","none");
            }
			
		}).trigger( "change" );
	});
   
}());