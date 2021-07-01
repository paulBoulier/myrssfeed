<?php

$itemArray = [];

$nbItem = 0;

$rssArray = [
    "https://www.01net.com/rss/actualite/",
    "https://www.01net.com/rss/diaporama/",
    "https://www.01net.com/rss/actualites/produits/",
    "https://www.01net.com/rss/actualites/applis-logiciels/",
    "https://www.01net.com/rss/actualites/technos/",
];

$categories = [];
$rssArray_categories = [];

foreach ($rssArray as $value) {
    // valeur à incrémenter à chaque itération lorsque l'on parcours les items d'un flux (pour gérer les cas ou le flux est plus petit que 12 items)
    $nbItem = 0;
    $rssFlux = simplexml_load_file($value);

    // le titre du flux que l'on parcours
    $substr = substr($rssFlux->channel->title, 0, -8);
    // on push dans categories le titre du flux
    $categories[] = $substr;

    foreach ($rssFlux->channel->item as $value) {
        if ($nbItem < 12/*$_COOKIE["articleCount"]*/) {
            // on découpe la valeur description du rss qui contient la description et l'image
            preg_match("/[^<]+(?=<)/", $value->description, $description);
            preg_match("/(?<=src=\").+(?=\")/", $value->description, $src);
            // les clés que l'on aura dans notre array
            $options = [
                "cat" => $substr,
                "title" => (string) $value->title,
                "link" => trim((string) $value->link),
                "description" => trim($description[0]),
                "src" => $src[0],
                "date" => (string) $value->pubDate,
            ];
            // on push dans l'array de façon désorganisée
            array_push($itemArray, $options);
            // on push dans l'array par rapport au nom de la catégorie
            $rssArray_categories[$substr] = $options;
        } else {
            break;
        }

        $nbItem++;
    }
}

//Tableaux des timestamp
$timestamp = [];

foreach ($itemArray as $value) {
    array_push($timestamp, strtotime($value["date"]));
}

rsort($timestamp);

//Tableaux des item trier par date
$itemRsort = [];

foreach ($itemArray as $value) {
    $timestampDate = strtotime($value["date"]);
    $keyArray = array_search($timestampDate, $timestamp);
    $itemRsort[$keyArray] = $value;
}

ksort($itemRsort);
