<header>
    <h3>Cadastro de Usuário</h3>
</header>

<div>
    <form action="index.php?menuop=cadastroUsuario" method="post">
        <div>
            <label for="nome_usuario">Nome do usuário:</label>
            <input type="text" name="nome_usuario">
        </div>
        <div>
            <label for="fk_pessoa">Pessoa Responsável</label>
<!--            <input type="text" name="fk_pessoa">-->
            <select name="fk_pessoa ">
                <option>Seleciona</option>
                <?php
                    $res_pessoa = "SELECT * FROM select * from tb_pessoa";
                    $resultado_pessoa = mysqli_query($conexao, $res_pessoa);

                ?>

            </select>
        </div>
        <div>
            <label for="fk_perfil">Perfil:</label>
            <input type="text" name="fk_perfil">
        </div>
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
    mysqli_query($conexao, $sql) or die("Erro ao inserir o usuário no bando de dados" . mysqli_error($conexao));

    echo "O Usuário foi inserida com sucesso";

}
