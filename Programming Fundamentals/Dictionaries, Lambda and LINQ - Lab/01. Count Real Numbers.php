<?php

$input = fgets(STDIN);
$input = trim($input, "\r\n");
$values = explode(" ", $input);
$temp = array();
foreach($values as $s){
    if(!array_key_exists($s, $temp)){
        $temp[$s] = 0;
    }
    $temp[$s]++;
}
ksort($temp,SORT_NUMERIC);
while (list($key, $val) = each($temp)) {
    echo "$key -> $val\n";
}
