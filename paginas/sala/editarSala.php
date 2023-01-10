<?php
$id_sala = $_GET["id_sala"];

$sql = "SELECT * FROM tb_sala WHERE id_sala = {$id_sala}";
$rs = mysqli_query($conexao,$sql) or die ("Erro ao trazer os dados do bando" . mysqli_error($conexao));
$dados = mysqli_fetch_assoc($rs);
?>

<header>
    <h3>Editar Sala</h3>
</header>

<div>
    <form action="index.php?menuop=atualizarSala" method="post">
        <div>
            <label for="id_sala"></label>
            <input type="hidden" name="id_sala" value="<?=$dados["id_sala"] ?>">
        </div>
        <div>
            <label for="nome_sala">Sala:</label>
            <input type="text" name="nome_sala" value="<?=$dados["nome_sala"]?>">
        </div>
        <div>
            <input type="submit" value="Salvar" name="btnSalvar">
        </div>

    </form>

</div>
