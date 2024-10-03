jQuery(document).ready(function($) {
    var sectionCount = $('#dynamic-sections-container .section-group').length;

    // Função para ativar o sortable
    function enableSortable() {
        $('#dynamic-sections-container').sortable({
            update: function(event, ui) {
                // Atualiza os índices das sections após a ordenação
                $('#dynamic-sections-container .section-group').each(function(index) {
                    $(this).find('input, textarea, select').each(function() {
                        // Atualiza o nome dos campos com o novo índice
                        const name = $(this).attr('name');
                        if (name) {
                            const newName = name.replace(/\[\d+\]/, '[' + index + ']');
                            $(this).attr('name', newName);
                        }
                    });
                });
            }
        });
    }

    // Chama a função para ativar o sortable no carregamento
    enableSortable();

    // Botão para adicionar uma nova section
    $('#add-section-button').on('click', function() {
        var sectionTemplate = `
            <div class="section-group postbox" style="padding:8px; background:#2255331f">
                
                <h4 style="display: flex; align-items: center;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="9" cy="5" r="1"/><circle cx="15" cy="5" r="1"/><circle cx="9" cy="12" r="1"/><circle cx="15" cy="12" r="1"/><circle cx="9" cy="19" r="1"/><circle cx="15" cy="19" r="1"/>
                    </svg>
                    Section ${sectionCount + 1} (Nova) - *Lembre-se de atualizar sua publicação para salvar esta nova section.
                    <br>(i) Dica: Você ainda poderá ordenar suas sections depois de salvar
                </h4>
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
                    .section-table textarea {
                        resize: vertical;
                        min-height: 212px;
                    }
                    .section-table select {
                        width: 100%;
                        padding: 8px;
                    }
                    .section-table .action {
                        text-align: right;
                    }
                    .section-table .image-url {
                        margin-bottom: 8px;
                    }
                        
                    .color-example-transparent,.color-example-transparent:hover{background: transparent; padding:6px}
                    .color-example-darkblue,.color-example-darkblue:hover{background: #003755; padding:6px; color: #fff}
                    .color-example-lightblue,.color-example-lightblue:hover{background: #00aff5; padding:6px; color: #fff}
                    .color-example-yellow,.color-example-yellow:hover{background: #f5c31e; padding:6px; color: #000}
                    .color-example-tomato,.color-example-tomato:hover{background: #ff6847; padding:6px; color: #fff}
                    .color-example-guava,.color-example-guava:hover{background: #f4707c; padding:6px; color: #fff}
                    .color-example-green,.color-example-green:hover{background: #2ac56c; padding:6px; color: #fff}
                    .color-example-dark,.color-example-dark:hover{background: #2e2e2e; padding:6px; color: #fff}
                    .color-example-light,.color-example-light:hover{background: #f7f5f1; padding:6px; color: #000}
                    
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
                            <label for="title_section_${sectionCount}">Título:</label><br>
                            <input type="text" name="dynamic_sections[${sectionCount}][title]" value="" style="width: 100%;">
                        </td>
                        <td rowspan="3">
                            <label for="content_section_${sectionCount}">Conteúdo:</label><br>
                            <textarea name="dynamic_sections[${sectionCount}][content]" rows="8"></textarea>
                        </td>
                        <td>
                            <label for="cta_url_section_${sectionCount}">CTA URL:</label><br>
                            <input type="text" name="dynamic_sections[${sectionCount}][cta_url]" value="" style="width: 100%;">
                        </td>
                        <td>
                            <label for="background_color_section_${sectionCount}">Cor de fundo da section de conteúdo:</label><br>
                            <select name="dynamic_sections[${sectionCount}][background_color]" id="background_color_section_${sectionCount}" style="width: 100%;">
                                <option class="color-example-transparent" value="transparent">Nenhum</option>
                                <option class="color-example-darkblue" value="darkblue">Azul Escuro</option>
                                <option class="color-example-lightblue" value="lightblue">Azul Claro</option>
                                <option class="color-example-yellow" value="yellow">Amarelo</option>
                                <option class="color-example-tomato" value="tomato">Tomate</option>
                                <option class="color-example-guava" value="guava">Goiaba</option>
                                <option class="color-example-green" value="green">Verde</option>
                                <option class="color-example-dark" value="dark">Escuro</option>
                                <option class="color-example-light" value="light">Claro</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="underline_color_section_${sectionCount}">Cor do sublinhado no Título:</label><br>
                            <select name="dynamic_sections[${sectionCount}][underline_color]" id="underline_color_section_${sectionCount}" style="width: 100%;">
                                <option class="color-example-transparent" value="transparent">Nenhum</option>
                                <option class="color-example-darkblue" value="darkblue">Azul Escuro</option>
                                <option class="color-example-lightblue" value="lightblue">Azul Claro</option>
                                <option class="color-example-yellow" value="yellow">Amarelo</option>
                                <option class="color-example-tomato" value="tomato">Tomate</option>
                                <option class="color-example-guava" value="guava">Goiaba</option>
                                <option class="color-example-green" value="green">Verde</option>
                                <option class="color-example-dark" value="dark">Escuro</option>
                                <option class="color-example-light" value="light">Claro</option>
                            </select>
                        </td>
                        <td>
                            <label for="cta_label_section_${sectionCount}">CTA Label:</label><br>
                            <input type="text" name="dynamic_sections[${sectionCount}][cta_label]" value="" style="width: 100%;">
                        </td>
                        <td rowspan="2">
                            <label for="image_section_${sectionCount}">Imagem que aparecerá abaixo da section de conteúdo:</label><br>
                            <input type="text" name="dynamic_sections[${sectionCount}][image]" class="image-url" style="width: 100%;" />
                            <button type="button" class="upload-image-button button">Upload Image</button>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <label for="cta_color_section_${sectionCount}">Cor do botão CTA:</label><br>
                            <select name="dynamic_sections[${sectionCount}][cta_color]" id="cta_color_section_${sectionCount}" style="width: 100%;">
                                <option class="color-example-transparent" value="transparent">Nenhum</option>
                                <option class="color-example-darkblue" value="darkblue">Azul Escuro</option>
                                <option class="color-example-lightblue" value="lightblue">Azul Claro</option>
                                <option class="color-example-yellow" value="yellow">Amarelo</option>
                                <option class="color-example-tomato" value="tomato">Tomate</option>
                                <option class="color-example-guava" value="guava">Goiaba</option>
                                <option class="color-example-green" value="green">Verde</option>
                                <option class="color-example-dark" value="dark">Escuro</option>
                                <option class="color-example-light" value="light">Claro</option>
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
        `;
        $('#dynamic-sections-container').append(sectionTemplate);
        sectionCount++;
        enableSortable();  // Reativar o sortable quando uma nova section for adicionada
    });

    $('#dynamic-sections-container').on('click', '.remove-section-button', function() {
        $(this).closest('.section-group').remove();
        sectionCount--;
    });

    // Upload da imagem
    $('#dynamic-sections-container').on('click', '.upload-image-button', function(e) {
        e.preventDefault();
        var button = $(this);
        var customUploader = wp.media({
            title: 'Selecionar Imagem',
            button: {
                text: 'Usar esta imagem'
            },
            multiple: false
        }).on('select', function() {
            var attachment = customUploader.state().get('selection').first().toJSON();
            button.prev('.image-url').val(attachment.url);
        })
        .open();
    });
});
