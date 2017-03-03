<?php

fscanf(STDIN, "%d", $n);

$sum = "0";
$symbols = 0;

for ($i = 1; $i<=$n; $i++){
    fscanf(STDIN, "%s", $temp);
    $pieces = explode(".", $temp);
    $len = strlen($pieces[1]);
    if ($len > $symbols){
        $symbols = $len;
    }
    bcscale($symbols);
    $sum = bcadd($sum, $temp);
}

printf("%s", $sum);
