<?php
/**
 * Share dialog block
 *
 * @package WordPress
 * @subpackage stop-efas
 * @since 0.1
 */
?>

<div class="efas-share-dialog <?= the_field("display_type") ?> <?= the_field("display_color") ?? "" ?> <?= the_field("display_text") ?? "" ?>">
    <div class="efas-share-dialog__wrapper">
        <div class="efas-share-dialog__outer">
            <div class="efas-share-dialog__inner text-center relative">
                <h2 class="is-style-boxed-red m-0"><span><?= __('Teile unser Referendum mit deinem Umfeld!', 'efas') ?></span></h2>
                <p class="text-lg mt-6"><?= __('Danke, dass du dein Umfeld auf unser Referendum aufmerksam machst!', 'efas') ?></p>
                <div class="wp-block-buttons efas-share-dialog__buttons flex flex-wrap justify-center mt-4 gap-2">
                    <div class="wp-block-button has-custom-font-size has-heading-font-family w-full sm:w-fit" id="whatsapp" style="font-size:1.13rem;text-transform:uppercase"><a class="wp-block-button__link w-full has-contrast-color has-contrast-3-background-color has-text-color has-background has-link-color wp-element-button"  style="border-radius:0px"><?= __('Auf WhatsApp teilen', 'efas') ?></a></div>
                    <div class="wp-block-button has-custom-font-size has-heading-font-family w-full sm:w-fit" id="telegram" style="font-size:1.13rem;text-transform:uppercase"><a class="wp-block-button__link w-full has-contrast-color has-contrast-3-background-color has-text-color has-background has-link-color wp-element-button" style="border-radius:0px"><?= __('Auf Telegram teilen', 'efas') ?></a></div>
                    <div class="wp-block-button has-custom-font-size has-heading-font-family w-full sm:w-fit" id="facebook" style="font-size:1.13rem;text-transform:uppercase"><a class="wp-block-button__link w-full has-contrast-color has-contrast-3-background-color has-text-color has-background has-link-color wp-element-button" style="border-radius:0px"><?= __('Auf Facebook teilen', 'efas') ?></a></div>
                    <div class="wp-block-button has-custom-font-size has-heading-font-family w-full sm:w-fit" id="twitter" style="font-size:1.13rem;text-transform:uppercase"><a class="wp-block-button__link w-full has-contrast-color has-contrast-3-background-color has-text-color has-background has-link-color wp-element-button" style="border-radius:0px"><?= __('Auf Twitter teilen', 'efas') ?></a></div>
                    <div class="wp-block-button has-custom-font-size has-heading-font-family w-full sm:w-fit" id="email" style="font-size:1.13rem;text-transform:uppercase"><a class="wp-block-button__link w-full has-contrast-color has-contrast-3-background-color has-text-color has-background has-link-color wp-element-button" style="border-radius:0px"><?= __('Per E-Mail teilen', 'efas') ?></a></div>
                </div>
                <div class="efas-share-dialog__close"><span class="material-symbols-outlined">close</span></div>
            </div>
        </div>
    </div>
    <script type="text/json">
        {
            "text" : "<?= urlencode(get_field("share_text")) ?>",
            "url" : "<?= urlencode(get_field("share_url")) ?>"
        }
    </script>
</div>