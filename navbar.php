<?php

include "tableau.php";

function decode_arr($keyName, $array)
{
    if (empty($array) || !isset($array[$keyName])) {
        return [];
    }

    return json_decode($array[$keyName]);
}

// $categories = ["Dossiers", "Diaporama", "Produits", "Applis, Logiciels", "Technos"]
// $navbar_decode = ex: ["Technos", "Applis, Logiciels", "Diaporama"]
$navbar_decode = decode_arr("selectedSubjects", $_COOKIE);

// var_dump($categories);

?>
<nav class="navbar navbar-expand-lg <?= (!empty($_COOKIE) && $_COOKIE["theme"] == "dark") ? "navbar-dark bg-dark" : "navbar-light bg-light" ?>">
    <div class="container-fluid">
<<<<<<< HEAD
        <a class="navbar-brand" href="./accueil.html"><img src="assets/img/logo.jpg" class="logo"></a>
=======
        <a class="navbar-brand" href="./accueil.html"><img src="./assets/img/logo.jpg" class="logo"></a>
>>>>>>> 274673840f327bfd7551407fecc7898bacfd7c2c
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php if (!empty($_COOKIE)) : ?>
                    <?php for ($i = 0; $i < count($navbar_decode); $i++) : ?>
                        <?php $category_position = array_search($navbar_decode[$i], array_keys($categories)) + 1; ?>
                        <?php if (in_array($navbar_decode[$i], array_keys($categories))) : ?>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="./sujet<?= $category_position ?>.html"><span class="link-category link-category-<?= $category_position ?>"><?= $categories[$navbar_decode[$i]] ?></span></a>
                            </li>
                        <?php endif; ?>
                    <?php endfor; ?>
                <?php endif; ?>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./parametre.html">Paramètres</a>
                </li>
            </ul>
        </div>
    </div>
</nav>