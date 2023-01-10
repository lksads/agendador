<header>
    <h3>Cadastro de Salas</h3>
</header>

<div>
    <form action="index.php?menuop=cadastroSala" method="post">
        <div>
            <label for="nome_sala">Nome da Sala:</label>
            <input type="text" name="nome_sala">
        </div>
        <div>
            <input type="submit" value="Salvar" name="btnSalvar">
        </div>
    </form>

</div>

<?php
if (isset( $_POST["nome_sala"])) {

    $nome_sala = mysqli_real_escape_string($conexao, $_POST["nome_sala"]);

    $sql = "INSERT INTO tb_sala (
                           nome_sala)
                           VALUES(
                                  '{$nome_sala}'
                           )";
    mysqli_query($conexao, $sql) or die("Erro ao consultar a sala no bando de dados" . mysqli_error($conexao));

    echo "A Sala foi inserida com sucesso";

}
