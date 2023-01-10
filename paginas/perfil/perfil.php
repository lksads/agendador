
<header>
    <h3>Cadastro de Perfil</h3>
</header>

<div>
    <a class="btn btn-primary" href="index.php?menuop=cadastroPerfil">Cadastro de Perfil</a>
</div>
</br>
<table  class="table table-striped table-hover table-responsive " >
    <thead>
    <tr class="bg-info">
        <th> ID</th>
        <th> Perfil</th>
        <th> Editar</th>
        <th> Excluir</th>
    </tr>
    </thead>

    <tbody>
    <?php
    $sql = "SELECT * FROM tb_perfil";
    $rs = mysqli_query($conexao,$sql) or die("Erro ao executar a consulta" . mysqli_error($conexao));

    while ($dados = mysqli_fetch_assoc($rs)){
        ?>
        <tr>
            <td><?=$dados ["id_perfil"]?></td>
            <td><?=$dados ["nome_perfil"]?></td>
            <td><a href="index.php?menuop=editarPerfil&id_perfil=<?=$dados["id_perfil"] ?>">Editar</a></td>
            <td><a href="index.php?menuop=excluirPerfil&id_perfil=<?=$dados["id_perfil"] ?>">Excluir</a></td>
        </tr>

        <?php
    }
    ?>
    </tbody>

</table>
