<?php
$id_agendamento = $_GET["id_agendamento"];

$sql = "SELECT * FROM tb_agendamento WHERE id_agendamento = {$id_agendamento}";
$rs = mysqli_query($conexao,$sql) or die ("Erro ao trazer os dados do bando" . mysqli_error($conexao));
$dados = mysqli_fetch_assoc($rs);
?>

<header>
    <h3>Editar Agendamento</h3>
</header>

<div>
    <form action="index.php?menuop=atualizarAgendamento" method="post">
        <div>
            <label for="id_usuario"></label>
            <input type="hidden" name="id_usuario" value="<?=$dados["id_usuario"] ?>">
        </div>
        <div>
            <label for="nomeUsuario">Login: </label>
            <input name="nome_usuario" value="<?=$dados["nome_usuario"] ?>">
        </div>
        <div>
            <label for="responsavel">Nome da Pessoa: </label>
            <!--            <input type="text" name="fk_pessoa">-->
            <select name="fk_pessoa">
                <option value="<?=$dados["id_usuario"] ?> ></option>
                <?php
                $res_pessoa = "SELECT * FROM tb_pessoa";
                $resultado_pessoa = mysqli_query($conexao, $res_pessoa);
                while ($res = mysqli_fetch_assoc($resultado_pessoa)){ ?>
                    <option value="<?php echo $res['id_pessoa']; ?>"><?php echo $res ['nome_pessoa']; ?>
                    </option> <?php
                }
                ?>
            </select>
        </div>
        <div>
            <label for="perfil">Perfil: </label>
            <!--            <input type="text" name="fk_pessoa">-->
            <select name="fk_perfil">
                <option value="<?=$dados["id_usuario"] ?> ></option>
                <?php
                $res_perfil = "SELECT * FROM tb_perfil";
                $resultado_perfil = mysqli_query($conexao, $res_perfil);
                while($res1 = mysqli_fetch_assoc($resultado_perfil)){ ?>
                    <option value="<?php echo $res1['id_perfil']; ?>"><?php echo $res1 ['nome_perfil']; ?>
                    </option> <?php
                }
                ?>
            </select>
        </div>
        <div>
            <input type="submit" value="Salvar" name="btnSalvar">
        </div>

    </form>

</div>
