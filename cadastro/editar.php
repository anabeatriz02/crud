<?php
include('../componentes/header.php');
require('../funcoes.php');

$idBuscarUsuario = $_GET['cod_pessoa'];
$resultadoProcura = listar($conexao, $idBuscarUsuario);
$editarUsuario = mysqli_fetch_array($resultadoProcura);
?>

<div class="container">
    <hr>
    <div class="card">
        <div class="card-header">
            <h2>Edição</h2>
        </div>
        <div class="card-body">
            <form method="post" action="../funcoes.php">
                <input class="form-control" type="hidden" name="acao" value="editar">
                <input class="form-control" type="hidden" name="id" value='<?= $editarUsuario["cod_pessoa"] ?>'>

                <input class="form-control" type="text" name="sobrenome" id="sobrenome" value='<?= $editarUsuario["sobrenome"] ?>' required>
                <br />
                <input class="form-control" type="text" name="email" id="email" value='<?= $editarUsuario["email"] ?>' required>
                <br />
                <input class="form-control" type="text" name="celular" id="celular" value='<?= $editarUsuario["celular"] ?>' required>
                <br />
                <button class="btn btn-success">Editar</button>
            </form>
        </div>
    </div>
</div>


<?php
header("location: listagem/index.php");

include('../componentes/footer.php');
?>