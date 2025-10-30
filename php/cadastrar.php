<?php
include("conexao.php");
require_once("criptografia_hibrida.php");

$email = $_POST["email"];
$usuario = $_POST["usuario"];
$senha = $_POST["senha"];

$stmt = mysqli_stmt_init($conexao);
$query = "INSERT INTO usuarios (email, nome, senha) VALUES (?, ?, ?)";
mysqli_stmt_prepare($stmt, $query);

$senhaCriptografada = criptografarSenha($senha);

mysqli_stmt_bind_param($stmt, 'sss', $email, $usuario, $senhaCriptografada);
$resultado = mysqli_stmt_execute($stmt);

if($resultado) {
    $retorno["status"] = "s";
    $retorno["mensagem"] = "Usuário cadastrado com sucesso!";
} else {
    $retorno["status"] = "n";
    $retorno["mensagem"] = "Erro ao cadastrar usuário!";
}

$json = json_encode($retorno);
echo $json;
?>
