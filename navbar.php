<?php

include "tableau.php";

function decode_arr($keyName, $array)
{
    if (empty($array) || !isset($array[$keyName]) || empty($array[$keyName])) {
        return [];
    }

    return json_decode($array[$keyName]);
}

// $categories = ["Dossiers", "Diaporama", "Produits", "Applis, Logiciels", "Technos"]
// $navbar_decode = ex: ["Technos", "Applis, Logiciels", "Diaporama"]
$navbar_decode = decode_arr("selectedSubjects", $_COOKIE);

$rss_icon = [
    "files" => '<i class="bi bi-newspaper fs-1"></i>',
    "diapo" => '<i class="bi bi-camera-video-fill fs-1"></i>',
    "product" => '<i class="bi bi-box-seam fs-1"></i>',
    "apps" => '<i class="bi bi-phone fs-1"></i>',
    "technos" => '<i class="bi bi-cpu-fill fs-1"></i>'
];

// var_dump($categories);

?>
<nav class="navbar fixed-bottom <?= !empty($_COOKIE) && isset($_COOKIE["theme"]) && $_COOKIE["theme"] == "dark" ? "navbar-dark bg-dark" : "navbar-light bg-light" ?>">
    <div class="container-fluid flex-nowrap">
        <a class="navbar-brand" href="./accueil.html"><img src="assets/img/logo.jpg" class="logo"></a>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-around w-100">
            <?php if (!empty($_COOKIE)) : ?>
                <?php for ($i = 0; $i < count($navbar_decode); $i++) : ?>
                    <?php $category_position = array_search($navbar_decode[$i], array_keys($categories)) + 1; ?>
                    <?php if (in_array($navbar_decode[$i], array_keys($rss_icon))) : ?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./sujet<?= $category_position ?>.html"><span class="link-category link-category-<?= $category_position ?>"><?= $rss_icon[$navbar_decode[$i]] ?></span></a>
                        </li>
                    <?php endif; ?>
                <?php endfor; ?>
            <?php endif; ?>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./parametre.html"><i class="bi bi-gear fs-1"></i></a>
            </li>
        </ul>
    </div>
</nav>