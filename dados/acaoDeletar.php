<?php

require("./funcoes.php");

$idUsuario = $_GET["id"];

deletarUsuario("./dados/listagem.php", $idUsuario);

header("location: index.php");

