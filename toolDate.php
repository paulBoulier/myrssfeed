<?php
function getTime($myDate){
$rss_date = strtotime($myDate);
$now = time();
$diff = $now - $rss_date;
$res = "Il y a ";
if ($diff < 60) {
    $diffe= $diff/60;
    $res .= $diffe . " secondes";
}elseif ($diff < 120 ){
    $diffe= $diff/60;
    $res .= floor($diffe) . " minute";
} elseif ($diff < 3600 ){
    $diffe= $diff/60;
    $res .= floor($diffe) . " minutes";
}  elseif ($diff < 7200) {
    $diffe= $diff/3600;
    $res .= floor($diffe) . " heure";
}
elseif ($diff < 86400) {
    $diffe= $diff/3600;
    $res .= floor($diffe) . " heures";
}
elseif ($diff < 172800) {
    $diffe= $diff/86400;
    $res .= floor($diffe) . " jour";
}
elseif ($diff < 604800) {
    $diffe= $diff/86400;
    $res .= floor($diffe) . " jours";
}
elseif ($diff < 1209600) {
    $diffe= $diff/604800;
    $res .= "il y a " . floor($diffe) . " semaine";
    return $res;
}
elseif ($diff < 2592000) {
    $diffe= $diff/604800;
    $res .= floor($diffe) . " semaines";
    return $res;
}
elseif ($diff < 5184000) {
    $diffe= $diff/2592000;
    $res .= floor($diffe) . " mois";
    return $res;
}
elseif ($diff < 31536000) {
    $diffe= $diff/2592000;
    $res .= floor($diffe) . " mois";
    return $res;
}
elseif ($diff < 63072000) {
    $diffe= $diff/31536000;
    $res .= floor($diffe) . " an";
    return $res;
}
elseif ($diff > 63072000) {
    $diffe= $diff/31536000;
    $res .= floor($diffe) . " ans";
    return $res;
}
return $res;
}
?>
  
</body>
</html>