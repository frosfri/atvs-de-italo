<?php
include("conexao.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete_sql = "DELETE FROM usuario WHERE id = $id";

    if (mysqli_query($conexao, $delete_sql)) {
        header("Location: index.php");  // Redireciona para a lista após a exclusão
    } else {
        echo "Erro ao excluir usuário.";
    }
} else {
    die("ID de usuário não fornecido.");
}
?>
