<?php
include ("confg.php");

$conexao = mysqli_connect(
    SERVIDOR,
    USUARIO,
    SENHA,
    BANCO)

or die
("Erro de Conexão de BANCO de DADOS" . mysqli_connect_error());
