<?php

function listar($conexão){

    $sql = "SELECT * FROM tbl_pessoa";

    $resultado = mysqli_query($conexão, $sql);

    return $resultado;

}

function inserir(){}

function alterar(){


}

function excluir(){

    $dados = $_POST["dados"];

            $sql = "SELECT * FROM tbl_pessoa";

            $resultado = mysqli_query($conexão, $sql);

            $dados = mysqli_fetch_array($resultado);

            $sql = "DELETE FROM tbl_pessoa WHERE id = $dados";

            $resultado = mysqli_query($conexão, $sql);

            header("location: index.php");

        break;
}



?>