<header>
    <h3> Inserido com Sucesso</h3>
</header>
<?php
/*
$nome_departamento = mysqli_real_escape_string($conexao, $_POST["nome_departamento"]);

$sql = "INSERT INTO tb_departamento(
                       nome_departamento)
                       VALUES(
                              '{$nome_departamento}'
                       )";
mysqli_query($conexao, $sql) or die("Erro ao inserir Departamento" . mysqli_error($conexao));

echo "O Departaemnto foi inserida com sucesso";


