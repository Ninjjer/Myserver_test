<?php

    //funçao para redenrizar o template
    function renderTemplate($magia)
    {
        include "template.php";
    }
    //setando as informações do banco de dados
    $servidor = 'localhost';
    $usuario = 'root';
    $senha = '';
    $banco_de_dados = 'livro';
    
    //conectando ao banco de dados
    $connection = mysqli_connect($servidor, $usuario, $senha, $banco_de_dados); //má pratica, tem q mudar
    
    $result = $connection->query("SELECT * FROM magia");
    $magias = $result->fetch_all(MYSQLI_ASSOC);

    if (isset($_GET['lista_magias'])) 
    {
        $select_magia = $_GET['lista_magias'];
        if ($select_magia != 'todos') 
        {
            $where = $connection->query("SELECT * FROM magia WHERE elemento = \"$select_magia\"");
            $rowsMagias = $where->fetch_all(MYSQLI_ASSOC);
            $magias = $rowsMagias;
        }
    }
        // Render the template for each magia
        foreach ($magias as $magia) 
        {
            renderTemplate($magia);
        }

        include "formulario.php";

        if (isset($_GET['nome']) && !empty($_GET['nome']) && isset($_GET['elemento']) && !empty($_GET['elemento']) && isset($_GET['conjuraçao']) && !empty($_GET['conjuraçao']) && isset($_GET['alvo']) && !empty($_GET['alvo']) && isset($_GET['dano']) && !empty($_GET['dano'])) 
        {

        //após a verificaçao do IF, o GET vai pegar os elementos e dar insert abaixo
        $nome = $_GET['nome'];
        $elemento = $_GET['elemento'];
        $conjuraçao = $_GET['conjuraçao'];
        $alvo = $_GET['alvo'];
        $dano = $_GET['dano'];
        
        $insert = $connection -> query("insert into magia(nome, elemento, conjuraçao, alvo, dano) values ('$nome', '$elemento', '$conjuraçao', '$alvo', '$dano')");        
        }
?>

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
        <!--lista das magias que estao no banco de dados-->
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
            <select name="lista_magias" id="lista">
                <option value="todos">Mostrar todos</option>
                <option value="fogo">Fogo</option>
                <option value="gelo">Gelo</option>
            </select>
            <input type="submit" value="Selecionar"/>
        </form>
    </section>

</body>
<script src="index.js"></script>
</html>