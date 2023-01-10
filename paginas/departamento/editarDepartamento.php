<?php
$id_departamento = $_GET["id_departamento"];

$sql = "SELECT * FROM tb_departamento WHERE id_departamento = {$id_departamento}";
$rs = mysqli_query($conexao,$sql) or die ("Erro ao trazer os dados do bando de Departamento" . mysqli_error($conexao));
$dados = mysqli_fetch_assoc($rs);
?>

<header>
    <h3>Editar Pessoa</h3>
</header>

<div>
    <form action="index.php?menuop=atualizaDepartamento" method="post">
        <div>
            <label for="id_departamento"></label>
            <input type="hidden" name="id_departamento" value="<?=$dados["id_departamento"] ?>">
        </div>
        <div>
            <label for="nome_departamento">Departamento:</label>
            <input type="text" name="nome_departamento" value="<?=$dados["nome_departamento"]?>">
        </div>
        <div>
            <input type="submit" value="Salvar" name="btnSalvar">
        </div>

    </form>

</div>
