<header>
    <h3>Excluir Sala</h3>
</header>

<?php
$id_sala = mysqli_real_escape_string($conexao, $_GET["id_sala"]);
$sql = "DELETE FROM tb_sala WHERE id_sala = '{$id_sala}'";

mysqli_query($conexao, $sql) or die ("Erro ao excluir o registro do banco." . mysqli_error($conexao));
echo "Sala excluida com Sucesso";