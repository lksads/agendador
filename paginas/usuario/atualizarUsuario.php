<header>
    <h3> Sala atualizada com sucesso</h3>
</header>
<?php
$id_sala = mysqli_real_escape_string($conexao, $_POST["id_sala"]);
$nome_sala = mysqli_real_escape_string($conexao, $_POST["nome_sala"]);
$sql = "UPDATE tb_sala SET
                         nome_sala = '{$nome_sala}'
                            WHERE id_sala = '{$id_sala}'
                         ";

mysqli_query($conexao, $sql) or die("Erro ao atualizar dados no banco de dados" . mysqli_error($conexao));

echo "A Sala foi atualizada com sucesso";
