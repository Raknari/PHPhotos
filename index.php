<?php
    include_once("conexao.php");
    $consulta = "SELECT * FROM foto";
    $foto = $conn->query($consulta) or die($conn->error);
    ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="estilo/inicio.css" rel="stylesheet">
    <link rel="stylesheet" href="estilo/css">
    <title>Document</title>
</head>
<body>  
    <header>
        <div class="foto">
            <img src="https://66.media.tumblr.com/c9120ba5214fc31a0bb7b130df37c6ca/tumblr_mwbpssjJZh1s93us5o1_500.gifv" alt="Gustavo">
        </div>
    </header>

    <main>
        <?php while ($dado = $foto->fetch_array()){?>
            <div class="container">
            <img src=<?php echo 'foto/'.$dado["nome"]; ?> alt="tumblr">
        </div>
        <?php } ?>
    </main>

    <footer>
        <form method="POST" action="proc_upload.php" enctype="multipart/form-data">
        <input name="arquivo" type="file">
        </br>
        </br>
        <input type="submit" value="Inserir"><br>
    </footer>
</form>
</body>
</html>