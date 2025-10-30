<?php
function criptografarSenha($senha) {
    $publica = file_get_contents(__DIR__ . "/chave_publica.pem");

    $chaveAES = random_bytes(16);
    $iv = random_bytes(16);

    $senhaCript = openssl_encrypt($senha, "AES-128-CBC", $chaveAES, OPENSSL_RAW_DATA, $iv);
    $senhaFinal = base64_encode($iv . $senhaCript);

    openssl_public_encrypt(base64_encode($chaveAES), $chaveAESCript, $publica);
    file_put_contents(__DIR__ . "/chave_aes_cript.bin", $chaveAESCript);

    return $senhaFinal;
}
function descriptografarSenha($senhaCript) {
    $privada = file_get_contents(__DIR__ . "/chave_privada.pem");
    $chaveCript = file_get_contents(__DIR__ . "/chave_aes_cript.bin");

    openssl_private_decrypt($chaveCript, $chaveAESBase64, $privada);
    $chaveAES = base64_decode($chaveAESBase64);

    $dados = base64_decode($senhaCript);
    $iv = substr($dados, 0, 16);
    $textoCript = substr($dados, 16);

    return openssl_decrypt($textoCript, "AES-128-CBC", $chaveAES, OPENSSL_RAW_DATA, $iv);
}

?>