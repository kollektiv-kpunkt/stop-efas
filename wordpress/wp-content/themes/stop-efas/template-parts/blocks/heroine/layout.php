<?php
/**
 * Heroine Block
 *
 * @package WordPress
 * @subpackage stop-efas
 * @since 0.1
 */
?>

<div class="efas-heroine-wrapper bg-primary py-6">
    <div class="efas-heroine-inner px-6 max-w-[620px] mx-auto">
        <div class="efas-logo-canvas aspect-[620/415] ">
            <?php
            $elements = [
                "hammer",
                "hospital",
                "spark1",
                "spark2",
                "spark3",
                "no-de",
                "efas-de",
            ]
            ?>
            <?php foreach ($elements as $element) : ?>
                <img src="<?= get_template_directory_uri() ?>/assets/images/logo/<?= $element ?>.svg" alt="" id="<?= $element ?>">
            <?php endforeach; ?>
        </div>
    </div>

</div>