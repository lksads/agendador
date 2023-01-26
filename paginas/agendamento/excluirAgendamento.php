<header>
    <h3>Excluir Agendamento</h3>
</header>

<?php
$id_agenda = mysqli_real_escape_string($conexao, $_GET["pk_agenda"]);
$usuario = mysqli_real_escape_string($conexao, $_GET["id_usuario"]);
//$sql = "DELETE FROM tb_agendamento WHERE id_agendamento = '{$id_agendamento}'";


$sql = "UPDATE tb_agenda JOIN tb_agendamento 
			ON tb_agendamento.id_agendamento = tb_agenda.fk_agendamento
			SET tb_agenda.status = 0,
			tb_agenda.dh_exclusao = NOW(),
			tb_agenda.fk_usuario_exc = '{$usuario}',
			tb_agendamento.fk_usuario_exc = '{$usuario}',
			tb_agendamento.dh_exclusao = NOW()
			WHERE tb_agenda.pk_agenda = '{$id_agenda}'";

mysqli_query($conexao, $sql) or die ("Erro ao excluir o registro do banco." . mysqli_error($conexao));
echo "Agendamento excluido com Sucesso";

?>
<div>
    <a class="btn btn-primary" href="index.php?menuop=agendamento">Voltar</a>
</div>
