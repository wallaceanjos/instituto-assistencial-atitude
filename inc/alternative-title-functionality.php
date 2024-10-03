<?php
// Adiciona metabox para o campo Título Alternativo nas páginas
function add_alternative_title_metabox() {
    add_meta_box(
        'alternative_title',              // ID da metabox
        'Título Alternativo',             // Título da metabox
        'alternative_title_callback',     // Função de callback para renderizar o campo
        'page',                           // Tipo de post (no caso, 'page')
        'normal',                         // Contexto onde a metabox será exibida (normal, side, etc.)
        'high'                         // Prioridade de exibição
    );
}
add_action( 'add_meta_boxes', 'add_alternative_title_metabox' );

// Função de callback para o campo Título Alternativo
function alternative_title_callback( $post ) {
    // Cria um nonce para segurança
    wp_nonce_field( basename( __FILE__ ), 'alternative_title_nonce' );
    
    // Pega o valor atual do campo, se existir
    $value = get_post_meta( $post->ID, '_alternative_title', true );
    
    // Pega o valor da checkbox 'não exibir título'
    $no_title = get_post_meta( $post->ID, '_no_title_checkbox', true );
    
    // Campo de input para o Título Alternativo
    echo '<label for="alternative_title_field">Insira o Título Alternativo para a publicação (se este campo estiver vazio, será exibido o título da publicação):</label><br>';
    echo '<input type="text" id="alternative_title_field" name="alternative_title_field" value="' . esc_attr( $value ) . '" size="50"><br><br>';
    
    // Campo checkbox para 'não exibir título'
    echo '<input type="checkbox" id="no_title_checkbox" name="no_title_checkbox" value="1" ' . checked( 1, $no_title, false ) . '>';
    echo '<label for="no_title_checkbox"> Não exibir título nesta página</label><br>';
}

// Função para salvar o valor do Título Alternativo e a checkbox
function save_alternative_title_meta( $post_id ) {
    // Verifica se o nonce está presente e válido
    if ( ! isset( $_POST['alternative_title_nonce'] ) || ! wp_verify_nonce( $_POST['alternative_title_nonce'], basename( __FILE__ ) ) ) {
        return $post_id;
    }
    
    // Verifica se o post está sendo salvo automaticamente
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }
    
    // Verifica permissões do usuário
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return $post_id;
    }
    
    // Salva o valor do campo de Título Alternativo
    if ( isset( $_POST['alternative_title_field'] ) ) {
        update_post_meta( $post_id, '_alternative_title', sanitize_text_field( $_POST['alternative_title_field'] ) );
    }
    
    // Salva o valor da checkbox
    $no_title_value = isset( $_POST['no_title_checkbox'] ) ? 1 : 0;
    update_post_meta( $post_id, '_no_title_checkbox', $no_title_value );
}
add_action( 'save_post_page', 'save_alternative_title_meta' );

?>