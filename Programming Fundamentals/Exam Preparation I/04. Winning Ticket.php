<?php

$ticketsDump = fgets(STDIN);

$arrayTickets = explode(",", $ticketsDump);
$count = count($arrayTickets);

for ($i = 0; $i < $count; $i++){
    $arrayTickets[$i] = trim($arrayTickets[$i]);
    if (strlen($arrayTickets[$i]) == 20){
        $firstHalf = substr($arrayTickets[$i], 0, 10);
        $secondHalf = substr($arrayTickets[$i], 10, 10);
        $resultFH = preg_match('/(\@{6,10}|\#{6,10}|\${6,10}|\^{6,10})/', $firstHalf, $arrFH);
        $resultSH = preg_match('/(\@{6,10}|\#{6,10}|\${6,10}|\^{6,10})/', $secondHalf, $arrSH);
        $FHstrlen = strlen($arrFH[1]);
        $SHstrlen = strlen($arrSH[1]);
        $minlen = min($FHstrlen, $SHstrlen);
        $symbol = substr($arrSH[1], 0, 1);
        $arrFH[1] = substr($arrFH[1], 0, $minlen);
        $arrSH[1] = substr($arrSH[1], 0, $minlen);
        if ($arrFH[1] == $arrSH[1] && $minlen != 0){
            if ($minlen == 10){
                echo sprintf("ticket \"%s\" - %s%s Jackpot!\n", $arrayTickets[$i], $minlen, $symbol);
            }
            else {
                echo sprintf("ticket \"%s\" - %s%s\n", $arrayTickets[$i], $minlen, $symbol);
            }

        }
        else {
            echo sprintf("ticket \"%s\" - no match\n", $arrayTickets[$i]);
        }
    }
    else {
        echo sprintf("invalid ticket\n");
    }
}