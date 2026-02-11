<?php
$host = "localhost";
$user = "root";
$pass = "senha123";
$db = "tarefas_db";

$con = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Erro na conexão: " . $con->connect_error);
}
?>