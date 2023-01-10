<header>
    <h3> A Sala foi inserida com Sucesso</h3>
</header>
<?php
/*
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
