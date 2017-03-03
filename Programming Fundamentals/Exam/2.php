<?php

$mined = array();
$minedMSG = array();
$minedBroadcast = array();

while (TRUE){
    $temp = fgets(STDIN);
    $temp = trim($temp, "\r\n");
    if ($temp == "Hornet is Green"){
        break;
    }
    $arr = explode(" <-> ", $temp);
    // validate if the passed string was exploded successfully
    if(count($arr) == 2){
        array_push($mined, $arr[0] . "," . $arr[1]);
    }
}

// if you want to use key/value pairs don't make the element a string
foreach($mined as $value){
    $tempArr = explode(",", $value);
    $currentkey = $tempArr[0];
    $currentvalue = $tempArr[1];
    //is_numeric returns true for ANY number representing string (ex. "-1.5")
    // check ctype_digit
    if (is_numeric($currentkey) && ctype_alnum($currentvalue)){
        $temp2 = strrev($currentkey);
        $currentkey = $temp2;
        array_push($minedMSG, $currentkey . "," . $currentvalue);
    }
    elseif (preg_match('/^(\D+)$/', $currentkey) && preg_match('/^([a-zA-Z0-9]+)$/', $currentvalue)){
        $temp3 = "";
        $stringLen = strlen($currentvalue);
        for ($i = 0; $i < $stringLen; $i++){
            $value = substr($currentvalue, $i, 1);
            if (ctype_lower($value)){
                $value = strtoupper($value);
            }
            elseif (ctype_upper($value)){
                $value = strtolower($value);
            }
            $temp3 .= $value;

        }
        $currentvalue = $currentkey;
        $currentkey = $temp3;
        array_push($minedBroadcast, $currentkey . "," . $currentvalue);
    }
}

echo "Broadcasts:\n";
$countBr = count($minedBroadcast);
if ($countBr == 0){
    echo "None";
}
foreach ($minedBroadcast as $result){
    $arrBr = explode(",", $result);
    $key = $arrBr[0];
    $value = $arrBr[1];
    echo sprintf("%s -> %s\n", $key, $value);
}
echo "Messages:\n";
$countMSG = count($minedMSG);
if ($countMSG == 0){
    echo "None";
}
foreach ($minedMSG as $result){
    $arrMSG = explode(",", $result);
    $key = $arrMSG[0];
    $value = $arrMSG[1];
    echo sprintf("%s -> %s\n", $key, $value);
}
