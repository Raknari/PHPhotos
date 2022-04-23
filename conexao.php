<?php
        $servidor = "localhost";
        $usuario = "root";
        $senha = "";
        $dbname = "raknar";

        $conn = mysqli_connect($servidor,$usuario,$senha,$dbname);
        if(!$conn){
            die("Falha ao conectar:". mysqli_connect_error());
        }
        else{

        }

        
?>