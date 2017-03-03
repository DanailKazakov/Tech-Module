<?php

fscanf(STDIN, "%s", $r);

$pi = (string)pi();

bcscale(13);

$area = bcmul($pi, $r);
$area = bcmul($area, $r);

$area = number_format($area, 12, ".", "");

printf("%s", $area);