<?php
    get_header();
?>

<section class="flex-column background-surface color-white">
    <div class="w-100-p py-64 min-h-400" style="background: url('https://institutoassistencialatitude.com/wp-content/uploads/2024/09/placeholder.png') fixed no-repeat center center / cover; box-shadow: 0 200px 130px -100px var(--darkblue) inset">
        <div class="max-w-1200 mx-auto px-16 px-md-24">
            <div class="grid-md-12 pt-64 my-64">
                <div class="colspan-8">

                    <div class="d-flex flex-column max-w-600 text-shadow">
                        <span class="d-flex w-72 h-12 yellow radius-16 mb-16"></span>
                        <h4 class="m-0 fw-600 fs-20">Instituto Assistencial Atitude</h4>
                        <div class="h-48 h-md-64"></div>
                        <h2 class="m-0 fs-28 lh-32 fs-md-40 lh-md-50">
                            Nosso blog
                        </h2>
                        <p class="fw-500 fs-18 mb-36 max-w-500">
                            Sempre um novo conteúdo surgindo por aqui
                        </p>
                        
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


<section class="py-64 background-bg comments min-h-600 gap-48">
    <div class="max-w-1200 w-100-p mx-auto">
        <div class="grid-md-3 gap-48">
            <!-- Content -->
            <div class="colspan-2">
                
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
                
                
            </div>
            <!-- End Content -->
            
            <!-- Sidebar -->
            <div class="flex-column sidebar">
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
</section>


<?php
    get_footer();
?>