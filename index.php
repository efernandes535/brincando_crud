<?php
include_once "conexao.php";

try {
    // Executa a instrução SQL para selecionar todos os usuários
    $consulta = $conectar->query("SELECT * FROM login");

    echo "<link rel='stylesheet' href='styles.css'>"; // Inclui o CSS
    echo "<div class='container'>";
    echo "<h1>Listagem de Usuários</h1>";
    echo "<a class='btn' href='formCadastro.php'>Novo Cadastro</a><br><br>";
    echo "<table>";
    echo "<thead><tr><th>Nome</th><th>Login</th><th>Ações</th></tr></thead><tbody>";

    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>
                <td>{$linha['nome']}</td>
                <td>{$linha['login']}</td>
                <td>
                    <a class='btn-edit' href='formEditar.php?id={$linha['id']}'>Editar</a> - 
                    <a class='btn-delete' href='excluir.php?id={$linha['id']}'>Excluir</a>
                </td>
              </tr>";
    }

    echo "</tbody></table>";
    echo "<p>{$consulta->rowCount()} Registros Exibidos</p>";
    echo "</div>";

} catch (PDOException $e) {
    echo 'Erro: ' . $e->getMessage();
}
?>
