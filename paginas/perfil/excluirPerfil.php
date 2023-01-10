<header>
    <h3>Excluir Perfil</h3>
</header>

<?php
$id_perfil = mysqli_real_escape_string($conexao, $_GET["id_perfil"]);
$sql = "DELETE FROM tb_perfil WHERE id_perfil = '{$id_perfil}'";

mysqli_query($conexao, $sql) or die ("Erro ao excluir o registro do banco." . mysqli_error($conexao));
echo "Perfil excluido com Sucesso";