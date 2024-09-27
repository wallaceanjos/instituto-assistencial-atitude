<?php
get_header();
?>
<!-- Content -->
<?php
$thumbnail_url = get_the_post_thumbnail_url($post->ID, 'full');
?>
<!-- single.php - Section 1 -->
<section class="flex-column background-surface color-white">
    <div class="w-100-p py-64 min-h-400" style="background: url(
                <?php
                // se tiver imagem destacada, exibe a imagem destacada, senão exibe a imagem desse link https://placehold.co/1920x1080/003755/FFFFFF/png
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
                        <h4 class="m-0 fw-600 fs-20"><?php echo get_post_type(); ?></h4>
                        <div class="h-48 h-md-64"></div>
                        <h2 class="m-0 fs-28 lh-32 fs-md-40 lh-md-50">
                            <?php the_title(); ?>
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
<!--end single.php - Section 1 -->
<section class="flex-column flex-center-center background-surface-inverse py-64 gap-64">
    <h1>
        Alguns elementos para facilitar a criação de páginas
    </h1>
    <div class="max-w-1200 w-100-p mx-auto">
        <div class="grid-md-6 gap-24">
            <div class="flex-column radius-8 p-24 darkblue"><pre><code>.darkblue</code></pre></div>
            <div class="flex-column radius-8 p-24 lightblue"><pre><code>.lightblue</code></pre></div>
            <div class="flex-column radius-8 p-24 yellow"><pre><code>.yellow</code></pre></div>
            <div class="flex-column radius-8 p-24 tomato"><pre><code>.tomato</code></pre></div>
            <div class="flex-column radius-8 p-24 guava"><pre><code>.guava</code></pre></div>
            <div class="flex-column radius-8 p-24 green"><pre><code>.green</code></pre></div>
            
            <div class="flex-column radius-8 p-24 darkblue-50"><pre><code>.darkblue-50</code></pre></div>
            <div class="flex-column radius-8 p-24 lightblue-50"><pre><code>.lightblue-50</code></pre></div>
            <div class="flex-column radius-8 p-24 yellow-50"><pre><code>.yellow-50</code></pre></div>
            <div class="flex-column radius-8 p-24 tomato-50"><pre><code>.tomato-50</code></pre></div>
            <div class="flex-column radius-8 p-24 guava-50"><pre><code>.guava-50</code></pre></div>
            <div class="flex-column radius-8 p-24 green-50"><pre><code>.green-50</code></pre></div>
            
            <div class="flex-column radius-8 p-24 darkblue-900"><pre><code>.darkblue-900</code></pre></div>
            <div class="flex-column radius-8 p-24 lightblue-900"><pre><code>.lightblue-900</code></pre></div>
            <div class="flex-column radius-8 p-24 yellow-900"><pre><code>.yellow-900</code></pre></div>
            <div class="flex-column radius-8 p-24 tomato-900"><pre><code>.tomato-900</code></pre></div>
            <div class="flex-column radius-8 p-24 guava-900"><pre><code>.guava-900</code></pre></div>
            <div class="flex-column radius-8 p-24 green-900"><pre><code>.green-900</code></pre></div>
        </div>
    </div>
</section>

<!-- SECTION 5 -->
<section class="py-64 lightblue comments min-h-600 gap-48">
    <div class="max-w-1200 w-100-p mx-auto">
    
        <div class="text-center flex-column flex-align-center">
            <div class="yellow h-8 w-184"></div>
            <h4 class="m-0 fw-700 fs-40 lh-40 mt-32 mb-16">Heading</h4>
            <p class="fs-18 lh-30 fw-500 mt-0 mb-64">Subtitle or breif description for the section</p>
            <div class="flex-column flex-align-center w-100-p">
                <textarea name="" id="" readonly style="resize:none; color:#00ff00;" rows="10" class="fs-12--force w-100-p min-h-300 flex-center-center background-surface-inverse b-0 radius-16">
                    <section class="py-64 lightblue comments min-h-600 gap-48">
                        <div class="max-w-1200 w-100-p mx-auto">
                            <div class="text-center flex-column flex-align-center">
                                <div class="yellow h-8 w-184"></div>
                                <h4 class="m-0 fw-700 fs-40 lh-40 mt-32 mb-16 mb-64">Heading</h4>
                                <p class="fs-18 lh-30 fw-500 mt-0 mb-64">Subtitle or breif description for the section</p>
                            </div>
                        </div>
                    </section>
                </textarea>
            </div>
        </div>
        
        
    </div>
</section>
<section class="py-64 background-bg comments min-h-600 gap-48">
    <div class="max-w-1200 w-100-p mx-auto">
        <div class="text-center flex-column flex-align-center text-center px-16">
            <div class="lightblue h-8 w-184"></div>
            <h4 class="m-0 fw-700 fs-40 lh-40 mt-32 mb-16">Heading</h4>
            <p class="fs-18 lh-30 fw-500 mt-0 mb-64">Subtitle or breif description for the section</p>
            <div class="flex-column flex-align-center w-100-p">
                <textarea name="" id="" readonly style="resize:none; color:#00ff00;" rows="12" class="fs-12--force w-100-p min-h-300 flex-center-center background-surface-inverse b-0 radius-16">
                    <section class="py-64 background-bg comments min-h-600 gap-48">
                        <div class="max-w-1200 w-100-p mx-auto">
                            <div class="text-center flex-column flex-align-center">
                                <div class="lightblue h-8 w-184"></div>
                                <h4 class="m-0 fw-700 fs-40 lh-40 mt-32 mb-16 mb-64">Heading</h4>
                                <p class="fs-18 lh-30 fw-500 mt-0 mb-64">Subtitle or breif description for the section</p>
                            </div>
                        </div>
                    </section>
                </textarea>
            </div>
        </div>
    </div>
</section>

<!-- SECTION 9 -->
<section class="py-64 yellow comments min-h-600 gap-48">
    <div class="max-w-1200 w-100-p mx-auto">
        <div class="text-center flex-column flex-align-center text-center px-16">
            <div class="background-surface h-8 w-184"></div>
            <h4 class="m-0 fw-700 fs-40 lh-40 mt-32 mb-16">Heading</h4>
            <p class="fs-18 lh-30 fw-500 mt-0 mb-64">Subtitle or breif description for the section</p>
            <div class="flex-column flex-align-center w-100-p">
                <textarea name="" id="" readonly style="resize:none; color:#00ff00;" rows="10" class="fs-12--force w-100-p min-h-300 flex-center-center background-surface-inverse b-0 radius-16">
                    <section class="py-64 yellow comments min-h-600 gap-48">
                        <div class="max-w-1200 w-100-p mx-auto">
                            <div class="text-center flex-column flex-align-center">
                                <div class="background-surface h-8 w-184"></div>
                                <h4 class="m-0 fw-700 fs-40 lh-40 mt-32 mb-16 mb-64">Heading</h4>
                                <p class="fs-18 lh-30 fw-500 mt-0 mb-64">Subtitle or breif description for the section</p>
                            </div>
                        </div>
                    </section>
                </textarea>
            </div>
        </div>
    </div>
</section> 


<section class="flex-column background-surface color-white">
    <div class="w-100-p py-64 min-h-400" style="background: url('https://institutoassistencialatitude.com/wp-content/uploads/2024/09/placeholder.png') fixed no-repeat center center / cover; box-shadow: 0 200px 130px -100px var(--darkblue) inset">
        <div class="max-w-1200 mx-auto px-16 px-md-24">
            <div class="grid-md-12 pt-64 my-64">
                <div class="colspan-8">

                    <div class="d-flex flex-column max-w-600 text-shadow">
                        <span class="d-flex w-72 h-12 yellow radius-16 mb-16"></span>
                        <h4 class="m-0 fw-600 fs-20">suphead</h4>
                        <div class="h-48 h-md-64"></div>
                        <h2 class="m-0 fs-28 lh-32 fs-md-40 lh-md-50">
                            headline
                        </h2>
                        <p class="fw-500 fs-18 mb-36 max-w-500">
                            data | meta dados | categoria | comentarios (etc...)
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



<section class="flex-column flex-center-center tomato-50 py-64 gap-64">
    <h1>
        3D Buttons
    </h1>
    <div class="max-w-1200 w-100-p mx-auto">
        <div class="grid-md-2 gap-32">
            <div class="flex-column flex-center-center">
                <pre><code>btn btn-3d tomato shadow-tomato-900 btn-3d-up</code></pre>
                <button class="btn btn-3d tomato shadow-tomato-900 btn-3d-up">btn-3d-up</button>
            </div>
            <div class="flex-column flex-center-center">
                <pre><code>btn btn-3d tomato shadow-tomato-900 btn-3d-down</code></pre>
                <button class="btn btn-3d tomato shadow-tomato-900 btn-3d-down">btn-3d-down</button>
            </div>
            <div class="flex-column flex-center-center">
                <pre><code>btn btn-3d tomato shadow-tomato-900 btn-3d-pill</code></pre>
                <button class="btn btn-3d tomato shadow-tomato-900 btn-3d-pill">btn-3d-pill</button>
            </div>
            <div class="flex-column flex-center-center">
                <pre><code>btn btn-3d tomato shadow-tomato-900 btn-3d-round</code></pre>
                <button class="btn btn-3d tomato shadow-tomato-900 btn-3d-round">btn-3d-round</button>
            </div>
            <div class="flex-column flex-center-center">
                <pre><code>btn btn-3d tomato shadow-tomato-900 btn-3d-disc-up</code></pre>
                <button class="btn btn-3d tomato shadow-tomato-900 btn-3d-disc-up">
                <span class="fs-24 lh-24">♣</span></button>
            </div>
            <div class="flex-column flex-center-center">
                <pre><code>btn btn-3d tomato shadow-tomato-900 btn-3d-disc-down</code></pre>
                <button class="btn btn-3d tomato shadow-tomato-900 btn-3d-disc-down">
                <span class="fs-24 lh-24">☻</span>
                </button>
            </div>
        </div>
    </div>
</section>

<section class="flex-column flex-center-center yellow-50 py-64 gap-64">
    <h1>
        Flat Buttons
    </h1>
    <div class="max-w-1200 w-100-p mx-auto">
        <div class="grid-md-2 gap-32">
            <div class="flex-column flex-center-center">
                <pre><code>btn btn-flat btn-flat-icon-left yellow shadow-yellow-900 btn-icon-before</code></pre>
                <button class="btn btn-flat btn-flat-icon-left yellow shadow-yellow-900 btn-icon-before">btn-flat-icon-left</button>
            </div>
            
            <div class="flex-column flex-center-center">
                <pre><code>btn btn-flat btn-flat-icon-pipe yellow shadow-yellow-900 btn-icon-before</code></pre>
                <button class="btn btn-flat btn-flat-icon-pipe yellow shadow-yellow-900 btn-icon-before">btn-flat-icon-pipe</button>
            </div>
            
            <div class="colspan-2">
                <div class="flex-column flex-center-center">
                    <pre><code>btn btn-flat btn-flat-mark yellow shadow-yellow-900 btn-icon-before</code></pre>
                    <button class="btn btn-flat btn-flat-mark yellow shadow-yellow-900 btn-icon-before">btn-flat-mark</button>
                </div>
            </div>
            
            <div class="flex-column flex-center-center">
                <pre><code>btn btn-flat btn-flat-tag yellow shadow-yellow-900 btn-icon-before</code></pre>
                <button class="btn btn-flat btn-flat-tag yellow shadow-yellow-900 btn-icon-before">btn-flat-tag</button>
            </div>
            
            <div class="flex-column flex-center-center">
                <pre><code>btn btn-flat btn-flat-icon-right yellow shadow-yellow-900 btn-icon-before</code></pre>
                <button class="btn btn-flat btn-flat-icon-right yellow shadow-yellow-900 btn-icon-before">btn-flat-icon-right</button>
            </div>
        </div>
    </div>
</section>


<section class="flex-column flex-center-center green-50 py-64 gap-64">
    <h1>
        Outlined Buttons
    </h1>
    <div class="max-w-1200 w-100-p mx-auto">
        <div class="grid-md-2 gap-32">
            <div class="flex-column flex-center-center">
                <pre><code>btn btn-outlined green-900 btn-outlined-from-right btn-icon-before</code></pre>
                <button class="btn btn-outlined green-900 btn-outlined-from-right btn-icon-before">btn-outlined-from-right</button>
                
            </div>
            <div class="flex-column flex-center-center">
                <pre><code>btn btn-outlined green-900 btn-outlined-from-left btn-icon-before</code></pre>
                <button class="btn btn-outlined green-900 btn-outlined-from-left btn-icon-before">btn-outlined-from-left</button>
                
            </div>
            <div class="flex-column flex-center-center">
                <pre><code>btn btn-outlined green-900 btn-outlined-to-right btn-icon-before</code></pre>
                <button class="btn btn-outlined green-900 btn-outlined-to-right btn-icon-before">btn-outlined-to-right</button>
                
            </div>
            <div class="flex-column flex-center-center">
                <pre><code>btn btn-outlined green-900 btn-outlined-to-left btn-icon-before</code></pre>
                <button class="btn btn-outlined green-900 btn-outlined-to-left btn-icon-before">btn-outlined-to-left</button>
                
            </div>
        </div>
    </div>
</section>


<section class="flex-column flex-center-center guava-50 py-64 gap-64">
    <h1>
    Swipe Buttons
    </h1>
    <div class="max-w-1200 w-100-p mx-auto">
        <div class="grid-md-2 gap-32">
            <div class="flex-column flex-center-center">
                <pre><code>btn btn-swipe guava shadow-guava-900 btn-swipe-down btn-icon-before</code></pre>
                <button class="btn btn-swipe guava shadow-guava-900 btn-swipe-down btn-icon-before"><span>btn-swipe-down</span></button>
            </div>
            <div class="flex-column flex-center-center">
                <pre><code>btn btn-swipe guava shadow-guava-900 btn-swipe-side btn-icon-before</code></pre>
                <button class="btn btn-swipe guava shadow-guava-900 btn-swipe-side btn-icon-before"><span>btn-swipe-side</span></button>
    
            </div>
            
        </div>
    </div>
</section>

<section class="flex-column flex-center-center lightblue-50 py-64 gap-64">
    <h1>
        Styled Buttons
    </h1>
    <div class="max-w-1200 w-100-p mx-auto">
        <div class="grid-md-2 gap-32">
            <div class="flex-column flex-center-center">
                <pre><code>btn btn-styled lightblue btn-styled-solid</code></pre>
                <button class="btn btn-styled lightblue btn-styled-solid">solid</button>
            </div>
            
            <div class="flex-column flex-center-center">
                <pre><code>btn btn-styled lightblue btn-styled-dashed</code></pre>
                <button class="btn btn-styled lightblue btn-styled-dashed">dashed</button>
            </div>
       
            <div class="flex-column flex-center-center">
                <pre><code>btn btn-styled lightblue btn-styled-dotted</code></pre>
                <button class="btn btn-styled lightblue btn-styled-dotted">dotted</button>
            </div>
            
            <div class="flex-column flex-center-center">
                <pre><code>btn btn-styled lightblue btn-styled-double</code></pre>
                <button class="btn btn-styled lightblue btn-styled-double">double</button>
            </div>
        </div>
        
        <div class="lightblue-900 h-4 w-100-p my-24"></div>
        
        <div class="grid-md-2 gap-32">
            <div class="flex-column flex-center-center">
                <pre><code>btn btn-styled lightblue btn-styled-solid-rounded</code></pre>
                <button class="btn btn-styled lightblue btn-styled-solid-rounded">solid-rounded</button>
            </div>
            
            <div class="flex-column flex-center-center">
                <pre><code>btn btn-styled lightblue btn-styled-dashed-rounded</code></pre>
                <button class="btn btn-styled lightblue btn-styled-dashed-rounded">dashed-rounded</button>
            </div>
       
            <div class="flex-column flex-center-center">
                <pre><code>btn btn-styled lightblue btn-styled-dotted-rounded</code></pre>
                <button class="btn btn-styled lightblue btn-styled-dotted-rounded">dotted-rounded</button>
            </div>
            
            <div class="flex-column flex-center-center">
                <pre><code>btn btn-styled lightblue btn-styled-double-rounded</code></pre>
                <button class="btn btn-styled lightblue btn-styled-double-rounded">double-rounded</button>
            </div>
        </div>
        
        <div class="lightblue-900 h-4 w-100-p my-24"></div>
        
        <div class="grid-md-2 gap-32">
            <div class="flex-column flex-center-center">
                <pre><code>btn btn-styled lightblue btn-styled-solid-pill</code></pre>
                <button class="btn btn-styled lightblue btn-styled-solid-pill">solid-pill</button>
            </div>
            
            <div class="flex-column flex-center-center">
                <pre><code>btn btn-styled lightblue btn-styled-dashed-pill</code></pre>
                    <button class="btn btn-styled lightblue btn-styled-dashed-pill">dashed-pill</button>
            </div>
       
            <div class="flex-column flex-center-center">
                <pre><code>btn btn-styled lightblue btn-styled-dotted-pill</code></pre>
                    <button class="btn btn-styled lightblue btn-styled-dotted-pill">dotted-pill</button>
            </div>
            
            <div class="flex-column flex-center-center">
                <pre><code>btn btn-styled lightblue btn-styled-double-pill</code></pre>
                    <button class="btn btn-styled lightblue btn-styled-double-pill">double-pill</button>
            </div>
        </div>
    </div>
</section>

<section class="flex-column flex-center-center darkblue-900 py-64 gap-64">
    <h1>
        Icons
    </h1>
    <div class="max-w-1200 w-100-p mx-auto">
        <!-- Icon Classes -->
        <div class="grid-md-6 gap-48">
                        
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-mobile"></span>&nbsp;icon-mobile</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-laptop"></span>&nbsp;icon-laptop</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-desktop"></span>&nbsp;icon-desktop</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-tablet"></span>&nbsp;icon-tablet</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-phone"></span>&nbsp;icon-phone</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-document"></span>&nbsp;icon-document</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-documents"></span>&nbsp;icon-documents</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-search"></span>&nbsp;icon-search</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-clipboard"></span>&nbsp;icon-clipboard</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-newspaper"></span>&nbsp;icon-newspaper</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-notebook"></span>&nbsp;icon-notebook</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-book-open"></span>&nbsp;icon-book-open</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-browser"></span>&nbsp;icon-browser</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-calendar"></span>&nbsp;icon-calendar</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-presentation"></span>&nbsp;icon-presentation</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-picture"></span>&nbsp;icon-picture</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-pictures"></span>&nbsp;icon-pictures</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-video"></span>&nbsp;icon-video</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-camera"></span>&nbsp;icon-camera</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-printer"></span>&nbsp;icon-printer</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-toolbox"></span>&nbsp;icon-toolbox</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-briefcase"></span>&nbsp;icon-briefcase</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-wallet"></span>&nbsp;icon-wallet</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-gift"></span>&nbsp;icon-gift</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-bargraph"></span>&nbsp;icon-bargraph</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-grid"></span>&nbsp;icon-grid</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-expand"></span>&nbsp;icon-expand</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-focus"></span>&nbsp;icon-focus</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-edit"></span>&nbsp;icon-edit</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-adjustments"></span>&nbsp;icon-adjustments</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-ribbon"></span>&nbsp;icon-ribbon</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-hourglass"></span>&nbsp;icon-hourglass</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-lock"></span>&nbsp;icon-lock</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-megaphone"></span>&nbsp;icon-megaphone</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-shield"></span>&nbsp;icon-shield</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-trophy"></span>&nbsp;icon-trophy</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-flag"></span>&nbsp;icon-flag</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-map"></span>&nbsp;icon-map</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-puzzle"></span>&nbsp;icon-puzzle</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-basket"></span>&nbsp;icon-basket</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-envelope"></span>&nbsp;icon-envelope</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-streetsign"></span>&nbsp;icon-streetsign</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-telescope"></span>&nbsp;icon-telescope</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-gears"></span>&nbsp;icon-gears</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-key"></span>&nbsp;icon-key</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-paperclip"></span>&nbsp;icon-paperclip</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-attachment"></span>&nbsp;icon-attachment</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-pricetags"></span>&nbsp;icon-pricetags</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-lightbulb"></span>&nbsp;icon-lightbulb</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-layers"></span>&nbsp;icon-layers</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-pencil"></span>&nbsp;icon-pencil</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-tools"></span>&nbsp;icon-tools</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-tools-2"></span>&nbsp;icon-tools-2</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-scissors"></span>&nbsp;icon-scissors</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-paintbrush"></span>&nbsp;icon-paintbrush</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-magnifying-glass"></span>&nbsp;icon-magnifying-glass</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-circle-compass"></span>&nbsp;icon-circle-compass</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-linegraph"></span>&nbsp;icon-linegraph</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-mic"></span>&nbsp;icon-mic</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-strategy"></span>&nbsp;icon-strategy</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-beaker"></span>&nbsp;icon-beaker</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-caution"></span>&nbsp;icon-caution</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-recycle"></span>&nbsp;icon-recycle</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-anchor"></span>&nbsp;icon-anchor</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-profile-male"></span>&nbsp;icon-profile-male</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-profile-female"></span>&nbsp;icon-profile-female</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-bike"></span>&nbsp;icon-bike</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-wine"></span>&nbsp;icon-wine</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-hotairballoon"></span>&nbsp;icon-hotairballoon</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-globe"></span>&nbsp;icon-globe</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-genius"></span>&nbsp;icon-genius</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-map-pin"></span>&nbsp;icon-map-pin</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-dial"></span>&nbsp;icon-dial</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-chat"></span>&nbsp;icon-chat</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-heart"></span>&nbsp;icon-heart</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-cloud"></span>&nbsp;icon-cloud</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-upload"></span>&nbsp;icon-upload</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-download"></span>&nbsp;icon-download</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-target"></span>&nbsp;icon-target</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-hazardous"></span>&nbsp;icon-hazardous</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-piechart"></span>&nbsp;icon-piechart</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-speedometer"></span>&nbsp;icon-speedometer</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-global"></span>&nbsp;icon-global</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-compass"></span>&nbsp;icon-compass</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-lifesaver"></span>&nbsp;icon-lifesaver</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-clock"></span>&nbsp;icon-clock</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-aperture"></span>&nbsp;icon-aperture</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-quote"></span>&nbsp;icon-quote</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-scope"></span>&nbsp;icon-scope</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-alarmclock"></span>&nbsp;icon-alarmclock</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-refresh"></span>&nbsp;icon-refresh</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-happy"></span>&nbsp;icon-happy</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-sad"></span>&nbsp;icon-sad</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-facebook"></span>&nbsp;icon-facebook</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-twitter"></span>&nbsp;icon-twitter</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-googleplus"></span>&nbsp;icon-googleplus</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-rss"></span>&nbsp;icon-rss</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-tumblr"></span>&nbsp;icon-tumblr</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-linkedin"></span>&nbsp;icon-linkedin</span>
            <span class="flex-center-center flex-column gap-16"><span aria-hidden="true" class="fs-32 fw-600 icon-dribbble"></span>&nbsp;icon-dribbble</span>
                
        </div>
        <!-- End Icon Classes-->
    </div>
</section>



<?php
get_footer();
?>