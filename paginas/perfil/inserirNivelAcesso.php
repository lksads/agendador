<header>
    <h3> Inserido com Sucesso</h3>
</header>
<?php

$id_nivel_acesso = mysqli_real_escape_string($conexao, $_POST["id_nivel_acesso"]);

$sql = "INSERT INTO tb_pessoa (
                       id_nivel_acesso) 
                       VALUES(
                              '{$id_nivel_acesso}'
                       )";
mysqli_query($conexao, $sql) or die("Erro ao consultar" . mysqli_error($conexao));

echo "A pessoa foi inserida com sucesso";