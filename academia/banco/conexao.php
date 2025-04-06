<?php

$host = 'localhost'; 
$usuario = 'root';   
$senha = '';         
$banco = 'senac_boxe'; 

// Criar conexão
$conn = new mysqli($host, $usuario, $senha, $banco);


if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}
?>