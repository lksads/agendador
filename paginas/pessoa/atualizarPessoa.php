<header>
    <h3> Atualizar com sucesso</h3>
</header>
<?php

$id_pessoa = mysqli_real_escape_string($conexao, $_POST["id_pessoa"]);
$nome_pessoa = mysqli_real_escape_string($conexao, $_POST["nome_pessoa"]);
$fk_nivel_acesso = mysqli_real_escape_string($conexao, $_POST["fk_nivel_acesso"]);
$sql = "UPDATE tb_pessoa SET
                     nome_pessoa = '{$nome_pessoa}',
                     fk_nivel_acesso = '{$fk_nivel_acesso}'
                        WHERE id_pessoa = '{$id_pessoa}'
                     ";

mysqli_query($conexao, $sql) or die("Erro ao atualizar dados" . mysqli_error($conexao));

echo "O registro foi atualizado com sucesso";
