<!DOCTYPE html>
<html>
    <head>
        <script src='tinymce/tinymce.min.js'></script>
        <script>
            tinymce.init({
                selector: '.mytextarea'
            });
        </script>
    </head>

    <body>

        <?php
        $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        include "conexao.php";


        $e_id = $Post["e_id"];
        $e_title = $Post["e_title"];
        $e_content = $Post["e_content"];
//$e_content = strip_tags(html_entity_decode($Post["e_content"]));
        $e_link = $Post["e_link"];

//        $query = "INSERT INTO evangelho (e_id, e_title, e_content, e_link, e_status) VALUES ('$e_id', '$e_title', '$e_content', '$e_link', '1')";
//
//        $exec = $conexao->exec($query);
//
//        if ($exec) {
//            echo "<br>Cadastrado";
//        } else {
//            echo "<br>Não Cadastrado";
//        }
        ?>

        <form action="cadastrar.php" method='post'>


            <input type='text' name='e_id' value='<?= $Post['e_id']; ?>'/>
            <input type='text' name='e_title' value='<?= $Post['e_title']; ?>'/>

            <input type='text' name='e_content' value='<?= $Post['e_content']; ?>'/>
            <input type='text' name='e_link' value='<?= $Post['e_link']; ?>'/>

            <input class='button enviar' type='submit' name='SendFormContato' value='Enviar' />

        </form>

<!--<input type="text" value="Hello World" id="myInput">-->

        <textarea id="myInput" onclick="myFunction()"><?= $e_content; ?></textarea>
        <script>
            function myFunction() {
                var copyText = document.getElementById("myInput");
                copyText.select();
                document.execCommand("copy");
                alert("Copied the text: " + copyText.value);
            }
        </script>

        <textarea class="mytextarea" ><?= $e_content; ?></textarea>
    </body>
</html>