<?php
    get_header();
?>

<section class="flex-column background-surface color-white">
    <div class="w-100-p py-64 min-h-400" style="background-image: url('https://institutoassistencialatitude.com/wp-content/uploads/2024/09/placeholder.png');  background-size: cover; background-position-x: center; background-position-y: center; box-shadow: 0 200px 130px -100px var(--darkblue) inset">
        <div class="max-w-1200 mx-auto px-16 px-md-24">
            <div class="grid-md-12 pt-64 my-64">
                <div class="colspan-8">

                    <div class="d-flex flex-column max-w-600 text-shadow">
                        <span class="d-flex w-72 h-12 yellow radius-16 mb-16"></span>
                        <h4 class="m-0 fw-600 fs-20">Categoria</h4>
                        <div class="h-48 h-md-64"></div>
                        <h2 class="m-0 fs-28 lh-32 fs-md-40 lh-md-50">
                        <?php
                            if (is_category()) {
                                $category_title = single_cat_title('', false);
                                echo $category_title;
                            }
                        ?>
                        </h2>
                        
                        <p class="fw-500 fs-18 mb-36 max-w-500">
                            <!--
                                numero de posts da categoria post e tab.
                                Se quiser contar os posts publicados de outros é só adicionar o nome dos custom type posts, ex: slider, review...
                                 -->
                                 <?php
                                    if (is_category()) {
                                        $category_id = get_queried_object_id(); // Obtém o ID da categoria atual

                                        $args = array(
                                            'cat' => $category_id,
                                            'post_type' => array('post', 'tab'), // Tipos de post que você quer contar
                                            'posts_per_page' => -1, // Sem limite de número de posts
                                        );

                                        $custom_query = new WP_Query($args);

                                        // Contar os posts retornados pela query
                                        $post_count = $custom_query->found_posts;

                                        echo $post_count . ' posts';
                                    }
                                    ?>
                                    
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


<section class="py-64 background-bg comments min-h-600 gap-48">
    <div class="max-w-1200 w-100-p mx-auto">
        <div class="grid-md-3 gap-48">
            <div class="colspan-2">
                <!-- Content -->
                <div class="flex-column gap-48">
                    <!-- Post Item -->
                    <?php
                        if(have_posts()){
                            while(have_posts()){
                                
                                the_post();
                                get_template_part('template-parts/content', 'archive');
                                
                            }
                        }
                    ?>
                    <!-- End Post Item -->
                    <!-- Pagination -->
                    <?php
                        if(have_posts()){
                            the_post();
                            get_template_part('template-parts/content', 'pagination');
                        }
                    ?>
                    <!-- End Pagination -->
                </div>
                <!-- End Content -->
            </div>
            <div class="flex-column">
                <!-- Sidebar -->
                <div class="sidebar">
                    <?php
                        if(have_posts()){
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

<?php
    get_footer();
?>