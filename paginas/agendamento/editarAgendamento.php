<?php
$id_agendamento = $_GET["id_agendamento"];

$sql = "SELECT * FROM tb_agendamento WHERE id_agendamento = {$id_agendamento}";
$rs = mysqli_query($conexao,$sql) or die ("Erro ao trazer os dados do bando" . mysqli_error($conexao));
$dados = mysqli_fetch_assoc($rs);
//Buscando a data completa do banco e separando os campos de dia e hora com str_sprint
$dia_inicio = str_split($dados["dia_hora_inicio"],10);
$hora_inicio = str_split(trim($dia_inicio[1]),5)[0];

$dia_fim = str_split($dados["dia_hora_fim"],10);
$hora_fim = str_split(trim($dia_fim[1]),5)[0];


?>

<header>
    <h3>Editar Agendamento</h3>
</header>

<div>
    <form action="index.php?menuop=atualizarAgendamento" method="post">
        <div>
            <label for="id_agendamento"></label>
            <input type="hidden" name="id_agendamento" value="<?=$dados["id_agendamento"] ?>">
        </div>

        <div class="row g-3 align-items-center">
            <div class="col-auto">
                <label for="diaInicio" class="col-form-label" >Dia Inicio: </label>
            </div>
            <div class="col-auto">
                <input type="date" class="form-control" name="dia_inicio" value="<?=$dia_inicio[0]?>">
            </div>
            <div class="col-auto">
                <label for="horaInicio" class="col-form-label">Hora Inicio: </label>
            </div>
            <div class="col-auto">
                <input type="time" class="form-control" name="hora_inicio" value="<?=$hora_inicio?>">
            </div>
            <div class="col-auto">
                <label for="horaFim">Hora Fim: </label>
            </div>
            <div class="col-auto">
                <input type="time" class="form-control" name="hora_fim" value="<?=$hora_fim?>">
            </div>
        </div>

        <div class="row g-3 align-items-center">
            <div class="col-auto">
                <label for="sala">Sala: </label>
                <select name="fk_sala">

                    <?php
                    $res_sala = "SELECT * FROM tb_sala";
                    $resultado_sala = mysqli_query($conexao, $res_sala);
                    while ($res = mysqli_fetch_assoc($resultado_sala)){ ?>
                        <option value="<?php echo $res['id_sala']; ?>" <?=($res['id_sala']==$dados["fk_sala"]?'selected="selected"':'')?>><?php echo $res ['nome_sala']; ?>
                        </option> <?php
                    }
                    ?>
                </select>
            </div>
            <div class="col-auto">
                <label for="departamento">Departamento: </label>
                <select name="fk_departamento">
                    <?php
                    $res_departamento = "SELECT * FROM tb_departamento";
                    $resultado_departamento = mysqli_query($conexao, $res_departamento);
                    while($res = mysqli_fetch_assoc($resultado_departamento)){ ?>
                        <option value="<?php echo $res['id_departamento']; ?>" <?=($res['id_departamento']==$dados["fk_departamento"]?'selected="selected"':'')?> ><?php echo $res ['nome_departamento']; ?>
                        </option> <?php
                    }
                    ?>
                </select>
            </div>
            <div class="col-auto">
                <label for="usuario">Usuário: </label>
                <select name="fk_usuario">
                    <?php
                    $res_usuario = "SELECT * FROM tb_usuario";
                    $resultado_usuario = mysqli_query($conexao, $res_usuario);
                    while($res = mysqli_fetch_assoc($resultado_usuario)){ ?>
                        <option value="<?php echo $res['id_usuario']; ?>" <?=($res['id_usuario']==$dados["fk_usuario"]?'selected="selected"':'')?> ><?php echo $res ['nome_usuario']; ?>
                        </option> <?php
                    }
                    ?>
                </select>
            </div>
        </div>
<!--        <div class="row g-3 align-items-center">-->
<!--            <div class="form-check form-switch col-auto">-->
<!--                <input class="form-check-input" type="checkbox" role="switch" id="recorrente" name="recorrente" --><?php //=($dados["recorrente"]?'checked="checked"':'') ?>
<!--                <label class="form-check-label" for="recorrente">Recorrente</label>-->
<!--            </div>-->
<!---->
<!--        </div>-->

        <div class="row g-3 align-items-center">
            <label class="col-auto" for="observacao">Observação:  </label>
            <div class="col-auto">
                <textarea name="observacao" maxlength="400"><?=$dados["observacao"] ?></textarea>
            </div>
            </br>
            <div>
                <input type="submit" value="Salvar" name="btnSalvar">
            </div>
        </div>

    </form>

</div>
