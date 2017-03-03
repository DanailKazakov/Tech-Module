<?php

printf("Length: ");
fscanf(STDIN, "%f", $length);
printf("Width: ");
fscanf(STDIN, "%f", $width);
printf("Height: ");
fscanf(STDIN, "%f", $height);

$volume = ($length * $width * $height) / 3;

printf("Pyramid Volume: %.2f", $volume);