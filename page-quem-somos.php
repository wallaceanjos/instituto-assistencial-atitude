<?php
/* Template Name: Modelo - Quem somos */
get_header();
?>

<!-- Post Meta -->
<?php
$thumbnail_url = get_the_post_thumbnail_url($post->ID, 'full');
$no_title = get_post_meta(get_the_ID(), '_no_title_checkbox', true);
$alternative_title = get_post_meta(get_the_ID(), '_alternative_title', true);
$mission_title_1 = get_post_meta(get_the_ID(), 'mission_title_1', true);
$mission_content_1 = get_post_meta(get_the_ID(), 'mission_content_1', true);
$vision_title_2 = get_post_meta(get_the_ID(), 'vision_title_2', true);
$vision_content_2 = get_post_meta(get_the_ID(), 'vision_content_2', true);
$values_title_3 = get_post_meta(get_the_ID(), 'values_title_3', true);
$values_content_3 = get_post_meta(get_the_ID(), 'values_content_3', true);
?>
<!-- /Post Meta -->

<!-- Home Section -->
<section class="flex-column background-surface color-white">
    <div class="w-100-p py-64 min-h-400" style="background-image: url(
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
                        <?php if (the_excerpt() != ''){ ?>
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
while (have_posts()) : the_post();

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
            <?php if ($title) : ?>
                <section class="flex-column 
                <?php if ($background_color) : ?>
                    <?php echo $background_color; ?>
                <?php else : ?>
                    background-surface
                <?php endif; ?>
                ">
                    <div class="py-64">
                        <div class="max-w-1200 mx-auto px-16 px-md-24">
                            <div class="text-center flex-column flex-align-center text-center px-16">
                                <div class="
                                <?php if ($underline_color) : ?>
                                    <?php echo $underline_color; ?>
                                <?php else : ?>
                                    lightblue
                                <?php endif; ?>
                                h-8 w-184"></div>
                                <h4 class="m-0 fw-700 fs-40 lh-40 mt-32 mb-16 max-w-700">
                                    <?php echo $title; ?>
                                </h4>
                                <!-- Se tiver content, exibe content -->
                                <?php if ($content) : ?>
                                    <p class="fs-18 lh-30 fw-500 mb-48 mx-auto max-w-800">
                                        <?php echo $content; ?>
                                    </p>
                                <?php endif; ?>
                                
                                <!-- Se tiver cta_url e cta_label, exibe botão -->
                                <?php if ($cta_url && $cta_label) : ?>
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
            <?php if ($image) : ?>
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

                <div class="py-64 darkblue">
                    <div class="max-w-1200 mx-auto px-16 px-md-24">
                        <div class="text-center flex-column flex-align-center text-center px-16">
                            
                            <div class="grid-md-4 gap-16">
                                <div class="flex-column flex-center-center">
                                    <div class="flex-column border-yellow color-white radius-left-24 p-24 h-100-p w-100-p b-2 border-style-dashed wow fadeInLeft" data-wow-delay="0.1s" data-wow-duration="1s">
                                        <span class="fs-52 mt-16  icon-compass"></span>
                                        <h4 class="m-0 fw-700 fs-40 lh-40 mt-32 mb-16">
                                            <?php echo $mission_title_1; ?>
                                        </h4>
                                        <p class="fs-16 lh-30 fw-500 mt-0 mb-64">
                                            <?php echo $mission_content_1; ?>
                                        </p>
                                    </div>
                                </div>
                                
                                <div class="flex-column flex-center-center">
                                    <div class="flex-column border-lightblue color-white p-24 h-100-p w-100-p b-2 border-style-dashed wow fadeInDown" data-wow-delay="0.5s" data-wow-duration="1s">
                                        <span class="fs-52 mt-16 icon-hotairballoon"></span>
                                        <h4 class="m-0 fw-700 fs-40 lh-40 mt-32 mb-16">
                                            <?php echo $vision_title_2; ?>
                                        </h4>
                                        <p class="fs-16 lh-30 fw-500 mt-0 mb-64">
                                            <?php echo $vision_content_2; ?>
                                        </p>
                                    </div>
                                </div>
                                
                                <div class="colspan-md-2">
                                    <div class="flex-column flex-center-center">
                                        <div class="flex-column border-white color-white radius-right-24 p-24 h-100-p w-100-p b-2 border-style-dashed wow fadeInRight" data-wow-delay="1s" data-wow-duration="1s">
                                            <span class="fs-52 mt-16 icon-anchor"></span>
                                            <h4 class="m-0 fw-700 fs-40 lh-40 mt-32 mb-16">
                                                <?php echo $values_title_3; ?>
                                            </h4>
                                            <p class="fs-20 lh-30 fw-500 mt-0 mb-64">
                                                <i><?php echo $values_content_3; ?></i>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                
                        </div>
                    </div>
                    
                </div>
            </section>
            <!-- /CUSTOM SECTION -->
            <?php
        }
        if ($section_index == 1) {
            get_template_part('template-parts/content', 'page-content');
        }
        $section_index++; // Incrementa o contador de seções
    }
} else {
    get_template_part('template-parts/content', 'page-content');
    // Exibir section padrão caso não existam seções
    ?>
    <!-- Section Default -->
    <!-- CUSTOM SECTION -->
    <section class="flex-column background-surface">

        <div class="py-64 darkblue">
            <div class="max-w-1200 mx-auto px-16 px-md-24">
                <div class="text-center flex-column flex-align-center text-center px-16">
                    
                    <div class="grid-md-4 gap-16">
                        
                        <div class="flex-column flex-center-center">
                            <div class="flex-column border-yellow color-white radius-left-24 p-24 h-100-p w-100-p b-2 border-style-dashed wow fadeInLeft" data-wow-delay="0.1s" data-wow-duration="1s">
                                <span class="fs-52 mt-16  icon-compass"></span>
                                <h4 class="m-0 fw-700 fs-40 lh-40 mt-32 mb-16">
                                    <?php echo $mission_title_1; ?>
                                </h4>
                                <p class="fs-16 lh-30 fw-500 mt-0 mb-64">
                                    <?php echo $mission_content_1; ?>
                                </p>
                            </div>
                        </div>
                        
                        <div class="flex-column flex-center-center">
                            <div class="flex-column border-lightblue color-white p-24 h-100-p w-100-p b-2 border-style-dashed wow fadeInDown" data-wow-delay="0.5s" data-wow-duration="1s">
                                <span class="fs-52 mt-16 icon-hotairballoon"></span>
                                <h4 class="m-0 fw-700 fs-40 lh-40 mt-32 mb-16">
                                    <?php echo $vision_title_2; ?>
                                    <p class="fs-16 lh-30 fw-500 mt-0 mb-64">
                                </h4>
                                    <?php echo $vision_content_2; ?>
                                </p>
                            </div>
                        </div>
                        
                        <div class="colspan-md-2">
                            <div class="flex-column flex-center-center">
                                <div class="flex-column border-white color-white radius-right-24 p-24 h-100-p w-100-p b-2 border-style-dashed wow fadeInRight" data-wow-delay="1s" data-wow-duration="1s">
                                    <span class="fs-52 mt-16 icon-anchor"></span>
                                    <h4 class="m-0 fw-700 fs-40 lh-40 mt-32 mb-16">
                                        <?php echo $values_title_3; ?>
                                    </h4>
                                    <p class="fs-20 lh-30 fw-500 mt-0 mb-64">
                                        <i><?php echo $values_content_3; ?></i>
                                    </p>
                                </div>
                            </div>
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