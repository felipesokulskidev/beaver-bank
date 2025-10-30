<?php
include("conexao.php");
require_once("criptografia_hibrida.php");

$email = $_POST["email"];
$senha = $_POST["senha"];


$stmt = mysqli_stmt_init($con);
$query = "SELECT * FROM usuarios WHERE email = ? AND senha = ?";
mysqli_stmt_prepare($stmt, $query);

$senhaDescriptografada = descriptografarSenha($senha);

mysqli_stmt_bind_param($stmt, 'ss', $email, $senhaDescriptografada);
$resultado = mysqli_stmt_execute($stmt);

mysqli_stmt_store_result($stmt);

if(mysqli_stmt_num_rows($stmt) > 0) {
    $retorno["status"] = "s";
    $retorno["mensagem"] = "Logado com sucesso!";
} else {
    $retorno["status"] = "n";
    $retorno["mensagem"] = "Erro ao logar o usuário!";
}

$json = json_encode($retorno);
echo $json;
?>

