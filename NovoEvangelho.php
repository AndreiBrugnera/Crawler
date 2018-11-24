<style>
    .dashboard_content{
        border:1px solid #c8c8c8;
        display:flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: space-around;
        background:#f4f4f4;
        margin:0;
        padding:0;
    }

    .box25{
        margin: 10px 0.5%;
        background:#FFF;
        display:flex;
        flex-direction: column;
        flex-wrap: nowrap;
        max-width:22%;
        padding:10px 15px;
        border-radius:10px;
        box-shadow:0 0px 40px rgba(0, 0, 0, 0.2);

    }
</style>


<div class="dashboard_content">
    <?php
    require 'simple_html_dom.php';

    $Page1 = new simple_html_dom();
    $Page2 = new simple_html_dom();
    $Page3 = new simple_html_dom();

    $Page1->load_file('http://liturgia.cancaonova.com/pb/liturgia/page/1');
    $ReqHome1 = $Page1->find('.entry-link');

    $Page2->load_file('http://liturgia.cancaonova.com/pb/liturgia/page/2');
    $ReqHome2 = $Page2->find('.entry-link');

    $Page3->load_file('http://liturgia.cancaonova.com/pb/liturgia/page/3');
    $ReqHome3 = $Page3->find('.entry-link');


    $Page1_Link = array();
    $Page1_Data = array();

    foreach ($ReqHome1 as $ContentHome) {
        $Page1_Link[] = $ContentHome->href;
        $Page1_Data[] = $ContentHome->find('.entry-meta', 0)->innertext;
//    echo $ContentHome->href . " -|- " . $ContentHome->find('.entry-meta', 0)->innertext . "<br>";
    }

    $Page2_Link = array();
    $Page2_Data = array();
    foreach ($ReqHome2 as $ContentHome) {
        $Page2_Link[] = $ContentHome->href;
        $Page2_Data[] = $ContentHome->find('.entry-meta', 0)->innertext;
//    echo $ContentHome->href . " -|- " . $ContentHome->find('.entry-meta', 0)->innertext . "<br>";
    }

    $Page3_Link = array();
    $Page3_Data = array();
    foreach ($ReqHome3 as $ContentHome) {
        $Page3_Link[] = $ContentHome->href;
        $Page3_Data[] = $ContentHome->find('.entry-meta', 0)->innertext;
//    echo $ContentHome->href . " -|- " . $ContentHome->find('.entry-meta', 0)->innertext . "<br>";
    }

    $ArrayLinks = [
        0 => $Page1_Link[0],
        1 => $Page1_Link[1],
        2 => $Page1_Link[2],
        3 => $Page1_Link[3],
        4 => $Page1_Link[4],
        5 => $Page1_Link[5],
        6 => $Page1_Link[6],
        7 => $Page1_Link[7],
        8 => $Page1_Link[8],
        9 => $Page1_Link[9],
        10 => $Page1_Link[10],
        11 => $Page2_Link[0],
        12 => $Page2_Link[1],
        13 => $Page2_Link[2],
        14 => $Page2_Link[3],
        15 => $Page2_Link[4],
        16 => $Page2_Link[5],
        17 => $Page2_Link[6],
        18 => $Page2_Link[7],
        19 => $Page2_Link[8],
        20 => $Page2_Link[9],
        21 => $Page2_Link[10],
        22 => $Page3_Link[0],
        23 => $Page3_Link[1],
        24 => $Page3_Link[2],
        25 => $Page3_Link[3],
        26 => $Page3_Link[4],
        27 => $Page3_Link[5],
        28 => $Page3_Link[6],
        29 => $Page3_Link[7],
        30 => $Page3_Link[8],
        31 => $Page3_Link[9],
        32 => $Page3_Link[10],
    ];

    $ArrayDatas = [
        0 => $Page1_Data[0],
        1 => $Page1_Data[1],
        2 => $Page1_Data[2],
        3 => $Page1_Data[3],
        4 => $Page1_Data[4],
        5 => $Page1_Data[5],
        6 => $Page1_Data[6],
        7 => $Page1_Data[7],
        8 => $Page1_Data[8],
        9 => $Page1_Data[9],
        10 => $Page1_Data[10],
        11 => $Page2_Data[0],
        12 => $Page2_Data[1],
        13 => $Page2_Data[2],
        14 => $Page2_Data[3],
        15 => $Page2_Data[4],
        16 => $Page2_Data[5],
        17 => $Page2_Data[6],
        18 => $Page2_Data[7],
        19 => $Page2_Data[8],
        20 => $Page2_Data[9],
        21 => $Page2_Data[10],
        22 => $Page3_Data[0],
        23 => $Page3_Data[1],
        24 => $Page3_Data[2],
        25 => $Page3_Data[3],
        26 => $Page3_Data[4],
        27 => $Page3_Data[5],
        28 => $Page3_Data[6],
        29 => $Page3_Data[7],
        30 => $Page3_Data[8],
        31 => $Page3_Data[9],
        32 => $Page3_Data[10],
    ];


    $PageLiturgia = new simple_html_dom();
    $cont_id = 0;
    foreach ($ArrayLinks as $LinksHome):
        $PageLiturgia->load_file($LinksHome);

//        echo "<br>------------------------ Liturgia Página Interna ------------------------<br>";
//        echo $LinksHome . "<br>";
//        echo $ArrayDatas[$cont];
//        $cont++;
//        echo "<br>" . $cont;
//        echo $DatasHome . "<br>";
//    if ($PageLiturgia->find('#liturgia-1')):
//        $Liturgia1 = $PageLiturgia->find('#liturgia-1', 0)->innertext;
//        echo $Liturgia1;
//        echo "======================";
//    endif;
//
//    if ($PageLiturgia->find('#liturgia-2')):
//        $Liturgia2 = $PageLiturgia->find('#liturgia-2', 0)->innertext;
//        echo $Liturgia2;
//        echo "======================";
//
//    endif;
//
//    if ($PageLiturgia->find('#liturgia-3')):
//        $Liturgia3 = $PageLiturgia->find('#liturgia-3', 0)->innertext;
//        echo $Liturgia3;
//        echo "======================";
//
//    endif;

        if ($PageLiturgia->find('#liturgia-4')):
            $Liturgia4 = $PageLiturgia->find('#liturgia-4', 0)->innertext;
//            echo "======================";
//            echo $Liturgia4;
//            echo "======================";
//        echo "<br>------------------------ FIM Liturgia Página Interna ------------------------<br><br>";



            $LiturgiaLimpa = trim($Liturgia4);

            $datas = explode(", ", strip_tags($ArrayDatas[$cont_id]));
            $date = str_replace("de", "", $datas);

            $DiaEvangelho = explode(" ", $date[0]);
            $DataEvangelho = explode(" ", $date[1]);


            $diaEscrito = date('l');
            $diaNumero = date('j');
            $mesEscrito = date('F');
            $anoNumero = date('Y');


            if ($DiaEvangelho[0] == $diaEscrito && $DataEvangelho[1] == $diaNumero && $DataEvangelho[4] == $mesEscrito && $DataEvangelho[7] == $anoNumero):
                $EvangelhodoDia = true;
            else:
                $EvangelhodoDia = false;
            endif;


            echo "<article class='box box25 page_single hello_single' " . ($EvangelhodoDia ? "style='background:#f3f4cc'" : "") . ">";
            echo "<div class='box_content wc_normalize_height'>
                    <h4>{$ArrayDatas[$cont_id]}</h4
                    <p id='to-copy'>{$Liturgia4}</p>
                    <p><i><a href='{$LinksHome}' target='_blank'>{$LinksHome}</a></i></p>
                </div>
                <div class='page_single_action'>
                    <a title='Editar Hellobar' href='dashboard.php?wc=hellobar/create&id={$DataEvangelho[1]}{$DataEvangelho[4]}{$DataEvangelho[7]}' class='post_single_center icon-pencil btn btn_blue'>Selecionar</a>
                </div>
            ";


            echo "<form action='Post.php' method='POST'>";


            $htmlForm = "<input type='hidden' name='e_id' value='{$DataEvangelho[1]}{$DataEvangelho[4]}{$DataEvangelho[7]}'/>"
                    . "<input type='hidden' name='e_title' value='{$DiaEvangelho[0]}, {$DataEvangelho[1]}/{$DataEvangelho[4]}/{$DataEvangelho[7]}'/>"
                    . "<input type='hidden' name='e_content' value='{$LiturgiaLimpa}'/>"
                    . "<input type='hidden' name='e_link' value='{$LinksHome}'/>";

            echo $htmlForm;
            ?>
            <button onClick="CopyToClipboard('to-copy')">Copy</button>
            <?php
            echo "<input class='button enviar' type='submit' name='SendFormContato' value='Enviar' />";


            echo "</form>"
            . "</article>";
        endif;


        $cont_id++;
    endforeach;
    ?>

    <script>
        function copyText() {
            var outputText = "";
            var targets = document.getElementsByClassName('copytext');
            for (var i = 0; i < targets.length; i++) {
                outputText += targets[i].innerText;
            }
            var output = document.getElementById('output');
            output.innerText = outputText;
            var range = document.createRange();
            range.selectNodeContents(output);
            var selection = window.getSelection();
            selection.removeAllRanges();
            selection.addRange(range);
            document.execCommand('copy');
            output.style.display = 'none';
        }
    </script>
</div>