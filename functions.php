<?php
// Funções e definições do tema
require_once get_template_directory() . '/inc/slider-functionality.php';
require_once get_template_directory() . '/inc/tabs-functionality.php';
require_once get_template_directory() . '/inc/reviews-functionality.php';
require_once get_template_directory() . '/inc/sponsor-functionality.php';
require_once get_template_directory() . '/inc/events-functionality.php';
require_once get_template_directory() . '/inc/alternative-title-functionality.php';
require_once get_template_directory() . '/inc/dynamic-content-sections-functionality.php';
require_once get_template_directory() . '/inc/menu-functionality.php';
require_once get_template_directory() . '/inc/transparency-functionality.php';

function add_custom_post_types_to_category($query) {
    if (is_category() && $query->is_main_query() && !is_admin()) {
        $query->set('post_type', array('post', 'tab', 'review', 'slider')); // Inclua aqui os tipos de post que deseja exibir
    }
}
add_action('pre_get_posts', 'add_custom_post_types_to_category');


function starter_theme_support(){
    // add title tag dinamically
    add_theme_support('title-tag');
	add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'starter_theme_support');

function wpdev_filter_login_head() {
    if ( has_custom_logo() ) :
        $image = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
        ?>
        <style type="text/css">
            .nav-logo-wrap a {
                background: url(<?php echo esc_url( $image[0] ); ?>) no-repeat center center / contain;
                width: <?php echo absint( $image[1] ) ?>px;
                height: <?php echo absint( $image[2] ) ?>px;
            }
        </style>
        <?php
    endif;
}
add_action( 'login_head', 'wpdev_filter_login_head', 100 );


function get_category_events_posts( $query ) {
    if ( is_admin() || ! $query->is_main_query() ) {
        return;
    }

    if ( is_page( 'events' ) ) { // Substitua 'nome-da-pagina' pelo slug da página que você criou
      $query->set( 'category_name', 'eventos' ); // Substitua 'eventos' pelo slug da categoria que você quer exibir
    }
  }
  add_action( 'pre_get_posts', 'get_category_events_posts' );


// Exibir até 3 imagens relacionadas em cada post na listagem
function display_related_images() {
    global $post;
    $post_id = $post->ID;
    $related_images = get_attached_media('image', $post_id);
    $count = 0;
    $has_thumbnail = false;
    if (has_post_thumbnail() || $related_images ){
        echo '<div class="blog-media">
                <ul class="clearlist content-slider">';
                    // Verificar se o post tem uma imagem em destaque (thumbnail) e exibi-la primeiro
                    if (has_post_thumbnail()) {
                        $has_thumbnail = true;
                        $thumbnail_id = get_post_thumbnail_id();
                        $thumbnail_image = wp_get_attachment_image_src($thumbnail_id, 'thumbnail');
                        echo '<li>';
                        echo '  <a href="' . get_permalink() . '" style="display:block;background:url('. $thumbnail_image[0] .')no-repeat center center / cover">
                                    <img width="100%" height="auto" src="https://institutoassistencialatitude.com/wp-content/uploads/2024/09/placeholder.png" alt="' . get_the_title() . '">
                                </a>';
                        echo '</li>';
                        $count++;
                    }
                    
                    // Exibir até 2 imagens adicionais relacionadas
                    if ($related_images) {
                        foreach ($related_images as $image) {
                            if ($count < 3) {
                                // Ignorar a imagem em destaque se já foi exibida
                                if ($has_thumbnail && $image->ID == $thumbnail_id) {
                                    continue;
                                }
                                echo '<li>';
                                echo '  <a href="' . get_permalink() . '" style="display:block;background:url('. $image->guid .')no-repeat center center / cover">
                                            <img width="100%" height="auto" src="https://institutoassistencialatitude.com/wp-content/uploads/2024/09/placeholder.png" alt="' . $image->post_title . '">
                                        </a>';
                                echo '</li>';
                                $count++;
                            } else {
                                break;
                            }
                        }
                    }
        echo '</ul></div>';
    }
}

// Retorna breadcrumb
function get_breadcrumb() {
    echo '<a href="'.home_url().'" rel="nofollow">Home</a>';
    if (is_category() || is_single()) {
        echo "&nbsp;/&nbsp;";
        the_category(' &bull; ');
            if (is_single()) {
                echo " &nbsp;/&nbsp;<span>Post</span> ";
            }
    } elseif (is_page()) {
        echo "&nbsp;/&nbsp;<span>Post</span>";
    } elseif (is_search()) {
        echo "&nbsp;/&nbsp;Busca por ";
        echo '"<em>';
        echo the_search_query();
        echo '</em>"';
    }
}


// @import "./partials/theme.css";
// @import "./partials/navbar.css";
// @import "./partials/slide.css";
// @import "./partials/button.css";
// @import "./partials/forms.css";
// @import "./partials/colors.css";
// @import "./partials/elevation.css";
// @import "./partials/side-tab.css";
// @import "./partials/sponsors.css";
// @import "./partials/price.css";
// @import "./partials/line-icons.css";
// @import "./partials/animate.css";

function register_styles(){
    $version = wp_get_theme() -> get('Version');
    // wp_enqueue_style('style-bootstrap', get_template_directory_uri() . "/assets/css/bootstrap.min.css", array(), $version, 'all');
    // wp_enqueue_style('style', get_template_directory_uri() . "/assets/css/style.css", array(), $version, 'all');
    // wp_enqueue_style('style-responsive', get_template_directory_uri() . "/assets/css/style-responsive.css", array(), $version, 'all');
    // wp_enqueue_style('style-vertical', get_template_directory_uri() . "/assets/css/vertical-rhythm.min.css", array(), $version, 'all');
    // wp_enqueue_style('style-owl', get_template_directory_uri() . "/assets/css/owl.carousel.css", array(), $version, 'all');
    // wp_enqueue_style('style-magnific-popup', get_template_directory_uri() . "/assets/css/magnific-popup.css", array(), $version, 'all');
    // wp_enqueue_style('style-YTPlayer', get_template_directory_uri() . "/assets/css/YTPlayer.css", array(), $version, 'all');
    // wp_enqueue_style('style-font-awesome', get_template_directory_uri() . "/assets/css/font-awesome.min.css", array(), $version, 'all');
    wp_enqueue_style('style-core-theme', get_template_directory_uri() . "/css/core.css", array(), $version, 'all');
    wp_enqueue_style('style-theme', get_template_directory_uri() . "/css/partials/theme.css", array(), $version, 'all');
    wp_enqueue_style('style-navbar', get_template_directory_uri() . "/css/partials/navbar.css", array(), $version, 'all');
    wp_enqueue_style('style-slide', get_template_directory_uri() . "/css/partials/slide.css", array(), $version, 'all');
    wp_enqueue_style('style-button', get_template_directory_uri() . "/css/partials/button.css", array(), $version, 'all');
    wp_enqueue_style('style-forms', get_template_directory_uri() . "/css/partials/forms.css", array(), $version, 'all');
    wp_enqueue_style('style-colors', get_template_directory_uri() . "/css/partials/colors.css", array(), $version, 'all');
    wp_enqueue_style('style-elevation', get_template_directory_uri() . "/css/partials/elevation.css", array(), $version, 'all');
    wp_enqueue_style('style-side-tab', get_template_directory_uri() . "/css/partials/side-tab.css", array(), $version, 'all');
    wp_enqueue_style('style-sponsors', get_template_directory_uri() . "/css/partials/sponsors.css", array(), $version, 'all');
    wp_enqueue_style('style-price', get_template_directory_uri() . "/css/partials/price.css", array(), $version, 'all');
    wp_enqueue_style('style-line-icons', get_template_directory_uri() . "/css/partials/line-icons.css", array(), $version, 'all');
    wp_enqueue_style('style-animate', get_template_directory_uri() . "/css/partials/animate.css", array(), $version, 'all');
}
add_action('wp_enqueue_scripts', 'register_styles');

function register_scripts(){
    $version = wp_get_theme() -> get('Version');
    wp_enqueue_script('script-jquery', get_template_directory_uri() . "/js/jquery-1.11.2.min.js", array(),'1.11.2', 'all');
    wp_enqueue_script('script-jquery-easing', get_template_directory_uri() . "/js/jquery.easing.1.3.js", array(), '1.3', 'all');
    wp_enqueue_script('script-bootstrap', get_template_directory_uri() . "/js/bootstrap.min.js", array(), $version, 'all');
    wp_enqueue_script('script-SmoothScroll', get_template_directory_uri() . "/js/SmoothScroll.js", array(), $version, 'all');
    wp_enqueue_script('script-jquery-scrollTo', get_template_directory_uri() . "/js/jquery.scrollTo.min.js", array(), $version, 'all');
    wp_enqueue_script('script-jquery-localScroll', get_template_directory_uri() . "/js/jquery.localScroll.min.js", array(), $version, 'all');
    // wp_enqueue_script('script-jquery-viewport', get_template_directory_uri() . "/assets/js/jquery.viewport.mini.js", array(), $version, 'all');
    // wp_enqueue_script('script-jquery-countTo', get_template_directory_uri() . "/assets/js/jquery.countTo.js", array(), $version, 'all');
    wp_enqueue_script('script-jquery-appear', get_template_directory_uri() . "/js/jquery.appear.js", array(), $version, 'all');
    wp_enqueue_script('script-jquery-sticky', get_template_directory_uri() . "/js/jquery.sticky.js", array(), $version, 'all');
    wp_enqueue_script('script-jquery-parallax', get_template_directory_uri() . "/js/jquery.parallax-1.1.3.js", array(), '1.1.3', 'all');
    wp_enqueue_script('script-jquery-fitvids', get_template_directory_uri() . "/js/jquery.fitvids.js", array(), $version, 'all');
    wp_enqueue_script('script-owl-carousel', get_template_directory_uri() . "/js/owl.carousel.min.js", array(), $version, 'all');
    wp_enqueue_script('script-isotope', get_template_directory_uri() . "/js/isotope.pkgd.min.js", array(), $version, 'all');
    // wp_enqueue_script('script-imagesloaded', get_template_directory_uri() . "/assets/js/imagesloaded.pkgd.min.js", array(), $version, 'all');
    wp_enqueue_script('script-jquery-magnific-popup', get_template_directory_uri() . "/js/jquery.magnific-popup.min.js", array(), $version, 'all');
    wp_enqueue_script('script-wow', get_template_directory_uri() . "/js/wow.min.js", array(), $version, 'all');
    wp_enqueue_script('script-masonry', get_template_directory_uri() . "/js/masonry.pkgd.min.js", array(), $version, 'all');
    // wp_enqueue_script('script-jquery-simple-text-rotator', get_template_directory_uri() . "/assets/js/jquery.simple-text-rotator.min.js", array(), $version, 'all');
    wp_enqueue_script('script-all', get_template_directory_uri() . "/js/all.js", array(), $version, 'all');
    // wp_enqueue_script('script-contact', get_template_directory_uri() . "/assets/js/contact-form.js", array(), $version, 'all');
    // wp_enqueue_script('script-jquery-ajaxchimp', get_template_directory_uri() . "/assets/js/jquery.ajaxchimp.min.js", array(), $version, 'all');
    // wp_enqueue_script('script-jquery-YTPlayer', get_template_directory_uri() . "/assets/js/jquery.mb.YTPlayer.js", array(), $version, 'all');
    
    wp_enqueue_script('script-toggle-theme', get_template_directory_uri() . "/js/toggle-theme.js", array(), $version, 'all');
    wp_enqueue_script('script-navbar-scroll', get_template_directory_uri() . "/js/navbar-scroll.js", array(), $version, 'all');
    wp_enqueue_script('script-counter', get_template_directory_uri() . "/js/counter.js", array(), $version, 'all');
    wp_enqueue_script('script-slide', get_template_directory_uri() . "/js/slide.js", array(), $version, 'all');

}
add_action('wp_enqueue_scripts', 'register_scripts');

?>