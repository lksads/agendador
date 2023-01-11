<header>
    <h3> Usuário atualizado com Sucesso</h3>
</header>
<?php
$id_usuario = mysqli_real_escape_string($conexao, $_POST["id_usuario"]);
$nome_usuario = mysqli_real_escape_string($conexao, $_POST["nome_usuario"]);
$fk_pessoa = mysqli_real_escape_string($conexao, $_POST["fk_pessoa"]);
$fk_perfil = mysqli_real_escape_string($conexao, $_POST["fk_perfil"]);

$sql = "UPDATE tb_usuario SET
                         nome_usuario = '{$nome_usuario}',
                         fk_pessoa = '{$fk_pessoa}',
                         fk_perfil = '{$fk_perfil}'
                         
                            WHERE id_usuario = '{$id_usuario}'
                         ";

mysqli_query($conexao, $sql) or die("Erro ao atualizar o Usuário no banco de dados" . mysqli_error($conexao));

echo "O Usuário foi atualizada com sucesso";
