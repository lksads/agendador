<h3>Agendamento</h3>

<div>
    <a class="btn btn-primary" href="index.php?menuop=cadastroAgendamento">Agendamento</a>
</div>
</br>
<div>
    <form action="index.php?menuop=agendamento" method="post">
        <input type="text" name="pesquisa">
        <input type="submit" value="Pesquisar">
    </form>

</div>

<br>
<table  class="table table-striped table-hover table-responsive " >
    <thead>
    <tr class="bg-info">
        <th> ID</th>
        <th> Horário Inicio</th>
        <th> Horário Fim</th>
        <th> Sala</th>
        <th> Departamento</th>
        <th> Usuário</th>
        <th> Recorrente</th>
        <th> Editar</th>
        <th> Excluir</th>
    </tr>
    </thead>

    <tbody>
    <?php
    $pesquisa = (isset($_POST["pesquisa"]))?$_POST["pesquisa"]:"";

    $sql = "SELECT * FROM tb_agendamento";
    $rs = mysqli_query($conexao,$sql) or die("Erro ao buscar agendamentos no banco de dados" . mysqli_error($conexao));

    while ($dados = mysqli_fetch_assoc($rs)){
        ?>
        <tr>
            <td><?=$dados ["id_agendamento"]?></td>
            <td><?=$dados ["dia_hora_inicio"]?></td>
            <td><?=$dados ["dia_hora_fim"]?></td>
            <td><?=$dados ["fk_sala"]?></td>
            <td><?=$dados ["fk_departamento"]?></td>
            <td><?=$dados ["fk_usuario"]?></td>
            <td><?=$dados ["recorrente"]?></td>

            <td><a class="btn btn-primary btn-sm" href="index.php?menuop=editarAgendamento&id_agendamento=<?=$dados["id_agendamento"] ?>"><i class="bi bi-pencil-square"></i></a></td>
            <td><a class="btn btn-danger btn-sm" href="index.php?menuop=excluirAgendamento&id_agendamento=<?=$dados["id_agendamento"] ?>"><i class="bi bi-trash3"></i></a></td>
        </tr>
        <?php
    }
    ?>
    </tbody>