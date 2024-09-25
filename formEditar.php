<?php
include_once "conexao.php";

$id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
$consulta = $conectar->prepare("SELECT * FROM login WHERE id = :id");
$consulta->bindParam(':id', $id);
$consulta->execute();
$linha = $consulta->fetch(PDO::FETCH_ASSOC);
?>
<link rel="stylesheet" href="styles.css">

<div class="container">
    <h1>Editar Usuário</h1>
    <form action="editar.php" method="post">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($linha['nome']); ?>" required/>
        
        <label for="login">Login:</label>
        <input type="text" id="login" name="login" value="<?php echo htmlspecialchars($linha['login']); ?>" required/>
        
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($linha['id']); ?>">
        <button type="submit">Editar</button>
    </form>
    <a class="btn" href="index.php">Voltar</a> <!-- Botão Voltar -->
</div>
