document.addEventListener('DOMContentLoaded', function() {
    var mediaUploader;

    function openMediaUploader(inputId) {
        var file_frame;
        if (mediaUploader) {
            mediaUploader.open();
            return;
        }
        file_frame = wp.media({
            title: 'Escolha uma Imagem',
            button: {
                text: 'Escolher Imagem'
            },
            multiple: false
        });

        file_frame.on('select', function() {
            var attachment = file_frame.state().get('selection').first().toJSON();
            document.getElementById(inputId).value = attachment.url;
        });

        file_frame.open();
    }

    document.getElementById('section1_image_button').addEventListener('click', function(e) {
        e.preventDefault();
        openMediaUploader('section1_image');
    });

    document.getElementById('section2_image_button').addEventListener('click', function(e) {
        e.preventDefault();
        openMediaUploader('section2_image');
    });
});
