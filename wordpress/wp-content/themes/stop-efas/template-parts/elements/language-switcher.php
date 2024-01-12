<?php
$langs = [
    "de",
    "fr",
    "it"
];
?>
<div class="efas-language-switcher">
    <?php foreach($langs as $lang): ?>
        <a class="efas-language-switcher__lang" href="<?= get_the_permalink(pll_get_post( get_the_id(), $lang )) ?>">
            <?= $lang ?>
        </a>
    <?php endforeach; ?>
    <span class="material-symbols-outlined">
        language
    </span>
</div>