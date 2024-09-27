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
                        <a href="#">
                            <div class="w-144 h-64"
                                style="background:url('<?php echo esc_url($logo_img); ?>')no-repeat center center / contain">
                            </div>
                        </a>
                    </div>
                </div>

                <div class="d-flex">
                    <input type="checkbox" name="" id="check">
                    <div class="nav-btn gap-md-24">
                        <div class="nav-links flex-md-center-center">
                        <ul class="gap-24 text-uppercase m-0">
                            
                            <li class="nav-link local-scroll" style="--i: .1s">
                                <a href="/" class="lh-12 d-flex--force flex-nowrap h-56">Home</a>
                            </li>
                            <li class="nav-link" style="--i: .2s">
                                <a href="/quem-somos" class="lh-12 d-flex--force flex-nowrap h-56">Quem somos</a>
                            </li>
                            <li class="nav-link" style="--i: .3s">
                                <a href="/o-que-fazemos" class="lh-12 d-flex--force flex-nowrap h-56">O que fazemos</a>
                            </li>
                            <li class="nav-link" style="--i: .4s">
                                <a href="/como-ajudar" class="lh-12 d-flex--force flex-nowrap h-56">como ajudar</a>
                            </li>
                            <li class="nav-link" style="--i: .5s">
                                <a href="/transparencia" class="lh-12 d-flex--force flex-nowrap h-56">Transparência</a>
                            </li>
                            <li class="nav-link" style="--i: .6s">
                                <a href="/empresas-parceiras" class="lh-12 d-flex--force flex-nowrap h-56">Empresas
                                    parceiras</a>
                            </li>
                            <li class="nav-link" style="--i: .7s">
                                <a href="https://www.atitudestore.com.br/" target="_blank" class="lh-12 d-flex--force flex-nowrap h-56">loja
                                </a>
                            </li>
                            <li class="nav-link" style="--i: .8s">
                                <a href="/contato" class="lh-12 d-flex--force flex-nowrap h-56">Contato</a>
                            </li>
                            <li class="nav-link" style="--i: .9s">
                                <a href="javascript:void(0)" class="lh-12 d-flex--force flex-nowrap h-56">Blog
                                    <span class="material-symbols-rounded">arrow_drop_down</span>
                                </a>
                                <div class="dropdown">
                                    <ul>
                                        <li class="dropdown-link">
                                            <a href="blog/category/creche-novos-sonhos/" class="lh-12 d-flex--force flex-nowrap h-56">Creche Novos Sonhos</a>
                                        </li>
                                        <li class="dropdown-link">
                                            <a href="/blog" class="lh-12 d-flex--force flex-nowrap h-56">Todos os posts</a>
                                        </li>

                                        <!-- <li class="dropdown-link">
                                            <a href="#" class="lh-12 d-flex--force flex-nowrap h-56">Link
                                                2</a>
                                        </li>

                                        <li class="dropdown-link">
                                            <a href="#" class="lh-12 d-flex--force flex-nowrap h-56">Link
                                                3<span class="material-symbols-rounded">
                                                    arrow_drop_down
                                                </span></a>

                                            <div class="dropdown second">
                                                <ul>
                                                    <li class="dropdown-link">
                                                        <a href="#"
                                                            class="lh-12 d-flex--force flex-nowrap h-56">Link
                                                            1</a>
                                                    </li>

                                                    <li class="dropdown-link">
                                                        <a href="#"
                                                            class="lh-12 d-flex--force flex-nowrap h-56">Link
                                                            2</a>
                                                    </li>

                                                    <li class="dropdown-link">
                                                        <a href="#"
                                                            class="lh-12 d-flex--force flex-nowrap h-56">Link
                                                            3</a>
                                                    </li>

                                                    <li class="dropdown-link">
                                                        <a href="#"
                                                            class="lh-12 d-flex--force flex-nowrap h-56">More<span
                                                                class="material-symbols-rounded">
                                                                arrow_drop_down
                                                            </span></a>

                                                        <div class="dropdown second">
                                                            <ul>
                                                                <li class="dropdown-link">
                                                                    <a href="#"
                                                                        class="lh-12 d-flex--force flex-nowrap h-56">Link
                                                                        1</a>
                                                                </li>

                                                                <li class="dropdown-link">
                                                                    <a href="#"
                                                                        class="lh-12 d-flex--force flex-nowrap h-56">Link
                                                                        2</a>
                                                                </li>

                                                                <li class="dropdown-link">
                                                                    <a href="#"
                                                                        class="lh-12 d-flex--force flex-nowrap h-56">Link
                                                                        3</a>
                                                                </li>

                                                                <div class="arrow"></div>
                                                            </ul>
                                                        </div>
                                                    </li>

                                                    <div class="arrow"></div>
                                                </ul>
                                            </div>
                                        </li>

                                        <li class="dropdown-link">
                                            <a href="#" class="fs-12 lh-12 d-flex--force flex-nowrap h-56">Link
                                                4</a>
                                        </li> -->
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="log-sign flex-md-center-center" style="--i: 1s">
                        <div class="d-flex gap-16">
                            <button id="theme-toggle" class="btn btn-styled darkblue-50 btn-styled-solid-rounded px-12--force py-8--force lh-12--force"><span class="color-white">☼</span></button>
                            
                            <a class="btn btn-styled yellow btn-styled-solid-rounded px-16--force py-8--force" href="https://institutoatitude.colabore.org/doeparaoinstituto/single_step" target="_blank">Doe</a>
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