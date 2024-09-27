<?php
// Cria um custom post do tipo slider
function create_post_slider_type() {
    register_post_type( 'slider',
        array(
            'labels' => array(
                'name' => __( 'Slides' ),
                'singular_name' => __( 'Slide' ),
                'add_new' => __( 'Adicionar novo slide' ),
                'add_new_item' => __( 'Adicionar novo slide' ),
                'edit_item' => __( 'Editar slide' ),
                'new_item' => __( 'Novo slide' ),
                'view_item' => __( 'Ver slide' ),
                'search_items' => __( 'Pesquisar slides' ),
                'not_found' => __( 'Nenhum slide encontrado' ),
                'not_found_in_trash' => __( 'Nenhum slide encontrado na lixeira' ),
                'all_items' => __( 'Todos os slides' ),
                'menu_name' => __( 'Destaques' ),
                'name_admin_bar' => __( 'slide' ),
                
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'thumbnail'),
            'taxonomies' => array('category', 'post_tag'),
            'rewrite' => array('slug' => 'slides'),
        )
    );
}
add_action( 'init', 'create_post_slider_type' );

// Adiciona metaboxes para campos personalizados
function add_slider_metaboxes() {
    add_meta_box('slider_subtitle', 'Subtítulo do slider', 'slider_subtitle_callback', 'slider', 'normal', 'default');
    add_meta_box('slider_cta_url', 'Link de apontamento do botão CTA', 'slider_cta_url_callback', 'slider', 'normal', 'default');
    add_meta_box('slider_cta_text', 'Label do botão CTA', 'slider_cta_text_callback', 'slider', 'normal', 'default');
    add_meta_box('slider_embed_code', 'Id do video do YouTube', 'slider_embed_code_callback', 'slider', 'normal', 'default');
}
add_action( 'add_meta_boxes', 'add_slider_metaboxes' );

// Define a função de callback para o campo de CTA URL
function slider_subtitle_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'slider_subtitle_nonce');
    $value = get_post_meta( $post->ID, 'slider_subtitle', true );
    echo '<label for="slider_subtitle_field">Insira o subtítulo:</label><br>';
    echo '<input type="text" id="slider_subtitle_field" name="slider_subtitle_field" value="' . esc_attr( $value ) . '" size="50"><br>';
}

// Define a função de callback para o campo de CTA URL
function slider_cta_url_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'slider_cta_url_nonce');
    $value = get_post_meta( $post->ID, 'slider_cta_url', true );
    echo '<label for="slider_cta_url_field">Insira a URL do CTA:</label><br>';
    echo '<input type="text" id="slider_cta_url_field" name="slider_cta_url_field" value="' . esc_attr( $value ) . '" size="50"><br>';
}

// Define a função de callback para o campo de CTA TEXT
function slider_cta_text_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'slider_cta_text_nonce');
    $value = get_post_meta( $post->ID, 'slider_cta_text', true );
    echo '<label for="slider_cta_text_field">Insira o texto do CTA:</label><br>';
    echo '<input type="text" id="slider_cta_text_field" name="slider_cta_text_field" value="' . esc_attr( $value ) . '" size="50"><br>';
}

// Define a função de callback para o campo de embed code
function slider_embed_code_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'slider_embed_code_nonce' );
    $value = get_post_meta( $post->ID, 'slider_embed_code', true );
    echo '<label for="slider_embed_code_field">Insira apenas a Id do vídeo</label><br>';
    echo '<input type="text" id="slider_embed_code_field" name="slider_embed_code_field" value="' . esc_attr( $value ) . '" size="50"><br>';
}

function save_slider_meta( $post_id ) {
    // Verifica se o nonce está correto
    if ( ! isset( $_POST['slider_cta_url_nonce'] ) || ! wp_verify_nonce( $_POST['slider_cta_url_nonce'], basename( __FILE__ ) ) ) {
        return;
    }
  
    // Verifica se o post está sendo salvo automaticamente
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
  
    // Verifica se o usuário tem permissão para editar o post
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }
    
    // Salva o valor do campo de Subtítulo, se existir
    if ( isset( $_POST['slider_subtitle_field'] ) ) {
        update_post_meta( $post_id, 'slider_subtitle', sanitize_text_field( $_POST['slider_subtitle_field'] ) );
    }
  
    // Salva o valor do campo de CTA URL, se existir
    if ( isset( $_POST['slider_cta_url_field'] ) ) {
        update_post_meta( $post_id, 'slider_cta_url', sanitize_text_field( $_POST['slider_cta_url_field'] ) );
    }
    
    // Salva o valor do campo de CTA TEXT, se existir
    if ( isset( $_POST['slider_cta_text_field'] ) ) {
        update_post_meta( $post_id, 'slider_cta_text', sanitize_text_field( $_POST['slider_cta_text_field'] ) );
    }
  
    // Salva o valor do campo de código de embed, se existir
    if ( isset( $_POST['slider_embed_code_field'] ) ) {
        update_post_meta( $post_id, 'slider_embed_code', sanitize_text_field( $_POST['slider_embed_code_field'] ) );
    }
}
add_action( 'save_post_slider', 'save_slider_meta' );

?>