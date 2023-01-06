<?php
    $id_pessoa = $_GET["editarPessoa"];

    $sql = "SELECT * FROM tb_pessoa WHERE id_pessoa = {$id_pessoa}";
    $rs = mysqli_query($conexao,$sql) or die ("Erro ao trazer os dados do bando" . mysqli_error($conexao));
    $dados = mysqli_fetch_assoc($rs);



?>

<header>
    <h3>Editar Pessoa</h3>
</header>

<div>
    <form action="index.php?menuop=atualizarPessoa" method="post">
        <div>
            <label for="id_pessoa">ID</label>
            <input type="text" name="id_pessoa" value="<?=$dados["id_pessoa"]?>">
        </div>
        <div>
            <label for="nome_pessoa">Nome</label>
            <input type="text" name="nome_pessoa" value="<?=$dados["nome_pessoa"]?>">
        </div>
        <div>
            <label for="fk_nivel_acesso">Perfil</label>
            <input type="text" name="fk_nivel_acesso" value="<?=$dados["fk_nivel_acesso"]?>">
        </div>

        <div>
            <input type="submit" value="Salvar" name="btnSalvar">
        </div>


    </form>

</div>
