<h3>Agendamento</h3>

<div>
    <a class="btn btn-primary" href="index.php?menuop=cadastroAgendamento">Agendamento</a>
</div>
</br>
<div>
    <form action="index.php?menuop=agendamento" method="post">
        <div class="row g-3 align-items-center">
            <div class="col-auto">
                <input type="date" name="pesquisa">
                <input type="submit" value="Dia">
            </div>

            <div class="col-auto">
                <label for="sala">Sala: </label>
                <select name="fk_sala">
                    <option>Selecionar</option>
                    <?php
                    $res_sala = "SELECT * FROM tb_sala";
                    $resultado_sala = mysqli_query($conexao, $res_sala);
                    while ($res = mysqli_fetch_assoc($resultado_sala)){ ?>
                        <option value="<?php echo $res['id_sala']; ?>"><?php echo $res ['nome_sala']; ?>
                        </option> <?php
                    }
                    ?>
                </select>
            </div>
            <div class="col-auto">
                <label for="departamento">Departamento: </label>
                <!--            <input type="text" name="fk_pessoa">-->
                <select name="fk_departamento">
                    <option>Selecionar</option>
                    <?php
                    $res_departamento = "SELECT * FROM tb_departamento";
                    $resultado_departamento = mysqli_query($conexao, $res_departamento);
                    while($res1 = mysqli_fetch_assoc($resultado_departamento)){ ?>
                        <option value="<?php echo $res1['id_departamento']; ?>"><?php echo $res1 ['nome_departamento']; ?>
                        </option> <?php
                    }
                    ?>
                </select>
            </div>
            <div class="col-auto">
                <label for="usuario">Usuário: </label>
                <select name="fk_usuario">
                    <option>Selecionar</option>
                    <?php
                    $res_usuario = "SELECT * FROM tb_usuario";
                    $resultado_usuario = mysqli_query($conexao, $res_usuario);
                    while($res1 = mysqli_fetch_assoc($resultado_usuario)){ ?>
                        <option value="<?php echo $res1['id_usuario']; ?>"><?php echo $res1 ['nome_usuario']; ?>
                        </option> <?php
                    }
                    ?>
                </select>
            </div>
        </div>
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
    $per = (isset($_POST["pesquisa"]))?$_POST["pesquisa"] : "";

    $sql = "SELECT * FROM tb_agendamento WHERE dia_hora_inicio LIKE '%$per%' OR dia_hora_fim LIKE '%$per%'";
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



