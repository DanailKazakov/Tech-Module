<?php

function console_log( $data ){
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';
}

class Message{
    var $text;
    var $frequency;

    function __construct( $text, $frequency ) {
        $this->setText($text);
        $this->setFrequency($frequency);
    }

    function setText($text)
    {
        $this->text = $text;
    }

    function getText()
    {
        return $this->text;
    }

    function setFrequency($frequency)
    {
        if(is_numeric($frequency)){

        }
        $this->frequency = $frequency;
    }

    function getFrequency()
    {
        return $this->frequency;
    }
}

$s = new Message("pesho",255);
$stdin = fopen('php://stdin', 'r');

$results = array();

for ($i = 0; $i < 2; $i++) {
    $currentLine = fgets($stdin);
    echo "." . $currentLine . ".";
}

console_log("ggdsj\nsag");


// sag <-> ag <-> asd556
//