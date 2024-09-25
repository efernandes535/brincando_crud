<?php
// Inclui o arquivo de conexão ao banco de dados
include_once "conexao.php";

try {
    // Sanitiza o ID recebido via GET
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    // Verifica se o ID é válido
    if ($id) {
        // Prepara a instrução SQL para exclusão
        $delete = $conectar->prepare("DELETE FROM login WHERE id = :id");
        
        // Vincula o parâmetro à instrução SQL
        $delete->bindParam(':id', $id);
        
        // Executa a instrução SQL
        $delete->execute();

        // Redireciona para a página index.php após a exclusão
        header("Location: index.php");
        exit; // Para garantir que o script não continue executando
    } else {
        // Mensagem de erro caso o ID não seja válido
        echo "ID inválido.";
    }

} catch (PDOException $e) {
    // Exibe a mensagem de erro caso ocorra uma exceção durante a execução
    echo 'Erro: ' . $e->getMessage();
}

