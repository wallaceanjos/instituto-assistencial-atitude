<?php
    get_header();
?>
<h1>page.php</h1>

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