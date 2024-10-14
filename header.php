<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Instituto Assistencial Atitude">
    <title><?php echo get_bloginfo('name') ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300..800&display=swap">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,300,0,0" />

    <!-- Favicons -->
    <link rel="shortcut icon" href="wp-content/uploads/2023/03/cropped-favicon.png">
    <link rel="apple-touch-icon" href="wp-content/uploads/2023/03/cropped-favicon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="wp-content/uploads/2023/03/cropped-favicon.png">
    <link rel="apple-touch-icon" sizes="114x114" href="wp-content/uploads/2023/03/cropped-favicon.png">
    <!-- CSS -->
    <link rel="stylesheet" href="https://unpkg.com/matcha-core@latest/matcha-core.min.css">
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <!-- JavaScript -->
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <?php
        wp_head();
    ?>
</head>
<!-- Assets -->
<?php
    $logo_img = get_template_directory_uri() . '/images/logo.png';
?>
<!-- /Assets -->

<body class="light-theme appear-animate">
    <header id="navbar" class="navbar">
        <div class="d-flex flex-center-center max-w-1200 mx-auto px-16 px-md-24 px-32 px-lg-0">

            <div class="d-flex flex-space-between w-100-p gap-md-24">
                <div class="d-flex">
                    <div class="logo">
                        <a href="/">
                            <div class="w-144 h-64"
                                style="background:url('<?php echo esc_url($logo_img); ?>')no-repeat center center / contain">
                            </div>
                        </a>
                    </div>
                </div>

                <div class="d-flex position-relative">
                    <input type="checkbox" name="" id="check">
                    <div class="nav-btn gap-md-24">
                        <div class="nav-links flex-md-center-center">
                            <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'header-menu',
                                    'menu_class'     => 'header-menu-class',
                                    'container'      => 'div', // Pode envolver com uma div se necessário
                                    'container_class'=> 'nav-links flex-md-center-center', // Classe da div que envolve o menu
                                    'items_wrap'     => '<ul class="gap-24 text-uppercase m-0">%3$s</ul>', // Envolve os itens do menu
                                    'depth'          => 4, // Define a profundidade do menu (2 para dois níveis)
                                    'walker'         => new Custom_Walker_Nav_Menu() // Define a classe do Walker
                                )
                            );
                            ?>
                            
                            
                            
                        
                    </div>

                    <div class="log-sign flex-md-center-center" style="--i: 1s">
                        <div class="d-flex gap-16">
                            <button id="theme-toggle" class="btn btn-styled darkblue-50 shadow-darkblue-50 btn-styled-solid-rounded px-12--force py-8--force lh-12--force"><span class="color-white">☼</span></button>
                            
                            <a class="btn btn-styled yellow shadow-yellow btn-styled-solid-rounded px-16--force py-8--force" href="https://institutoatitude.colabore.org/doeparaoinstituto/single_step" target="_blank">Doe</a>
                            </div>
                        </div>
                    </div>

                    <div class="hamburger-menu-container">
                        <div class="hamburger-menu">
                            <div></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>