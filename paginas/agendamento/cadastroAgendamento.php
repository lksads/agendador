<header>
    <h3>Agendamento de Salas</h3>
</header>

<div>
    <form action="index.php?menuop=cadastroAgendamento" method="post">

        <div class="row g-3 align-items-center">
            <div class="col-auto">
                <label for="diaInicio" class="col-form-label">Dia Inicio: </label>
            </div>
            <div class="col-auto">
                <input type="date" class="form-control" name="dia_inicio" >
            </div>
            <div class="col-auto">
                <label for="horaInicio" class="col-form-label">Hora Inicio: </label>
            </div>
            <div class="col-auto">
                <input type="time" class="form-control" name="hora_inicio">
            </div>
            <div class="col-auto">
                <label for="horaFim">Hora Fim: </label>
            </div>
            <div class="col-auto">
                <input type="time" class="form-control" name="hora_fim">
            </div>
        </div>
        <div class="row g-3 align-items-center">
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

        <div class="row g-3 align-items-center">
            <div class="form-check form-switch col-auto">
                <input class="form-check-input" type="checkbox" role="switch" id="recorrente" name="recorrente">
                <label class="form-check-label" for="recorrente">Recorrente</label>
            </div>

            <div class="col-auto">
                <label class="form-check-label" for="num_frequencia">Repetir a cada: </label>
                <input type="number" class="col-auto" name="nu_rep_freq"> dias.
            </div>

            <div class="col-auto">
                <label for="dia_rec_fim" class="col-form-label">Repetir até: </label>
            </div>
            <div class="col-auto">
                <input type="date" class="form-control" name="dh_termino" >
            </div>

        </div>

        <div class="row g-3 align-items-center">
            <label class="col-auto" for="observacao">Observação:  </label>
            <div class="col-auto">
                <textarea name="observacao" maxlength="400"></textarea>
            </div>
            </br>
            <div>
                <input type="submit" value="Salvar" name="btnSalvar">
            </div>
        </div>

    </form>
</div>

<?php
    //Busca do dia Atual
    $dt_criacao = date("Y-m-d H:i:s", strtotime('-3 hour'));

    if (isset( $_POST["dia_inicio"])) {
            //juntando os dados para inserir no campo DATATIME
            $dia_inicio = mysqli_real_escape_string($conexao, $_POST["dia_inicio"]);
            $hora_inicio = mysqli_real_escape_string($conexao, $_POST["hora_inicio"]);
            $dia_hora_inicio = $dia_inicio ." ". $hora_inicio;

            //juntando os dados para inserir no campo DATATIME
            $hora_fim = mysqli_real_escape_string($conexao, $_POST["hora_fim"]);
            $dia_hora_fim = $dia_inicio ." ". $hora_fim;

            //$dia_hora_fim = mysqli_real_escape_string($conexao, $_POST["dia_hora_fim"]);
            $fk_sala = mysqli_real_escape_string($conexao, $_POST["fk_sala"]);
            $fk_departamento = mysqli_real_escape_string($conexao, $_POST["fk_departamento"]);
            $fk_usuario = mysqli_real_escape_string($conexao, $_POST["fk_usuario"]);

            $recorrente = (isset($_POST["recorrente"]));
            $dh_termino = (isset($_POST["dh_termino"])?$_POST["dh_termino"]:NULL);
            $dh_terminoCad = $dh_termino." ".$hora_fim;

            $num_rec_freq = mysqli_real_escape_string($conexao, $_POST["nu_rep_freq"]);
            $observacao = mysqli_real_escape_string($conexao, $_POST["observacao"]);

            $sql = "INSERT INTO tb_agendamento (
                                   dia_hora_inicio, dia_hora_fim, fk_sala, fk_departamento, fk_usuario, recorrente, observacao, dh_termino, nu_rep_freq)
                                   VALUES(
                                          '{$dia_hora_inicio}',
                                          '{$dia_hora_fim}',
                                          '{$fk_sala}',
                                          '{$fk_departamento}',
                                          '{$fk_usuario}',
                                          '{$recorrente}',
                                          '{$observacao}',
                                          '{$dh_terminoCad}',
                                          '{$num_rec_freq}'
                                   )";
            mysqli_query($conexao, $sql) or die("Erro ao inserir o Agendamento no bando de dados. " . mysqli_error($conexao));
            $rs = mysqli_query($conexao,"select last_insert_id() as lid") or die("Erro ao buscar agendamentos no banco de dados" . mysqli_error($conexao));
            $dados = mysqli_fetch_assoc($rs);
            $lastIdAgendamento = $dados['lid'];


            if($recorrente == 1){
                $dia_hora_inicio=date_create($dia_hora_inicio);
                $dia_hora_fim=date_create($dia_hora_fim);
                $dh_termino=date_create($dh_termino." 23:59:59");
                while ($dia_hora_inicio <= $dh_termino){
                    //INSERT na tabela AGENDA
                    $sql_rec = "INSERT INTO tb_agenda (
                                       dh_ini, dh_fim, fk_sala, fk_setor, fk_usuario, fk_agendamento)
                                       VALUES(
                                              '{$dia_hora_inicio->format('Y-m-d H:i')}',
                                              '{$dia_hora_fim->format('Y-m-d H:i')}',
                                              '{$fk_sala}',
                                              '{$fk_departamento}',
                                              '{$fk_usuario}',
                                              '{$lastIdAgendamento}'
                                              
                                       )";
                    mysqli_query($conexao, $sql_rec) or die("Erro ao inserir o Agendamento no bando de dados. " . mysqli_error($conexao));
                    $dia_hora_inicio->modify('+'.$num_rec_freq.' day');
                    $dia_hora_fim->modify('+'.$num_rec_freq.' day');

                }
            }

            echo "O Agendamento foi inserida com sucesso";

        }
