<?php

require_once 'simple_html_dom.php';

class Temperatura{
    public function __construct(){
        $this->getTemperatura('https://github.com/AndreiBrugnera');
    }

    public function getTemperatura(){
        // $html = file_get_html($url);

        // preg_match_all('\<p class=\"pb-5 bold\">(.*?)<\/p/', $html, $result);


        echo $url;
    }


}

$t = new Temperatura();


