<?php
// Adiciona metabox para o campo Título Alternativo nas páginas
// Adiciona metaboxes para as seções personalizadas
function add_sections_metaboxes() {
    // Section 1
    add_meta_box('title_section_1', 'Título da Seção 1', 'title_section_1_callback', 'page', 'normal', 'default');
    add_meta_box('content_section_1', 'Conteúdo da Seção 1', 'content_section_1_callback', 'page', 'normal', 'default');
    add_meta_box('cta_url_section_1', 'URL do CTA da Seção 1', 'cta_url_section_1_callback', 'page', 'normal', 'default');
    add_meta_box('cta_label_section_1', 'Texto do CTA da Seção 1', 'cta_label_section_1_callback', 'page', 'normal', 'default');
    
    // Section 2
    add_meta_box('title_section_2', 'Título da Seção 2', 'title_section_2_callback', 'page', 'normal', 'default');
    add_meta_box('content_section_2', 'Conteúdo da Seção 2', 'content_section_2_callback', 'page', 'normal', 'default');
    add_meta_box('cta_url_section_2', 'URL do CTA da Seção 2', 'cta_url_section_2_callback', 'page', 'normal', 'default');
    add_meta_box('cta_label_section_2', 'Texto do CTA da Seção 2', 'cta_label_section_2_callback', 'page', 'normal', 'default');
    
    // Section 3
    add_meta_box('title_section_3', 'Título da Seção 3', 'title_section_3_callback', 'page', 'normal', 'default');
    add_meta_box('content_section_3', 'Conteúdo da Seção 3', 'content_section_3_callback', 'page', 'normal', 'default');
    add_meta_box('cta_url_section_3', 'URL do CTA da Seção 3', 'cta_url_section_3_callback', 'page', 'normal', 'default');
    add_meta_box('cta_label_section_3', 'Texto do CTA da Seção 3', 'cta_label_section_3_callback', 'page', 'normal', 'default');
}
add_action('add_meta_boxes', 'add_sections_metaboxes');




// Função de callback para o campo Título Alternativo
// Callback para o título da Seção 1
function title_section_1_callback($post) {
    $value = get_post_meta($post->ID, 'title_section_1', true);
    echo '<label for="title_section_1_field">Título da Seção 1:</label><br>';
    echo '<input type="text" id="title_section_1_field" name="title_section_1_field" value="' . esc_attr($value) . '" size="50">';
}

// Callback para o conteúdo da Seção 1
function content_section_1_callback($post) {
    $value = get_post_meta($post->ID, 'content_section_1', true);
    echo '<label for="content_section_1_field">Conteúdo da Seção 1:</label><br>';
    echo '<textarea id="content_section_1_field" name="content_section_1_field" rows="5" cols="50">' . esc_textarea($value) . '</textarea>';
}

// Callback para a URL do CTA da Seção 1
function cta_url_section_1_callback($post) {
    $value = get_post_meta($post->ID, 'cta_url_section_1', true);
    echo '<label for="cta_url_section_1_field">URL do CTA da Seção 1:</label><br>';
    echo '<input type="text" id="cta_url_section_1_field" name="cta_url_section_1_field" value="' . esc_attr($value) . '" size="50">';
}

// Callback para o texto do CTA da Seção 1
function cta_label_section_1_callback($post) {
    $value = get_post_meta($post->ID, 'cta_label_section_1', true);
    echo '<label for="cta_label_section_1_field">Texto do CTA da Seção 1:</label><br>';
    echo '<input type="text" id="cta_label_section_1_field" name="cta_label_section_1_field" value="' . esc_attr($value) . '" size="50">';
}

// Repete a mesma lógica para Section 2 e Section 3
function title_section_2_callback($post) {
    $value = get_post_meta($post->ID, 'title_section_2', true);
    echo '<label for="title_section_2_field">Título da Seção 2:</label><br>';
    echo '<input type="text" id="title_section_2_field" name="title_section_2_field" value="' . esc_attr($value) . '" size="50">';
}
function content_section_2_callback($post) {
    $value = get_post_meta($post->ID, 'content_section_2', true);
    echo '<label for="content_section_2_field">Conteúdo da Seção 2:</label><br>';
    echo '<textarea id="content_section_2_field" name="content_section_2_field" rows="5" cols="50">' . esc_textarea($value) . '</textarea>';
}
function cta_url_section_2_callback($post) {
    $value = get_post_meta($post->ID, 'cta_url_section_2', true);
    echo '<label for="cta_url_section_2_field">URL do CTA da Seção 2:</label><br>';
    echo '<input type="text" id="cta_url_section_2_field" name="cta_url_section_2_field" value="' . esc_attr($value) . '" size="50">';
}
function cta_label_section_2_callback($post) {
    $value = get_post_meta($post->ID, 'cta_label_section_2', true);
    echo '<label for="cta_label_section_2_field">Texto do CTA da Seção 2:</label><br>';
    echo '<input type="text" id="cta_label_section_2_field" name="cta_label_section_2_field" value="' . esc_attr($value) . '" size="50">';
}

function title_section_3_callback($post) {
    $value = get_post_meta($post->ID, 'title_section_3', true);
    echo '<label for="title_section_3_field">Título da Seção 3:</label><br>';
    echo '<input type="text" id="title_section_3_field" name="title_section_3_field" value="' . esc_attr($value) . '" size="50">';
}
function content_section_3_callback($post) {
    $value = get_post_meta($post->ID, 'content_section_3', true);
    echo '<label for="content_section_3_field">Conteúdo da Seção 3:</label><br>';
    echo '<textarea id="content_section_3_field" name="content_section_3_field" rows="5" cols="50">' . esc_textarea($value) . '</textarea>';
}
function cta_url_section_3_callback($post) {
    $value = get_post_meta($post->ID, 'cta_url_section_3', true);
    echo '<label for="cta_url_section_3_field">URL do CTA da Seção 3:</label><br>';
    echo '<input type="text" id="cta_url_section_3_field" name="cta_url_section_3_field" value="' . esc_attr($value) . '" size="50">';
}
function cta_label_section_3_callback($post) {
    $value = get_post_meta($post->ID, 'cta_label_section_3', true);
    echo '<label for="cta_label_section_3_field">Texto do CTA da Seção 3:</label><br>';
    echo '<input type="text" id="cta_label_section_3_field" name="cta_label_section_3_field" value="' . esc_attr($value) . '" size="50">';
}

function save_section_meta($post_id) {
    // Verifica se o post está sendo salvo automaticamente
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    // Verifica se o usuário tem permissão para editar o post
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    // Seção 1
    if (isset($_POST['title_section_1_field'])) {
        update_post_meta($post_id, 'title_section_1', sanitize_text_field($_POST['title_section_1_field']));
    }
    if (isset($_POST['content_section_1_field'])) {
        update_post_meta($post_id, 'content_section_1', sanitize_textarea_field($_POST['content_section_1_field']));
    }
    if (isset($_POST['cta_url_section_1_field'])) {
        update_post_meta($post_id, 'cta_url_section_1', sanitize_text_field($_POST['cta_url_section_1_field']));
    }
    if (isset($_POST['cta_label_section_1_field'])) {
        update_post_meta($post_id, 'cta_label_section_1', sanitize_text_field($_POST['cta_label_section_1_field']));
    }

    // Repete para Seção 2 e Seção 3
    if (isset($_POST['title_section_2_field'])) {
        update_post_meta($post_id, 'title_section_2', sanitize_text_field($_POST['title_section_2_field']));
    }
    if (isset($_POST['content_section_2_field'])) {
        update_post_meta($post_id, 'content_section_2', sanitize_textarea_field($_POST['content_section_2_field']));
    }
    if (isset($_POST['cta_url_section_2_field'])) {
        update_post_meta($post_id, 'cta_url_section_2', sanitize_text_field($_POST['cta_url_section_2_field']));
    }
    if (isset($_POST['cta_label_section_2_field'])) {
        update_post_meta($post_id, 'cta_label_section_2', sanitize_text_field($_POST['cta_label_section_2_field']));
    }

    if (isset($_POST['title_section_3_field'])) {
        update_post_meta($post_id, 'title_section_3', sanitize_text_field($_POST['title_section_3_field']));
    }
    if (isset($_POST['content_section_3_field'])) {
        update_post_meta($post_id, 'content_section_3', sanitize_textarea_field($_POST['content_section_3_field']));
    }
    if (isset($_POST['cta_url_section_3_field'])) {
        update_post_meta($post_id, 'cta_url_section_3', sanitize_text_field($_POST['cta_url_section_3_field']));
    }
    if (isset($_POST['cta_label_section_3_field'])) {
        update_post_meta($post_id, 'cta_label_section_3', sanitize_text_field($_POST['cta_label_section_3_field']));
    }
}
add_action('save_post_page', 'save_section_meta');


?>