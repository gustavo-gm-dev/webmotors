<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nome_do_banco";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>
