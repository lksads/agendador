
<header>
    <h3>Cadastro de Perfil</h3>
</header>

<div>
    <a href="index.php?menuop=inserirNivelAcesso">Cadastro de Perfil</a>
</div>

<table class="bg-info">
    <thead>
    <tr>
        <th> ID</th>
        <th> Perfil</th>
    </tr>
    </thead>

    <tbody>
    <?php
    $sql = "SELECT * FROM tb_nivel_acesso";
    $rs = mysqli_query($conexao,$sql) or die("Erro ao executar a consulta" . mysqli_error($conexao));

    while ($dados = mysqli_fetch_assoc($rs)){
        ?>
        <tr>
            <td><?=$dados ["id_nivel_acesso"]?></td>
            <td><?=$dados ["descricao"]?></td>
            <td><a href="index.php?menuop=editarPerfil&id_nivel_acesso=<?=$dados["id_nivel_acesso"] ?>">Editar</a></td>
            <td><a href="index.php?menuop=excluirPerfil&id_nivel_acesso=<?=$dados["id_nivel_acesso"] ?>">Excluir</a></td>
        </tr>

        <?php
    }
    ?>
    </tbody>

</table>
