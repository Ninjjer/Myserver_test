<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magias</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
    
    <section id="magia">
        

        <?php

            //funçao para redenrizar o template
            function renderTemplate($magia){
                include "template.php";
            }
            //setando as informações do banco de dados
            $servidor = 'localhost';
            $usuario = 'root';
            $senha = '';
            $banco_de_dados = 'livro';
           
            //conectando ao banco de dados
            $connection = mysqli_connect($servidor, $usuario, $senha, $banco_de_dados);

            //funçao para dar select + where
            function call_lista($magia){
            global $connection;
            $where = $connection -> query("select * from magia where elemento = \"$magia\"");
            $rowsMagias = $where -> fetch_all(MYSQLI_ASSOC);
            foreach($rowsMagias as $magia){
                renderTemplate($magia);
                }
            }
            
            if (isset($_GET['lista_magias'])) {
                $select_magia = $_GET['lista_magias'];
                call_lista($select_magia); 
            }
        ?>
        <!--lista das magias que estao no banco de dados-->
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
        <select name="lista_magias" id="lista">
            <option value="fogo">Fogo</option>
            <option value="gelo">Gelo</option>
        </select>
        <input type="submit" value="Selecionar"/>

    </section>

    <?php 
        include "formulario.php";
        //$connection = mysqli_connect($servidor, $usuario, $senha, $banco_de_dados);
        if (isset($_GET['nome']) && !empty($_GET['nome']) &&
        isset($_GET['elemento']) && !empty($_GET['elemento']) &&
        isset($_GET['conjuraçao']) && !empty($_GET['conjuraçao']) &&
        isset($_GET['alvo']) && !empty($_GET['alvo']) &&
        isset($_GET['dano']) && !empty($_GET['dano'])) {

        $nome = $_GET['nome'];
        $elemento = $_GET['elemento'];
        $conjuraçao = $_GET['conjuraçao'];
        $alvo = $_GET['alvo'];
        $dano = $_GET['dano'];
        
        $insert = $connection -> query("insert into magia(nome, elemento, conjuraçao, alvo, dano) values ('$nome', '$elemento', '$conjuraçao', '$alvo', '$dano')");
        
        if ($insert) {
            echo "Dados inseridos com sucesso!";
        } else {
            echo "Erro ao inserir dados: " . $connection->error;
            }
        }
        
        $connection -> close();
    ?>

</body>
</html>