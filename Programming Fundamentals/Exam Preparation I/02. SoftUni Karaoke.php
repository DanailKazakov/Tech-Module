<?php

$singers = fgets(STDIN);
$singers = trim($singers, "\r\n");
$arraySingers = explode(", ", $singers);

$songs = fgets(STDIN);
$songs = trim($songs, "\r\n");
$arraySongs = explode(", ", $songs);
$results = array();
while ($temp != "dawn"){
    $temp = fgets(STDIN);
    $temp = trim($temp, "\r\n");
    $arrayTemp = explode(", ", $temp);
    $value = in_array($arrayTemp[0], $arraySingers);
    $value2 = in_array($arrayTemp[1], $arraySongs);
    if ($value && $value2) {
        if (!array_key_exists($arrayTemp[0], $results)) {
            $results[$arrayTemp[0]] = array();
        }
        array_push($results[$arrayTemp[0]], $arrayTemp[2]);
    }
}
function comp($a,$b){
    global $results;
    $aValue = $results[$a];
    $bValue = $results[$b];
    $res = count($bValue) - count($aValue);
    if($res == 0){
        $res = strcmp($a,$b);
    }
    return $res;
}
$keys = array_keys($results);
foreach($keys as $key){
    $results[$key] = array_unique($results[$key]);
    sort($results[$key],SORT_STRING);
}
uksort($results, "comp");

$keys = array_keys($results);
if (count($keys) == 0){
    printf("No awards");
}
else {
    foreach($keys as $key){
        $t = count($results[$key]);
        printf("%s: %s awards\n", $key, $t);
        foreach($results[$key] as $val){
            printf("--%s\n", $val);
        }
    }
}