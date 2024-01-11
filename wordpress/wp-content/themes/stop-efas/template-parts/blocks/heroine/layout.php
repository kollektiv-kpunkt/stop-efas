<?php
/**
 * Heroine Block
 *
 * @package WordPress
 * @subpackage stop-efas
 * @since 0.1
 */
if (!isset($_COOKIE["efas-heroine"])) {
    $heroineclass= " efas-heroine-loader";
    setcookie("efas-heroine", "true", time() + (86400 * 30), "/");
} else {
    $heroineclass = "";
}
?>

<div class="efas-heroine-wrapper bg-primary<?= $heroineclass ?>">
    <div class="efas-heroine-inner py-6 px-6 max-w-[620px] w-full mx-auto">
        <div class="efas-logo-canvas aspect-[620/415] ">
            <?php
            $elements = [
                "hammer",
                "hospital",
                "spark1",
                "spark2",
                "spark3",
                "no-" . substr( get_bloginfo ( 'language' ), 0, 2 ),
                "efas-" . substr( get_bloginfo ( 'language' ), 0, 2 ),
            ]
            ?>
            <?php foreach ($elements as $element) : ?>
                <img src="<?= get_template_directory_uri() ?>/assets/images/logo/<?= $element ?>.svg" alt="" id="<?= $element ?>">
            <?php endforeach; ?>
        </div>
    </div>

</div>

<script type="text/json">
{
  "hospital": {
    "width": "30.04193548%",
    "top": "38.71325301%",
    "left": "2.224193548%",
    "z-index": 2
  },
  "hammer": {
    "width": "45.64032258%",
    "top": "0%",
    "left": "13.38064516%",
    "z-index": 3
  },
  "spark1": {
    "width": "13.96451613%",
    "top": "39.37108434%",
    "left": "0%",
    "z-index": 1
  },
  "spark2": {
    "width": "8.538709677%",
    "top": "31.97349398%",
    "left": "5.425806452%",
    "z-index": 1
  },
  "spark3": {
    "width": "9.187096774%",
    "top": "39.1060241%",
    "left": "21.75%",
    "z-index": 1
  },
  "no-de": {
    "width": "54.89677419%",
    "top": "41.5373494%",
    "left": "43.42741935%",
    "z-index": 5
  },
  "efas-de": {
    "width": "53.99516129%",
    "top": "38.65301205%",
    "left": "46.00483871%",
    "z-index": 4
  },
  "no-fr": {
    "width": "52.03709677%",
    "top": "41.70361446%",
    "left": "46.12903226%",
    "z-index": 5
  },
  "efas-fr": {
    "width": "51.10483871%",
    "top": "38.79518072%",
    "left": "48.69677419%",
    "z-index": 4
  },
  "no-it": {
    "width": "53.88225806%",
    "top": "41.63614458%",
    "left": "44.51612903%",
    "z-index": 5
  },
  "efas-it": {
    "width": "52.95%",
    "top": "38.79518072%",
    "left": "47.08387097%",
    "z-index": 4
  }
}
</script>