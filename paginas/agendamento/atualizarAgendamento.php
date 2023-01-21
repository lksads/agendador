<header>
    <h3> Agendamento atualizado com Sucesso</h3>
</header>
<?php

$id_agendamento = mysqli_real_escape_string($conexao, $_POST["id_agendamento"]);
//juntando os dados para inserir no campo DATATIME
$dia_inicio = mysqli_real_escape_string($conexao, $_POST["dia_inicio"]);
$hora_inicio = mysqli_real_escape_string($conexao, $_POST["hora_inicio"]);
$dia_hora_inicio = $dia_inicio ." ". $hora_inicio;
//-----------------------------------------------------------------------------------------
//juntando os dados para inserir no campo DATATIME
$hora_fim = mysqli_real_escape_string($conexao, $_POST["hora_fim"]);
$dia_hora_fim = $dia_inicio ." ". $hora_fim;
//-----------------------------------------------------------------------------------------
$fk_sala = mysqli_real_escape_string($conexao, $_POST["fk_sala"]);
$fk_departamento = mysqli_real_escape_string($conexao, $_POST["fk_departamento"]);
$fk_usuario = mysqli_real_escape_string($conexao, $_POST["fk_usuario"]);


$observacao = mysqli_real_escape_string($conexao, $_POST["observacao"]);

$sql = "UPDATE tb_agendamento SET
                         dia_hora_inicio = '{$dia_hora_inicio}',
                         dia_hora_fim = '{$dia_hora_fim}',
                         fk_sala = '{$fk_sala}',
                         fk_departamento = '{$fk_departamento}',
                         fk_usuario = '{$fk_usuario}',
                         observacao = '{$observacao}'
                         
                            WHERE id_agendamento = '{$id_agendamento}'
                         ";

mysqli_query($conexao, $sql) or die("Erro ao atualizar o Agendamento no banco de dados" . mysqli_error($conexao));

echo "O Agendamento foi atualizada com sucesso";
?>
<div>
    <a class="btn btn-primary" href="index.php?menuop=agendamento">Voltar</a>
</div>
