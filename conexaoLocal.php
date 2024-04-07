<?php

// Inicio da conexão com o banco de dados utilizando PDO
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "sansal26_projeto_tpe";
$port = 3306;


try {
    // Conexão com porta
    //$conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);

    //Conexão sem porta
    $conn = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass );
    //echo "Conexão com banco de dados realizado com sucesso.";

}catch(PDOException $err){
    die("Erro: Conexão com banco de dados não realizado com sucesso. Erro gerado ". $err->getMessage());
}
