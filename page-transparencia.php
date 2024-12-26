<?php
get_header();
?>
<!-- Assets -->
<?php 
    $placeholder_img = get_template_directory_uri() . '/images/placeholder.png';
?>

<!-- Conteúdo da página -->
<section class="flex-column background-surface color-white">
    <div class="w-100-p py-64 min-h-400"
        style="background-image: url(
                <?php
                $thumbnail_url = get_the_post_thumbnail_url($post->ID, 'full');
                if ($thumbnail_url) {
                    echo $thumbnail_url;
                } else {
                    echo esc_url($placeholder_img);
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
                        $no_title = get_post_meta(get_the_ID(), '_no_title_checkbox', true);
                        $alternative_title = get_post_meta(get_the_ID(), '_alternative_title', true);
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

<section class="flex-column background-surface">
    <div class="w-100-p py-64 min-h-400 darkblue-900">
        <div class="max-w-1200 mx-auto px-16 px-md-24 py-64 w-100-p">
            <div class="grid-md-2 gap-16">
                <?php
                $args = array(
                    'post_type' => 'transparencia',
                    'posts_per_page' => -1,
                    'orderby' => 'date',
                    'order' => 'DESC'
                );
                $transparencia_query = new WP_Query($args);

                if ($transparencia_query->have_posts()) :
                    while ($transparencia_query->have_posts()) : $transparencia_query->the_post();
                        $file_url = get_post_meta(get_the_ID(), 'transparencia_file_url', true);
                        ?>
                        <div class="flex-row w-100-p">
                            <div class="p-24 background-bg flex-column flex-center-center radius-left-16">
                                <span aria-hidden="true" class="fs-32 fw-600 icon-download"></span>
                                <pre><code>.pdf</code></pre>
                            </div>
                            <div class="p-24 background-surface flex-column gap-24 radius-right-16 w-100-p">
                                <p class="fs-12 m-0 line-clamp-3"><?php the_title(); ?></p>
                                <div class="flex-column flex-sm-row gap-16 color-white">
                                    <a class="btn btn-3d green shadow-green-900 btn-3d-pill text-center w-100-p"
                                        href="<?php echo esc_url($file_url); ?>" download target="_blank">Baixar</a>
                                    <a class="btn btn-3d lightblue shadow-lightblue-900 btn-3d-pill text-center w-100-p"
                                        href="<?php echo esc_url($file_url); ?>" target="_blank">Abrir</a>
                                </div>
                            </div>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p>Nenhum item encontrado.</p>';
                endif;
                ?>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
?>