<?php
include_once "conexao.php";

$id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
$consulta = $conectar->prepare("SELECT * FROM login WHERE id = :id");
$consulta->bindParam(':id', $id);
$consulta->execute();
$linha = $consulta->fetch(PDO::FETCH_ASSOC);
?>

<form action="editar.php" method="post">
    Nome: <input type="text" name="nome" value="<?php echo htmlspecialchars($linha['nome']); ?>" required/><br>
    Login: <input type="text" name="login" value="<?php echo htmlspecialchars($linha['login']); ?>" required/><br>
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($linha['id']); ?>">
    <input type="submit" value="Editar">
</form>
