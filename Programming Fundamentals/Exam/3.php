<?php

//bees stats
$bees = fgets(STDIN);
$bArr = explode(" ", $bees);
$countB = count($bArr);

//hornet stats
$hornets = fgets(STDIN);
$hArr = explode(" ", $hornets);
$countH = count($hArr);

$hornetPower = 0;

foreach($hArr as $somePower){
    $hornetPower += $somePower;
}

$hornetLossCounter = -1;
$results = array();
for ($i = 0; $i < $countB; $i++){
    if ($hornetPower > $bArr[$i]){

    }
    elseif ($hornetPower == $bArr[$i]){
        $hornetLossCounter++;
        $hornetPower -= $hArr[$hornetLossCounter];
        unset($hArr[$hornetLossCounter]);
    }
    elseif ($hornetPower < $bArr[$i]){
//        echo $bArr[$i] . "\n";
//        echo $hornetPower . "\n";
        $result = $bArr[$i] - $hornetPower;
//        echo $result . "\n";
        array_push($results, $result);
//        foreach($results as $x){
//            echo $x . "\n";
//            echo "here";
//        }
        $hornetLossCounter++;
        $hornetPower -= $hArr[$hornetLossCounter];
        unset($hArr[$hornetLossCounter]);
    }
}
$finalB = "";
if (!empty($results)){
    foreach ($results as $res){
        $finalB .= $res . " ";
    }
    echo $finalB;
}

$finalH = "";
if (empty($results)){
    foreach ($hArr as $hive){
        $final .= $hive . " ";
    }
    echo $final;
}
