<header>
    <h3> Inserido com sucesso</h3>
</header>
<?php

    $nome_pessoa = mysqli_real_escape_string($conexao, $_POST["nome_pessoa"]);
    $fk_nivel_acesso = mysqli_real_escape_string($conexao, $_POST["fk_nivel_acesso"]);
    $sql = "INSERT INTO tb_pessoa (
                       nome_pessoa,
                       fk_nivel_acesso) 
                       VALUES(
                              '{$nome_pessoa}',
                              '{$fk_nivel_acesso}'
                       )";
    mysqli_query($conexao, $sql) or die("Erro ao consultar" . mysqli_error($conexao));

    echo "A pessoa foi inserida com sucesso";
