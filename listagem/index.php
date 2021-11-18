<?php

session_start();

if (!isset($_SESSION["usuarioId"])) {
    header("location: ../login/index.php");
}

include('../componentes/header.php');
require("../database/conexao.php");
require('../funcoes.php');

$sql = "SELECT * FROM tbl_pessoa";

$resultado = mysqli_query($conexao, $sql);

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
            <?php }?>

        </tbody>
     </table>

     <script lang="javascript">
        function deletar($cod_pessoa) {
            if (confirm("Tem certeza que deseja deletar este usuário?")) {
                document.querySelector("#cod_pessoa").value = $cod_pessoa;
                document.querySelector("#formDeletar").submit();
            }
        }
    </script>

</div>

<?php

include('../componentes/footer.php');

?>