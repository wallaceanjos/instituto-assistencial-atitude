<?php

function create_post_review_type() {
    register_post_type( 'review',
        array(
            'labels' => array(
                'name' => __( 'Reviews' ),
                'singular_name' => __( 'Review' ),
                'add_new' => __( 'Adicionar nova avaliação' ),
                'add_new_item' => __( 'Adicionar nova avaliação' ),
                'edit_item' => __( 'Editar avaliação' ),
                'new_item' => __( 'Nova avaliação' ),
                'view_item' => __( 'Ver avaliação' ),
                'search_items' => __( 'Pesquisar avaliações' ),
                'not_found' => __( 'Nenhuma avaliação encontrada' ),
                'not_found_in_trash' => __( 'Nenhuma avaliação encontrada na lixeira' ),
                'all_items' => __( 'Todas as avaliações' ),
                'menu_name' => __( 'Reviews' ),
                'name_admin_bar' => __( 'Avaliação' ),
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'thumbnail'),
            'taxonomies' => array('category', 'post_tag'),
            'rewrite' => array('slug' => 'reviews'),
        )
    );
    
    // Altera o placeholder do campo de título para o tipo de post 'review'
    add_filter( 'enter_title_here', function( $title, $post ) {
        if ( 'review' == $post->post_type ) {
            return 'Insira o nome do autor do depoimento';
        }
        return $title;
    }, 10, 2 );
}
add_action( 'init', 'create_post_review_type' );

// Adiciona mereviewoxes para campos personalizados
function add_review_mereviewoxes() {
    add_meta_box('review_occupation', 'Ocupação do autor', 'review_occupation_callback', 'review', 'normal', 'default');
    add_meta_box(
        'review_guide',         // ID da meta box
        'Exemplo de Avaliação', // Título da meta box
        'review_guide_callback',// Função de callback
        'review',               // Tipo de post (post type)
        'normal',               // Contexto da meta box (onde ela aparece)
        'low'                   // Prioridade (mais abaixo no layout)
    );
}
add_action( 'add_meta_boxes', 'add_review_mereviewoxes' );

// Define a função de callback para o campo de Ocupação
function review_occupation_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'review_occupation_nonce');
    $value = get_post_meta( $post->ID, 'review_occupation', true );
    echo '<label for="review_occupation_field">Insira a ocupação do autor:</label><br>';
    echo '<input type="text" id="review_occupation_field" name="review_occupation_field" value="' . esc_attr( $value ) . '" size="50"><br>';
}

// Função de callback para exibir o conteúdo da meta box
function review_guide_callback() {
    echo '<p>Veja abaixo um exemplo de como o comentário será exibido no site:</p>';
    echo '<img src="' . get_template_directory_uri() . '/images/exemplo-review.png" alt="Exemplo de Avaliação" style="max-width:100%; height:auto;">';
}



function save_review_meta( $post_id ) {
    // Verifica se o post está sendo salvo automaticamente
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    
    // Verifica se o usuário tem permissão para editar o post
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }
    
    // Salva o valor do campo de Ocupação, se existir
    if ( isset( $_POST['review_occupation_field'] ) ) {
        update_post_meta( $post_id, 'review_occupation', sanitize_text_field( $_POST['review_occupation_field'] ) );
    }
}
add_action( 'save_post_review', 'save_review_meta' );

?>