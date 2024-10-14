<?php
get_header();
?>

<!-- Post Meta -->
<?php
$thumbnail_url = get_the_post_thumbnail_url($post->ID, 'full');
$no_title = get_post_meta(get_the_ID(), '_no_title_checkbox', true);
$alternative_title = get_post_meta(get_the_ID(), '_alternative_title', true);
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

            <div class="flex-center-center">
                <div class="d-flex flex-column flex-center-center w-100-p max-w-600 min-h-600 text-shadow text-center">
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
                <!-- End Section Content -->

                <!-- Section Parallaxe -->
                <?php if ($image): ?>
                    <section class="flex-column background-surface">
                        <div class="w-100-p py-64 min-h-400 parallaxing" style="background-image: url(
                    <?php echo $image; ?>
                    )">
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