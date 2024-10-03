<!-- CONTENT SECTION -->
<style>
    .content-wrapper p {
        font-size: 24px;
    }
    .content-wrapper h1 { padding:0 16px; font-size: 40px; line-height: 40px; margin:64px auto 32px;}
    .content-wrapper h1::before { content: ""; display: block; width: 184px; height: 8px; margin:0 auto 32px; background: var(--lightblue);}
    .content-wrapper h2 { padding:0 16px; font-size: 40px; margin:64px 0 32px;}
    .content-wrapper h3 { padding:0 16px; font-size: 32px}
    .content-wrapper h4 { padding:0 16px; font-size: 24px}
    .content-wrapper h5 { padding:0 16px; font-size: 14px}
    .content-wrapper h6 { padding:0 16px; font-size: 12px}
    .content-wrapper img { width: 100%; height: auto; border-radius: 16px;}
    .content-wrapper iframe {
        padding: 0;
        width: 100% !important;
        aspect-ratio: 16 / 9;
        height: auto !important;}
    .content-wrapper .wp-video { width: 100% !important; height: auto !important;}
</style>
<section class="flex-column background-surface">
    <div class="background-surface">
        <div class="max-w-900 mx-auto">
            <div class="content-wrapper flex-column">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</section>
<!-- /CONTENT SECTION -->