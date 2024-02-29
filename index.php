<?php
    require_once("./conexao.php");

    //VERIFICAR SE EXISTE ALGUM CADASTRO NO BANCO, SE NÃO TIVER CADASTRAR O USUÁRIO ADMINISTRADOR
    $res = $pdo->query("SELECT * FROM tb_usuarios");
    $dados = $res->fetchAll(PDO::FETCH_ASSOC);
    $senha_crip = md5('123');
    if(@count($dados) == 0){
        $res = $pdo->query("INSERT INTO tb_usuarios (nome, cpf, email, senha, senha_crip, nivel, dt_cadastro) VALUES
        ('Administrador', '000.000.000-00', 'teste@gmail.com', '123', '$senha_crip','Admin', NOW() )");
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/fontawesome-free-6.5.1-web/css/fontawesome.css">
    <title>index</title>
</head>
<body>

    <video autoplay muted loop id="video-background">
        <source src="./assets/img/fatec_capa_front.mp4" type="video/mp4">
        <!-- Adicione mais <source> para outros formatos de vídeo, se necessário -->
    </video>
    <div class="body_login">
        <div class="box_login">
            <div class="capa">
            </div>

            <h1>LOGIN</h1>

            <form action="./modulo_autenticacao/autenticar.php" method="post" name="login">

                <input type="email" placeholder="EMAIL" name="email">

                <input type="password" placeholder="SENHA" name="senha">

                <button type="submit" class="btn-login">LOGAR</button>
                
            </form>
        </div>
    </div>
</body>
</html>