<?php
    require_once('../conexao.php');
    session_start();

    if(isset($_POST['email'], $_POST['senha'])) {
        $email = $_POST['email'];
        $senha = md5($_POST['senha']); // Calcula o hash MD5 da senha fornecida

        // Consulta preparada para selecionar o usuário pelo e-mail ou CPF
        $query = "SELECT * FROM tb_users WHERE email = :email OR cpf = :email";
        $res = $conn->prepare($query);
        $res->bindValue(":email", $email);
        $res->execute();
        $dados = $res->fetch(PDO::FETCH_ASSOC);

        if($dados && $senha === $dados['senha_crip']) { // Verifica se os hashes MD5 são iguais
            $_SESSION['id_usuario'] = $dados['id'];
            $_SESSION['nome_usuario'] = $dados['nome'];
            $_SESSION['email_usuario'] = $dados['email'];
            $_SESSION['cpf_usuario'] = $dados['cpf'];
            $_SESSION['nivel_usuario'] = $dados['nivel'];

            switch($_SESSION['nivel_usuario']) {
                case 'admin':
                    header("Location: ../../sistema/painel-admin/calendario");
                    break;
                case 'aluno':
                    header("Location: ../../sistema/painel-aluno");
                    break;
                case 'professor':
                    header("Location: ../../sistema/painel-professor");
                    break;
                default:
                    header("Location: ../error.php");
                    break;
            }
            exit();
        } else {
            // Redireciona para página de erro de autenticação se as credenciais forem inválidas
            header("Location: ../error1.php");
            exit();
        }
    } else {
        // Redireciona para página de erro se parâmetros não estiverem presentes
        header("Location: ../error2.php");
        exit();
    }
?>
