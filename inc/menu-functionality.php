<?php
// Função para registrar dois menus: header e footer
function register_my_menus() {
    register_nav_menus(
        array(
            'header-menu' => __( 'Header Menu' ),
            'footer-menu' => __( 'Footer Menu' )
        )
    );
}
add_action( 'init', 'register_my_menus' );

// Função para adicionar a classe 'nav-link' apenas aos itens do primeiro nível
function add_class_nav_link($classes, $item, $args, $depth) {
    // Adiciona a classe 'nav-link' apenas aos itens de primeiro nível
    if ($depth === 0) {
        $classes[] = 'nav-link';
    }
    // Adiciona outra classe a níveis mais profundos, se necessário
    if ($depth >= 1) {
        $classes[] = 'dropdown-link'; // Exemplo de classe para submenus
    }
    
    return $classes;
}
add_filter('nav_menu_css_class', 'add_class_nav_link', 10, 4);

class Custom_Walker_Nav_Menu extends Walker_Nav_Menu {
    // Inicia o submenu (subníveis)
    public function start_lvl(&$output, $depth = 0, $args = null) {
        if ($depth === 0) {
            $output .= '<div class="dropdown"><ul class="sub-menu">';
        }
        if ($depth >= 1) {
            $output .= '<div class="dropdown second"><ul class="sub-menu">';
        }
    }

    // Finaliza o submenu (subníveis)
    public function end_lvl(&$output, $depth = 0, $args = null) {
        $output .= '</ul>'; // Fecha a lista
        if ($depth >= 0) {
            $output .= '</div>'; // Fecha a div.dropdown nos subníveis
        }
    }
}
?>