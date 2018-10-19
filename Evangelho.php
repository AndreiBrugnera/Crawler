<?php

//require '_app/Helpers/simple_html_dom.php';
require_once 'simple_html_dom.php';

class Evangelho {

    public function __construct() {
        $this->getEvangelho("http://liturgia.cancaonova.com/liturgia/27o-domingo-tempo-comum-2/?sDia=7&sMes=10&sAno=2018#liturgia-4");
    }

    public function getEvangelho($url) {
        $html = file_get_html($url);

        
        preg_match_all('/<div id=\"liturgia-4\">(.*?)<\/div/', $html, $result);
        
        var_dump($result);
    }

}

$e = new Evangelho();
?>