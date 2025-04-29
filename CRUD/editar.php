<?php
include("conexao.php");

$id = $_GET['id'];
$sql = "SELECT * FROM usuario WHERE id_usuario = $id";
$result = mysqli_query($conexao, $sql);
$dados = mysqli_fetch_assoc($result);
?>

<h2>Editar Usuário</h2>
<form action="atualizar.php" method="POST">
    <input type="hidden" name="id_usuario" value="<?php echo $dados['id_usuario']; ?>">
    E-mail: <input type="text" name="email" value="<?php echo $dados['email']; ?>"><br>
    Senha: <input type="text" name="senha" value="<?php echo $dados['senha']; ?>"><br>
    <button type="submit">Atualizar</button>
</form>
