<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php
include("conexao.php");

$sql = "SELECT * FROM usuario";
$result = mysqli_query($conexao, $sql);

if (!$result) {
    die("Erro na consulta: " . mysqli_error($conexao));
}
?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Lista de Usuários</h2>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Nome</th>
                <th>Idade</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['nome']; ?></td>
                <td><?php echo $row['idade']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td>
                    <a href="atualizar.php?id=<?php echo $row['id_usuario']; ?>" class="btn btn-info btn-sm">Atualizar</a>
                    <a href="visualizar.php?id=<?php echo $row['id_usuario']; ?>" class="btn btn-secondary btn-sm">Visualizar</a>
                    <a href="editar.php?id=<?php echo $row['id_usuario']; ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="excluir.php?id=<?php echo $row['id_usuario']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

</body>
</html>
