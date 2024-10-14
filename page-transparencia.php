<?php
get_header();
?>


<!-- Content -->
<?php
$thumbnail_url = get_the_post_thumbnail_url($post->ID, 'full');
$no_title = get_post_meta(get_the_ID(), '_no_title_checkbox', true);
$alternative_title = get_post_meta(get_the_ID(), '_alternative_title', true);
?>
<!-- /Content -->
<!-- a thumbnail large -->

<!-- Home Section -->
<section class="flex-column background-surface color-white">
    <div class="w-100-p py-64 min-h-400"
        style="background-image: url(
                <?php
                if ($thumbnail_url) {
                    echo $thumbnail_url;
                } else {
                    echo 'https://institutoassistencialatitude.com/wp-content/uploads/2024/09/placeholder.png';
                }
                ?>); background-size: cover; background-position-x: center; background-position-y: center; box-shadow: 0 200px 130px -100px var(--darkblue) inset">
        <div class="max-w-1200 mx-auto px-16 px-md-24">
            <div class="grid-md-12 pt-64 my-64">
                <div class="colspan-8">

                    <div class="d-flex flex-column max-w-600 text-shadow">
                        <span class="d-flex w-72 h-12 yellow radius-16 mb-16"></span>
                        <h4 class="m-0 fw-600 fs-20">Instituto Assistencial Atitude</h4>
                        <div class="h-48 h-md-64"></div>
                        <?php
                        if (empty($no_title)) {
                            ?>
                            <h2 class="m-0 fs-28 lh-32 fs-md-40 lh-md-50">
                                <?php
                                if (!empty($alternative_title)) {
                                    echo esc_html($alternative_title);
                                } else {
                                    the_title();
                                }
                                ?>
                            </h2>
                        <?php } ?>
                        <p class="fw-500 fs-18 mb-36 max-w-500">
                            <?php echo get_the_date(); ?>
                            <span> | </span>
                            <?php echo get_post_type(); ?>
                        </p>
                        <!-- excerpt -->
                        <?php if (the_excerpt() != '') { ?>
                            <p class="fw-500 fs-18 mb-36 max-w-500">
                                <?php echo the_excerpt(); ?>
                            </p>
                        <?php } ?>
                    </div>

                </div>

                <div class="colspan-4">
                    <style>
                        .mod-breadcrumbs>a {
                            padding: 4px 16px;
                            background: var(--yellow);
                            color: var(--dark);
                            border-radius: 8px;
                        }
                    </style>
                    <div class="mod-breadcrumbs font-alt align-right">
                        <?php get_breadcrumb(); ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>


<?php
// Início do Loop WordPress
while (have_posts()):
    the_post(); ?>

    <?php
    $sections = get_post_meta(get_the_ID(), 'dynamic_sections', true);

    if (!empty($sections)) {
        $section_index = 0; // Inicializa o contador de seções

        foreach ($sections as $section) {
            // Obter valores da seção
            $title = esc_html($section['title']);
            $content = wp_kses_post($section['content']);
            $cta_url = esc_url($section['cta_url']);
            $cta_label = esc_html($section['cta_label']);
            $image = esc_url($section['image']);
            $background_color = esc_attr($section['background_color']);
            $underline_color = esc_attr($section['underline_color']);
            $cta_color = esc_attr($section['cta_color']);
            ?>

            <!-- Section -->
            <div class="section-wrapper m-0 p-0 w-100-p background-surface">
                <!-- Section content -->
                <!-- Se tiver title, exibe a section de conteúdo -->
                <?php if ($title): ?>
                    <section class="flex-column 
                <?php if ($background_color): ?>
                    <?php echo $background_color; ?>
                <?php else: ?>
                    background-surface
                <?php endif; ?>
                ">
                        <div class="py-64">
                            <div class="max-w-1200 mx-auto px-16 px-md-24">
                                <div class="text-center flex-column flex-align-center text-center px-16">
                                    <div class="
                                <?php if ($underline_color): ?>
                                    <?php echo $underline_color; ?>
                                <?php else: ?>
                                    lightblue
                                <?php endif; ?>
                                h-8 w-184"></div>
                                    <h4 class="m-0 fw-700 fs-40 lh-40 mt-32 mb-16 max-w-700">
                                        <?php echo $title; ?>
                                    </h4>
                                    <!-- Se tiver content, exibe content -->
                                    <?php if ($content): ?>
                                        <p class="fs-18 lh-30 fw-500 mb-48 mx-auto max-w-800">
                                            <?php echo $content; ?>
                                        </p>
                                    <?php endif; ?>

                                    <!-- Se tiver cta_url e cta_label, exibe botão -->
                                    <?php if ($cta_url && $cta_label): ?>
                                        <a class="btn btn-styled 
                                        <?php if ($cta_color): ?>
                                            <?php echo $cta_color; ?> shadow-<?php echo $cta_color; ?>
                                        <?php else: ?>
                                            lightblue shadow-lightblue
                                        <?php endif; ?>
                                        btn-styled-solid-pill py-8--force px-24--force fs-16--force"
                                            href="<?php echo $cta_url; ?>">
                                            <?php echo $cta_label; ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php endif; ?>
                <!-- End Section Content -->

                <!-- Section Parallaxe -->
                <?php if ($image): ?>
                    <section class="flex-column background-surface">
                        <div class="w-100-p py-64 min-h-400 parallaxing" style="background-image: url(
                    <?php echo $image; ?>
                    );">
                        </div>
                    </section>
                <?php endif; ?>
                <!-- End Section Parallaxe -->
            </div>
            <!-- End Section -->

            <?php
            // Inserir o numero da section para abrir um espaço no loop de sections para conteúdo customizado
            // Verifica se estamos após a primeira section (inserir entre section 1 e 2)
            if ($section_index == 0) {
                ?>
                <!-- Conteúdo personalizado entre Section 1 e Section 2 -->
                <!-- CUSTOM SECTION -->
                <section class="flex-column background-surface">
                    <div class="w-100-p py-64 min-h-400"
                        style="background-image: url(https://institutoassistencialatitude.com/wp-content/uploads/2024/09/placeholder.png); background-size: cover; background-position-x: center; background-position-y: center;">

                        <div class="max-w-1200 mx-auto px-16 px-md-24">
                            <div class="grid-md-2 gap-16">


                                <div class="flex-row w-100-p">
                                    <div class="p-24 background-bg flex-column flex-center-center radius-left-16">
                                        <span aria-hidden="true" class="fs-32 fw-600 icon-download"></span>
                                        <pre><code>.pdf</code></pre>
                                    </div>
                                    <div class="p-24 background-surface flex-column gap-24 radius-right-16 w-100-p">
                                        <p class="fs-12 m-0 line-clamp-3">
                                            Ata-Instituto-Assistencial-Atitude-Eleicao-Diretoria-C.-Fiscal-Mandato-ate-05-08-25
                                        </p>
                                        <a class="btn btn-3d lightblue shadow-lightblue-900 btn-3d-pill text-center"
                                            href="https://institutoassistencialatitude.com/wp-content/uploads/2024/09/Ata-Instituto-Assistencial-Atitude-Eleicao-Diretoria-C.-Fiscal-Mandato-ate-05-08-25.pdf"
                                            download>Baixar</a>
                                    </div>

                                </div>


                                <div class="flex-row w-100-p">
                                    <div class="p-24 background-bg flex-column flex-center-center radius-left-16">
                                        <span aria-hidden="true" class="fs-32 fw-600 icon-download"></span>
                                        <pre><code>.pdf</code></pre>
                                    </div>
                                    <div class="p-24 background-surface flex-column gap-24 radius-right-16 w-100-p">
                                        <p class="fs-12 m-0 line-clamp-3">SITE-Diretoria-e-Conselho-Fiscal
                                        </p>
                                        <a class="btn btn-3d lightblue shadow-lightblue-900 btn-3d-pill text-center"
                                            href="https://institutoassistencialatitude.com/wp-content/uploads/2024/09/SITE-Diretoria-e-Conselho-Fiscal.pdf"
                                            download>Baixar</a>
                                    </div>
                                </div>



                                <div class="flex-row w-100-p">
                                    <div class="p-24 background-bg flex-column flex-center-center radius-left-16">
                                        <span aria-hidden="true" class="fs-32 fw-600 icon-download"></span>
                                        <pre><code>.pdf</code></pre>
                                    </div>
                                    <div class="p-24 background-surface flex-column gap-24 radius-right-16 w-100-p">
                                        <p class="fs-12 m-0 line-clamp-3">Balanco-Patrimonial-2023.pdf
                                        </p>
                                        <a class="btn btn-3d lightblue shadow-lightblue-900 btn-3d-pill text-center"
                                            href="https://institutoassistencialatitude.com/wp-content/uploads/2024/09/Balanco-Patrimonial-2023.pdf"
                                            download>Baixar</a>
                                    </div>
                                </div>



                                <div class="flex-row w-100-p">
                                    <div class="p-24 background-bg flex-column flex-center-center radius-left-16">
                                        <span aria-hidden="true" class="fs-32 fw-600 icon-download"></span>
                                        <pre><code>.pdf</code></pre>
                                    </div>
                                    <div class="p-24 background-surface flex-column gap-24 radius-right-16 w-100-p">
                                        <p class="fs-12 m-0 line-clamp-3">Balanco-Patrimonial-2022.pdf
                                        </p>
                                        <a class="btn btn-3d lightblue shadow-lightblue-900 btn-3d-pill text-center"
                                            href="https://institutoassistencialatitude.com/wp-content/uploads/2024/09/Balanco-Patrimonial-2022.pdf"
                                            download>Baixar</a>
                                    </div>
                                </div>



                                <div class="flex-row w-100-p">
                                    <div class="p-24 background-bg flex-column flex-center-center radius-left-16">
                                        <span aria-hidden="true" class="fs-32 fw-600 icon-download"></span>
                                        <pre><code>.pdf</code></pre>
                                    </div>
                                    <div class="p-24 background-surface flex-column gap-24 radius-right-16 w-100-p">
                                        <p class="fs-12 m-0 line-clamp-3">Balanco-Patrimonial-2021.pdf
                                        </p>
                                        <a class="btn btn-3d lightblue shadow-lightblue-900 btn-3d-pill text-center"
                                            href="https://institutoassistencialatitude.com/wp-content/uploads/2024/09/Balanco-Patrimonial-2021.pdf"
                                            download>Baixar</a>
                                    </div>
                                </div>



                                <div class="flex-row w-100-p">
                                    <div class="p-24 background-bg flex-column flex-center-center radius-left-16">
                                        <span aria-hidden="true" class="fs-32 fw-600 icon-download"></span>
                                        <pre><code>.pdf</code></pre>
                                    </div>
                                    <div class="p-24 background-surface flex-column gap-24 radius-right-16 w-100-p">
                                        <p class="fs-12 m-0 line-clamp-3">Balanco-Patrimonial-2020.pdf
                                        </p>
                                        <a class="btn btn-3d lightblue shadow-lightblue-900 btn-3d-pill text-center"
                                            href="https://institutoassistencialatitude.com/wp-content/uploads/2024/09/Balanco-Patrimonial-2020.pdf"
                                            download>Baixar</a>
                                    </div>
                                </div>



                                <div class="flex-row w-100-p">
                                    <div class="p-24 background-bg flex-column flex-center-center radius-left-16">
                                        <span aria-hidden="true" class="fs-32 fw-600 icon-download"></span>
                                        <pre><code>.pdf</code></pre>
                                    </div>
                                    <div class="p-24 background-surface flex-column gap-24 radius-right-16 w-100-p">
                                        <p class="fs-12 m-0 line-clamp-3">Balanco-Patrimonial-2019.pdf
                                        </p>
                                        <a class="btn btn-3d lightblue shadow-lightblue-900 btn-3d-pill text-center"
                                            href="https://institutoassistencialatitude.com/wp-content/uploads/2024/09/Balanco-Patrimonial-2019.pdf"
                                            download>Baixar</a>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </section>
                <!-- /CUSTOM SECTION -->
                <?php
            }

            $section_index++; // Incrementa o contador de seções
        }
    } else {
        // Exibir section padrão caso não existam seções
        ?>
        <!-- CUSTOM SECTION -->
        <section class="flex-column background-surface">
            <div class="w-100-p py-64 min-h-400"
                style="background-image: url(https://institutoassistencialatitude.com/wp-content/uploads/2024/09/placeholder.png); background-size: cover; background-position-x: center; background-position-y: center;">

                <div class="max-w-1200 mx-auto px-16 px-md-24">
                    <div class="grid-md-2 gap-16">


                        <div class="flex-row w-100-p">
                            <div class="p-24 background-bg flex-column flex-center-center radius-left-16">
                                <span aria-hidden="true" class="fs-32 fw-600 icon-download"></span>
                                <pre><code>.pdf</code></pre>
                            </div>
                            <div class="p-24 background-surface flex-column gap-24 radius-right-16 w-100-p">
                                <p class="fs-12 m-0 line-clamp-3">
                                    Ata-Instituto-Assistencial-Atitude-Eleicao-Diretoria-C.-Fiscal-Mandato-ate-05-08-25
                                </p>
                                <a class="btn btn-3d lightblue shadow-lightblue-900 btn-3d-pill text-center"
                                    href="https://institutoassistencialatitude.com/wp-content/uploads/2024/09/Ata-Instituto-Assistencial-Atitude-Eleicao-Diretoria-C.-Fiscal-Mandato-ate-05-08-25.pdf"
                                    download>Baixar</a>
                            </div>

                        </div>


                        <div class="flex-row w-100-p">
                            <div class="p-24 background-bg flex-column flex-center-center radius-left-16">
                                <span aria-hidden="true" class="fs-32 fw-600 icon-download"></span>
                                <pre><code>.pdf</code></pre>
                            </div>
                            <div class="p-24 background-surface flex-column gap-24 radius-right-16 w-100-p">
                                <p class="fs-12 m-0 line-clamp-3">SITE-Diretoria-e-Conselho-Fiscal
                                </p>
                                <a class="btn btn-3d lightblue shadow-lightblue-900 btn-3d-pill text-center"
                                    href="https://institutoassistencialatitude.com/wp-content/uploads/2024/09/SITE-Diretoria-e-Conselho-Fiscal.pdf"
                                    download>Baixar</a>
                            </div>
                        </div>



                        <div class="flex-row w-100-p">
                            <div class="p-24 background-bg flex-column flex-center-center radius-left-16">
                                <span aria-hidden="true" class="fs-32 fw-600 icon-download"></span>
                                <pre><code>.pdf</code></pre>
                            </div>
                            <div class="p-24 background-surface flex-column gap-24 radius-right-16 w-100-p">
                                <p class="fs-12 m-0 line-clamp-3">Balanco-Patrimonial-2023.pdf
                                </p>
                                <a class="btn btn-3d lightblue shadow-lightblue-900 btn-3d-pill text-center"
                                    href="https://institutoassistencialatitude.com/wp-content/uploads/2024/09/Balanco-Patrimonial-2023.pdf"
                                    download>Baixar</a>
                            </div>
                        </div>



                        <div class="flex-row w-100-p">
                            <div class="p-24 background-bg flex-column flex-center-center radius-left-16">
                                <span aria-hidden="true" class="fs-32 fw-600 icon-download"></span>
                                <pre><code>.pdf</code></pre>
                            </div>
                            <div class="p-24 background-surface flex-column gap-24 radius-right-16 w-100-p">
                                <p class="fs-12 m-0 line-clamp-3">Balanco-Patrimonial-2022.pdf
                                </p>
                                <a class="btn btn-3d lightblue shadow-lightblue-900 btn-3d-pill text-center"
                                    href="https://institutoassistencialatitude.com/wp-content/uploads/2024/09/Balanco-Patrimonial-2022.pdf"
                                    download>Baixar</a>
                            </div>
                        </div>



                        <div class="flex-row w-100-p">
                            <div class="p-24 background-bg flex-column flex-center-center radius-left-16">
                                <span aria-hidden="true" class="fs-32 fw-600 icon-download"></span>
                                <pre><code>.pdf</code></pre>
                            </div>
                            <div class="p-24 background-surface flex-column gap-24 radius-right-16 w-100-p">
                                <p class="fs-12 m-0 line-clamp-3">Balanco-Patrimonial-2021.pdf
                                </p>
                                <a class="btn btn-3d lightblue shadow-lightblue-900 btn-3d-pill text-center"
                                    href="https://institutoassistencialatitude.com/wp-content/uploads/2024/09/Balanco-Patrimonial-2021.pdf"
                                    download>Baixar</a>
                            </div>
                        </div>



                        <div class="flex-row w-100-p">
                            <div class="p-24 background-bg flex-column flex-center-center radius-left-16">
                                <span aria-hidden="true" class="fs-32 fw-600 icon-download"></span>
                                <pre><code>.pdf</code></pre>
                            </div>
                            <div class="p-24 background-surface flex-column gap-24 radius-right-16 w-100-p">
                                <p class="fs-12 m-0 line-clamp-3">Balanco-Patrimonial-2020.pdf
                                </p>
                                <a class="btn btn-3d lightblue shadow-lightblue-900 btn-3d-pill text-center"
                                    href="https://institutoassistencialatitude.com/wp-content/uploads/2024/09/Balanco-Patrimonial-2020.pdf"
                                    download>Baixar</a>
                            </div>
                        </div>



                        <div class="flex-row w-100-p">
                            <div class="p-24 background-bg flex-column flex-center-center radius-left-16">
                                <span aria-hidden="true" class="fs-32 fw-600 icon-download"></span>
                                <pre><code>.pdf</code></pre>
                            </div>
                            <div class="p-24 background-surface flex-column gap-24 radius-right-16 w-100-p">
                                <p class="fs-12 m-0 line-clamp-3">Balanco-Patrimonial-2019.pdf
                                </p>
                                <a class="btn btn-3d lightblue shadow-lightblue-900 btn-3d-pill text-center"
                                    href="https://institutoassistencialatitude.com/wp-content/uploads/2024/09/Balanco-Patrimonial-2019.pdf"
                                    download>Baixar</a>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </section>
        <!-- /CUSTOM SECTION -->
        <?php
    }
    ?>

<?php endwhile; // Fim do Loop ?>


<?php
get_footer();
?>