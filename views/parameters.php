<?php
require '../controllers/parameters-controller.php';

$selectedSubjects = !empty($_COOKIE) && isset($_COOKIE["selectedSubjects"]) && null !== ($selected = $_COOKIE["selectedSubjects"]) && ($decode = json_decode($selected)) ? $decode : [];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>JPB - Paramètres</title>
</head>

<body class="<?= !empty($_COOKIE) && isset($_COOKIE["theme"]) && $_COOKIE["theme"] == "dark" ? "bg-dark text-light" : "" ?>">
    <?php include "../navbar.php" ?>
    <div class="container-fluid margin-bottom">
        <div class="row mt-3">
            <h1 class="text-center">Paramètres</h1>
        </div>
        <form class="mb-5" action="parametre.html" method="POST">
            <div class="row d-flex flex-column align-items-center mt-5">
                <div class="col-lg-3">
                    <label class="form-label">Choix du thème :</label>
                    <span class="errorMessage"><?= $errorMessage["errorTheme"] ?? '' ?></span>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="theme" id="themeDark" value="dark" <?= isset($_COOKIE["theme"]) && $_COOKIE["theme"] == "dark" ? "checked" : "" ?>>
                        <label class="form-check-label" for="themeDark">
                            Dark
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="theme" id="themeLight" value="light" <?= isset($_COOKIE["theme"]) && $_COOKIE["theme"] == "light" ? "checked" : "" ?> <?= empty($_COOKIE["theme"]) ? "checked" : "" ?>>
                        <label class="form-check-label" for="themeLight">
                            Light
                        </label>
                    </div>
                </div>
                <div class="col-lg-3 mt-3">
                    <label class="form-label">Nombre d'article afficher :</label>
                    <span class="errorMessage"><?= $errorMessage["errorArticle"] ?? '' ?></span>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="article" id="six" value="6" <?= isset($_COOKIE["articleCount"]) && $_COOKIE["articleCount"] == "6" ? "checked" : "" ?>>
                        <label class="form-check-label" for="six">
                            6
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="article" id="nine" value="9" <?= isset($_COOKIE["articleCount"]) && $_COOKIE["articleCount"] == "9" ? "checked" : "" ?>>
                        <label class="form-check-label" for="nine">
                            9
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="article" id="twelve" value="12" <?= isset($_COOKIE["articleCount"]) && $_COOKIE["articleCount"] == "12" ? "checked" : "" ?> <?= empty($_COOKIE["articleCount"]) ? "checked" : "" ?>>
                        <label class="form-check-label" for="twelve">
                            12
                        </label>
                    </div>
                </div>
                <div class="col-lg-3 mt-3">
                    <label class="form-label">Choix des flux : (1 - 3 Choix possible)</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="actualite" name="files" value="files" <?= in_array("files", $selectedSubjects) ? "checked" : "" ?>>
                        <label class="form-check-label" for="actualite">
                            Actualite
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="diapo" name="diapo" value="diapo" <?= in_array("diapo", $selectedSubjects) ? "checked" : "" ?>>
                        <label class="form-check-label" for="diapo">
                            Diaporama
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="product" name="product" value="product" <?= in_array("product", $selectedSubjects) ? "checked" : "" ?>>
                        <label class="form-check-label" for="product">
                            Produits
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="appli" name="apps" value="apps" <?= in_array("apps", $selectedSubjects) ? "checked" : "" ?>>
                        <label class="form-check-label" for="appli">
                            Applis-Logiciels
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="technos" name="technos" value="technos" <?= in_array("technos", $selectedSubjects) ? "checked" : "" ?>>
                        <label class="form-check-label" for="technos">
                            Technos
                        </label>
                    </div>
                    <span class="errorMessage d-block"><?= $errorMessage["errorFlux"] ?? '' ?></span>
                    <div class="text-center mt-5">
                        <input type="submit" name="submit" class="btn btn-primary rounded-0 color-btn-primary" value="Envoyer">
                        <a href="index.php"><input type="button" class="btn btn-secondary rounded-0" value="Retour"></a>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>