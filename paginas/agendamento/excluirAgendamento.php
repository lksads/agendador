<header>
    <h3>Excluir Agendamento</h3>
</header>

<?php
$id_agenda = mysqli_real_escape_string($conexao, $_GET["pk_agenda"]);
//$sql = "DELETE FROM tb_agendamento WHERE id_agendamento = '{$id_agendamento}'";

$sql = "UPDATE tb_agenda SET status = 0 WHERE pk_agenda = '{$id_agenda}'";

mysqli_query($conexao, $sql) or die ("Erro ao excluir o registro do banco." . mysqli_error($conexao));
echo "Agendamento excluido com Sucesso";

?>
<div>
    <a class="btn btn-primary" href="index.php?menuop=agendamento">Voltar</a>
</div>
