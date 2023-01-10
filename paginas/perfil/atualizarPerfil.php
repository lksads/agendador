<header>
    <h3> Perfil atualizado com sucesso</h3>
</header>
<?php
$id_perfil = mysqli_real_escape_string($conexao, $_POST["id_perfil"]);
$nome_perfil = mysqli_real_escape_string($conexao, $_POST["nome_perfil"]);
$sql = "UPDATE tb_perfil SET
                         nome_perfil = '{$nome_perfil}'
                            WHERE id_perfil = '{$id_perfil}'
                         ";

mysqli_query($conexao, $sql) or die("Erro ao atualizar dados no banco de dados" . mysqli_error($conexao));

echo "O Perfil foi atualizado com sucesso";
