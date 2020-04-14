function changeCategory(obj){
    var $this = jQuery(obj),
        $input = $this.parents(".mo_taxonomy").find(".widefat"),
        arr = $input.val().split(",");
    if ($this.is(":checked")) {
        arr.push($this.val());
        var emptyKey = arr.indexOf("");
        if (emptyKey > -1) {
            arr.splice(emptyKey, 1);
        }
    } else {
        var foundKey = arr.indexOf($this.val());
        if (foundKey > -1) {
            arr.splice(foundKey, 1);
        }
    }
    $input.val(arr.join(","));
}
"use strict";
jQuery(document).ready( function(){
 function media_upload( button_class, me_signature) {
    var _custom_media = true,
    _orig_send_attachment = wp.media.editor.send.attachment;
    jQuery('body').on('click',button_class, function(e) {
        var button_id ='#'+jQuery(this).attr('id');
        /* console.log(button_id); */
        var self = jQuery(button_id);
        var send_attachment_bkp = wp.media.editor.send.attachment;
        var button = jQuery(button_id);
        var id = button.attr('id').replace('_button', '');
        _custom_media = true;
        wp.media.editor.send.attachment = function(props, attachment){
            if ( _custom_media  ) {
               jQuery('.custom_media_id').val(attachment.id); 
               jQuery(me_signature).val(attachment.url);
               jQuery('.custom_media_image').attr('src',attachment.url).css('display','block');   
            } else {
                return _orig_send_attachment.apply( button_id, [props, attachment] );
            }
        }
        wp.media.editor.open(button);
        return false;
    });
}
media_upload( '.custom_media_upload','.custom_media_url');
media_upload( '.custom_media_upload_sign','.custom_media_url_sign');
media_upload( '.custom_media_upload_ads','.custom_media_url_ads');
media_upload( '.custom_media_upload_post','.custom_media_url_post');
});