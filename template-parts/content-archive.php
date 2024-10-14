<div class="flex-column gap-16 background-surface p-24 radius-16">
    <style>
        .post-preview {
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 4px 0px var(--shadow-color);
        }
        .post-preview a .post-preview-img{
            transition: all 0.3s;
        }
        .post-preview a .post-preview-img:hover {
            filter: brightness(.9) sepia(1) hue-rotate(0deg) saturate(5) contrast(.8);
        }
    </style>
    <div class="post-preview shadow-lightblue">
        <a href="<?php the_permalink()?>">
            <?php
                if(has_post_thumbnail()) {
                $thumbnail_url = get_the_post_thumbnail_url();
                } else {
                    $thumbnail_url = 'https://institutoassistencialatitude.com/wp-content/uploads/2024/09/placeholder.png';
                }
            ?>
            <div class="flex-column w-100-p post-preview-img" style="background: url(
                <?php echo $thumbnail_url; ?>) no-repeat center center / cover; aspect-ratio:16/6"></div>
        </a>
    </div>

    <style>
        .post-prev-title a {
            color: var(--darkblue);
        }
        .post-prev-title a:hover {
            color: var(--lightblue);
        }
    </style>
    <div class="d-flex gap-8 post-prev-title font-alt">
        <div class="d-flex w-12 yellow radius-16"></div>
        <a class="m-0 fw-600 w-100-p fs-20 d-flex" href="<?php the_permalink()?>"><?php the_title()?></a>
    </div>

    <div class="post-prev-info fs-16 text-italic">
        <span>Por: <?php echo get_the_author_posts_link();?> | <?php echo get_the_date();?></span>
    </div>

    <style>
        .post-prev-text span p {
            margin-bottom:0;
        }
    </style>
    <div class="post-prev-text">
    <i><?php the_excerpt()?></i>
    </div>

    <div class="post-prev-more">
        <a href="<?php the_permalink()?>" class="btn btn-styled lightblue shadow-lightblue btn-styled-solid-rounded">Ver mais</a>
    </div>
    
</div>

