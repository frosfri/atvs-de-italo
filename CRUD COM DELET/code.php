<?php
require 'conexao.php';


if (isset($_POST['salvar_usuario'])) {
    $nome = $_POST['nome'];
    $contas = $_POST['contas_a_pagar'];
    $salario = $_POST['salario'];


    $sql = "INSERT INTO noite (nome, contas_a_pagar, salario) VALUES ('$nome', '$contas', '$salario')";
    mysqli_query($conexao, $sql);
    header("Location: index.php");
    exit();
}


if (isset($_POST['delete_usuario'])) {
    $id = $_POST['delete_usuario'];
    mysqli_query($conexao, "DELETE FROM noite WHERE id = $id");
    header("Location: index.php");
    exit();
}


if (isset($_POST['atualizar_usuario'])) {
    $id = intval($_POST['id']);
    $nome = $_POST['nome'];
    $contas = $_POST['contas_a_pagar'];
    $salario = $_POST['salario'];


    $sql = "UPDATE noite SET nome='$nome', contas_a_pagar='$contas', salario='$salario' WHERE id=$id";
    mysqli_query($conexao, $sql);
    header("Location: index.php");
    exit();
}


if (isset($_POST['vizualizar_usuario'])) {
    $id = intval($_POST['id']);
    $nome = $_POST['nome'];
    $contas = $_POST['contas_a_pagar'];
    $salario = $_POST['salario'];


    $sql = "UPDATE noite SET nome='$nome', contas_a_pagar='$contas', salario='$salario' WHERE id=$id";
    mysqli_query($conexao, $sql);
    header("Location: index.php");
    exit();
}
?>
