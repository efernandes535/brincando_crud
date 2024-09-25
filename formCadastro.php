<?php
// Inclui o arquivo de conexão ao banco de dados
include_once "conexao.php";
?>
<link rel="stylesheet" href="styles.css">

<div class="container">
    <h1>Cadastrar Usuário</h1>
    <form action="cadastrar.php" method="post">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required />
        
        <label for="login">Login:</label>
        <input type="text" id="login" name="login" required />

        <button type="submit">Cadastrar</button>
    </form>
    <a class="btn" href="index.php">Voltar</a> <!-- Botão Voltar -->
</div>
