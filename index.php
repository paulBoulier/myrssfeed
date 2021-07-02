<?php

include "toolDate.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

<?php if (!empty($_COOKIE)) { ?>

    <body class="<?= !empty($_COOKIE) && $_COOKIE["theme"] == "dark" ? "text-light bg-dark" : "" ?>">
        <?php include "navbar.php" ?>
        <?php include "carroussel.php" ?>
        <h1 class="text-center mb-4">Tous les articles sélectionnés</h1>
        <main class="container mb-5">
            <?php
            $categoriesCount = ["files" => 0, "diapo" => 0, "product" => 0, "apps" => 0, "technos" => 0];
            foreach ($itemRsort as $item) :
                if (in_array($item["cat"], $navbar_decode)) {
                    if ($categoriesCount[$item["cat"]] == 1) {
                        setlocale(LC_TIME, 'fr_FR', "fra");
                        $newDate = "Le " . strftime("%A %e %B %Y", strtotime($item["date"])); ?>
                        <div id="modalButton" class="card mx-auto my-0 <?= !empty($_COOKIE) && $_COOKIE["theme"] == "dark" ? "text-light bg-dark border-light card-dark" : "card-light" ?>" style="max-width: 56.5rem" data-bs-toggle="modal" data-bs-target="#item" data-title="<?= $item["title"] ?>" data-img="<?= $item["image"] ?>" data-desc="<?= $item["description"] ?>" data-link="<?= $item["link"] ?>" data-date="<?= $newDate ?>">
                            <div class="card-body d-flex cursor-pointer">
                                <div class="ps-2 flex-grow-1">
                                    <!-- catégorie et timer -->
                                    <div>
                                        <span class="category-<?= array_search($item["cat"], array_keys($categories)) + 1 ?>"><?= $categories[$item["cat"]] ?></span>
                                        <span><b class="timer"><?= getTime($item["date"]) ?></b></span>
                                    </div>
                                    <!-- titre de l'article -->
                                    <p class="m-0"><?= $item["title"] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <?php $categoriesCount[$item["cat"]] = 1 ?>
                <?php } ?>
            <?php endforeach; ?>
        </main>
        <!-- modal -->
        <div class="modal fade" id="item" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content <?= !empty($_COOKIE) && $_COOKIE["theme"] == "dark" ? "text-light bg-dark" : "" ?>">
                    <div class="modal-header d-flex flex-column text-center border-0">
                        <h5 class="modal-title mb-2" id="exampleModalLabel"></h5>
                        <p id="dateModal"></p>
                    </div>
                    <img id="imgModal">
                    <div class="modal-body" id="descModal"></div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <a id="linkArticle"><button type="button" class="btn btn-primary">Lien Article</button></a>
                    </div>
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
            <script src="assets/js/script.js"></script>

    </body>
<?php } else {
    header("Location: parametre.html");
}
?>

</html>