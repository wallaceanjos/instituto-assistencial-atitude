<?php
    get_header();
?>
            <?php
                if(have_posts()){
                    while(have_posts()){
                        the_post();
                        the_content();
                    }
                }
            ?>
            
            
    <main>
        <!-- SECTION 1 -->
        <section class="backdrop-hero" id="home" style="background: url(https://institutoassistencialatitude.com/wp-content/uploads/2024/09/placeholder.png) no-repeat top center / cover;">
            
            <!-- Slider - Se tiver sliders cadastrados exibe -->
            <?php
                $sliders = get_posts(array(
                'post_type' => 'slider',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                ));
            ?>
            
            <?php
                if ($sliders) :
            ?>
            
                <!-- Flickity HTML init -->
                <div class="carousel color-white" data-flickity>
                    
                    <!-- Loop dos sliders cadastrados -->
                    <?php
                    $args = array(
                        'post_type' => 'slider',
                        'posts_per_page' => -1
                    );
                    $slider_posts = get_posts($args);
                    foreach ($slider_posts as $post) : setup_postdata($post);
                        $slider_title = get_the_title();
                        $slider_subtitle = get_post_meta($post->ID, 'slider_subtitle', true);
                        $slider_content = get_the_content();
                        $slider_excerpt = get_the_excerpt();
                        $slider_cta_url = get_post_meta($post->ID, 'slider_cta_url', true);
                        $slider_cta_text = get_post_meta($post->ID, 'slider_cta_text', true);
                        $slider_embed_code = get_post_meta($post->ID, 'slider_embed_code', true);
                    ?>
                    
                    <?php
                        $post_id = get_the_ID();
                        $thumbnail_url = get_the_post_thumbnail_url($post_id);
                    ?>
                    <!-- Slide Item -->
                    <div class="carousel-cell min-h-700 d-flex w-100-p"
                        style="
                        height: calc(100vh);
                        background: url(
                                <?php
                                    // se tiver imagem destacada, exibe a imagem destacada, senão exibe a imagem desse link https://placehold.co/1920x1080/003755/FFFFFF/png
                                    if (isset($thumbnail_url) && !empty($thumbnail_url)) {
                                        echo $thumbnail_url;
                                    } else {
                                        echo 'https://institutoassistencialatitude.com/wp-content/uploads/2024/09/placeholder.png';
                                    }
                                ?>) fixed no-repeat center center / cover;
                        ">
                        <div class="d-flex flex-align-center mx-auto min-h-800 w-100-p">
                            
                                <!-- Slider Item - Video -->
                            <?php if(isset($slider_embed_code) && !empty($slider_embed_code)) { ?>
                                <!-- SE FOR URL DO YOUTUBE OU VIMEO COMEÇANDO COM http://player.vimeo.com OU https://www.youtube.com/  -->
                                <div class="work-full-media mt-0">
                                    <?php if(isset($thumbnail_url) && !empty($thumbnail_url)) { ?>
                                        <img src="<?php echo $thumbnail_url; ?>" alt="" style="
                                            position: absolute;
                                            top: 0;
                                            right: 0;
                                            filter: blur(51px);
                                        ">
                                    <?php } ?>
                                    <div style="position:relative; background:url(https://img.youtube.com/vi/<?php echo get_post_meta( get_the_ID(), 'slider_embed_code', true ); ?>/hqdefault.jpg)no-repeat center center / cover">
                                        <iframe width="560"
                                            height="315"
                                            style="position: absolute; top: 0; left:0; width: 100%; height: 100%; border: 0; border-radius:12px"
                                            loading="lazy";
                                            srcdoc="<style>
                                            * {
                                            padding: 0;
                                            margin: 0;
                                            overflow: hidden;
                                            }
                                            
                                            body, html {
                                                height: 100%;
                                            }
                                            
                                            img, svg {
                                                position: absolute;
                                                width: 100%;
                                                top: 0;
                                                bottom: 0;
                                                margin: auto;
                                            }
                                            
                                            svg {
                                                filter: drop-shadow(1px 1px 10px hsl(206.5, 70.7%, 8%));
                                                transition: all 250ms ease-in-out;
                                            }
                                            
                                            body:hover svg {
                                                filter: drop-shadow(1px 1px 10px hsl(206.5, 0%, 10%));
                                                transform: scale(1.2);
                                            }
                                            </style>
                                            <a href='https://www.youtube.com/embed/<?php echo get_post_meta( get_the_ID(), 'slider_embed_code', true ); ?>?autoplay=1'>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='64' height='64' viewBox='0 0 24 24' fill='none' stroke='#ffffff' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-play-circle'><circle cx='12' cy='12' r='10'></circle><polygon points='10 8 16 12 10 16 10 8'></polygon></svg>
                                            </a>
                                            "
                                            src="https://www.youtube.com/embed/<?php echo get_post_meta( get_the_ID(), 'slider_embed_code', true ); ?>"
                                            title="<?php the_title() ?>"
                                            frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                            allowfullscreen>
                                        </iframe>
                                    </div>
                                </div>
                                <!--  End  mídia youtube vimeo -->
                                <!-- /Slider Item - Video -->
                            <!-- End midia image -->
                            
                            <?php } elseif(isset($thumbnail_url) && !empty($thumbnail_url)) { ?>
                                
                                <!-- Exibe apenas o código relacionado ao embed -->
                                <div class="work-full-media mt-0"
                                style="background: url(
                                <?php
                                    // se tiver imagem destacada, exibe a imagem destacada, senão exibe a imagem desse link https://placehold.co/1920x1080/003755/FFFFFF/png
                                    if (isset($thumbnail_url) && !empty($thumbnail_url)) {
                                        echo $thumbnail_url;
                                    } else {
                                        echo 'https://institutoassistencialatitude.com/wp-content/uploads/2024/09/placeholder.png';
                                    }
                                ?>) fixed no-repeat center center / cover;">
                                    
                                </div>
                                <!-- End midia image -->
                            <?php } else {  ?>
                                    <!-- slider_embed_code não foi preenchido -->
                            <?php } ?>
                            
                            
                            <!-- Slider Item - Texto -->
                            <div class="d-flex flex-column flex-center max-w-1200 mx-auto px-16 px-md-24 min-h-800 w-100-p px-64 px-lg-0 text-shadow">
                                <div class="d-flex flex-column max-w-600 text-shadow">
                                    <span class="d-flex w-72 h-12 yellow radius-16 mb-16"></span>
                                    <h4 class="m-0 fw-600 fs-20"><?php echo $slider_title; ?></h4>
                                    <div class="h-48 h-md-64"></div>
                                    <h2 class="m-0 fs-28 lh-32 fs-md-40 lh-md-50 line-clamp-3">
                                        <?php echo $slider_subtitle; ?>
                                    </h2>
                                    <p class="fw-500 fs-18 mb-36 max-w-500 line-clamp-5">
                                        <?php echo $slider_excerpt; ?>
                                    </p>
                                    
                                    
                                    <div class="d-flex">
                                            <?php if ($slider_cta_url): ?>
                                                <a class="btn btn-styled yellow btn-styled-solid-rounded px-24--force py-8--force" href="<?php echo esc_url($slider_cta_url); ?>"><?php 
                                                    if($slider_cta_text){
                                                        echo esc_html($slider_cta_text);
                                                    } else {
                                                        echo 'Saiba mais';
                                                    }?>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                </div>
                            </div>
                            <!-- /Slider Item - Texto -->
                        </div>
                        <!-- Slide Item -->
                    </div>
                    <!-- /Loop dos sliders cadastrados -->
                    
                    <?php endforeach;
                    wp_reset_postdata(); ?>
                    
                </div>
                <!-- /Flickity HTML init -->
             
            <?php endif; ?>
            <!-- /Slider - Se tiver sliders cadastrados exibe -->

        </section>
        <!-- SECTION 2 -->

        <section class="py-64 background-bg-alpha">
            <div class="max-w-1200 mx-auto px-16 px-md-24 flex-column flex-md-row tab_container gap-48 gap-md-0">

                <?php
                    $tabs = get_posts(array(
                        'post_type' => 'tab',
                        'post_status' => 'publish',
                        'posts_per_page' => -1,
                    ));
                ?>

                <?php if ($tabs) : ?>
                    <?php
                        $tab_index = 1; // Referente a criação dos inputs e labels
                        foreach ($tabs as $post) : setup_postdata($post);
                            $tab_title = get_the_title();
                            $tab_subtitle = get_post_meta($post->ID, 'tab_subtitle', true);
                            $tab_content = get_the_content();
                            $tab_cta_url = get_post_meta($post->ID, 'tab_cta_url', true);
                            $tab_cta_text = get_post_meta($post->ID, 'tab_cta_text', true);
                            $tab_embed_code = get_post_meta($post->ID, 'tab_embed_code', true);
                    ?>
                        <style>
                            #tab<?php echo $tab_index; ?>:checked ~ .tab-navigation-panel .tab-label[for="tab<?php echo $tab_index; ?>"]{
                                background: var(--lightblue);
                                color: var(--dk-contrast);
                                border-color: var(--lightblue);
                            }

                            #tab<?php echo $tab_index; ?>:checked ~ .tab-content-wrapper #content<?php echo $tab_index; ?>{
                                display: block;
                                background: light-dark(var(--light-surface), var(--dark-surface));
                                color: light-dark(var(--light-fg), var(--dark-fg));
                            }
                        </style>
                        <!-- Input para a Tab -->
                        <input class="tab-input" id="tab<?php echo $tab_index; ?>" type="radio" name="tabs" <?php echo ($tab_index == 1) ? 'checked' : ''; ?>>
                    <?php 
                        $tab_index++; // Incrementa o index para a próxima tab
                        endforeach;
                        wp_reset_postdata();
                    ?>
                <?php endif; ?>

                <div class="text-center text-md-left tab-navigation-panel max-w-600 w-100-p px-48 flex-column gap-8 mx-auto mx-md-0">
                    <div class="lightblue h-8 w-184 mx-auto mx-md-0"></div>
                    <h4 class="m-0 fw-700 fs-48 lh-56 my-36">
                        Como<br>
                        geramos<br>
                        impacto
                    </h4>
                    <?php if ($tabs) : ?>
                        <?php
                            $tab_index = 1; // Inicia o index para as tabs
                            foreach ($tabs as $post) : setup_postdata($post);
                                $tab_title = get_the_title();
                        ?>
                            <!-- Label para a Tab -->
                            <label class="tab-label fs-20 lh-20 fw-500 px-12 py-8 radius-full b-2" for="tab<?php echo $tab_index; ?>">
                                <span><?php echo $tab_title; ?></span>
                            </label>
                        <?php 
                            $tab_index++; // Incrementa o index para a próxima tab
                            endforeach;
                            wp_reset_postdata();
                        ?>
                    <?php endif; ?>
                    <!-- <label class="tab-label fs-20 lh-20 fw-500 px-12 py-8 radius-full b-2" for="tab1"><i
                            class="fa fa-code"></i><span>Educação Infantil Gratuita</span></label>
                    <label class="tab-label fs-20 lh-20 fw-500 px-12 py-8 radius-full b-2" for="tab2"><i
                            class="fa fa-pencil-square-o"></i><span>Acolhimento para Dependência Química</span></label>
                    <label class="tab-label fs-20 lh-20 fw-500 px-12 py-8 radius-full b-2" for="tab3"><i
                            class="fa fa-bar-chart-o"></i><span>Combate à Fome</span></label>
                    <label class="tab-label fs-20 lh-20 fw-500 px-12 py-8 radius-full b-2" for="tab4"><i
                            class="fa fa-folder-open-o"></i><span>Outras Formas</span></label> -->
                </div>
                <div class="tab-content-wrapper w-100-p flex-column">
                    <?php if ($tabs) : ?>
                        <?php
                            $tab_index = 1; // Inicia o index para as tabs
                            foreach ($tabs as $post) : setup_postdata($post);
                                $tab_title = get_the_title();
                                $tab_excerpt = get_the_excerpt();
                                $tab_cta_url = get_post_meta($post->ID, 'tab_cta_url', true);
                                $tab_cta_text = get_post_meta($post->ID, 'tab_cta_text', true);
                        ?>
                            <!-- Conteúdo da Tab -->
                            <section id="content<?php echo $tab_index; ?>" class="tab-content radius-8 h-100-p background-surface py-0 pl-48 pr-24 py-24">
                                <div class="flex-column flex-space-between gap-24 h-100-p">
                                    <div class="flex-column gap-24">
                                        <h3 class="fs-28 fw-700 m-0"><?php echo $tab_title; ?></h3>
                                        <p class="fs-18 lh-30 fw-500 m-0"><?php echo $tab_excerpt; ?></p>
                                    </div>
                                    <div class="d-flex">
                                        <?php if ($tab_cta_url): ?>
                                            <a class="btn btn-styled dark btn-styled-solid-pill mb-20 py-8--force px-24--force fs-16--force" href="<?php echo esc_url($tab_cta_url); ?>"><?php 
                                                if($tab_cta_text){
                                                    echo esc_html($tab_cta_text);
                                                } else {
                                                    echo 'Saiba mais';
                                                }?>
                                            </a>
                                        <?php else: ?>
                                            <a class="btn btn-styled dark btn-styled-solid-pill mb-20 py-8--force px-24--force fs-16--force" href="<?php echo get_permalink(); ?>"><?php 
                                                if($tab_cta_text){
                                                    echo esc_html($tab_cta_text);
                                                } else {
                                                    echo 'Saiba mais';
                                                }?></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </section>
                            
                        <?php 
                            $tab_index++; // Incrementa o index para a próxima tab
                            endforeach;
                            wp_reset_postdata();
                        ?>
                    <?php endif; ?>

                </div>
            </div>

        </section>
        <!-- SECTION 3 -->
        <section class="pt-64 background-surface">
            <div class="max-w-1200 mx-auto px-16 px-md-24">
                <div class="text-center flex-column flex-align-center text-center px-16">
                    <div class="lightblue h-8 w-184"></div>
                    <h4 class="m-0 fw-700 fs-40 lh-40 mt-32 mb-16">Faça parte da transformação</h4>
                    <p class="fs-18 lh-30 fw-500 mt-0 mb-64">Escolha uma das opções abaixo e ajude a mudar a realidade
                        de muitas famílias</p>
                </div>
            </div>
            
            <div class="preload-images"></div>

            <div class="grid-md-4 grid-sm-2">
                <div class="price-item price-img1 min-h-700">
                    <div class="flex-column color-white h-100-p flex-end text-center px-16 px-sm-24 px-md-48 px-lg-64">
                        <h4 class="text-uppercase m-0 fw-700 fs-32 lh-40 mt-32 mb-16">Dependência<br>química</h4>
                        <p class="fs-24 lh-30 fw-500 mt-0 mb-0">Você ajuda a manter os custos para ressocialização dos
                            homens</p>
                        <span class="price-value fs-48 d-flex flex-center-center gap-16">R$<span class="fw-900">30</span></span>
                        <div class="d-flex flex-center">
                            <a href="https://institutoatitude.colabore.org/doeparaoinstituto/single_step"
                                class="btn btn-3d tomato shadow-tomato-900 btn-3d-round mb-20">Doe
                                agora</a>
                        </div>
                    </div>
                </div>
                <div class="price-item price-img2 min-h-700">
                    <div class="flex-column color-white h-100-p flex-end text-center px-16 px-sm-24 px-md-48 px-lg-64">
                        <h4 class="text-uppercase m-0 fw-700 fs-32 lh-40 mt-32 mb-16">Educação<br>infantil</h4>
                        <p class="fs-24 lh-30 fw-500 mt-0 mb-0">Você apadrinha uma criança carente na Creche Novos
                            Sonhos</p>
                        <span class="price-value fs-48 d-flex flex-center-center gap-16">R$<span class="fw-900">50</span></span>
                        <div class="d-flex flex-center">
                            <a href="https://institutoatitude.colabore.org/doeparaoinstituto/single_step"
                                class="btn btn-3d tomato shadow-tomato-900 btn-3d-round mb-20">Doe
                                agora</a>
                        </div>
                    </div>
                </div>
                <div class="price-item price-img3 min-h-700">
                    <div class="flex-column color-white h-100-p flex-end text-center px-16 px-sm-24 px-md-48 px-lg-64">
                        <h4 class="text-uppercase m-0 fw-700 fs-32 lh-40 mt-32 mb-16">Combate<br>à fome</h4>
                        <p class="fs-24 lh-30 fw-500 mt-0 mb-0">Você garante que uma família tenha comida na mesa no mês
                        </p>
                        <span class="price-value fs-48 d-flex flex-center-center gap-16">R$<span class="fw-900">100</span></span>
                        <div class="d-flex flex-center">
                            <a href="https://institutoatitude.colabore.org/doeparaoinstituto/single_step"
                                class="btn btn-3d tomato shadow-tomato-900 btn-3d-round mb-20">Doe
                                agora</a>
                        </div>
                    </div>
                </div>
                <div class="price-item price-img4 min-h-700">
                    <div class="flex-column color-white h-100-p flex-end text-center px-16 px-sm-24 px-md-48 px-lg-64">
                        <p class="fs-24 lh-30 fw-500 mt-0 mb-0">Ajude o Instituto a socorrer e transformar muitas vidas
                        </p>
                        <span class="h-204 fw-700 flex-column flex-center-center gap-16 fs-48">
                            Outros<br>valores
                        </span>
                        <div class="d-flex flex-center">
                            <a href="https://institutoatitude.colabore.org/doeparaoinstituto/single_step"
                                class="btn btn-3d tomato shadow-tomato-900 btn-3d-round mb-20">Doe
                                agora</a>
                        </div>
                    </div>
                </div>
        </section>
        <!-- SECTION 4 -->
        <section class="py-64 background-bg-alpha">
            <div class="max-w-1200 mx-auto px-16 px-md-24">
                <div class="text-center flex-column flex-align-center text-center px-16">
                    <div class="lightblue h-8 w-184"></div>
                    <h4 class="m-0 fw-700 fs-40 lh-40 mt-32 mb-16">Nossos Resultados</h4>
                    <p class="fs-18 lh-30 fw-500 mt-0 mb-64">A transformação é possível se cada um fizer a sua parte.
                    </p>
                </div>

                <div class="grid-md-3 counter-container text-center">
                    <div class="flex-column">
                        <div class="color-lightblue fs-56 fw-900">+<span class="counter" data-target="388375">0</span>
                        </div>
                        <p class="fs-18 lh-28 fw-500 mt-0 mb-64">Pessoas impactadas<br>pelo Instituto</p>
                    </div>
                    <div class="flex-column">
                        <div class="color-lightblue fs-56 fw-900"><span class="counter" data-target="525">0</span></div>
                        <p class="fs-18 lh-28 fw-500 mt-0 mb-64">Homens acolhidos<br>na Comunidade<br>Terapêutica</p>
                    </div>
                    <div class="flex-column">
                        <div class="color-lightblue fs-56 fw-900">+<span class="counter" data-target="412000">0</span>
                        </div>
                        <p class="fs-18 lh-28 fw-500 mt-0 mb-64">Refeições oferecidas<br>na Creche e na<br>Comunidade
                            Terapêutica</p>
                    </div>

                </div>
            </div>
        </section>
        <!-- SECTION 5 -->
        <section class="py-64 lightblue comments min-h-600">
            <div class="text-center flex-column flex-align-center">
                <div class="yellow h-8 w-184"></div>
                <h4 class="m-0 fw-700 fs-40 lh-40 mt-32 mb-16 mb-64">O que estão falando de nós</h4>
            </div>
            
            <?php
                $reviews = get_posts(array(
                    'post_type' => 'review',
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                ));
            ?>

            <?php if ($reviews) : ?>
                <!-- Flickity HTML init -->
                <div class="carousel" data-flickity='{ "adaptiveHeight": true, "wrapAround": true, "autoPlay": true, "freeScroll": true}'>
                    
                    <?php
                        foreach ($reviews as $post) : setup_postdata($post);
                            $review_tab_title = get_the_title();
                            $review_tab_content = get_the_content();
                            $review_occupation = get_post_meta($post->ID, 'review_occupation', true);
                    ?>
                            
                        <div class="carousel-cell">
                            <div class="comment-details background-surface radius-16 color-fg py-48 px-64 text-center">
                                <p class="fs-24 lh-30 fw-600 m-0 line-clamp-6"><?php echo $review_tab_content; ?></p>
                                <h4 class="m-0 fw-700 fs-32 lh-40 mt-32 mb-8"><?php echo $review_tab_title; ?></h4>
                                <p class="fs-18 lh-18 fw-600 m-0"><?php echo $review_occupation; ?></p>
                            </div>
                        </div>
                            
                            
                    <?php 
                        endforeach;
                        wp_reset_postdata();
                    ?>
                    
                </div>
                <!-- /Flickity HTML init -->
            <?php endif; ?>
            
            <div class="pb-64"></div>

        </section>
        
        <!-- SECTION 6 -->
        <!-- Assets -->
        <?php
            $section_6_bg = get_template_directory_uri() . '/images/bg_padrinho.png';
            $section_6_logo_padrinho = get_template_directory_uri() . '/images/logo_padrinho.png';
            $section_6_img_padrinho = get_template_directory_uri() . '/images/img_padrinho.png';
        ?>
        <!-- Assets -->
        <section class="backdrop-padrinho py-48 overflow-hidden"
            style="background: url(<?php echo esc_url($section_6_bg); ?>) no-repeat top center / cover;">
            <div class="max-w-1200 mx-auto px-16 px-md-24">
                <div class="flex-column elevation-x-3-y-3-z-3 background-surface radius-16 py-md-32 px-md-48 py-16 px-16 mx-16">
                    <div class="flex-row">
                        <div class="flex-column max-w-600 w-100-p">
                            <div class="w-100-p max-w-400 h-200"
                                style="background: url(<?php echo esc_url($section_6_logo_padrinho); ?>) no-repeat center center / contain"></div>
                                <div class="flex-column gap-32">
                                    <h4 class="m-0 fw-700 fs-32 lh-40 mt-24 mb-0 px-16 max-w-500 line-clamp-4">Conheça o nosso programa
                                    de apadrinhamento</h4>
                                <p class="fs-18 lh-30 fw-700 m-0 px-16 max-w-600" style="font-size:18px">Apadrinhar uma criança carente é oferecer a ela mais do que apoio financeiro; é proporcionar esperança, cuidado e oportunidades para um futuro melhor. Com seu gesto de solidariedade, você contribui diretamente para transformar vidas, garantindo que essas crianças tenham acesso à educação, alimentação e acompanhamento necessário para o seu desenvolvimento. Juntos, podemos construir uma realidade mais justa e cheia de possibilidades para aqueles que mais precisam.</p>
                                <div class="d-flex px-16">
                                    <a href="https://institutoatitude.colabore.org/padrinhodossonhos/people/new" class="btn btn-styled guava btn-styled-solid-pill mb-20 py-8--force px-24--force fs-16--force" target="_blank">Apadrinhe uma criança</a>
                                </div>
                            </div>
                        </div>
                        <div class="flex-md-column w-100-p position-relative d-none d-md-flex">
                            <div class="h-100-p w-100-p position-absolute" style="background: url(<?php echo esc_url($section_6_img_padrinho); ?>) no-repeat bottom center / contain; transform: scale(1.3) translateX(80px) translateY(10px);"></div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        
        <!-- SECTION 7 -->
         <!-- Assets -->
        <?php
            $section_7_clock = get_template_directory_uri() . '/images/clock-icon.png';
        ?>
        <!-- Assets -->
        <section class="py-64 background-bg-alpha">
            <div class="max-w-1200 mx-auto px-16 px-md-24">
                <div class="text-center flex-column flex-align-center text-center px-16">
                    <div class="lightblue h-8 w-184"></div>
                    <h4 class="m-0 fw-700 fs-40 lh-40 mt-32 mb-16">Fique por dentro</h4>
                    <p class="fs-18 lh-30 fw-500 mt-0 mb-64">Saiba quais são as últimas notícias do Instituto
                    </p>
                </div>
                
                <?php
                // Query para obter a última notícia
                $latest_post_query = new WP_Query(array(
                    'posts_per_page' => 1,
                    'post_type' => 'post',
                    'order' => 'DESC',
                    'orderby' => 'date',
                ));

                // Query para obter as três notícias anteriores
                $previous_posts_query = new WP_Query(array(
                    'posts_per_page' => 3,
                    'post_type' => 'post',
                    'post__not_in' => array($latest_post_query->posts[0]->ID),
                    'order' => 'DESC',
                    'orderby' => 'date',
                ));

                
                // Exibir a última notícia em destaque
                if ($latest_post_query->have_posts()) :
                    $latest_post = $latest_post_query->posts[0];
                    $featured_image_url = has_post_thumbnail($latest_post->ID) ? get_the_post_thumbnail_url($latest_post->ID, 'large') : 'https://institutoassistencialatitude.com/wp-content/uploads/2024/09/placeholder.png';
                    ?>
                    <div class="grid-md-7 mb-48">
                        <div class="colspan-4" style="background: url(<?php echo esc_url($featured_image_url); ?>) no-repeat center center / cover;">
                            <div class="flex-column w-100-p aspect-ratio-1x1"></div>
                        </div>
                        <div class="colspan-3 background-surface">
                            <div class="flex-column w-100-p h-100-p px-24 px-md-64 pt-24 pt-md-64">
                                <div class="flex-column flex-space-between w-100-p h-100-p">
                                    <div class="flex-column">
                                        <div class="fw-600 fs-12 flex-column flex-md-row gap-16">
                                            <div class="flex-row flex-align-center gap-8">
                                                <span class="yellow w-8 h-8 radius-full d-flex"></span>
                                                <span class="color-fg text-uppercase category"><?php echo get_the_category_list(', ', '', $latest_post->ID); ?></span>
                                            </div>
                                            <div class="flex-row flex-align-center gap-8 text-uppercase">
                                                <span class="yellow w-16 h-16 radius-full d-flex" style="background:url(<?php echo esc_url($section_7_clock); ?>) no-repeat center center / cover"></span>
                                                <?php echo get_the_date('', $latest_post->ID); ?>
                                            </div>
                                        </div>
                                        <h4 class="m-0 fw-600 fs-40 lh-40 mt-32 mb-16 line-clamp-3">
                                            <?php echo get_the_title($latest_post->ID); ?>
                                        </h4>
                                        <p class="fs-12 lh-20">
                                            <?php echo get_the_excerpt($latest_post->ID); ?>
                                        </p>
                                    </div>
                                    <div class="flex-column w-100-p">
                                        <div class="h-4 w-100-p disabled radius-full"></div>
                                        <div class=" w-100-p flex-right"><a class="d-flex p-24 text-uppercase color-fg fw-500" href="<?php echo get_permalink($latest_post->ID); ?>">Leia mais &nbsp;></a></div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                
                <?php
                // Exibir as três notícias anteriores em um grid
                if ($previous_posts_query->have_posts()) :
                    ?>
                    <div class="grid-md-3 gap-16 gap-md-8">
                        <?php
                            while ($previous_posts_query->have_posts()) : $previous_posts_query->the_post();
                            $featured_image_url = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'large') : 'https://institutoassistencialatitude.com/wp-content/uploads/2024/09/placeholder.png';
                        ?>
                            <div class="flex-column background-surface">
                                <div class="aspect-ratio-16x9 w-100-p" style="background: url(<?php echo esc_url($featured_image_url); ?>) no-repeat center center / cover;"></div>
                                <div class="flex-column w-100-p px-16 px-md-32 pt-16 pt-md-32">
                                    <div class="flex-column flex-space-between w-100-p h-100-p">
                                        <div class="flex-column">
                                            <div class="fw-600 fs-12 flex-column flex-md-row gap-16">
                                                <div class="flex-row flex-align-center gap-8">
                                                    <span class="yellow w-8 h-8 radius-full d-flex"></span>
                                                    <span class="color-fg text-uppercase category"><?php echo get_the_category_list(', '); ?></span>
                                                </div>
                                                <div class="flex-row flex-align-center gap-8 text-uppercase">
                                                    <span class="yellow w-16 h-16 radius-full d-flex" style="background:url(<?php echo esc_url($section_7_clock); ?>) no-repeat center center / cover"></span>
                                                    <?php echo get_the_date(); ?>
                                                </div>
                                            </div>
                                            <h4 class="m-0 fw-600 fs-20 lh-20 mt-32 mb-48"><?php the_title(); ?></h4>
                                        </div>
                                        
                                        <div class="flex-column w-100-p">
                                            <div class="h-4 w-100-p disabled radius-full"></div>
                                            <div class=" w-100-p flex-right">
                                                <a class="d-flex p-24 text-uppercase color-fg fw-500" href="<?php the_permalink(); ?>">Leia mais &nbsp;></a>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>

                <?php
                // Resetar a query
                wp_reset_postdata();
                ?>
                
            </div>
        </section>
        <!-- SECTION 8 -->
        <section class="py-64 background-bg">
            <div class="max-w-1200 mx-auto px-16 px-md-24 sponsors">
                <div class="text-center flex-column flex-align-center text-center px-16">
                    <div class="lightblue h-8 w-184"></div>
                    <h4 class="m-0 fw-700 fs-40 lh-40 mt-32 mb-16">Nossos Parceiros</h4>
                    <p class="fs-18 lh-30 fw-500 mt-0 mb-64">Conheça as empresas que já abraçam a nossa causa.</p>
                </div>
                
                <?php
                // Query para obter todos os patrocinadores
                $sponsors_query = new WP_Query(array(
                    'post_type' => 'sponsor',
                    'posts_per_page' => -1, // Todos os patrocinadores
                    'order' => 'ASC',
                    'orderby' => 'title',
                ));

                if ($sponsors_query->have_posts()) :
                    ?>
                    <div class="carousel" data-flickity='{ "wrapAround": true, "autoPlay": true, "freeScroll": true, "adaptiveHeight": true}'>
                        <?php while ($sponsors_query->have_posts()) : $sponsors_query->the_post(); ?>
                            <?php $background_color = get_post_meta(get_the_ID(), 'sponsor_color', true); ?>
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="carousel-cell radius-18" style="background-color: <?php echo esc_attr($background_color); ?>;">
                                    <div class="sponsor-thumbnail aspect-ratio-1x1 =" style="background: url(<?php the_post_thumbnail_url(); ?>) no-repeat center center / cover;">
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>

                <?php
                // Resetar a query
                wp_reset_postdata();
                ?>
                
                    
                    
                </div>
            </div>
            <div class="flex-center-center mt-64">
                <a href="https://institutoassistencialatitude.com/empresas-parceiras/" target="_blank" class="btn btn-styled lightblue btn-styled-solid-pill">Seja uma Empresa de Atitude</a>
            </div>
            
        </section>
        <!-- SECTION 9 -->
        <section class="py-64 yellow">
            <div class="max-w-1200 mx-auto px-16 px-md-24">
                <div class="text-center flex-column flex-align-center text-center px-16">
                    <div class="background-surface h-8 w-184"></div>
                    <h4 class="m-0 fw-700 fs-40 lh-40 mt-32 mb-16">Assine a nossa newsletter</h4>
                    <p class="fs-18 lh-30 fw-500 mt-0 mb-64">Inscreva-se para receber as nossas notícias diretamente no seu e-mail.</p>
                </div>
                
                <?php
                    echo do_shortcode('[contact-form-7 id="28ede1d" title="Newsletter"]');
                ?>
            </div>
        </section>
<?php
    get_footer();
?>