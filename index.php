<?php

include "tableau.php";
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
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php for ($i = 0; $i < count($categories); $i++): ?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./sujet<?=$i + 1?>.html"><?=$categories[$i]?></a>
                        </li>
                    <?php endfor;?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./parametre.html">Paramètres</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="container">
        <?php foreach ($itemRsort as $item): ?>
        <div class="card m-3 mx-auto" style="max-width: 56.5rem">
            <div class="card-body d-flex">
                <img src="<?=$item["src"]?>">
                <div class="ps-2 flex-grow-1">
                    <!-- catégorie et timer -->
                    <div>
                        <span class="category-<?=array_search($item["cat"], $categories)+1?>"><?= $item["cat"] ?></span>
                        <span><b class="timer"><?= getTime($item["date"]) ?></b></span>
                    </div>
                    <!-- titre de l'article -->
                    <p><?=$item["title"]?></p>
                    <!-- boutons -->
                    <div class="d-inline-block ms-auto">
                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Launch demo modal
                        </button>
                        <a class="btn" href="<?=$item["link"]?>" target="_blank">Lien vers l'article</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach;?>
    </main>
    <!-- modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
