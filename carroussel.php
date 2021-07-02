<?php
// var_dump($itemRsort);
$bonjour = json_decode($_COOKIE["selectedSubjects"]);
if (!empty($bonjour)) {
  foreach ($bonjour as $value) {
    $lesCookies[] = $value;
  }

  $firstCookie = $lesCookies[0];
  $secondCookie = $lesCookies[1];
  $thirdCookie = $lesCookies[2];

  $carrousselImage = [];
  $carrousselTitle = [];

  $fluxCarroussel = simplexml_load_file($rssArray[$firstCookie]);
  foreach ($fluxCarroussel->channel->item as $value) {
    array_push($carrousselImage, (string)$value->enclosure["url"]);
    array_push($carrousselTitle, (string) $value->title);
    break;
  }

  $fluxCarroussel = simplexml_load_file($rssArray[$secondCookie]);
  foreach ($fluxCarroussel->channel->item as $value) {
    array_push($carrousselImage, (string)$value->enclosure["url"]);
    array_push($carrousselTitle, (string) $value->title);
    break;
  }

  $fluxCarroussel = simplexml_load_file($rssArray[$thirdCookie]);
  foreach ($fluxCarroussel->channel->item as $value) {
    array_push($carrousselImage, (string)$value->enclosure["url"]);
    array_push($carrousselTitle, (string) $value->title);
    break;
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
    <div class="carousel-item active">
      <img src="<?= $carrousselImage[0] ?>" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5><?= $carrousselTitle[0] ?></h5>
      </div>
    </div>
    <div class="carousel-item">
      <img src="<?= $carrousselImage[1] ?>" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5><?= $carrousselTitle[1] ?></h5>
      </div>
    </div>
    <div class="carousel-item">
      <img src="<?= $carrousselImage[2] ?>" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5><?= $carrousselTitle[2] ?></h5>
      </div>
    </div>
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