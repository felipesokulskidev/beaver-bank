<?php
$envPath = __DIR__ . '/../.env';
$env = parse_ini_file($envPath);

if (!$env) {
    die("Erro: não foi possível carregar o arquivo .env");
}

$servername = $env['DB_HOST'];
$username   = $env['DB_USER'];
$password   = $env['DB_PASS'];
$database   = $env['DB_NAME'];
$port       = $env['DB_PORT'];

$conexao = new mysqli($servername, $username, $password, $database, $port);

// Verifica erro
if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}else{
    echo "Funcionando!";
}

?>