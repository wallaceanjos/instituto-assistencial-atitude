<?php
get_header();
?>


<!-- Content -->
<?php
$thumbnail_url = get_the_post_thumbnail_url($post->ID, 'full');
$home_section_content = get_post_meta(get_the_ID(), 'home_section_content', true);
$section_1_title = get_post_meta(get_the_ID(), 'section_1_title', true);
$section_1_subtitle = get_post_meta(get_the_ID(), 'section_1_subtitle', true);
$section_1_content = get_post_meta(get_the_ID(), 'section_1_content', true);
$section_2_title_1 = get_post_meta(get_the_ID(), 'section_2_title_1', true);
$section_2_title_2 = get_post_meta(get_the_ID(), 'section_2_title_2', true);
$section_2_title_3 = get_post_meta(get_the_ID(), 'section_2_title_3', true);
$section_2_content_1 = get_post_meta(get_the_ID(), 'section_2_content_1', true);
$section_2_content_2 = get_post_meta(get_the_ID(), 'section_2_content_2', true);
$section_2_content_3 = get_post_meta(get_the_ID(), 'section_2_content_3', true);
$section_3_title = get_post_meta(get_the_ID(), 'section_3_title', true);
?>
<!-- /Content -->
<!-- a thumbnail large -->

<!-- Home Section -->
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
                        <h2 class="m-0 fs-28 lh-32 fs-md-40 lh-md-50">
                            <?php the_title(); ?>
                        </h2>
                        <p class="fw-500 fs-18 mb-36 max-w-500">
                            <?php echo get_the_date(); ?>
                            <span> | </span>
                            <?php echo get_post_type(); ?>
                        </p>
                        <?php if ($home_section_content){ ?>
                        <p class="fw-500 fs-18 mb-36 max-w-500">
                            <?php echo $home_section_content; ?>
                        </p>
                        <?php } ?>
                        <!-- se tiver $home_section_content; exibe $home_section_content; senão exibe o conteúdo do post -->
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
                        <!-- <a href="#">Home</a>&nbsp;/&nbsp;<a href="#">Blog</a>&nbsp;/&nbsp;<span>Single</span> -->
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- SECTION 1 -->
<section class="pt-64 background-surface">
    <div class="max-w-1200 mx-auto px-16 px-md-24">
        <div class="text-center flex-column flex-align-center text-center px-16">
            <div class="lightblue h-8 w-184"></div>
            <h4 class="m-0 fw-700 fs-40 lh-40 mt-32 mb-16">
                <?php echo $section_1_title; ?>
            </h4>
            <p class="fs-18 lh-30 fw-500 mt-0 mb-64">
                <?php echo $section_1_subtitle; ?>
            </p>
            <blockquote class="fs-18 lh-30 fw-500 mt-0 mb-64">
                <?php echo $section_1_content; ?>
            </blockquote>
        </div>
    </div>
</section>

<!-- SECTION 1 -->
<section class="flex-column background-surface">
    <div class="w-100-p py-64 min-h-400" style="background: url(<?php echo esc_url(get_post_meta(get_the_ID(), '_section1_image', true)); ?>) fixed no-repeat top center / cover #dfdfdf;"></div>

    <div class="py-64 darkblue">
        <div class="max-w-1200 mx-auto px-16 px-md-24">
            <div class="text-center flex-column flex-align-center text-center px-16">
                
                <div class="grid-md-4 gap-16">
                    
                    <div class="flex-column flex-center-center">
                        <div class="flex-column border-yellow color-white radius-left-24 p-24 h-100-p w-100-p b-2 border-style-dashed wow fadeInLeft" data-wow-delay="0.1s" data-wow-duration="1s">
                            <span class="fs-52 mt-16  icon-compass"></span>
                            <h4 class="m-0 fw-700 fs-40 lh-40 mt-32 mb-16">
                                <?php echo $section_2_title_1; ?>
                            </h4>
                            <p class="fs-16 lh-30 fw-500 mt-0 mb-64">
                                <?php echo $section_2_content_1; ?>
                            </p>
                        </div>
                    </div>
                    
                    <div class="flex-column flex-center-center">
                        <div class="flex-column border-lightblue color-white p-24 h-100-p w-100-p b-2 border-style-dashed wow fadeInDown" data-wow-delay="0.5s" data-wow-duration="1s">
                            <span class="fs-52 mt-16 icon-hotairballoon"></span>
                            <h4 class="m-0 fw-700 fs-40 lh-40 mt-32 mb-16">
                                <?php echo $section_2_title_2; ?>
                            </h4>
                            <p class="fs-16 lh-30 fw-500 mt-0 mb-64">
                                <?php echo $section_2_content_2; ?>
                            </p>
                        </div>
                    </div>
                    
                    <div class="colspan-md-2">
                        <div class="flex-column flex-center-center">
                            <div class="flex-column border-white color-white radius-right-24 p-24 h-100-p w-100-p b-2 border-style-dashed wow fadeInRight" data-wow-delay="1s" data-wow-duration="1s">
                                <span class="fs-52 mt-16 icon-anchor"></span>
                                <h4 class="m-0 fw-700 fs-40 lh-40 mt-32 mb-16">
                                    <?php echo $section_2_title_3; ?>
                                </h4>
                                <p class="fs-20 lh-30 fw-500 mt-0 mb-64">
                                    <i><?php echo $section_2_content_3; ?></i>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
    
            </div>
        </div>
        
    </div>
</section>

<!-- SECTION 2 -->
<section class="flex-column background-surface">
    <div class="w-100-p py-64 min-h-400" style="background: url(<?php echo esc_url(get_post_meta(get_the_ID(), '_section2_image', true)); ?>) fixed no-repeat top center / cover;">
        
    </div>    
    <div class="pt-64 background-surface">
        <div class="max-w-1200 mx-auto px-16 px-md-24">
            <div class="text-center flex-column flex-align-center text-center px-16">
                <div class="lightblue h-8 w-184"></div>
                <h4 class="m-0 fw-700 fs-40 lh-40 mt-32 mb-16">
                    <?php echo $section_3_title; ?>
                </h4>
                <p class="fs-18 lh-30 fw-500 mt-0 mb-64 mx-auto max-w-800">
                    <?php the_content(); ?>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Donation -->
<section class="py-64 tomato">
    <div class="max-w-1200 mx-auto px-16 px-md-24">
        <div class="flex-column flex-align-center p-24 radius-16 gap-24 text-center">
            <h4 class="m-0 fw-700 fs-40 lh-40 mt-32 mb-16">Faça sua doação</h4>
            <p>Contribua com o Instituto Assistencial Atitude e ajude a transformar vidas!
                <br>Acesse o link abaixo e faça sua doação:</p>
            <a class="btn btn-3d green shadow-green-900 btn-3d-round" href="https://institutoatitude.colabore.org/doeparaoinstituto/single_step" target="_blank" class="btn btn-styled lightblue btn-styled-solid-rounded">Doe agora</a>
        </div>
    </div>
</section>
<!-- End donation -->

<?php
get_footer();
?>