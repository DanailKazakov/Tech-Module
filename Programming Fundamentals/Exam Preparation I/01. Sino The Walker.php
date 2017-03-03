<?php

fscanf(STDIN, "%s", $timeLeaving);
fscanf(STDIN, "%d", $steps);
fscanf(STDIN, "%d", $stepTime);

$travelTime = $steps * $stepTime;

$time = explode(":", $timeLeaving);

$timeInSecs = $time[2] + ($time[1] * 60) + ($time[0] * 3600);

$totalTimeInSecs = $timeInSecs + $travelTime;

$hours = floor($totalTimeInSecs / 3600);
$mins = floor($totalTimeInSecs / 60 % 60);
$secs = floor($totalTimeInSecs % 60);

printf("Time Arrival: %02d:%02d:%02d", $hours % 24, $mins, $secs);