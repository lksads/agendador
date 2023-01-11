<header>
    <h3>Usuário</h3>
</header>

<div>
    <a class="btn btn-primary" href="index.php?menuop=cadastroUsuario">Cadastrar de Usuário</a>
</div>
<br>
<table  class="table table-striped table-hover table-responsive " >
    <thead>
    <tr class="bg-info">
        <th> ID</th>
        <th> Nome de Usuário</th>
        <th> Nome da Pessoa</th>
        <th> Nome de Perfil</th>
        <th> Editar</th>
        <th> Excluir</th>
    </tr>
    </thead>

    <tbody>
    <?php
    $sql = "SELECT * FROM tb_usuario";
    $rs = mysqli_query($conexao,$sql) or die("Erro ao buscar usuário no banco de dados" . mysqli_error($conexao));

    while ($dados = mysqli_fetch_assoc($rs)){
        ?>
        <tr>
            <td><?=$dados ["id_usuario"]?></td>
            <td><?=$dados ["nome_usuario"]?></td>
            <td><?=$dados ["fk_pessoa"]?></td>
            <td><?=$dados ["fk_perfil"]?></td>
            <td><a href="index.php?menuop=editarSala&id_usuario=<?=$dados["id_usuario"] ?>">Editar</a></td>
            <td><a href="index.php?menuop=excluirSala&id_usuario=<?=$dados["id_usuario"] ?>">Excluir</a></td>
        </tr>
        <?php
    }
    ?>
    </tbody>

</table>
