<?php
function test_odd($value){
    return($value & 1);
}
$input = fgets(STDIN);
//$input = "Java C# PHP PHP JAVA C java";
$input = trim($input, "\r\n");
$input = strtolower($input);
$values = explode(" ", $input);
$temp = array();
foreach($values as $s){
    if(!array_key_exists($s, $temp)){
        $temp[$s] = 0;
    }
    $temp[$s]++;
}

$temp = array_filter($temp, "test_odd");


echo implode(", ", array_keys($temp));

