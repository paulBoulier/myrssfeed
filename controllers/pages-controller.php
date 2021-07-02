<?php

//On recupere l'id du sujet selectionner
$catNumber = $_GET["q"] - 1;
//On cree un array avec des keys correspondante au sujets
$newCategories = array_keys($categories);

$pageArray = [];

foreach ($newCategories as $key => $item) {
    if ($catNumber == $key) {
        foreach ($rssArray as $key => $value) {
            if ($item == $key) {
                // valeur à incrémenter à chaque itération lorsque l'on parcours les items d'un flux (pour gérer les cas ou le flux est plus petit que 12 items)
                $nbItem = 0;
                $rssFlux = simplexml_load_file($value);

                // le titre du flux que l'on parcours
                $substr = substr($rssFlux->channel->title, 0, -8);

                $allowed_articleCount = [6, 9, 12];

                foreach ($rssFlux->channel->item as $value) {
                    if ($nbItem < (!empty($_COOKIE) && isset($_COOKIE["articleCount"]) && in_array($_COOKIE["articleCount"], $allowed_articleCount) ? $_COOKIE["articleCount"] : 12)) {
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
                        array_push($pageArray, $options);
                        // on push dans l'array par rapport au nom de la catégorie
                        $rssArray_categories[$key] = $options;
                    } else {
                        break;
                    }

                    $nbItem++;
                }
            }
        }
    }
}

//Tableau des timestamp
$timestamp = [];

// on push dans le tableau de des timestamp, la timestamp dans l'ordre des items de $itemArray
foreach ($pageArray as $value) {
    array_push($timestamp, strtotime($value["date"]));
}

// on réorganise les timestamp de façon décroissante
rsort($timestamp);

//Tableaux des items triés par date
$pageRsort = [];

// on fait une boucle sur $itemArray, et on push dans itemRsort par ordre chronologique décroissant à l'aide de la position de l'item dans l'array timestamp
foreach ($pageArray as $value) {
    $timestampDate = strtotime($value["date"]);
    $keyArray = array_search($timestampDate, $timestamp);
    $pageRsort[$keyArray] = $value;
}

// on réorganise les clés du talbeau $itemRsort car elles sont mélangées
ksort($pageRsort);

foreach ($pageRsort as $value) {
    setlocale(LC_TIME, 'fr_FR', "fra");
    $newDate = "Le " . strftime("%A %e %B %Y", strtotime($value["date"]));
?>
    <div class="card mb-3 mx-auto <?= !empty($_COOKIE) && $_COOKIE["theme"] == "dark" ? "text-light bg-dark border-light" : "" ?>" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img class="img-fluid" src="<?= $value["image"] ?>" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $value["title"] ?></h5>
                    <p class="card-text"><?= $value["description"] ?></p>
                    <p class="card-text"><small class="text-muted"><?= $newDate ?></small></p>
                </div>
            </div>
        </div>
    </div>

<?php } ?>