<?php

//$cpf = 1;;
//
//$ch = curl_init();
//$timeout = 0;
//curl_setopt($ch, CURLOPT_URL, 'http://consultas.detrannet.sc.gov.br/habilitacao/scripts/habilitacao.asp?cpf=' . $cpf);
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
//$conteudo = curl_exec($ch);
//curl_close($ch);
//
//
//        echo $conteudo;

//echo date('d/m/Y') . "<br>";
//$day = date('d');
//$month = date('m');
//$year = date('Y');
/* http://liturgia.cancaonova.com/liturgia/30a-semana-tempo-comum-sabado-2/?sDia=3&sMes=11&sAno=2018 */

require 'simple_html_dom.php';

$Liturgia = new simple_html_dom();
$LiturgiaPage = new simple_html_dom();

//$html->load_file('http://liturgia.cancaonova.com/liturgia/30a-semana-tempo-comum-sabado-2/?sDia='.$day.'&sMes='.$month.'&sAno='.$year.'');
//

for ($i = 0; $i < 11; $i++):
    $Liturgia->load_file('http://liturgia.cancaonova.com/pb/liturgia/page/1');

    $EvangelhoHome = $Liturgia->find('.entry-link', $i)->innertext;
//    echo $EvangelhoHome;  
    $DataEvangelho = $Liturgia->find('.entry-meta', $i)->innertext;
    $LiturgiaPageLink = $Liturgia->find('.entry-link', $i)->href;
//    echo "Project name: ", $html->find('.entry-link', $i)->innertext, "<br/>\n";
//    echo "Link: ", $html->find('.entry-link', $i)->href, "<br/>\n";
//       $html->load_file($LinkPage); 
    $LiturgiaPage->load_file($LiturgiaPageLink);

    if ($LiturgiaPage):
        echo "<br>------------------------ Liturgia Página Interna ------------------------<br>";
        echo $LiturgiaPageLink . "<br>";
        echo $DataEvangelho . "<br>";
        $LiturgiaPagina = $LiturgiaPage->find('#liturgia-4', 0)->innertext;
        echo $LiturgiaPagina;
        echo "------------------------ Liturgia Página Interna ------------------------<br><br>";
    endif;
endfor;



//
//for ($i = 1; $i < 6; $i++):
//    echo $i . "<br>";
//
//    echo "Project name: ", $html->find('.entry-link', $i)->innertext, "<br/>\n";
//    echo "Image source: ", $html->find('.entry-title', $i)->src, "<br/>\n";
//    echo "Link: ", $html->find('a', $i)->href, "<br/>\n";
//
//
//endfor;
//
//for ($i = 1; $i < 6; $i++):
//    foreach ($html->find(".items-list") as $html) {
//        echo "Project name: ", $html->find('.entry-link', $i)->innertext, "<br/>\n";
//        echo "Image source: ", $html->find('.entry-title', $i)->src, "<br/>\n";
//        echo "Link: ", $html->find('a', $i)->href, "<br/>\n";
//    }
//endfor;





$title = $html->find('html', 0);
$image = $html->find('img', 2);
$link = $html->find('a', 0);

//echo $title->plaintext."<br>\n";
//echo $image->src;
//echo $link->plaintext;
//var_dump($ret);
?>
