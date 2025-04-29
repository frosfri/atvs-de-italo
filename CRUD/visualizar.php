<?php
include("conexao.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM usuario WHERE id = $id";
    $result = mysqli_query($conexao, $sql);
    $user = mysqli_fetch_assoc($result);

    if (!$user) {
        die("Usuário não encontrado.");
    }
} else {
    die("ID de usuário não fornecido.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Detalhes do Usuário</h2>
    <table class="table">
        <tr>
            <th>Nome</th>
            <td><?php echo $user['nome']; ?></td>
        </tr>
        <tr>
            <th>Idade</th>
            <td><?php echo $user['idade']; ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?php echo $user['email']; ?></td>
        </tr>
    </table>
    <a href="index.php" class="btn btn-primary">Voltar</a>
</div>

</body>
</html>
