<?php

if (isset($_POST["submit"])) {

    //Tableau des erreur
    $errorMessage = [];

    if (empty($_POST["theme"]) && !isset($_POST["theme"])) {
        $errorMessage["errorTheme"] = "Veuillez selectionner un thème";
    }

    if (empty($_POST["article"]) && !isset($_POST["article"])) {
        $errorMessage["errorArticle"] = "Champ Obligatoire";
    }

    //Compteur des checkbox
    $nbCheckbox = 0;

    //Tableaux des flux
    $fluxArray = [];

    if (!empty($_POST["files"]) && isset($_POST["files"])) {
        $nbCheckbox++;
        array_push($fluxArray, $_POST["files"]);
    }

    if (!empty($_POST["diapo"]) && isset($_POST["diapo"])) {
        $nbCheckbox++;
        array_push($fluxArray, $_POST["diapo"]);
    }

    if (!empty($_POST["product"]) && isset($_POST["product"])) {
        $nbCheckbox++;
        array_push($fluxArray, $_POST["product"]);
    }

    if (!empty($_POST["apps"]) && isset($_POST["apps"])) {
        $nbCheckbox++;
        array_push($fluxArray, $_POST["apps"]);
    }

    if (!empty($_POST["technos"]) && isset($_POST["technos"])) {
        $nbCheckbox++;
        array_push($fluxArray, $_POST["technos"]);
    }

    // s'il y a aucun ou trop de flux
    if ($nbCheckbox == 0) {
        $errorMessage["errorFlux"] = "Veuillez choisir au moins 1 flux";
    } else if ($nbCheckbox > 3) {
        $errorMessage["errorFlux"] = "Vous avez choisi trop de flux";
    }

    if (empty($errorMessage)) {
        // suppression des cookies
        foreach ($_COOKIE as $key => $value) {
            setcookie($key, $value, time() - 2628000);
        }

        // encodage du tableau des flux
        $jsonFlux = json_encode($fluxArray);

        // création des nouveaux cookies
        setcookie("articleCount", $_POST["article"], time() + 2628000);
        setcookie("theme", $_POST["theme"], time() + 2628000);
        setcookie("selectedSubjects", $jsonFlux, time() + 2628000);

        header("Refresh: 0");
    }
}
