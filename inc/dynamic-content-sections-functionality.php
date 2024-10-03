<?php
function add_dynamic_sections_metabox() {
    add_meta_box(
        'dynamic_sections', // ID
        'Additional Sections', // Título
        'render_dynamic_sections_metabox', // Função de callback
        'page', // Post Type
        'normal', // Contexto
        'high' // Prioridade
    );
}
add_action('add_meta_boxes', 'add_dynamic_sections_metabox');

function render_dynamic_sections_metabox($post) {
    wp_nonce_field('dynamic_sections_nonce', 'dynamic_sections_nonce_field');
    $sections = get_post_meta($post->ID, 'dynamic_sections', true);

    echo '<div id="dynamic-sections-container" class="sortable-sections">';
    
    if (!empty($sections)) {
        foreach ($sections as $index => $section) {
            render_section_fields($index, $section);
        }
    }

    echo '</div>';

    // Botão para adicionar nova seção
    echo '<button type="button" id="add-section-button" class="button">Adicionar Section</button>';
}

function render_section_fields($index, $section) {
    // Obtenha a URL da imagem, se disponível
    $image_url = !empty($section['image']) ? esc_url($section['image']) : '';

    // Obtenha as cores de fundo e subtítulo, ou defina como padrão
    $background_color = !empty($section['background_color']) ? $section['background_color'] : 'transparent';
    $underline_color = !empty($section['underline_color']) ? $section['underline_color'] : 'lightblue';
    $cta_color = !empty($section['cta_color']) ? $section['cta_color'] : 'lightblue';
    $position = !empty($section['position']) ? intval($section['position']) : $index + 1;

    ?>
    <div class="section-group" data-index="<?php echo $index; ?>">
        
        <h4 style="display: flex; align-items: center;">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="9" cy="5" r="1"/><circle cx="15" cy="5" r="1"/><circle cx="9" cy="12" r="1"/><circle cx="15" cy="12" r="1"/><circle cx="9" cy="19" r="1"/><circle cx="15" cy="19" r="1"/>
            </svg>
            Section - <?php echo esc_attr($section['title']); ?>
        </h4>
        <h4></h4>
        <style>
            .section-table {
                width: 100%;
                border-collapse: collapse;
            }
            .section-table th, .section-table td {
                padding: 8px;
                border: 1px solid #ddd;
                vertical-align: top;
            }
            .section-table th {
                background-color: #f9f9f9;
            }
            .section-table input[type="text"], .section-table textarea {
                width: 100%;
            }
            .section-table textarea{
                resize: vertical;
                min-height: 212px;
            }
            .section-table select {
                width: 100%;
                padding: 8px;
            }
            .section-table .action {
                text-align:right;
            }
            .section-table .image-url {
                margin-bottom: 8px;
            }
            
            .color-example-transparent{background: transparent;}
            .color-example-darkblue{background: #003755;  color: #fff}
            .color-example-lightblue{background: #00aff5;  color: #fff}
            .color-example-yellow{background: #f5c31e;  color: #000}
            .color-example-tomato{background: #ff6847;  color: #fff}
            .color-example-guava{background: #f4707c;  color: #fff}
            .color-example-green{background: #2ac56c;  color: #fff}
            .color-example-dark{background: #2e2e2e;  color: #fff}
            .color-example-light{background: #f7f5f1;  color: #000}
            
        </style>
        <table class="section-table">
            <tr>
                <th>Título</th>
                <th>Conteúdo</th>
                <th>Botões</th>
                <th>Background</th>
            </tr>
            <tr>
                <td>
                    <label for="title_section_<?php echo $index; ?>">Título:</label><br>
                    <input type="text" name="dynamic_sections[<?php echo $index; ?>][title]" value="<?php echo esc_attr($section['title']); ?>" style="width: 100%;">
                </td>
                <td rowspan="3">
                    <label for="content_section_<?php echo $index; ?>">Conteúdo:</label><br>
                    <textarea name="dynamic_sections[<?php echo $index; ?>][content]" rows="8"><?php echo esc_textarea($section['content']); ?></textarea>
                </td>
                <td>
                    <label for="cta_url_section_<?php echo $index; ?>">CTA URL:</label><br>
                    <input type="text" name="dynamic_sections[<?php echo $index; ?>][cta_url]" value="<?php echo esc_attr($section['cta_url']); ?>" style="width: 100%;">
                </td>
                <td>
                    <label for="background_color_section_<?php echo $index; ?>">Cor de fundo da section de conteúdo:</label><br>
                    <select name="dynamic_sections[<?php echo $index; ?>][background_color]" id="background_color_section_<?php echo $index; ?>" style="width: 100%;">
                        <option class="color-example-transparent" value="transparent" <?php selected($background_color, 'transparent'); ?>>Nenhum</option>
                        <option class="color-example-darkblue" value="darkblue" <?php selected($background_color, 'darkblue'); ?>>Azul Escuro</option>
                        <option class="color-example-lightblue" value="lightblue" <?php selected($background_color, 'lightblue'); ?>>Azul Claro</option>
                        <option class="color-example-yellow" value="yellow" <?php selected($background_color, 'yellow'); ?>>Amarelo</option>
                        <option class="color-example-tomato" value="tomato" <?php selected($background_color, 'tomato'); ?>>Tomate</option>
                        <option class="color-example-guava" value="guava" <?php selected($background_color, 'guava'); ?>>Goiaba</option>
                        <option class="color-example-green" value="green" <?php selected($background_color, 'green'); ?>>Verde</option>
                        <option class="color-example-dark" value="dark" <?php selected($background_color, 'dark'); ?>>Escuro</option>
                        <option class="color-example-light" value="light" <?php selected($background_color, 'light'); ?>>Claro</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="underline_color_section_<?php echo $index; ?>">Cor do sublinhado no Título:</label><br>
                    <select name="dynamic_sections[<?php echo $index; ?>][underline_color]" id="underline_color_section_<?php echo $index; ?>" style="width: 100%;">
                        <option class="color-example-transparent" value="transparent" <?php selected($underline_color, 'transparent'); ?>>Nenhum</option>
                        <option class="color-example-darkblue" value="darkblue" <?php selected($underline_color, 'darkblue'); ?>>Azul Escuro</option>
                        <option class="color-example-lightblue" value="lightblue" <?php selected($underline_color, 'lightblue'); ?>>Azul Claro</option>
                        <option class="color-example-yellow" value="yellow" <?php selected($underline_color, 'yellow'); ?>>Amarelo</option>
                        <option class="color-example-tomato" value="tomato" <?php selected($underline_color, 'tomato'); ?>>Tomate</option>
                        <option class="color-example-guava" value="guava" <?php selected($underline_color, 'guava'); ?>>Goiaba</option>
                        <option class="color-example-green" value="green" <?php selected($underline_color, 'green'); ?>>Verde</option>
                        <option class="color-example-dark" value="dark" <?php selected($underline_color, 'dark'); ?>>Escuro</option>
                        <option class="color-example-light" value="light" <?php selected($underline_color, 'light'); ?>>Claro</option>
                    </select>
                </td>
                <td>
                    <label for="cta_label_section_<?php echo $index; ?>">CTA Label:</label><br>
                    <input type="text" name="dynamic_sections[<?php echo $index; ?>][cta_label]" value="<?php echo esc_attr($section['cta_label']); ?>" style="width: 100%;">
                </td>
                <td rowspan="2">
                    <label for="image_section_<?php echo $index; ?>">Imagem que aparecerá abaixo da section de conteúdo:</label><br>
                    <input type="text" name="dynamic_sections[<?php echo $index; ?>][image]" value="<?php echo $image_url; ?>" class="image-url" style="width: 100%;" />
                    <button type="button" class="upload-image-button button">Upload Image</button>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <label for="cta_color_section_<?php echo $index; ?>">Cor do botão CTA:</label><br>
                    <select name="dynamic_sections[<?php echo $index; ?>][cta_color]" id="cta_color_section_<?php echo $index; ?>" style="width: 100%;">
                        <option class="color-example-transparent" value="transparent" <?php selected($cta_color, 'transparent'); ?>>Nenhum</option>
                        <option class="color-example-darkblue" value="darkblue" <?php selected($cta_color, 'darkblue'); ?>>Azul Escuro</option>
                        <option class="color-example-lightblue" value="lightblue" <?php selected($cta_color, 'lightblue'); ?>>Azul Claro</option>
                        <option class="color-example-yellow" value="yellow" <?php selected($cta_color, 'yellow'); ?>>Amarelo</option>
                        <option class="color-example-tomato" value="tomato" <?php selected($cta_color, 'tomato'); ?>>Tomate</option>
                        <option class="color-example-guava" value="guava" <?php selected($cta_color, 'guava'); ?>>Goiaba</option>
                        <option class="color-example-green" value="green" <?php selected($cta_color, 'green'); ?>>Verde</option>
                        <option class="color-example-dark" value="dark" <?php selected($cta_color, 'dark'); ?>>Escuro</option>
                        <option class="color-example-light" value="light" <?php selected($cta_color, 'light'); ?>>Claro</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="action" colspan="4">
                    <a type="button" class="remove-section-button button-link-delete" style="cursor:pointer;">Remover Section</a>
                </td>
            </tr>
            
        </table>
        <hr>
    </div>
    <?php
}



function save_dynamic_sections($post_id) {
    if (!isset($_POST['dynamic_sections_nonce_field']) || !wp_verify_nonce($_POST['dynamic_sections_nonce_field'], 'dynamic_sections_nonce')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['dynamic_sections'])) {
        $sections = array_map('sanitize_section_fields', $_POST['dynamic_sections']);
        update_post_meta($post_id, 'dynamic_sections', $sections);
    } else {
        delete_post_meta($post_id, 'dynamic_sections');
    }
}

function sanitize_section_fields($section) {
    return array(
        'title' => sanitize_text_field($section['title']),
        'content' => sanitize_textarea_field($section['content']),
        'cta_url' => esc_url_raw($section['cta_url']),
        'cta_label' => sanitize_text_field($section['cta_label']),
        'image' => esc_url_raw($section['image']), // Sanitiza a URL da imagem
        'background_color' => sanitize_text_field($section['background_color']),
        'underline_color' => sanitize_text_field($section['underline_color']),
        'cta_color' => sanitize_text_field($section['cta_color']),
    );
}

add_action('save_post', 'save_dynamic_sections');

function enqueue_custom_admin_scripts() {
    global $pagenow;
    if ($pagenow == 'post.php' || $pagenow == 'post-new.php') {
        wp_enqueue_media(); // Enqueue the media uploader
        wp_enqueue_script('dynamic-sections-js', get_template_directory_uri() . '/inc/js/dynamic-content-sections-functionality.js', array('jquery'), null, true);
    }
}
add_action('admin_enqueue_scripts', 'enqueue_custom_admin_scripts');

?>
