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

<body class="<?= !empty($_COOKIE) && $_COOKIE["theme"] == "dark" ? "text-light bg-dark" : "" ?>">
    <?php include "navbar.php" ?>
    <main class="container">
        <?php
        foreach ($itemRsort as $item) :
            setlocale(LC_TIME, 'fr_FR', "fra");
            $newDate = "Le " . strftime("%A %e %B %Y", strtotime($item["date"]));
        ?>
            <div class="card m-3 mx-auto <?= !empty($_COOKIE) && $_COOKIE["theme"] == "dark" ? "text-light bg-dark border-light" : "" ?>" style="max-width: 56.5rem">
                <div class="card-body d-flex">
                    <img class="align-self-start" src="<?= $item["src"] ?>">
                    <div class="ps-2 flex-grow-1">
                        <!-- catégorie et timer -->
                        <div>
                            <span class="category-<?= array_search($item["cat"], array_keys($categories)) + 1 ?>"><?= $item["cat"] ?></span>
                            <span><b class="timer"><?= getTime($item["date"]) ?></b></span>
                        </div>
                        <!-- titre de l'article -->
                        <p><?= $item["title"] ?></p>
                        <!-- boutons -->
                        <div class="d-inline-block float-end">
                            <button id="modalButton" type="button" class="btn fs-4 <?= !empty($_COOKIE) && $_COOKIE["theme"] == "dark" ? "text-light border-light" : "" ?>" data-bs-toggle="modal" data-bs-target="#item" data-title="<?= $item["title"] ?>" data-img="<?= $item["image"] ?>" data-desc="<?= $item["description"] ?>" data-link="<?= $item["link"] ?>" data-date="<?= $newDate ?>">
                                <i class="bi bi-search"></i>
                            </button>
                            <a class="btn <?= !empty($_COOKIE) && $_COOKIE["theme"] == "dark" ? "text-light border-light" : "" ?>" href="<?= $item["link"] ?>" target="_blank">Lien vers l'article</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </main>
    <!-- modal -->
    <div class="modal fade" id="item" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header d-flex flex-column text-center">
                    <h5 class="modal-title mb-2" id="exampleModalLabel"></h5>
                    <p id="dateModal"></p>
                </div>
                <img id="imgModal">
                <div class="modal-body" id="descModal"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <a id="linkArticle"><button type="button" class="btn btn-primary">Lien Article</button></a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>