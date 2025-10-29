<?php
$host ="127.0.0.1";
$usuario = "root";
$senha = "";
$banco = "beaver_bank";

$conexao = new mysqli($host, $usuario, $senha, $banco);
if ($conexao->connect_error) {
    die("Falha na conexão!". $conexao->connect_error);
}else{
    echo"Conexão feita com sucesso!";
}

?>