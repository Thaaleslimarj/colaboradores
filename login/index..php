<?php 
include ('conn.php');

if(isset($_POST['login']) || isset($_POST['senha'])){

    if(strlen($_POST['login']) == 0){
        echo "Preenche seu login";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {

        $login = $mysqli->real_escape_string($_POST['login']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL:" . $mysqli->error); 
        
        $quantidade = $sql_query->num_rows;

        if($quantidade ==1){

            $usuario = $sql_query-> fetch_assoc();
            if(!isset($_SESSION)){
                session_start();
            }

            $_SESSION['user'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: painel.php");

        } else {
            echo "Falha ao logar! Login ou senha incorretos";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(45deg, cyan, black);
        }
        div {
            background-color:rgba(0, 0, 0, 0.9) ;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);   
            padding: 80px;
            border-radius: 15px;
            color: white;
        }
        input{
            padding: 15px;
            border: nome;
            outline: none;
            font-size: 15px;
        }
        button{
            background-color: dodgerblue;
            border: none;
            padding: 15px;
            width: 100%;
            border-radius: 10px;
            color: white;
            font-size: 15px;
        }
        button:hover{
            background-color: deepskyblue;
            cursor: pointer;
        }
    </style>
</head>
<body>
    
<div>
        <h1>Login:</h1>
        <form action="" method="post">

        <input type="text" placeholder="login" id="login">
        <br><br>

        <input type="password" placeholder="senha" id="senha">
        <br><br>

        <button>Entrar</button>
</div>
        <br> 
   </form>
</body>
</html>