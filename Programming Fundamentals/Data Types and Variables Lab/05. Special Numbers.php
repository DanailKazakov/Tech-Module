<?php

//fscanf(STDIN, "%d", $number);
$number = 40;

$sum = 0;
$TorF = 0;
for ($i = 1; $i<=$number; $i++){
    if ($i<10){
        $sum = $i;
    }
    elseif ($i>10 && $i < 100){
        $a = intdiv($i, 10);
        $b = $i % 10;
        $sum = $a + $b;
    }
    if ($sum == 5 || $sum == 7 || $sum == 11){
        $TorF = "True";
    }
    else {
        $TorF = "False";
    }
    printf("%s -> %s\r\n", $i, $TorF);
}

