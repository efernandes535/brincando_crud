<?php
// Inclui o arquivo de conexão ao banco de dados
include_once "conexao.php";
?>

<form action="cadastrar.php" method="post">
    Nome: <input type="text" name="nome" required/><br>
    Login: <input type="text" name="login" required/><br>
    <input type="submit" value="Cadastrar">
</form>
