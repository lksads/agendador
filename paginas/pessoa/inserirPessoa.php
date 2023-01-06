<header>
    <h3> Inserido com sucesso</h3>
</header>
<?php

    $nomePessoa = mysqli_real_escape_string($conexao, $_POST["nome_pessoa"]);
    $id_nivel_pessoa = mysqli_real_escape_string($conexao, $_POST["id_nivel_acesso"]);
    $sql = "INSERT INTO tb_pessoa (
                       nome_pessoa,
                       id_nivel_acesso) 
                       VALUES(
                              '{nome_pessoa}',
                              '{$id_nivel_pessoa}'
                       )";
    mysqli_query($conexao, $sql) or die("Erro ao consultar" . mysqli_error($conexao));

    echo "A pessoa foi inserida com sucesso";
