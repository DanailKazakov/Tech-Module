<?php

fscanf(STDIN, "%d", $lines);

$results = array();

for ($i = 0; $i < $lines; $i++) {
    $currentLine = fgets(STDIN);
    //$currentLine = trim($currentLine, "\r\n");
    $tempArr = explode(" = ", $currentLine);
    $activity = $tempArr[0];
    $tempArr2 = explode(" -> ", $tempArr[1]);
    $legionName = $tempArr2[0];
    $tempArr3 = explode(":", $tempArr2[1]);
    $soldierType = $tempArr3[0];
    $soldierCount = $tempArr3[1];
    //echo sprintf("Activity: %s\nLegion Name: %s\nSoldier Type: %s\nSoldier Count: %s", $activity, $legionName, $soldierType, $soldierCount);
    $results[$i] = array($activity, $legionName, $soldierType, $soldierCount);
}

$finalCondition = fgets(STDIN);
$finalCondition = addslashes($finalCondition);
$conditionType = explode("\\", $finalCondition);

if (!empty($conditionType[2])){
    $activityCutoff = $conditionType[0];
    $soldierTypeCutoff = $conditionType[2];
    $newResults = array();
    for ($i = 0; $i < $lines; $i++){
        if ($results[$i][0] < $activityCutoff && $results[$i][2] == $soldierTypeCutoff){
            $newResults[$i] = $results[$i];
            $newResults = array_filter($newResults);
            echo $newResults[0][0];
        }
    }
    $finalResults = array();
}
else {
    $soldierTypeCutoff = $conditionType[0];
}