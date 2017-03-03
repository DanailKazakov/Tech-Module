<?php

fscanf(STDIN, "%d", $people);
fscanf(STDIN, "%d", $capacity);

$full = intdiv($people, $capacity);
$remainder = $people % $capacity;

if ($remainder > 0){
    printf("%s", $full + 1);
}
else {
    printf("%s", $full);
}

