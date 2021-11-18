<?php

session_start();

if (!isset($_SESSION["usuarioId"])) {
    header("location: ../login/index.php");
}

    require("database/conexao.php");

    if (isset($_GET["acoes"])) {
        $acao = $_GET["acoes"];
    } else {
        $acao = $_POST["acoes"];
    }
    switch ($acao) {
            case 'inserir':

                    $nome = $_POST["nome"];
                    $sobrenome = $_POST["sobrenome"];
                    $email = $_POST["email"];
                    $celular = $_POST["celular"];

                        $sqlInserir = "INSERT INTO tbl_pessoa (nome, sobrenome, email, celular) VALUES ('$nome', '$sobrenome', '$email', '$celular');";
                        $resultado = mysqli_query($conexao, $sql);

                        header("location: index.php");

                break;

            case 'excluir':

                $cod_pessoa = $_POST['cod_pessoa'];

                $sql = "DELETE FROM tbl_pessoa WHERE cod_pessoa = $cod_pessoa";

                $resultado = mysqli_query($conexao, $sql);
        
                header('location: listagem/index.php');
        
                break;

            case 'alterar' :

                    $idUsuario = $_POST['id'];
                    $usuarioEditado = $_POST['nome'];
                    $usuarioEditado = $_POST['sobrenome'];
                    $emailEditado = $_POST['email'];
                    $celularEditado = $_POST['celular'];

                    $sql = "UPDATE tbl_pessoa SET
                    nome = '$nome',
                    sobrenome = '$sobrenome',
                    email = '$email',
                    celular = '$celular'
                    WHERE cod_pessoa = $cod_pessoa";
        
                $resultado = mysqli_query($conexao, $sql);
        
                header('location: listagem/index.php');
        
                break;

                case 'login':

                    $usuario = $_POST["txt_usuario"];
                    $senha = $_POST["txt_senha"];
            
                    $sql = "SELECT * FROM tbl_administrador";
            
                    $resultado = mysqli_query($conexao, $sql);
            
                    header("location: listagem/index.php");
            
                    realizarLogin($usuario, $senha, $conexao);
            
                    break;
            
                case 'logout':
            
                    session_unset();
                    session_destroy();
                    header("location: login/index.php");
            
                    break;

        default:
        # code...
        break;

                    
        }
    

    // function listar ($conexao)
    // {
    //         $sql = "SELECT * FROM tbl_pessoa;";
        
    //         $resultado = mysqli_query($conexao, $sql);
    //         return $resultado;
    // }

    // function listarID ($conexao, $idPessoa)
    // {

    //     $sqlId = "SELECT * FROM tbl_pessoa WHERE cod_pessoa = $idPessoa;";
        
    //         $resultadoId = mysqli_query($conexao,$sqlId);
    //         return $resultadoId;
 
