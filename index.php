<?php
    include("conexao.php");

    if(isset($_POST['email']) || isset($_POST['senha'])){
        if(strlen($_POST['email'])==0){
            echo "Preencha seu email";
        } else if(strlen($_POST['senha'])==0){
            echo "Preencha sua senha";
        } else{

            $email = $mysqli->real_escape_string($_POST['email']);
            $senha = $mysqli->real_escape_string($_POST['senha']);

            $sql_code = "SELECT * FROM adm WHERE email = '$email' AND senha = '$senha'";
            $sql_query = $mysqli->query($sql_code) or die ("Falha na execução do código SQL: " . $mysqli->error);

            $quantidade = $sql_query->num_rows;
            
            if($quantidade == 1){
                $usuario = $sql_query->fetch_assoc();

                if(!isset($_SESSION)) {
                    session_start();
                }

                $_SESSION['idadm']   = $usuario['idadm'];
                $_SESSION['email'] = $usuario['email'];

                header("Location:home.php");
            } else{
                echo "Falha ao logar! Email ou senha incorretos";
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./static/css/styles-index.css">
    <link rel="icon" href="./static/images/faviconFlex.png">
    <title>FLEx Commerce - Login</title>
</head>
<body>
    <div class="main-login">
        <div class="left-login">
            <h1>Painel Administrativo<br>FLEx Commerce</h1>
            <img src="./static/css/code-typing-animate.svg" class="left-login-image" alt="">
        </div>
        <form action="" method="POST">
        <div class="right-login">
            <div class="card-login">
            <img src="./static/images/logoFlex_login.png" alt="Comapny logo">
                <div class="textfield">
                    <label for="email">Nome</label>
                    <input type="text" name="email" placeholder="Email">
                </div>
                <div class="textfield">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" placeholder="Senha">
                </div>
                <button type="submit" class="btn-login">Entrar</button>
            </div>
        </div>
        </form>
    </div>
</body>
</html>