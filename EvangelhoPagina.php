<?php

require 'simple_html_dom.php';


$Liturgia = new simple_html_dom();

$Liturgia->load_file('http://liturgia.cancaonova.com/pb/');

//    $EvangelhoHome = $Liturgia->find('.tab-content', $i)->innertext;
//    echo $EvangelhoHome;

$Evangelho = $Liturgia->find('#liturgia-4', 0)->innertext;
echo $Evangelho;



