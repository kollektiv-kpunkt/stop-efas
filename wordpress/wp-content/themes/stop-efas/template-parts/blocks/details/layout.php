<?php
/**
 * Details toggle block
 *
 * @package WordPress
 * @subpackage stop-efas
 * @since 0.1
 */
?>

<div class="efas-details-toggle w-full">
    <div class="efas-details-toggle__title">
        <p><?= the_field("toggle_title")?></p>
        <div class="efas-details-toggle__icon w-4 h-4 bold">
            <span class="material-symbols-outlined">
                expand_more
            </span>
        </div>
    </div>
    <div class="efas-details-toggle__content max-h-0 overflow-hidden">
        <InnerBlocks />
    </div>
</div>

