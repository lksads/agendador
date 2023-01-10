<?php
$id_perfil = $_GET["id_perfil"];

$sql = "SELECT * FROM tb_perfil WHERE id_perfil = {$id_perfil}";
$rs = mysqli_query($conexao,$sql) or die ("Erro ao trazer os dados do Perfil do bando de dados" . mysqli_error($conexao));
$dados = mysqli_fetch_assoc($rs);
?>

<header>
    <h3>Editar Perfil</h3>
</header>

<div>
    <form action="index.php?menuop=atualizarPerfil" method="post">
        <div>
            <label for="id_perfil"></label>
            <input type="hidden" name="id_perfil" value="<?=$dados["id_perfil"] ?>">
        </div>
        <div>
            <label for="nome_perfil">Sala:</label>
            <input type="text" name="nome_perfil" value="<?=$dados["nome_perfil"]?>">
        </div>
        <div>
            <input type="submit" value="Salvar" name="btnSalvar">
        </div>

    </form>

</div>
