<?php

include '../tableau.php';

$catNumber = $_GET["q"] - 1;
$newCategories = array_keys($categories);

foreach ($newCategories as $key => $item) {
    if ($catNumber == $key) {
        $newItem = $item;
        foreach ($itemRsort as $value) {
            if ($value["cat"] == $newItem) {
                setlocale(LC_TIME, 'fr_FR', "fra");
                $newDate = "Le " . utf8_encode(strftime("%A %e %B %Y", strtotime($value["date"]))); ?>
                <div class="col-12">
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
                </div>
<?php }
        }
    }
} ?>