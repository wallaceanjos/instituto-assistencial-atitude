<?php
get_header();
?>



<!-- Content -->
<?php
$thumbnail_url = get_the_post_thumbnail_url($post->ID, 'full');
$alternative_title = get_post_meta(get_the_ID(), '_alternative_title', true);
?>
<!-- /Content -->

<section class="flex-column background-surface color-white">
    <div class="w-100-p py-64 min-h-400" style="background: url(
                <?php
                if ($thumbnail_url) {
                    echo $thumbnail_url;
                } else {
                    echo 'https://institutoassistencialatitude.com/wp-content/uploads/2024/09/placeholder.png';
                }
                ?>) fixed no-repeat center center / cover; box-shadow: 0 200px 130px -100px var(--darkblue) inset">
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
                            color: var(--lt-contrast);
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
    the_post();
    
    get_template_part('template-parts/content', 'page-content');
    ?>

    <?php
    $sections = get_post_meta(get_the_ID(), 'dynamic_sections', true);
    if (!empty($sections)) {
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
                                <p class="fs-18 lh-30 fw-500 mb-48 mx-auto max-w-800">
                                    <?php echo $content; ?>
                                </p>
                                <?php if ($cta_url && $cta_label): ?>
                                    <a class="btn btn-styled 
                                <?php if ($cta_color): ?>
                                    <?php echo $cta_color; ?>
                                <?php else: ?>
                                    lightblue
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
                <!-- End Section Content -->

                <!-- Section Parallaxe -->
                <?php if ($image): ?>
                    <section class="flex-column background-surface">
                        <div class="w-100-p py-64 min-h-400" style="background: url(
                    <?php echo $image; ?>
                    ) fixed no-repeat top center / cover;">
                        </div>
                    </section>
                <?php endif; ?>
                <!-- End Section Parallaxe -->
            </div>
            <!-- End Section -->
            <?php
        }
    }
    ?>
    


<?php endwhile; // Fim do Loop ?>

<?php
get_footer();
?>