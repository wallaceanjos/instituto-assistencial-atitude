<?php
// Cria um custom post do tipo transparencia
function create_post_transparencia_type() {
    register_post_type( 'transparencia',
        array(
            'labels' => array(
                'name' => __( 'Transparência' ),
                'singular_name' => __( 'Transparência' ),
                'add_new' => __( 'Adicionar novo item' ),
                'add_new_item' => __( 'Adicionar novo item' ),
                'edit_item' => __( 'Editar item' ),
                'new_item' => __( 'Novo item' ),
                'view_item' => __( 'Ver item' ),
                'search_items' => __( 'Pesquisar itens' ),
                'not_found' => __( 'Nenhum item encontrado' ),
                'not_found_in_trash' => __( 'Nenhum item encontrado na lixeira' ),
                'all_items' => __( 'Todos os itens' ),
                'menu_name' => __( 'Transparência' ),
                'name_admin_bar' => __( 'Transparência' ),
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title'),
            'rewrite' => array('slug' => 'transparencia'),
        )
    );
}
add_action( 'init', 'create_post_transparencia_type' );

// Adiciona metaboxes para campos personalizados
function add_transparencia_metaboxes() {
    add_meta_box('transparencia_file_url', 'URL do Arquivo', 'transparencia_file_url_callback', 'transparencia', 'normal', 'default');
}
add_action( 'add_meta_boxes', 'add_transparencia_metaboxes' );

// Define a função de callback para o campo de URL do Arquivo
function transparencia_file_url_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'transparencia_file_url_nonce');
    $value = get_post_meta( $post->ID, 'transparencia_file_url', true );
    echo '<label for="transparencia_file_url_field">Insira a URL do arquivo:</label><br>';
    echo '<input type="text" id="transparencia_file_url_field" name="transparencia_file_url_field" value="' . esc_attr( $value ) . '" size="50"><br>';
}

function save_transparencia_meta( $post_id ) {
    // Verifica se o nonce está correto
    if ( ! isset( $_POST['transparencia_file_url_nonce'] ) || ! wp_verify_nonce( $_POST['transparencia_file_url_nonce'], basename( __FILE__ ) ) ) {
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
    
    // Salva o valor do campo de URL do Arquivo, se existir
    if ( isset( $_POST['transparencia_file_url_field'] ) ) {
        update_post_meta( $post_id, 'transparencia_file_url', sanitize_text_field( $_POST['transparencia_file_url_field'] ) );
    }
}
add_action( 'save_post_transparencia', 'save_transparencia_meta' );
?>