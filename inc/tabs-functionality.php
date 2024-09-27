<?php
// Cria um custom post do tipo tab
// o nome da função em inglês fica como ?

function create_post_tab_type() {
    register_post_type( 'tab',
        array(
            'labels' => array(
                'name' => __( 'Tabs' ),
                'singular_name' => __( 'Tab' ),
                'add_new' => __( 'Adicionar nova tab' ),
                'add_new_item' => __( 'Adicionar nova tab' ),
                'edit_item' => __( 'Editar tab' ),
                'new_item' => __( 'Nova tab' ),
                'view_item' => __( 'Ver tab' ),
                'search_items' => __( 'Pesquisar tabs' ),
                'not_found' => __( 'Nenhuma tab encontrada' ),
                'not_found_in_trash' => __( 'Nenhuma tab encontrada na lixeira' ),
                'all_items' => __( 'Todas as tabs' ),
                'menu_name' => __( 'Impacto' ),
                'name_admin_bar' => __( 'tab' ),
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
            'taxonomies' => array('category', 'post_tag'),
            'rewrite' => array('slug' => 'tabs'),
        )
    );
}
add_action( 'init', 'create_post_tab_type' );

// Adiciona metaboxes para campos personalizados
function add_tab_metaboxes() {
    add_meta_box('tab_cta_url', 'Link de apontamento do botão CTA', 'tab_cta_url_callback', 'tab', 'normal', 'default');
    add_meta_box('tab_cta_text', 'Label do botão CTA', 'tab_cta_text_callback', 'tab', 'normal', 'default');
    add_meta_box(
        'tab_guide',            // ID da meta box
        'Exemplo de Tab',       // Título da meta box
        'tab_guide_callback',   // Função de callback
        'tab',                  // Tipo de post (post type)
        'normal',               // Contexto da meta box (onde ela aparece)
        'low'                   // Prioridade (mais abaixo no layout)
    );
}
add_action( 'add_meta_boxes', 'add_tab_metaboxes' );

// Define a função de callback para o campo de CTA URL
function tab_cta_url_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'tab_cta_url_nonce');
    $value = get_post_meta( $post->ID, 'tab_cta_url', true );
    echo '<label for="tab_cta_url_field">Insira a URL do CTA ou deixe vazio para direcionar "automagicamente" para a página do post:</label><br>';
    echo '<input type="text" id="tab_cta_url_field" name="tab_cta_url_field" value="' . esc_attr( $value ) . '" size="50"><br>';
}

// Define a função de callback para o campo de CTA TEXT
function tab_cta_text_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'tab_cta_text_nonce');
    $value = get_post_meta( $post->ID, 'tab_cta_text', true );
    echo '<label for="tab_cta_text_field">Insira o texto do CTA:</label><br>';
    echo '<input type="text" id="tab_cta_text_field" name="tab_cta_text_field" value="' . esc_attr( $value ) . '" size="50"><br>';
}

// Função de callback para exibir o conteúdo da meta box
function tab_guide_callback() {
    echo '<p>Veja abaixo um exemplo de como o comentário será exibido no site:</p>';
    echo '<img src="' . get_template_directory_uri() . '/images/exemplo-tab.png" alt="Exemplo de Avaliação" style="max-width:100%; height:auto;">';
}

function save_tab_meta( $post_id ) {
    // Verifica se o nonce está correto
    if ( ! isset( $_POST['tab_cta_url_nonce'] ) || ! wp_verify_nonce( $_POST['tab_cta_url_nonce'], basename( __FILE__ ) ) ) {
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
    
    // Salva o valor do campo de CTA URL, se existir
    if ( isset( $_POST['tab_cta_url_field'] ) ) {
        update_post_meta( $post_id, 'tab_cta_url', sanitize_text_field( $_POST['tab_cta_url_field'] ) );
    }
    
    // Salva o valor do campo de CTA TEXT, se existir
    if ( isset( $_POST['tab_cta_text_field'] ) ) {
        update_post_meta( $post_id, 'tab_cta_text', sanitize_text_field( $_POST['tab_cta_text_field'] ) );
    }
}
add_action( 'save_post_tab', 'save_tab_meta' );

?>