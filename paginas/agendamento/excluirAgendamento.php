<header>
    <h3>Excluir Agendamento</h3>
</header>

<?php
$id_agendamento = mysqli_real_escape_string($conexao, $_GET["id_agendamento"]);
$sql = "DELETE FROM tb_agendamento WHERE id_agendamento = '{$id_agendamento}'";

mysqli_query($conexao, $sql) or die ("Erro ao excluir o registro do banco." . mysqli_error($conexao));
echo "Agendamento excluido com Sucesso";

?>
<div>
    <a class="btn btn-primary" href="index.php?menuop=agendamento">Voltar</a>
</div>
