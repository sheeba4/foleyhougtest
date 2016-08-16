/* global jQuery, wp */

(function($) {
    $(document).ready(function() {
        var frame;
        $('#profile_image-button').click(function (e) {
            e.preventDefault();

            if (frame) {
                frame.open();
                return;
            }
            frame = wp.media.frames.meta_image_frame = wp.media({
                title: 'Upload File',
                button: {text: 'Use for Profile Image'}
            });

            frame.on('select', function () {
                var media_attachment = frame.state().get('selection').first().toJSON();
                //title  = media_attachment.title;
                $('#profile_image').val(media_attachment.sizes.thumbnail.url);
                // console.log(media_attachment);
            });

            frame.open();
        });
    });

}(jQuery));