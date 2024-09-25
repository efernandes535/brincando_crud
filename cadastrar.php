<?php
include_once "conexao.php";

try {
    if (isset($_POST['nome']) && isset($_POST['login'])) {
        $nome = filter_var($_POST['nome'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $login = filter_var($_POST['login'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        // Verifica se os dados foram recebidos corretamente
        if (!empty($nome) && !empty($login)) {
            $insert = $conectar->prepare("INSERT INTO login (nome, login) VALUES (:nome, :login)");
            $insert->bindParam(':nome', $nome);
            $insert->bindParam(':login', $login);
            $insert->execute();

            header("Location: index.php");
            exit;
        } else {
            echo "Por favor, preencha todos os campos.";
        }
    } else {
        echo "Dados não enviados.";
    }
} catch (PDOException $e) {
    echo 'Erro: ' . $e->getMessage();
}
?>
