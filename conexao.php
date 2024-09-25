<?php

try {
    // Faz conexão com o banco de dados
    $conectar = new PDO("mysql:host=localhost;port=3306;dbname=pdo;", "root", "dsiders");
    // echo "Conectado com sucesso";
} catch (PDOException $e) {
    // Caso ocorra algum erro na conexão com o banco de dados, exibe mensagem
    echo 'Falha ao conectar como banco de dados: ' . $e->getMessage();
}