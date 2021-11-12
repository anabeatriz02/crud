<?php

include('../componentes/header.php');
include('../dados/funcoes.php');
require("../database/conexao.php");

$resultado = listar($conexao);

?>

<div class="container">

    <br />

    <table class="table table-bordered">

        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>E-mail</th>
                <th>Celular</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>

            <?php while ($dados = mysqli_fetch_array($resultado)) {
                # code...
            ?>

                <tr>
                    <th><?php echo $dados["cod_pessoa"] ?></th>
                    <th><?php echo $dados["nome"] ?></th>
                    <th><?php echo $dados["sobrenome"] ?></th>
                    <th><?php echo $dados["email"] ?></th>
                    <th><?php echo $dados["celular"] ?></th>

                    <th>

                        <a class="btn btn-warning" href="acoes.php?cod_pessoa<?php echo $dados["cod_pessoa"] . '&acao=editar' ?>">Editar</a>
                        <a class="btn btn-danger" href="acoes.php?cod_pessoa<?php echo $dados["cod_pessoa"] . '&acao=excluir' ?>">Excluir</a>

                    </th>

                </tr>
            <?php } ?>

        </tbody>

    </table>

</div>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <main>

        <form id="formDeletar" method="POST" action="./acoes.php">
            <input type="hidden" name="acao" value="deletar" />
            <input type="hidden" name="dados" id="dados" />
        </form>
    </main>
</body>

</html>

<script lang="javascript">
    function deletar(dados) {
        if (confirm("Tem certeza que deseja deletar estes dados?")) {
            document.querySelector("#dados").value = dados;
            document.querySelector("#formDeletar").submit();
        }
    }
</script>

<?php
include('../componentes/footer.php');
?>