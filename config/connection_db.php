<?php
$host = 'localhost';
$dbname = 'webmotors';
$username = 'root'; 
$password = '';

// Configurações de conexão com o banco de dados MySQL
$con = mysqli_connect($host, $username, $password, $dbname);

// Verificando se a conexão foi bem-sucedida
if (!$con) {
    echo "<pre>";
    echo "Erro de conexão: " . mysqli_connect_error(); // Exibe o erro de conexão, se houver
    echo "</pre>";
    exit; // Encerra o script caso a conexão falhe
}

// Verificando se a seleção do banco de dados foi bem-sucedida
if (!mysqli_select_db($con, $dbname)) {
    echo "<pre>";
    echo "Erro ao selecionar o banco de dados: " . mysqli_error($con); // Exibe o erro de seleção do banco
    echo "</pre>";
    exit; // Encerra o script caso a seleção falhe
}

// Se a conexão e a seleção do banco de dados forem bem-sucedidas
// echo "Conexão e seleção do banco de dados bem-sucedidas!";
?>
