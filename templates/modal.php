<div class="tinymodal micromodal-slide" id="tm-<?= $atts['id'] ?>" aria-hidden="true">
    <div class="tinymodal__overlay" tabindex="-1" data-micromodal-close>
        <div class="tinymodal__container" role="dialog" aria-modal="true" aria-labelledby="tinymodal-<?= $atts['id'] ?>-title">
            <button class="tinymodal__close" aria-label="Close modal" data-micromodal-close></button>
            <main class="tinymodal__content" id="tinymodal-<?= $atts['id'] ?>-content">
                <?= $modal_content ?>
            </main>
        </div>
    </div>
</div>