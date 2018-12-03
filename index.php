<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title></title>

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
    </head>
    <body>

        <div class="dashboard_content">
            <?php
            // CHAMA BIBLIOTECA E CARREGA LINK
            require 'simple_html_dom.php';
            $Page1 = new simple_html_dom();
            $Page1->load_file('http://liturgia.cancaonova.com/pb/liturgia/page/1');
            $ReqHome1 = $Page1->find('.entry-link'); // BUSCA NO LINK A CLASSE 
            // SETA ARRAYS PARA SEREM USADOS NO FOREACH
            $Page1_Link = array();
            $Page1_Data = array();

            // FOREACH ATRIBUINDO A BUSCA COM OS LINKS E CONTEUDO NOS ARRAYS
            foreach ($ReqHome1 as $ContentHome) {
                $Page1_Link[] = $ContentHome->href;
                $Page1_Data[] = $ContentHome->find('.entry-meta', 0)->innertext;
            }

            // ORGANIZA ARRAY DE LINK E INDICES PARA DEPOIS PERCORRER E FAZER COMPARAÇÃO
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
            ];
            // ORGANIZA ARRAY DE DATAS E INDICES PARA DEPOIS PERCORRER E FAZER COMPARAÇÃO
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
            ];

            // INSTANCIA A BIBLIOTECA E SETA UM CONTADOR EM 0
            $PageLiturgia = new simple_html_dom();
            $cont_id = 0;
            // PERCORRE TODO O ARRAY DE LINKS
            foreach ($ArrayLinks as $LinksHome):
                
                // CARREGA OS LINKS DA PAGINA INTERNA
                $PageLiturgia->load_file($LinksHome);

                //VERIFICA SE RETORNOU O ID LITURGIA-4 DOS LINKS
                if ($PageLiturgia->find('#liturgia-4')):
                    //SE RETORNAR TRUE CARREGA A VARIAVEL LITURGIA4 COM O CONTEUDO DA BUSCA DO ID LITURGIA
                    $Liturgia4 = $PageLiturgia->find('#liturgia-4', 0)->innertext;

                    // FORMATAÇÃO (LIMPA ESPAÇOS E RETIRA COISAS INUTEIS)
                    $LiturgiaLimpa = trim($Liturgia4);
                    $datas = explode(", ", strip_tags($ArrayDatas[$cont_id]));
                    $date = str_replace("de", "", $datas);
                    $DiaEvangelho = explode(" ", $date[0]);
                    $DataEvangelho = explode(" ", $date[1]);
                    $diaEscrito = date('l');
                    $diaNumero = date('j');
                    $mesEscrito = date('F');
                    $anoNumero = date('Y');
                    // FIM FORMATAÇÃO 
                    //CONFERE O DIA ATUAL E O DIA DA LITURGIA E RETORNA
                    if ($DiaEvangelho[0] == $diaEscrito && $DataEvangelho[1] == $diaNumero && $DataEvangelho[4] == $mesEscrito && $DataEvangelho[7] == $anoNumero):
                        $EvangelhodoDia = true;
                    else:
                        $EvangelhodoDia = false;
                    endif;

                    // HTML COM O CONTEÚDO NO INDEX
                    echo "<article class='box box25 page_single hello_single' " . ($EvangelhodoDia ? "style='background:#f3f4cc'" : "") . ">";
                    echo "<div class='box_content wc_normalize_height'>
                    <h4>{$ArrayDatas[$cont_id]}</h4
                    <p>{$Liturgia4}</p>
                    <p><i><a href='{$LinksHome}' target='_blank'>{$LinksHome}</a></i></p>
                </div>";
                    echo "</form>"
                    . "</article>";
                endif;
                $cont_id++;
            endforeach;
            ?>
        </div>
    </body>
</html>
