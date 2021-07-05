<?php
$carroussel = [];
$selectedSubjects = json_decode($_COOKIE["selectedSubjects"]);
if($selectedSubjects && is_array($selectedSubjects)) {
  foreach($selectedSubjects as $selectedSubject) {
    if(in_array($selectedSubject, array_keys($rssArray))) {
      $current = current($rssArray_categories[$selectedSubject]);
      $carroussel[] = [
        "link" => $current["link"],
        "image" => $current["image"],
        "title" => $current["title"]
      ];
    }
  }
}
?>

<div id="carouselExampleCaptions" class="carousel slide m-3 mx-auto border border-0" data-bs-ride="carousel" style="max-width: 56.5rem">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <?php
      foreach($carroussel as $key => $item): ?>
        <div class="carousel-item <?=$key == 0 ? "active" : ""?>">
          <a href="<?= $item["link"] ?>" target="blank"><img src="<?= $item["image"] ?>" class="carrouselSize "></a>
          <div class="carousel-caption ">
            <h5 class="titreCarroussel"><?= $item["title"] ?></h5>
          </div>
        </div>
      <?php endforeach; ?>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>