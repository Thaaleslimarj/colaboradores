<?php // Conectar ao banco de dados (substitua os valores conforme necessário)  
    $host = "localhost"; // ou seu host  
    $usuario = "root"; // seu usuário do banco  
    $senha = ""; // sua senha do banco  
    $database = "login"; // nome do banco  

    // Cria a conexão   
    $conn = mysqli_connect($host, $usuario, $senha, $database);  

    // Verifica a conexão  
    if (!$conn) {  
        die("Conexão falhou");  
    } 
?>