<header>
    <h3>Cadastro de Departamento</h3>
</header>

<div>
    <form action="index.php?menuop=cadastroDepartamento" method="post">
        <div>
            <label for="nome_departamento">Departamento:</label>
            <input type="text" name="nome_departamento">
        </div>

        <div>
            <input type="submit" value="Salvar" name="btnSalvar">
        </div>
    </form>

</div>
<?php

if(isset($_POST["nome_departamento"])) {

$nome_departamento = mysqli_real_escape_string($conexao, $_POST["nome_departamento"]);

$sql = "INSERT INTO tb_departamento(
                       nome_departamento)
                       VALUES(
                              '{$nome_departamento}'
                       )";
mysqli_query($conexao, $sql) or die("Erro ao inserir Departamento" . mysqli_error($conexao));

echo "O Departaemnto foi inserida com sucesso";

header('Location:index.php?menuop=departamento');

}