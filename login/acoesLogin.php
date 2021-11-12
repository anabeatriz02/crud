<?php

    session_start();

    require('../database/conexao.php');

    switch ($_POST['acao']) {

        case 'login':
           
            $usuario = $_POST["usuario"];
            $senha = $_POST["senha"];

            // var_dump($_POST);
            realizarLogin($usuario, $senha, $conexao);

            break;

        case 'logout':
            // echo 'FAZENDO LOGOUT';
            session_destroy();
            header("location: ../login/index.php");
            break;
        
        default:
            # code...
            break;
    }

    //FUNÇÕES DE LOGIN/LOGOUT//
    function realizarLogin($usuario, $senha, $conexao){

        $sql = "SELECT * FROM tbl_usuario
        WHERE usuario = '$usuario' AND senha = '$senha'";

        $resultadoLogin = mysqli_query($conexao, $sql);

        $dadosUsuario = mysqli_fetch_array($resultadoLogin);

        if (isset($dadosUsuario["usuario"]) && isset($dadosUsuario["senha"]) && password_verify($senha, $dadosUsuario["senha"])) {
                
            // echo 'LOGADO!';

            $_SESSION["usuarioId"] = $dadosUsuario["id"];
            $_SESSION["nome"] = $dadosUsuario["nome"];
            // $_SESSION["data_hora"] = date('d/m/Y - h:i:s'); 

            header("location: ../login/index.php");

        }else {
            echo 'ALGO DEU ERRADO!!';
            header("location: ../login/index.php");

        }
    }

           

?>
