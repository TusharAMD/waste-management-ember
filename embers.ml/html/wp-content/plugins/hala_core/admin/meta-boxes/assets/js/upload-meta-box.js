! ( function( $ ) {
	'use strict';
	/*
	 * mo_MetaField_OpenMedia
	 */
	function mo_MetaField_OpenMedia(title, button_text, opts, callback) {
		var custom_uploader = wp.media({
	        title: title,
	        button: {
	            text: button_text
	        },
	        multiple: opts.multiple
	    })
	    .on('select', function() {
	        var attachment = custom_uploader.state().get('selection').toJSON();
	        callback.call(this, attachment);
	    })
	    .open();
	}
	/*
	 * mo_MetaField_MediaHandle
	 */
	function mo_MetaField_MediaHandle() {
		var $tb_upload_button = $( '.tb_upload_button' );
		$tb_upload_button.each( function() {
			$( this ).on( 'click', function() {
				var $this = $( this ),
					$input = $this.parent().find( 'input.upload_field' ),
					opts = { multiple: true },
					images_obj = [];
				
				mo_MetaField_OpenMedia('Select', 'Select', opts, function( result ) {
					$.each(result, function(index, item) {
						images_obj.push( item.url );
					})
					
					$input.val( images_obj.join( ',' ) );
				})
			} )
		} )
	}
	$( function() {
		mo_MetaField_MediaHandle();
	} )
jQuery(document).ready(function () {
    jQuery('#image-holder').sortable({
        placeholder: "highlight-place",
        containment: "#image-holder",
        tolerance: "pointer"
    });
     jQuery('#image-holder img.thumbnail , #mo_portfolio_gallery').click(function (e) {
        var gallery_attach_images;
        e.preventDefault();
        if (gallery_attach_images) {
            gallery_attach_images.open();
            return false;
        }
        gallery_attach_images = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image(s)',
            button: {
                text: 'Insert Image(s)'
            },
            multiple: true
        });
        gallery_attach_images.on( 'select', function(e) {
        var selection = gallery_attach_images.state().get('selection');
            selection.map( function( attachment ) {
            attachment = attachment.toJSON();
            var thumbType = attachment.url.match(/\.(jpg|jpeg|png|gif)$/i);
            if(thumbType){
            var thumbNail = attachment.url.replace(thumbType[0],'-150x150'+thumbType[0]);
            jQuery('#image-holder').append('<li><input type="hidden" name="mo_image_fields[]" value="'+attachment.id+'" /><img style="padding:3px;background-color:#fff; margin:5px; box-shadow:1px 1px 3px #d8d8d8;" width="150" height="150" class="thumbnail" src="'+thumbNail+'" /><br/><a href="#" style="text-decoration:none; color:red; float:right" class="remove-image">remove</a></li>');
            }
            });
        });
       gallery_attach_images.open();
     });
	 jQuery('#image-holder a').live('click',function(e){
        event.preventDefault();
        jQuery(this).parent().remove();
        return false;
    });
});
} )( jQuery )