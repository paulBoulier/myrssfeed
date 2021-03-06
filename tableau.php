<?php

// array indexé non organisé de tous les articles
$itemArray = [];

$rssArray = [
    "files" => "https://www.01net.com/rss/actualites/buzz-societe/",
    "diapo" => "https://www.01net.com/rss/actualites/culture-medias/",
    "product" => "https://www.01net.com/rss/actualites/produits/",
    "apps" => "https://www.01net.com/rss/actualites/applis-logiciels/",
    "technos" => "https://www.01net.com/rss/actualites/technos/",
];

// $rssArray = [
//     "files" => "https://rmcsport.bfmtv.com/rss/rugby/",
//     "diapo" => "https://rmcsport.bfmtv.com/rss/basket/",
//     "product" => "https://rmcsport.bfmtv.com/rss/tennis/",
//     "apps" => "https://rmcsport.bfmtv.com/rss/cyclisme/",
//     "technos" => "https://rmcsport.bfmtv.com/rss/football/transferts/",
// ];

// correspondance des catégories en français
$categories = ["files" => "Actualité", "diapo" => "Diaporama", "product" => "Produits", "apps" => "Applis-Logiciels", "technos" => "Technos"];

// les flux rangés par catégories
$rssArray_categories = [];

foreach ($rssArray as $key => $value) {
    // valeur à incrémenter à chaque itération lorsque l'on parcours les items d'un flux (pour gérer les cas ou le flux est plus petit que 12 items)
    $nbItem = 0;
    $rssFlux = simplexml_load_file($value);

    $allowed_articleCount = [2, 3, 4];

    foreach ($rssFlux->channel->item as $value) {
        if ($nbItem < (!empty($_COOKIE) && isset($_COOKIE["articleCount"]) && in_array($_COOKIE["articleCount"] / 3, $allowed_articleCount) ? $_COOKIE["articleCount"] / 3 : 4)) {
            // on découpe la valeur description du rss qui contient la description et l'image
            preg_match("/[^<]+(?=<)/", $value->description, $description);
            preg_match("/(?<=src=\").+(?=\")/", $value->description, $src);
            // les clés que l'on aura dans notre array
            $options = [
                "cat" => $key,
                "title" => (string) $value->title,
                "link" => trim((string) $value->link),
                "description" => trim($description[0]),
                "src" => $src[0],
                "date" => (string) $value->pubDate,
                "image" => (string) $value->enclosure["url"],
            ];
            // on push dans l'array de façon désorganisée
            array_push($itemArray, $options);
        } else {
            break;
        }

        $nbItem++;
    }
}

//Tableau des timestamp
$timestamp = [];

// on push dans le tableau de des timestamp, la timestamp dans l'ordre des items de $itemArray
foreach ($itemArray as $value) {
    array_push($timestamp, strtotime($value["date"]));
}

// on réorganise les timestamp de façon décroissante
rsort($timestamp);

//Tableaux des items triés par date
$itemRsort = [];

// on fait une boucle sur $itemArray, et on push dans itemRsort par ordre chronologique décroissant à l'aide de la position de l'item dans l'array timestamp
foreach ($itemArray as $value) {
    $timestampDate = strtotime($value["date"]);
    $keyArray = array_search($timestampDate, $timestamp);
    $itemRsort[$keyArray] = $value;
}

// on réorganise les clés du talbeau $itemRsort car elles sont mélangées
ksort($itemRsort);

foreach ($itemRsort as $value) {
    // si la catégorie n'existe pas dans l'array, on la crée
    if (!isset($rssArray_categories[$value["cat"]])) $rssArray_categories[$value["cat"]] = [];
    // on push dans l'array par rapport au nom de la catégorie
    $rssArray_categories[$value["cat"]][] = $value;
}