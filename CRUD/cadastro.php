<?php


include("conexao.php");


$nome=$_POST['nome'];
$idade=$_POST['idade'];
$email=$_POST['email'];


$sql="INSERT INTO usuario (nome,idade,email)
values ('$nome','$idade','$email')";

if(mysqli_query($conexao, $sql)){
    header('location:index.php');

}else{
    echo "Error". mysqli_connect_error($conexao);
}


mysqli_close($conexao);
?>
