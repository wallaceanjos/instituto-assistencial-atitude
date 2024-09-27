<?php
/* Template Name: Image Parallaxe */
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
<section class="home-section parallax-2 color-white" data-background="<?php echo $thumbnail_url; ?>" id="home"
    style="background-size:cover">
    <div class="js-height-full">

        <!-- Hero Content -->
        <div class="home-content container h-100-p py-64 flex-center-center"
            style="box-shadow: 0 200px 130px -100px var(--darkblue) inset">
            <div class="d-flex flex-column max-w-1200 mx-auto px-16 px-md-24 w-100-p text-shadow">
                <div class="flex-column">
                    <div class="mod-breadcrumbs font-alt align-right">
                        <a href="https://institutoassistencialatitude.com/"
                        class="yellow py-4 px-8 radius-8 color-darkblue">Home</a>&nbsp;/&nbsp;<span
                        class="background-bg py-4 px-8 radius-8 color-darkblue"><?php the_title(); ?></span>
                    </div>
                </div>
                <span class="d-flex w-72 h-12 yellow radius-16 my-16"></span>
                <div class="flex-column flex-md-row flex-md-space-between gap-16">

                    <div class="flex-column max-w-600">
                        <h1 class="fs-48">
                            <?php the_title(); ?>
                        </h1>
                        <div class="fs-16 fw-600">
                            <?php echo $home_section_content; ?>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <!-- End Hero Content -->

    </div>
</section>
<!-- End Home Section -->

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
                        <div class="flex-column border-yellow color-white radius-left-24 p-24 h-100-p b-2 border-style-dashed wow fadeInLeft" data-wow-delay="0.1s" data-wow-duration="1s">
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
                        <div class="flex-column border-lightblue color-white p-24 h-100-p b-2 border-style-dashed wow fadeInDown" data-wow-delay="0.5s" data-wow-duration="1s">
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
                            <div class="flex-column border-white color-white radius-right-24 p-24 h-100-p b-2 border-style-dashed wow fadeInRight" data-wow-delay="1s" data-wow-duration="1s">
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



<?php
get_footer();
?>