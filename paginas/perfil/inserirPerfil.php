<header>
    <h3> Inserido com Sucesso</h3>
</header>
<?php

$nome_perfil = mysqli_real_escape_string($conexao, $_POST["nome_perfil"]);

$sql = "INSERT INTO tb_perfil (
                       nome_perfil) 
                       VALUES(
                              '{$nome_perfil}'
                       )";
mysqli_query($conexao, $sql) or die("Erro ao inserir Perfil no banco de dados" . mysqli_error($conexao));

echo "O Perfil foi inserido com sucesso";