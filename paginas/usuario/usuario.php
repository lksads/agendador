<header>
    <h3>Usuário</h3>
</header>

<div>
    <a class="btn btn-primary" href="index.php?menuop=cadastroUsuario">Cadastrar de Usuario</a>
</div>
</br>
<div>
    <form action="index.php?menuop=usuario" method="post">
        <input type="text" name="pesquisa">
        <input type="submit" value="Pesquisar">
    </form>

</div>

<br>
<table  class="table table-striped table-hover table-responsive " >
    <thead>
    <tr class="bg-info">
        <th> ID</th>
        <th> Nome de Usuário</th>
        <th> Nome da Pessoa</th>
        <th> Nome de Perfil</th>
        <th > Editar</th>
        <th> Excluir</th>
    </tr>
    </thead>

    <tbody>
    <?php
    $pesquisa = (isset($_POST["pesquisa"]))?$_POST["pesquisa"]:"";

    $sql = "SELECT * FROM tb_usuario";
    $rs = mysqli_query($conexao,$sql) or die("Erro ao buscar usuário no banco de dados" . mysqli_error($conexao));

    while ($dados = mysqli_fetch_assoc($rs)){
        ?>
        <tr>
            <td><?=$dados ["id_usuario"]?></td>
            <td><?=$dados ["nome_usuario"]?></td>
            <td><?=$dados ["fk_pessoa"]?></td>
            <td><?=$dados ["fk_perfil"]?></td>
            <td><a class="btn btn-primary btn-sm" href="index.php?menuop=editarUsuario&id_usuario=<?=$dados["id_usuario"] ?>"><i class="bi bi-pencil-square"></i></a></td>
            <td><a class="btn btn-danger btn-sm" href="index.php?menuop=excluirUsuario&id_usuario=<?=$dados["id_usuario"] ?>"><i class="bi bi-trash3"></i></a></td>
        </tr>
        <?php
    }
    ?>
    </tbody>

</table>
