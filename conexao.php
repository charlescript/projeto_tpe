<?php

// Inicio da conexão com o banco de dados utilizando PDO
// $host = "localhost";
// $user = "root";
// $pass = "";
// $dbname = "projeto_tpe";
// $port = 3306;

// VARIAVEIS DO BANCO DE DADOS
$host = '162.241.2.26';
$user = 'sansal26_root';  // Esse é para testes em desenvolvimento com permissão total as funções SQL
// $usuario = 'sansal26_client'; // Esse é para usuários clientes em produção com menos permissões
$pass = "82a6c15p@@##!!";
$dbname = "sansal26_projeto_tpe";

try {
    // Conexão com porta
    //$conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);

    //Conexão sem porta
    $conn = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass );
    //echo "Conexão com banco de dados realizado com sucesso.";

}catch(PDOException $err){
    die("Erro: Conexão com banco de dados não realizado com sucesso. Erro gerado ". $err->getMessage());
}
