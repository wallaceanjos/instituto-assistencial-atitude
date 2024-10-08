<?php
    get_header();
?>
    <!-- Head Section -->
    <section class="small-section bg-dark">
        <div class="relative container align-left">
            
            <div class="row">
                
                <div class="col-md-8">
                    <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">
                        <?php
                            $tag_title = single_tag_title('', false);
                            echo $tag_title;
                        ?>
                    </h1>
                    <div class="hs-line-4 font-alt">
                        <?php echo get_the_date();?><span> | </span><?php comments_number();?>
                    </div>
                </div>
                
                <div class="col-md-4 mt-30">
                    <div class="mod-breadcrumbs font-alt align-right">
                        <?php get_breadcrumb(); ?>&nbsp;/&nbsp;<span><?php echo $tag_title;?></span>
                        <!-- <a href="#">Home</a>&nbsp;/&nbsp;<a href="#">Blog</a>&nbsp;/&nbsp;<span>Single</span> -->
                    </div>
                    
                </div>
            </div>
            
        </div>
    </section>
    <!-- End Head Section -->

    <!-- Section -->
    <section class="page-section">
        <div class="container relative">
            
            <div class="row">

                <!-- Content -->
                <div class="col-sm-8">

                    <?php
                        if(have_posts()){
                            while(have_posts()){
                                the_post();
                                get_template_part('template-parts/content', 'tag');
                                
                            }
                        }
                    ?>
                    

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

                <!-- Sidebar -->
                <div class="col-sm-4 col-md-3 col-md-offset-1 sidebar">
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
    <!-- End Section -->

<?php
    get_footer();
?>