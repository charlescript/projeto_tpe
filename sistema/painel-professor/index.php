<?php 
    @session_start();
    if($_SESSION['nivel_usuario'] != "professor"){
        echo "<script language='javascript'>  window.location='../../modulo_autenticacao/error.php' </script> ";
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Bem vindo Professor</h1>
</body>
</html>