<?php
require 'controllers/parameters-controller.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style/style.css">
    <title>Document</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row mt-3">
            <h1 class="text-center">Parametre</h1>
        </div>
        <form action="parameters.php" method="POST">
            <div class="row d-flex flex-column align-items-center mt-5">
                <div class="col-lg-3">
                    <label class="form-label">Choix du thème :</label>
                    <span class="errorMessage"><?= $errorMessage["errorTheme"] ?? '' ?></span>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="theme" id="themeDark" value="dark" checked>
                        <label class="form-check-label" for="themeDark">
                            Dark
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="theme" id="themeLight" value="light">
                        <label class="form-check-label" for="themeLight">
                            Light
                        </label>
                    </div>
                </div>
                <div class="col-lg-3 mt-3">
                    <label class="form-label">Nombre d'article afficher :</label>
                    <span class="errorMessage"><?= $errorMessage["errorArticle"] ?? '' ?></span>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="article" id="six" value="6" checked>
                        <label class="form-check-label" for="six">
                            6
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="article" id="nine" value="9">
                        <label class="form-check-label" for="nine">
                            9
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="article" id="twelve" value="12">
                        <label class="form-check-label" for="twelve">
                            12
                        </label>
                    </div>
                </div>
                <div class="col-lg-3 mt-3">
                    <label class="form-label">Choix des flux : (1 - 3 Choix possible)</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="actualite" name="actualite" value="actualite">
                        <label class="form-check-label" for="actualite">
                            Actualite
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="diapo" name="diapo" value="diapo">
                        <label class="form-check-label" for="diapo">
                            Diaporama
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="product" name="product" value="product">
                        <label class="form-check-label" for="product">
                            Produits
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="appli" name="appli" value="appli">
                        <label class="form-check-label" for="appli">
                            Applis-Logiciels
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="technos" name="technos" value="technos">
                        <label class="form-check-label" for="technos">
                            Technos
                        </label>
                    </div>
                    <span class="errorMessage d-block"><?= $errorMessage["errorFlux"] ?? '' ?></span>
                </div>
            </div>
            <div class="row justify-content-center mt-4">
                <div class="col-1">
                    <input type="submit" name="submit" class="btn btn-primary" value="Envoyer">
                </div>
            </div>
        </form>
    </div>
</body>

</html>