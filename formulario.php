<div class="formulario">

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get" id="form">

    <label for="nome">Nome:</label>

    <input type="text" id="nome" name="nome"><br><br>

    <label for="elemento">Elemento:</label>

    <input type="text" id="elemento" name="elemento"><br><br>

    <label for="conjuraçao">Conjuração:</label>

    <input type="text" id="conjuraçao" name="conjuraçao"><br><br>

    <label for="alvo">Alvo:</label>

    <input type="text" id="alvo" name="alvo"><br><br>

    <label for="dano">Dano:</label>

    <input type="text" id="dano" name="dano"><br><br>

    <input type="submit" value="Adicionar Magia" id="btn-enviar"/>

</form>
</div>