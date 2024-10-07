<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

            //criando um objeto dessa conexao
            $connection = mysqli_connect($servidor, $usuario, $senha, $banco_de_dados);

            /*
            $consulta = $connection -> query('insert into magia(nome, elemento, conjuraçao, alvo, dano) values
            ("Bola de fogo", "fogo", "fast", "area/3m", "3d12 + int")');  */

            //var_dump($consulta);
            /*
            $select = $connection -> query('select * from magia');

            $rowsMagias = $select -> fetch_all(MYSQLI_ASSOC);

            $connection -> close();

            foreach($rowsMagias as $magia){
                renderTemplate($magia);
            }
            */

            function call_lista($magia){
            $where = $connection_where -> query('select * from magia where elemento = "fogo" ');
            foreach($rowsMagias as $magia){
                renderTemplate($magia);
            }
            }
        ?>
    </section>

    <section>
        <select name="lista_magias" id="lista">
            <option value="fogo">Fogo</option>
            <option value="gelo">Gelo</option>
        </select>
        <input type="submit" value="Selecionar" />
    </section>
    
    <?php 
        if (isset($_GET['magia'])) {
            $select_magia = $_GET['magia'];
            call_lista($select_);
        }
    ?>

</body>
</html>