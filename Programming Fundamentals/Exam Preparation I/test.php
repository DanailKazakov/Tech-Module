<?php

//prepairing names input for work
$names = "a b c d";
$names = trim($names, "\r\n");
$names = trim($names);
$arrayNames = explode(" ", $names);

//prepairing track input for work
$track = "187 213 24 67 207 116 83 8 7 2.0 243 41 264 7. 124 146 14. 76 84 6. 265 33 205 121 1.2 .8 145 181 200 27 217 1.6 221";
$track = trim($track, "\r\n");
$track = trim($track);
$arrayTrack = explode(" ", $track);

//making track values negatives for easier calculation
$trackCount = count($arrayTrack);

//prepairing ckeckpoints input for work
$checkpoints = "0 15 8 16 27 22 1 2 3 4 5 22 18 27 83 25 26 30";
$checkpoints = trim($checkpoints, "\r\n");
$checkpoints = trim($checkpoints);
$arrayCheckpoints = explode(" ", $checkpoints);
$arrayCheckpoints = array_values(array_unique($arrayCheckpoints));

//fix checkpoints in track to positives
$checkpointsCount = count($arrayCheckpoints);
for ($i = 0; $i<$checkpointsCount; $i++){
    if (isset($arrayTrack[$arrayCheckpoints[$i]])){
        $arrayTrack[$arrayCheckpoints[$i]] = (-1) * $arrayTrack[$arrayCheckpoints[$i]];
    }
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