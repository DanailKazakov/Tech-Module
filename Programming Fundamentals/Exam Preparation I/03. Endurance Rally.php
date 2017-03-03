<?php

//prepairing names input for work
$names = fgets(STDIN);
$names = trim($names, "\r\n");
$names = trim($names);
$arrayNames = explode(" ", $names);

//prepairing track input for work
$track = fgets(STDIN);
$track = trim($track, "\r\n");
$track = trim($track);
$arrayTrack = explode(" ", $track);

//making track values negatives for easier calculation
$trackCount = count($arrayTrack);

//prepairing ckeckpoints input for work
$checkpoints = fgets(STDIN);
$checkpoints = trim($checkpoints, "\r\n");
$checkpoints = trim($checkpoints);
$arrayCheckpoints = explode(" ", $checkpoints);
$arrayCheckpoints = array_values(array_unique($arrayCheckpoints));

//fix checkpoints in track to positives
$checkpointsCount = count($arrayCheckpoints);
for ($i = 0; $i<$checkpointsCount; $i++){
    $arrayTrack[$arrayCheckpoints[$i]] = (-1) * $arrayTrack[$arrayCheckpoints[$i]];
}

//getting starting fuel for racers
foreach ($arrayNames as $racer){
    $fuel = ord(substr($racer, 0, 1));
    $counter = -1;
    foreach ($arrayTrack as $zone){
        $fuel = $fuel - $zone;
        $counter++;
        if ($fuel < 1){
            echo sprintf("%s - reached %s\n", $racer, $counter);
            break;
        }
    }
    if ($fuel > 0){
        echo sprintf("%s - fuel left %.2f\n", $racer, $fuel);
    }
}