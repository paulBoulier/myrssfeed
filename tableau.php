<?php

$itemArray = [];

$nbItem = 0;

$rssArray = [
    "https://www.01net.com/rss/actualite/",
    "https://www.01net.com/rss/diaporama/",
    "https://www.01net.com/rss/actualites/produits/",
    "https://www.01net.com/rss/actualites/applis-logiciels/",
    "https://www.01net.com/rss/actualites/technos/"
];

foreach ($rssArray as $value) {
    $nbItem = 0;
    $rssFlux = simplexml_load_file($value);

    foreach ($rssFlux->channel->item as $value) {
        $substr = substr($rssFlux->channel->title, 0, -8);
        if ($nbItem < 12) {
            array_push(
                $itemArray,
                [
                    "cat" => $substr,
                    "title" => (string)$value->title,
                    "link" => (string)$value->link,
                    "description" => (string)$value->description,
                    "date" => (string)$value->pubDate
                ]
            );
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