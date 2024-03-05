<?php
$langs = [
    "de",
    "fr",
    "it"
];
$current_lang = pll_current_language();
if (($key = array_search($current_lang, $langs)) !== false) {
    unset($langs[$key]);
}
?>
<div class="efas-language-switcher">
    <?php foreach($langs as $lang): ?>
        <a class="efas-language-switcher__lang" href="<?= get_the_permalink(pll_get_post( get_the_id(), $lang )) ?>">
            <?= $lang ?>
        </a>
    <?php endforeach; ?>
    <span class="efas-language-switcher__curent-lang">
        <?= $current_lang ?>
    </span>
</div>