<?php
include_once "conexao.php";

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

        header("Location: index.php");
        exit;
    } else {
        echo "Dados inválidos.";
    }

} catch (PDOException $e) {
    echo 'Erro: ' . $e->getMessage();
}
?>
