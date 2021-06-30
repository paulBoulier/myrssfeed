<?php
function getTime($myDate){
$rss_date = strtotime($myDate);
$now = time();
$diff = $now - $rss_date;
$res = "";
if ($diff < 60) {
    $diffe= $diff/60;
    $res .= "il y a " . $diffe . " secondes";
    return $res;
}elseif ($diff < 120 ){
    $diffe= $diff/60;
    $res .= "il y a " . floor($diffe) . " minute";
    return $res;
} elseif ($diff < 3600 ){
    $diffe= $diff/60;
    $res .= "il y a " . floor($diffe) . " minutes";
    return $res;
}  elseif ($diff < 7200) {
    $diffe= $diff/3600;
    $res .= "il y a " . floor($diff) . " heure";
    return $res;
}
elseif ($diff < 86400) {
    $diffe= $diff/3600;
    $res .= "il y a " . floor($diff) . " heures";
    return $res;
}
elseif ($diff < 172800) {
    $diffe= $diff/86400;
    $res .= "il y a " . floor($diff) . " jour";
    return $res;
}
elseif ($diff < 604800) {
    $diffe= $diff/86400;
    $res .= "il y a " . floor($diffe) . " jours";
    return $res;
}
elseif ($diff < 1209600) {
    $diffe= $diff/604800;
    $res .= "il y a " . floor($diffe) . " semaine";
    return $res;
}
elseif ($diff < 1209600) {
    $diffe= $diff/604800;
    $res .= "il y a " . floor($diffe) . " semaines";
    return $res;
}
elseif ($diff < 2592000) {
    $diffe= $diff/2592000;
    $res .= "il y a " . floor($diffe) . " mois";
    return $res;
}
elseif ($diff < 2592000) {
    $diffe= $diff/2592000;
    $res .= "il y a " . floor($diffe) . " mois";
    return $res;
}
elseif ($diff < 63072000) {
    $diffe= $diff/31536000;
    $res .= "il y a " . floor($diffe) . " année";
    return $res;
}
elseif ($diff > 63072000) {
    $diffe= $diff/31536000;
    $res .= "il y a " . floor($diffe) . " années";
    return $res;
}
}
?>
  
</body>
</html>