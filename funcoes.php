<?php

    require("database/conexao.php");

    if (isset($_POST['acao'])) 
    {
        switch ($_POST["acao"]) 
        {
            case 'inserir':

                    $nome = $_POST["nome"];
                    $sobrenome = $_POST["sobrenome"];
                    $email = $_POST["email"];
                    $celular = $_POST["celular"];

                        $sqlInserir = "INSERT INTO tbl_pessoa (nome, sobrenome, email, celular) VALUES ('$nome', '$sobrenome', '$email', '$celular');";

                        $resultadoEdit = mysqli_query($conexao, $sqlInserir);

                        header("location: index.php");

                break;

            case 'excluir':
                    $idExclusao = null;

                    if (isset($_POST["id"])) 
                    {$idExclusao = $_POST["id"];
                    }
                        $sqlExcluir = "DELETE FROM tbl_pessoa WHERE (cod_pessoa = $idExclusao);";

                        $resultadoExclusao = mysqli_query($conexao, $sqlExcluir);

                        header("location: index.php");

                break;

            case 'alterar' :

                    $idUsuario = $_POST['id'];
                    $usuarioEditado = $_POST['nome'];
                    $usuarioEditado = $_POST['sobrenome'];
                    $emailEditado = $_POST['email'];
                    $celularEditado = $_POST['celular'];

                        $sqlEdicao = "UPDATE tbl_pessoa SET nome = '$usuarioEditado', sobrenome = '$usuarioEditado', email = '$emailEditado', celular = '$celularEditado' WHERE cod_pessoa = $idUsuario;";
                        $resultadoEdicao = mysqli_query($conexao, $sqlEdicao);
                        
                        header("location: index.php");

                break;

            default:
                # code...
                break;
        }
    }

    function listar ($conexao)
    {
            $sql = "SELECT * FROM tbl_pessoa;";
        
            $resultado = mysqli_query($conexao, $sql);
            return $resultado;
    }

    function listarID ($conexao, $idPessoa)
    {

        $sqlId = "SELECT * FROM tbl_pessoa WHERE cod_pessoa = $idPessoa;";
        
            $resultadoId = mysqli_query($conexao,$sqlId);
            return $resultadoId;
    }
