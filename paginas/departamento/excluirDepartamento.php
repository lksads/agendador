<header>
    <h3>Excluir Departamento</h3>
</header>

<?php
$id_departamento = mysqli_real_escape_string($conexao, $_GET["id_departamento"]);
$sql = "DELETE FROM tb_departamento WHERE id_departamento = '{$id_departamento}'";

mysqli_query($conexao, $sql) or die ("Erro ao excluir o Departamento do banco de dados." . mysqli_error($conexao));
echo "Departamento excluido com Sucesso";