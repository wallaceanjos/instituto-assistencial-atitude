<!-- Post -->
<div class="blog-item flex-column gap-48 background-surface">

    <!-- Text -->
    <div class="flex-column flex-align-center px-16">
        <div class="lightblue h-8 w-184"></div>
        <h4 class="m-0 fw-700 fs-40 lh-40 mt-32 mb-16 text-center"><?php the_title(); ?></h4>
        <?php the_content(); ?>
    </div>
    <!-- End Text -->

    <!-- Donation -->
    <div class="darkblue flex-column flex-align-center p-24 radius-16 gap-24 text-center">
        <h4 class="m-0 fw-700 fs-40 lh-40 mt-32 mb-16">Faça sua doação</h4>
        <p>Contribua com o Instituto Assistencial Atitude e ajude a transformar vidas!
            <br>Acesse o link abaixo e faça sua doação:</p>
        <a class="btn btn-3d green shadow-green-900 btn-3d-round" href="https://institutoatitude.colabore.org/doeparaoinstituto/single_step" target="_blank">Doe agora</a>
    </div>
    <!-- End donation -->

    <!-- Comments -->
    <?php if (comments_open() || get_comments_number()) : ?>
        <div class="d-flex-column">
            <?php comments_template(); ?>
        </div>
    <?php endif; ?>
    <!-- End Comments -->
    
    <!-- Prev/Next Post -->
    <div class="d-flex flex-space-around">
        <?php $prev_post = get_previous_post(); ?>
        <?php if (!empty($prev_post)): ?>
            <a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>"
                class="btn btn-styled darkblue btn-styled-solid-rounded"><i
                    class="fa fa-angle-left"></i>&nbsp;<?php echo 'Prev post'; ?></a>
        <?php endif; ?>

        <?php $next_post = get_next_post(); ?>
        <?php if (!empty($next_post)): ?>
            <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>"
                class="btn btn-styled darkblue btn-styled-solid-rounded"><?php echo 'Next post'; ?>&nbsp;<i
                    class="fa fa-angle-right"></i></a>
        <?php endif; ?>
    </div>
    <!-- End Prev/Next Post -->
</div>
<!-- End Post -->
