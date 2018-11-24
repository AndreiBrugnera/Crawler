<?php
$Posti = filter_input_array(INPUT_POST, FILTER_DEFAULT);
include "conexao.php";

if ($Posti):
    $e_id = $Posti["e_id"];
    $e_title = $Posti["e_title"];
    $e_content = $Posti["e_content"];
    $e_link = $Posti["e_link"];

    $query = "INSERT INTO evangelho (e_id, e_title, e_content, e_link, e_status) VALUES ('$e_id', '$e_title', '$e_content', '$e_link', '1')";

    $exec = $conexao->exec($query);

    if ($exec) {
        echo "<br>Cadastrado";
    } else {
        echo "<br>Não Cadastrado";
    }
endif;