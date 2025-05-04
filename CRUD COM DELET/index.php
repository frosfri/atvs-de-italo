<?php require 'conexao.php'; ?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>Usuários</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include('navbar.php'); ?>


<div class="container mt-4">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4>
            Lista de Usuários
            <a href="create.php" class="btn btn-primary float-end">Adicionar usuário</a>
          </h4>
        </div>
        <div class="card-body">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Contas a Pagar</th>
                <th>Salário</th>
                <th>Saldo</th>
                <th>Ações</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $resultado = mysqli_query($conexao, "SELECT * FROM noite");
              if (mysqli_num_rows($resultado) > 0) {
                while ($usuario = mysqli_fetch_assoc($resultado)) {
                  $saldo = $usuario['salario'] - $usuario['contas_a_pagar'];
                  $estado = $saldo >= 0 ? 'Positivo' : 'Negativo';
                  ?>
                  <tr>
                    <td><?= $usuario['id']; ?></td>
                    <td><?= $usuario['nome']; ?></td>
                    <td>R$ <?= number_format($usuario['contas_a_pagar'], 2, ',', '.'); ?></td>
                    <td>R$ <?= number_format($usuario['salario'], 2, ',', '.'); ?></td>
                    <td><?= $estado ?> (R$ <?= number_format($saldo, 2, ',', '.'); ?>)</td>
                    <td>
                      <a href="vizualizar.php?id=<?= $usuario['id']; ?>" class="btn btn-secondary btn-sm">Visualizar</a>
                      <a href="editar.php?id=<?= $usuario['id']; ?>" class="btn btn-success btn-sm">Editar</a>
                      <form action="code.php" method="POST" class="d-inline">
                        <button type="submit" name="delete_usuario" value="<?= $usuario['id']; ?>" class="btn btn-danger btn-sm">Excluir</button>
                      </form>
                    </td>
                  </tr>
                  <?php
                }
              } else {
                echo "<tr><td colspan='6' class='text-center'>Nenhum usuário encontrado.</td></tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


