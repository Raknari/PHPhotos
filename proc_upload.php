<?php
    include_once("conexao.php");
    $arquivo = $_FILES ['arquivo']['name'];

    $_UP['pasta'] = 'foto/';

    $_UP['tamanho'] = 1024*1024*100;

    $_UP['extensoes'] = array('png', 'jpg', 'jpeg', 'gif', 'webp');

    $_UP['renomeia'] = false;

    //Array com os tipos de erros de upload do PHP
    $_UP['erros'] [0] = 'Não houve erro';
    $_UP['erros'] [1] = 'O arquivo no upload é maior que o limite do PHP';
    $_UP['erros'] [2] = 'O arquivo ultrapassa o limite de tamanho especificado no HTML';
    $_UP['erros'] [3] = 'O ulpoad do arquivo foi feito parcialmente';
    $_UP['erros'] [4] = 'Não foi feito o upload do arquivo';

    //Verifica se houve algum erro com o upload. Se sim, exibe mensagem de erro
    if($_FILES['arquivo']['error'] != 0){
        die("Não foi possivel fazer o upload, erro: <br />". $_UP['erros'] [$_FILES['arquivo']['error']]);
        exit;
    }

    //Faz a verificação da extensão do arquivo
    $extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
    if(array_search($extensao, $_UP['extensoes']) === false){
            echo "
                <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/site/foto/proc_upload.php'> 
                <script type=\"text/javascript\">
                    alert(\"A imagem não foi cadastrada, extensão inválida.\");
                </script>";
    }
    else if ($_UP['tamanho'] < $_FILES['arquivo']['size']){
        echo "
                <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/site/'> 
                <script type=\"text/javascript\">
                    alert(\"Tamanho da imagem inválido.\");
                </script>";
    }
    else{
        if($_UP['renomeia'] == true) {
            $nome_final = time().'.jpeg';
        }
        else{
            $nome_final = $_FILES['arquivo']['name'];
        }
        if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta']. $nome_final)){
            $query = mysqli_query($conn, "INSERT INTO foto (
                nome) VALUES ('$nome_final')");
                echo "
                <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/site/'> 
                <script type=\"text/javascript\">
                    alert(\"Imagem cadastrada.\");
                </script>";
        }
    }
 
?>
