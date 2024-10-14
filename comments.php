<!-- Comments -->
<div class="mb-80 mb-xs-40">

    <?php
    if (!have_comments() && comments_open()) {
        echo '<h4 class="blog-page-title font-alt">Seja o primeiro a comentar.</h4>';
    }
    ?>

<?php if (have_comments() && comments_open()): ?>
        <?php echo '<h4 class="blog-page-title font-alt"><small class="number">' . get_comments_number() . '</small> comentários</h4>'; ?>
        <ul class="media-list text comment-list clearlist">
            <?php
            wp_list_comments(array(
                'style' => 'ul',
                'short_ping' => true,
                'avatar_size' => 50,
                'callback' => function ($comment, $args, $depth) {
                    $GLOBALS['comment'] = $comment; ?>

                <!-- Comment Item -->
                <li class="media comment-item" <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">

                    <a class="pull-left" href="#">
                        <?php echo get_avatar($comment, $args['avatar_size'], '', '', array('class' => 'media-object comment-avatar')); ?>
                    </a>

                    <div class="media-body">

                        <div class="comment-item-data">
                            <div class="comment-author">
                                <a href="#"><?php comment_author(); ?></a>
                            </div>
                            <?php printf(__('%1$s at %2$s'), get_comment_date(), get_comment_time()); ?><span
                                class="separator">&mdash;</span>
                            <?php
                                if (current_user_can('manage_options')) {
                                    echo '<i class="fa fa-edit"></i>';
                                    edit_comment_link(__(' Editar', 'textdomain'), '', '');
                                    echo '<span class="separator">&mdash;</span>';
                                }
                                ?>
                            <i
                                class="fa fa-comment"></i><?php comment_reply_link(array_merge($args, array('reply_text' => __(' Responder'), 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>

                        </div>
                        <?php comment_text(); ?>
                    </div>

                </li>
                <!-- End Comment Item -->
                <?php
                }
            ));
            ?>
        </ul>
        <?php
    endif;
    ?>


</div>
<!-- End Comments -->
<?php if (comments_open()): ?>

    <!-- Add Comment -->
    <div class="mb-80 mb-xs-40">

        <h4 class="blog-page-title font-alt">
            <?php comment_form_title(__('Escreva aqui seu comentário', 'textdomain'), __('Deixe uma resposta para %s', 'textdomain')); ?>
        </h4>

        <!-- Form -->
        <form method="post" action="<?php echo esc_url(get_option('siteurl')); ?>/wp-comments-post.php" id="form"
            role="form" class="form flex-column gap-16">

            <?php if (is_user_logged_in()): ?>
                <p class="logged-in-as">
                    <?php printf(__('Logado como %s. <a href="%s" title="Log out desta conta?">Fazer log out?</a>', 'textdomain'), $user_identity, wp_logout_url(apply_filters('the_permalink', get_permalink()))); ?>
                </p>
            <?php else: ?>
                <div class="flex-column flex-md-row gap-16">
                    <!-- Name -->
                    <input type="text" name="author" id="author" class="input-md form-control"
                        placeholder="<?php _e('Nome', 'textdomain'); ?> *" maxlength="100"
                        value="<?php echo esc_attr($comment_author); ?>" required>
                    <!-- Email -->
                    <input type="email" name="email" id="email" class="input-md form-control"
                        placeholder="<?php _e('Email', 'textdomain'); ?> *" maxlength="100"
                        value="<?php echo esc_attr($comment_author_email); ?>" required>
                </div>
                <div class="flex-column">
                    <!-- Website -->
                    <input type="url" name="url" id="url" class="input-md form-control"
                        placeholder="<?php _e('Website', 'textdomain'); ?>" maxlength="100"
                        value="<?php echo esc_attr($comment_author_url); ?>">
                </div>
            <?php endif; ?>


            <!-- Comment -->
            <textarea name="comment" id="comment" class="input-md form-control" rows="6"
                placeholder="<?php _e('Comentário', 'textdomain'); ?> *" maxlength="400"></textarea>

            <!-- Send Button -->
            <button name="submit" type="submit" id="submit"
                class="btn btn-styled yellow shadow-yellow btn-styled-solid-rounded"><?php _e('Enviar', 'textdomain'); ?></button>
            <?php comment_id_fields(); ?>
            <?php do_action('comment_form', $post->ID); ?>
        </form>
        <!-- End Form -->


    </div>
    <!-- End Add Comment -->
<?php endif; ?>