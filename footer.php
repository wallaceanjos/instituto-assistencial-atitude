<!-- Assets -->
<?php
$footer_logo = get_template_directory_uri() . '/images/logo.png';
$footer_social_fb = get_template_directory_uri() . '/images/social_fb.png';
$footer_social_insta = get_template_directory_uri() . '/images/social_insta.png';
$footer_social_yt = get_template_directory_uri() . '/images/social_yt.png';
$footer_social_in = get_template_directory_uri() . '/images/social_in.png';
?>
<!-- Assets -->
<!-- Newsletter -->
<?php
get_template_part('template-parts/content', 'whatsapp');
?>

<section class="py-64 darkblue">
    <div class="max-w-1200 mx-auto px-16 px-md-24">
        <div class="grid-md-3 mb-48">
            <div class="flex-column px-16 px-md-0">
                <div class="logo mb-64">
                    <a href="#">
                        <div class="w-144 h-64"
                            style="background:url('<?php echo $footer_logo; ?>')no-repeat center center / contain">
                        </div>
                    </a>
                </div>

                <p class="fw-600">Siga-nos:</p>
                <div class="flex-row gap-12  mb-64">
                    <a href="https://www.facebook.com/InstitutoAssistencialAtitude" target="_blank" class="w-44 h-44"
                        style="background:url('<?php echo $footer_social_fb; ?>')no-repeat center center / contain"></a>
                    <a href="https://www.instagram.com/institutoassistencialatitude/" target="_blank" class="w-44 h-44"
                        style="background:url('<?php echo $footer_social_insta; ?>')no-repeat center center / contain"></a>
                    <a href="https://www.youtube.com/channel/UCIDeEx-2ZMDzNAs718iSrkA" target="_blank" class="w-44 h-44"
                        style="background:url('<?php echo $footer_social_yt; ?>')no-repeat center center / contain"></a>
                    <a href="https://www.linkedin.com/company/instituto-assistencial-atitude/mycompany/" target="_blank"
                        class="w-44 h-44"
                        style="background:url('<?php echo $footer_social_in; ?>')no-repeat center center / contain"></a>
                </div>
                <p class="fw-600">
                    Instituto Assistencial Atitude
                </p>
                <p class="fw-600">
                    Rua Sylvio da Rocha Pollis, 751<br>
                    Barra da Tijuca, Rio de Janeiro - RJ,<br>
                    22793-395
                </p>
                <p class="fw-600">
                    +55 21 97212-7201
                </p>
            </div>
            <?php
            // wp_nav_menu(
            //     array(
            //         'theme_location' => 'footer-menu',
            //         'menu_class'     => 'footer-menu-class'
            //     )
            // );
            ?>
            <div class="colspan-2">
                <div class="flex-column fs-12 fw-600 px-16 px-md-0">
                    <div class="grid-md-4 gap-16">
                        <div class="flex-column">
                            <p><a href="/quem-somos" target="_self">QUEM SOMOS</a></p>
                            <p class="my-8"><a href="/quem-somos" target="_self">O Instituto</a></p>
                            <p class="my-8"><a href="/quem-somos" target="_self">Equipe</a></p>
                            <p class="my-8"><a href="/quem-somos" target="_self">Conselho</a></p>
                            <p class="my-8"><a href="/quem-somos" target="_self">Trabalhe Conosco</a></p>
                        </div>
                        <div class="flex-column">
                            <p><a href="/o-que-fazemos" target="_self">O QUE FAZEMOS</a></p>
                            <p class="my-8"><a href="/tabs/" target="_self">Como Impactamos</a></p>
                            <p class="my-8"><a href="/category/educacao-infantil/" target="_self">Educação Infantil</a>
                            </p>
                            <p class="my-8"><a href="/category/recuperacao-quimica/" target="_self">Recuperação
                                    Química</a></p>
                            <p class="my-8"><a href="/category/geracao-de-renda/" target="_self">Geração de Renda</a>
                            </p>
                            <p class="my-8"><a href="/category/socorro-emergencial/" target="_self">Socorro
                                    Emergencial</a></p>
                            <p class="my-8"><a href="/category/entrega-de-alimentos/" target="_self">Entrega de
                                    Alimentos</a></p>
                            <p class="my-8"><a href="/category/atendimentos/" target="_self">Atendimentos</a></p>
                            <p class="my-8"><a href="/category/acessibilidade/" target="_self">Acessibilidade</a></p>
                            <p class="my-8"><a href="/category/transformacao/" target="_self">TransformAcao</a></p>
                        </div>
                        <div class="flex-column">
                            <p><a href="/como-ajudar" target="_self">COMO AJUDAR</a></p>
                            <p class="my-8"><a href="/como-ajudar" target="_self">Apadrinhe uma criança</a></p>
                            <p class="my-8"><a href="/como-ajudar" target="_self">Programa Padrinho Empresa</a></p>
                            <p class="my-8"><a href="/como-ajudar" target="_self">Doação de Alimentos</a></p>
                            <p class="my-8"><a href="/como-ajudar" target="_self">Seja um voluntário</a></p>
                            <p class="my-8"><a href="/como-ajudar" target="_self">Outras formas de doar</a></p>
                        </div>
                        <div class="flex-column">
                            <p class="my-4"><a href="/transparencia" target="_self">TRANSPARÊNCIA</a></p>
                            <p class="my-4"><a href="/empresas-parceiras" target="_self">EMPRESAS PARCEIRAS</a></p>
                            <p class="my-4"><a href="https://www.atitudestore.com.br/" target="_blank">LOJA</a></p>
                            <p class="my-4"><a href="/contato" target="_self">CONTATO</a></p>
                            <p class="my-4"><a href="/blog" target="_self">BLOG</a></p>
                            <p class="my-4"><a href="/ouvidoria" target="_self">OUVIDORIA</a></p>
                            <p class="my-4"><a href="/politica-de-privacidade" target="_self">POLÍTICA DE
                                    PRIVACIDADE</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>


</main>


<script>
    document.getElementById('newsletterForm').addEventListener('submit', function (event) {
        event.preventDefault(); // Previne o envio padrão do formulário

        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const consent = document.getElementById('consent').checked;

        if (name && email && consent) {
            alert(`Obrigado por se inscrever, ${name}!`);
            // Aqui você pode adicionar lógica para enviar os dados via AJAX, se necessário
            this.reset(); // Limpa o formulário após o envio
        } else {
            alert('Por favor, preencha todos os campos e aceite os termos.');
        }
    });
</script>

<script>
    function isIphone() {
        const userAgent = navigator.userAgent || navigator.vendor || window.opera;

        // Verifica se o dispositivo é um iPhone
        if (/iPhone/.test(userAgent) && !/Android/.test(userAgent)) {
            return true;
        }

        return false;
    }

    // Adiciona a classe 'isIphone' ao body
    if (isIphone()) {
        document.body.classList.add('isIphone');
    }
</script>
<!-- JS -->
<?php
wp_footer();
?>
</body>

</html>