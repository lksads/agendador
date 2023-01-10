<header>
    <h3>Cadastro de Pessoa</h3>
</header>

<div>
    <form action="index.php?menuop=cadastro" method="post">
        <div>
            <label for="nome_pessoa">Nome:</label>
            <input type="text" name="nome_pessoa">
        </div>

        <div>
            <input type="submit" value="Salvar" name="btnSalvar">
        </div>
    </form>

</div>

<?php

if (isset($_POST["nome_pessoa"])) {
    $nome_pessoa = mysqli_real_escape_string($conexao, $_POST["nome_pessoa"]);

    $sql = "INSERT INTO tb_pessoa (
                       nome_pessoa)
                       VALUES(
                              '{$nome_pessoa}'
                       )";
    mysqli_query($conexao, $sql) or die("Erro ao consultar" . mysqli_error($conexao));

    echo "A pessoa foi inserida com sucesso";
}
