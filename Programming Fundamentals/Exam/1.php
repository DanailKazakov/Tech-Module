<?php

fscanf(STDIN, "%d", $flaps); //1000000
fscanf(STDIN, "%f", $distance); //10
fscanf(STDIN, "%d", $endurance); //1500

$totalDistance = intdiv($flaps, 1000) * $distance; // 1000000 / 1000 = 1000 * 10 = 10000

$totalTime = intdiv($flaps, 100) + intdiv($flaps, $endurance) * 5; //1000000 / 100 = 10000 + 1000000/ 1500

echo sprintf("%.2f m.\n", $totalDistance);
echo sprintf("%d s.", $totalTime);

