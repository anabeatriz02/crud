<?php
session_start();

require('../database/conexao.php');

/*FUNÇÃO DE VALIDAÇÃO*/
function validaCampos(){

    $erros = [];

    if(!isset($_POST['nome']) || $_POST['nome'] == "" ){
        $erros[] = "preenchimento obrigatório";
    }
    if(!isset($_POST['sobrenome'])|| $_POST['sobrenome'] == "" ){
        $erros[] = "preenchimento obrigatório";
    }
    if(!isset($_POST['email'])|| $_POST['email'] == "" ){
        $erros[] = "preenchimento obrigatório";
    }
    if(!isset($_POST['celular'])|| $_POST['celular'] == "" ){
        $erros[] = "preenchimento obrigatório";
    }
    return $erros;

}

switch ($_POST['acao']) {

    case 'inserir':

        $erros = validaCampos();

        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $email = $_POST['email'];
        $celular = $_POST['celular'];

        $sql = "INSERT INTO tbl_pessoa (nome, sobrenome, email, celular)VALUES ('$nome', '$sobrenome', '$email', '$celular')";

        $resultado = mysqli_query($conexao, $sql);

        header('location: ../index.php');

        break;

        case 'excluir':

            $cod_pessoa = $_POST["cod_pessoa"];

            $sql = "DELETE FROM tbl_pessoa WHERE cod_pessoa = $cod_pessoa";

            $resultado = mysqli_query($conexao, $sql);

            header('location: ../index.php');

            break;

        case 'editar':

        $erros = validaCampos();

        $cod_pessoa = $_POST["cod_pessoa"];
        $nome = $_POST["nome"];
        $sobrenome = $_POST["sobrenome"];
        $email = $_POST["email"];
        $celular = $_POST["celular"];

        $sql = "UPDATE tbl_pessoa SET 
        nome = '$nome', 
        sobrenome = '$sobrenome', 
        email = '$email', 
        celular = '$celular' 
        WHERE cod_pessoa = $cod_pessoa";
        
        $resultado = mysqli_query($conexao, $sql);

        header('location: ../index.php');

        break;
    
    default:
        # code...
        break;
}



?>