<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: POST, GET, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With'); 
header('Content-Type: application/json; charset=utf-8');

$host = "localhost"; 
$usuario = "root"; 
$senha = ""; 
$banco = "questti"; 

$conn = new mysqli($host, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

echo "Conexão efetuada com sucesso!";
?>
