<h3>Agendamento</h3>

<div>
    <a class="btn btn-primary" href="index.php?menuop=cadastroAgendamento">Agendamento</a>
</div>
</br>
<div>
    <form action="index.php?menuop=agendamento" method="post">
        <div class="row g-3 align-items-center">
            <div class="col-auto">
                <label>Dia Inicio</label>
                <input type="date" name="data_inicio" required>
            </div>
            <div class="col-auto">
                <label>Dia Fim</label>
                <input type="date" name="data_fim">
            </div>

            <div class="col-auto">
                <label for="sala">Sala: </label>
                <select name="fk_sala">
                    <option></option>
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
                    <option></option>
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
                    <option></option>
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
            <div>
                <input type="submit" value="pesquisar">
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
        <th> Dia da Semana</th>
        <th> Horário Fim</th>
        <th> Sala</th>
        <th> Departamento</th>
        <th> Usuário</th>
        <th> Editar</th>
        <th> Excluir</th>
    </tr>
    </thead>

    <tbody>
    <?php
    setlocale(LC_ALL, "pt_BR", 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');

    $dia_inicio = (isset($conexao, $_POST["data_inicio"]))? $_POST["data_inicio"] : "" ;
    $dia_fim = (isset($conexao, $_POST["data_fim"]))? $_POST["data_fim"]: "";

    $sala = (isset($_POST["fk_sala"]))?$_POST["fk_sala"] : "";
    $departamento = (isset($_POST["fk_departamento"]))?$_POST["fk_departamento"] : "";
    $usuario = (isset($_POST["fk_usuario"]))?$_POST["fk_usuario"] : "";

    $ordenar = "ORDER BY dh_ini ASC";

//    $tbAgendamento = "SELECT * FROM tb_agendamento tag
//                INNER JOIN tb_sala sala ON (sala.id_sala = tag.fk_sala)
//                INNER JOIN tb_departamento dep ON (dep.id_departamento = tag.fk_departamento)
//                INNER JOIN tb_usuario usu ON (usu.id_usuario = tag.fk_usuario)";

    $tbAgendamento = "SELECT * FROM tb_agenda tag
			INNER JOIN tb_agendamento agen ON (agen.id_agendamento = tag.fk_agendamento)
			INNER JOIN tb_sala sala ON (sala.id_sala = tag.fk_sala) 
			INNER JOIN tb_departamento dep ON (dep.id_departamento = tag.fk_departamento)
			INNER JOIN tb_usuario usu ON (usu.id_usuario = tag.fk_usuario)
                ";

    if($dia_fim == ""){
        $inicio = $dia_inicio . " 00:00:00";
        $select = "$tbAgendamento
                WHERE tag.dia_hora_inicio >= '$inicio'";

    }else{
        $inicio = $dia_inicio . " 00:00:00";
        $fim = $dia_fim . " 23:59:59";
        $select = "$tbAgendamento
                WHERE tag.dh_ini >= '$inicio'
				AND tag.dh_fim <= '$fim'";
    }

    $selectCompleta = "$select
                        WHERE tag.fk_sala = $sala 
                        AND tag.fk_departamento = $departamento 
                        AND tag.fk_usuario = $usuario";

    if($sala != null){
        if($departamento != null && $usuario == null){
            $sql = "$select
                AND tag.fk_sala = $sala
                AND dep.id_departamento = $departamento
                $ordenar";
        }elseif ($usuario != null && $departamento == null){
            $sql = "$select
                AND tag.fk_sala = $sala
                AND dep.fk_usuario = $usuario
                $ordenar";
        }elseif ($usuario != null && $departamento != null){
            $sql = "$selectCompleta $ordenar";
        }else{
            $sql = "$select
				AND tag.fk_sala = $sala
                $ordenar";
        }
    }elseif ($departamento != null) {
        if($usuario != null){
            $sql = "$select
                AND tag.fk_departamento = $departamento
                AND dep.fk_usuario = $usuario
                $ordenar";
        }else{
            $sql = "$select
				AND tag.fk_departamento = $departamento
                $ordenar";
        }
    }elseif ($usuario != null) {
            $sql = "$select
				AND tag.fk_usuario = $usuario
                $ordenar";

    }else{
//        $sql = "$tbAgendamento
//              WHERE dia_hora_inicio >= now()
//              $ordenar";}
            $sql = "$tbAgendamento
                WHERE tag.fk_agendamento = agen.id_agendamento
                AND status <> 0
                AND dh_ini >= now()
                $ordenar";
    }

    $rs = mysqli_query($conexao,$sql) or die("Erro ao buscar agendamentos no banco de dados" . mysqli_error($conexao));

    while ($dados = mysqli_fetch_assoc($rs)){
        ?>
        <tr>
            <td><?=$dados ["pk_agenda"];?></td>
<!--            <td>--><?php //=$dados ["dh_ini"];?><!--</td>-->
            <td><?= date("d/m/Y H:i", strtotime($dados["dh_ini"])); ?></td>
            <td><?=utf8_encode(strftime("%A", strtotime($dados["dh_ini"])))?></td>
<!--            <td>--><?php //=$dados ["dh_fim"]?><!--</td>-->
            <td><?= date("d/m/Y H:i", strtotime($dados["dh_fim"])); ?></td>
            <td><?=$dados ['nome_sala']?></td>
            <td><?=$dados ["nome_departamento"]?></td>
            <td><?=$dados ["nome_usuario"]?></td>

            <td><a class="btn btn-primary btn-sm" href="index.php?menuop=editarAgendamento&id_agendamento=<?=$dados["id_agendamento"] ?>"><i class="bi bi-pencil-square"></i></a></td>
            <td><a class="btn btn-danger btn-sm" href="index.php?menuop=excluirAgendamento&pk_agenda=<?=$dados["pk_agenda"] ?>&id_usuario=<?=$dados["id_usuario"] ?>"><i class="bi bi-trash3"></i></a></td>
        </tr>
        <?php
    }

    ?>
    </tbody>
</table>