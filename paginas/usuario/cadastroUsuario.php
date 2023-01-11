<header>
    <h3>Cadastro de Usuário</h3>
</header>

<div>
    <form action="index.php?menuop=cadastroUsuario" method="post">
        <div>
            <label for="nome_usuario">Login:</label>
            <input type="text" name="nome_usuario">
        </div>
        <div>
            <label for="responsavel">Nome da Pessoa: </label>
<!--            <input type="text" name="fk_pessoa">-->
            <select name="fk_pessoa">
                <option>Selecionar</option>
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
                <option>Selecionar</option>
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
        </br>
        <div>
            <input type="submit" value="Salvar" name="btnSalvar">
        </div>
    </form>
</div>

<?php
    if (isset( $_POST["nome_usuario"])) {

        $nome_usuario = mysqli_real_escape_string($conexao, $_POST["nome_usuario"]);
        $fk_pessoa = mysqli_real_escape_string($conexao, $_POST["fk_pessoa"]);
        $fk_perfil = mysqli_real_escape_string($conexao, $_POST["fk_perfil"]);

        $sql = "INSERT INTO tb_usuario (
                               nome_usuario, fk_pessoa, fk_perfil)
                               VALUES(
                                      '{$nome_usuario}',
                                      '{$fk_pessoa}',
                                      '{$fk_perfil}'
                               )";
        mysqli_query($conexao, $sql) or die("Erro ao inserir o usuário no bando de dados. " . mysqli_error($conexao));

        echo "O Usuário foi inserida com sucesso";

    }
