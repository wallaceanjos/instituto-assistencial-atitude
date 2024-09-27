<?php
/// Cria um custom post do tipo patrocinador
function create_post_sponsor_type() {
    register_post_type( 'sponsor',
        array(
            'labels' => array(
                'name' => __( 'Parceiros' ),
                'singular_name' => __( 'Parceiro' ),
                'add_new' => __( 'Adicionar novo patrocinador' ),
                'add_new_item' => __( 'Adicionar novo patrocinador' ),
                'edit_item' => __( 'Editar patrocinador' ),
                'new_item' => __( 'Novo patrocinador' ),
                'view_item' => __( 'Ver patrocinador' ),
                'search_items' => __( 'Pesquisar patrocinadores' ),
                'not_found' => __( 'Nenhum patrocinador encontrado' ),
                'not_found_in_trash' => __( 'Nenhum patrocinador encontrado na lixeira' ),
                'all_items' => __( 'Todos os patrocinadores' ),
                'menu_name' => __( 'Parceiros' ),
                'name_admin_bar' => __( 'Parceiros' ),
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'thumbnail'),
            'rewrite' => array('slug' => 'sponsors'),
        )
    );
}
add_action( 'init', 'create_post_sponsor_type' );


// Adiciona metaboxes para campos personalizados dos patrocinadores
function add_sponsor_metaboxes() {
    add_meta_box('sponsor_color', 'Cor de fundo', 'sponsor_color_callback', 'sponsor', 'normal', 'default');
}
add_action( 'add_meta_boxes', 'add_sponsor_metaboxes' );

// Define a função de callback para o campo de cor
function sponsor_color_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'sponsor_color_nonce');
    $value = get_post_meta( $post->ID, 'sponsor_color', true );
    echo '<label for="sponsor_color_field">Escolha a cor de fundo:</label><br>';
    echo '<input type="color" id="sponsor_color_field" name="sponsor_color_field" value="' . esc_attr( $value ) . '" size="7"><br>';
}



// Função para salvar os campos personalizados dos patrocinadores
function save_sponsor_meta( $post_id ) {
    // Verifica se o nonce está correto
    if ( ! isset( $_POST['sponsor_color_nonce'] ) || ! wp_verify_nonce( $_POST['sponsor_color_nonce'], basename( __FILE__ ) ) ) {
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
    
    // Salva o valor do campo de cor, se existir
    if ( isset( $_POST['sponsor_color_field'] ) ) {
        update_post_meta( $post_id, 'sponsor_color', sanitize_hex_color( $_POST['sponsor_color_field'] ) );
    }
}
add_action( 'save_post_sponsor', 'save_sponsor_meta' );
?>
