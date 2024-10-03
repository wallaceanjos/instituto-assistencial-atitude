<?php
function custom_image_metabox() {
    add_meta_box(
        'custom_images',            // ID da metabox
        __('Imagens das Seções'),    // Título da metabox
        'custom_image_metabox_html', // Callback que renderiza a metabox
        'page',                      // Tipo de post (pode ser 'post' ou um post type personalizado)
        'normal',                    // Contexto
        'high'                       // Prioridade
    );
}
add_action('add_meta_boxes', 'custom_image_metabox');

function custom_image_metabox_html($post) {
    // Pega as imagens salvas como meta
    $section1_image = get_post_meta($post->ID, '_section1_image', true);
    $section2_image = get_post_meta($post->ID, '_section2_image', true);

    wp_nonce_field('custom_image_metabox_nonce', 'custom_image_nonce');

    echo '<div>';
    echo '<p>Imagem para a Seção 1:</p>';
    echo '<input type="text" id="section1_image" name="section1_image" value="' . esc_attr($section1_image) . '" readonly />';
    echo '<button id="section1_image_button">Escolher Imagem para Seção 1</button>';
    echo '<img id="section1_image_preview" src="' . esc_url($section1_image) . '" alt="Pré-visualização da Imagem Seção 1" style="display:block; width: 100px; height: auto;" />';
    echo '</div>';

    echo '<div>';
    echo '<p>Imagem para a Seção 2:</p>';
    echo '<input type="text" id="section2_image" name="section2_image" value="' . esc_attr($section2_image) . '" readonly />';
    echo '<button id="section2_image_button">Escolher Imagem para Seção 2</button>';
    echo '<img id="section2_image_preview" src="' . esc_url($section2_image) . '" alt="Pré-visualização da Imagem Seção 2" style="display:block; width: 100px; height: auto;" />';
    echo '</div>';
}


function save_custom_image_metabox($post_id) {
    if (!isset($_POST['custom_image_nonce']) || !wp_verify_nonce($_POST['custom_image_nonce'], 'custom_image_metabox_nonce')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (isset($_POST['section1_image'])) {
        update_post_meta($post_id, '_section1_image', esc_url_raw($_POST['section1_image']));
    }

    if (isset($_POST['section2_image'])) {
        update_post_meta($post_id, '_section2_image', esc_url_raw($_POST['section2_image']));
    }
}
add_action('save_post', 'save_custom_image_metabox');


function custom_image_metabox_scripts() {
    global $post_type;
    if( 'page' == $post_type ) {  // ou use o post type que quiser
        wp_enqueue_media();
        wp_enqueue_script('custom-image-metabox', get_template_directory_uri() . '/inc/js/media-upload-functionality.js', array('jquery'), null, true);
    }
}
add_action('admin_enqueue_scripts', 'custom_image_metabox_scripts');

?>