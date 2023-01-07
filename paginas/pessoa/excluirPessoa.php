<header>
    <h3>Excluir Pessoa</h3>
</header>

<?php
$id_pessoa = mysqli_real_escape_string($conexao, $_GET["id_pessoa"]);
$sql = "DELETE FROM tb_pessoa WHERE id_pessoa = '{$id_pessoa}'";

mysqli_query($conexao, $sql) or die ("Erro ao excluir o registro." . mysqli_error($conexao));
echo "Registro excluido com Sucesso";