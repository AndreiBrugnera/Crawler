

<?php
$Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);

include "conexao.php";


$e_id = $Post["e_id"];
$e_title = $Post["e_title"];
$e_content = $Post["e_content"];
//$e_content = strip_tags(html_entity_decode($Post["e_content"]));
$e_link = $Post["e_link"];

$query = "INSERT INTO evangelho (e_id, e_title, e_content, e_link, e_status) VALUES ('$e_id', '$e_title', '$e_content', '$e_link', '1')";

$exec = $conexao->exec($query);

var_dump($query);

if ($exec) {
    echo "<br>Cadastrado";
} else {
    echo "<br>Não Cadastrado";
}
?>

<!--<form action="" method='post'>


    <input type='text' name='e_id' value='<?= $Post['e_id']; ?>'/>
    <input type='text' name='e_title' value='<?= $Post['e_title']; ?>'/>

    <input type='text' name='e_link' value='<?= $Post['e_link']; ?>'/>

    <input class='button enviar' type='submit' name='SendFormContato' value='Enviar' />

</form>-->

<!--<input type="text" value="Hello World" id="myInput">-->

<textarea id="myInput"><?= preg_replace("/<.*?>/", " ", $e_content); ?></textarea>
<button onclick="myFunction()"><?= $e_content ?></button>
<script>
function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  document.execCommand("copy");
  alert("Copied the text: " + copyText.value);
}
</script>