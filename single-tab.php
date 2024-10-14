<?php
get_header();
?>
<!-- Content -->
<?php
$thumbnail_url = get_the_post_thumbnail_url($post->ID, 'full');
?>
<!-- single.php - Section 1 -->
<section class="flex-column background-surface color-white">
    <div class="w-100-p py-64 min-h-400" style="background-image: url(
                <?php
                // se tiver imagem destacada, exibe a imagem destacada, senão exibe a imagem desse link https://placehold.co/1920x1080/003755/FFFFFF/png
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
                        <h4 class="m-0 fw-600 fs-20"><?php the_title(); ?></h4>
                        <div class="h-48 h-md-64"></div>
                        <h2 class="m-0 fs-28 lh-32 fs-md-40 lh-md-50">
                            Como geramos Impacto
                        </h2>
                        <p class="fw-500 fs-18 mb-36 max-w-500">
                            <?php echo get_the_date(); ?><span> | </span><?php comments_number(); ?>
                        </p>
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
                        <!-- <a href="#">Home</a>&nbsp;/&nbsp;<a href="#">Blog</a>&nbsp;/&nbsp;<span>Single</span> -->
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!--end single.php - Section 1 -->

<!-- single.php - Section 2 -->
<section class="py-64 background-surface">
    <div class="max-w-1200 mx-auto px-16 px-md-24">

        <div class="grid-md-12 gap-24">

            <div class="colspan-8">
                <!-- Content -->
                <div class="flex-column">
                    <?php
                    if (have_posts()) {
                        while (have_posts()) {

                            the_post();
                            get_template_part('template-parts/content', 'article');

                        }
                    }
                    ?>
                </div>
                <!-- End Content -->
            </div>

            <div class="colspan-4">
                <!-- Sidebar -->
                <div class="flex-column sidebar">
                    <?php
                    if (have_posts()) {
                        the_post();
                        get_template_part('template-parts/content', 'sidebar');
                    }
                    ?>
                </div>
                <!-- End Sidebar -->
            </div>

        </div>

    </div>
</section>
<!-- End Section -->




<?php
get_footer();
?>