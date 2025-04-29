<?php
include("conexao.php");

$id = $_POST['id_usuario'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "UPDATE usuario SET email='$email', senha='$senha' WHERE id_usuario = $id";

if (mysqli_query($conexao, $sql)) {
    header("Location: index.php");
    exit;
} else {
    echo "Erro ao atualizar: " . mysqli_error($conexao);
}
?>
