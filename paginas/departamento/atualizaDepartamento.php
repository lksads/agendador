<header>
    <h3> Atualizado Departamento com Sucesso</h3>
</header>
<?php
$id_departamento = mysqli_real_escape_string($conexao, $_POST["id_departamento"]);
$nome_departamento = mysqli_real_escape_string($conexao, $_POST["nome_departamento"]);
$sql = "UPDATE tb_departamento SET
                         nome_departamento = '{$nome_departamento}'
                            WHERE id_departamento = '{$id_departamento}'
                         ";

mysqli_query($conexao, $sql) or die("Erro ao editar o Departamento no banco de dados" . mysqli_error($conexao));

echo "O Departamento foi atualizado com sucesso";
