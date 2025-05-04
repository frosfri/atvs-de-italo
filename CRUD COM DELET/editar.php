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
?>


<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>Editar Usuário</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include('navbar.php'); ?>
<div class="container mt-4">
  <div class="card">
    <div class="card-header"><h4>Editar Usuário</h4></div>
    <div class="card-body">
      <form action="code.php" method="POST">
        <input type="hidden" name="id" value="<?= $usuario['id']; ?>">
        <div class="mb-3">
          <label>Nome</label>
          <input type="text" name="nome" class="form-control" value="<?= $usuario['nome']; ?>" required>
        </div>
        <div class="mb-3">
          <label>Contas a Pagar</label>
          <input type="number" step="0.01" name="contas_a_pagar" class="form-control" value="<?= $usuario['contas_a_pagar']; ?>" required>
        </div>
        <div class="mb-3">
          <label>Salário</label>
          <input type="number" step="0.01" name="salario" class="form-control" value="<?= $usuario['salario']; ?>" required>
        </div>
        <button type="submit" name="atualizar_usuario" class="btn btn-success">Atualizar</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
      </form>
    </div>
  </div>
</div>
</body>
</html>
