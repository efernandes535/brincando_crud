<?php
include_once "conexao.php";

$message = '';

try {
    // Filtra e sanitiza os dados de entrada
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $nome = filter_var($_POST['nome'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $login = filter_var($_POST['login'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if ($id && $nome && $login) {
        // Prepara a instrução SQL para atualização
        $update = $conectar->prepare("UPDATE login SET nome = :nome, login = :login WHERE id = :id");
        $update->bindParam(':id', $id);
        $update->bindParam(':nome', $nome);
        $update->bindParam(':login', $login);
        $update->execute();

        $message = "Usuário atualizado com sucesso!";
        header("Location: index.php");
        exit;
    } else {
        $message = "Dados inválidos.";
    }

} catch (PDOException $e) {
    $message = 'Erro: ' . $e->getMessage();
}
?>
<link rel="stylesheet" href="styles.css">

<div class="container">
    <h1>Atualizar Usuário</h1>
    <?php if ($message): ?>
        <p class="message"><?php echo $message; ?></p>
    <?php endif; ?>
    <a class="btn" href="index.php">Voltar</a> <!-- Botão Voltar -->
</div>
