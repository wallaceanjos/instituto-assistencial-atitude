<?php

// CRIA CAIXA DE DATA DO EVENTO QUANDO SELECIONADO CATEGORIA DE EVENTO EM UM POST
function evento_add_meta_box() {
    $screens = ['post']; // Especifica em quais post types o meta box será exibido.
    foreach ( $screens as $screen ) {
        add_meta_box(
            'evento_meta_box', // ID do meta box
            'Data do evento', // Título do meta box
            'evento_meta_box_callback', // Callback function
            'post', // Post type
            'side', // Contexto do meta box
            'default' // Prioridade do meta box
        );
    }
}
add_action( 'add_meta_boxes', 'evento_add_meta_box' );

function evento_meta_box_callback( $post ) {
    wp_nonce_field( 'evento_meta_box', 'evento_meta_box_nonce' );
    $data_do_evento = get_post_meta( $post->ID, '_data_do_evento', true );
    ?>
    <p>
        <label for="data_do_evento">Data do evento:</label>
        <br>
        <input type="date" id="data_do_evento" name="data_do_evento" value="<?php echo esc_attr( $data_do_evento ); ?>">
    </p>
    <?php
}

function evento_save_meta_box_data( $post_id ) {
    if ( ! isset( $_POST['evento_meta_box_nonce'] ) ) {
        return;
    }
    if ( ! wp_verify_nonce( $_POST['evento_meta_box_nonce'], 'evento_meta_box' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( isset( $_POST['post_type'] ) && 'post' == $_POST['post_type'] ) {
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
    }
    if ( ! isset( $_POST['data_do_evento'] ) ) {
        return;
    }
    $data_do_evento = sanitize_text_field( $_POST['data_do_evento'] );
    update_post_meta( $post_id, '_data_do_evento', $data_do_evento );
}
add_action( 'save_post', 'evento_save_meta_box_data' );
?>