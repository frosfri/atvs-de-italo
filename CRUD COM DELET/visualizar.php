<?php
require 'conexao.php';


if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}


$id = intval($_GET['id']);
$resultado = mysqli_query($conexao, "SELECT * FROM noite WHERE id = $id");


if (mysqli_num_rows($resultado) === 0) {
    echo "Usuário não encontrado.";
    exit();
}


$usuario = mysqli_fetch_assoc($resultado);
$saldo = $usuario['salario'] - $usuario['contas_a_pagar'];
$estado = $saldo >= 0 ? 'Positivo' : 'Negativo';
?>


<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>Visualizar Usuário</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include('navbar.php'); ?>
<div class="container mt-4">
  <div class="card">
    <div class="card-header">
      <h4>Detalhes do Usuário</h4>
    </div>
    <div class="card-body">
      <p><strong>ID:</strong> <?= $usuario['id']; ?></p>
      <p><strong>Nome:</strong> <?= $usuario['nome']; ?></p>
      <p><strong>Contas a Pagar:</strong> R$ <?= number_format($usuario['contas_a_pagar'], 2, ',', '.'); ?></p>
      <p><strong>Salário:</strong> R$ <?= number_format($usuario['salario'], 2, ',', '.'); ?></p>
      <p><strong>Saldo:</strong> <?= $estado ?> (R$ <?= number_format($saldo, 2, ',', '.'); ?>)</p>
      <a href="index.php" class="btn btn-secondary">Voltar</a>
    </div>
  </div>
</div>
</body>
</html>
