<header>
    <h3>Excluir Usuário</h3>
</header>

<?php
$id_usuario = mysqli_real_escape_string($conexao, $_GET["id_usuario"]);
$sql = "DELETE FROM tb_usuario WHERE id_usuario = '{$id_usuario}'";

mysqli_query($conexao, $sql) or die ("Erro ao excluir o registro do banco." . mysqli_error($conexao));
echo "Usuário excluido com Sucesso";
?>

<div>
    <a class="btn btn-primary" href="index.php?menuop=usuario">Voltar</a>
</div>