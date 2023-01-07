
<header>
    <h3>Cadastro de Perfil</h3>
</header>

<div>
    <a href="index.php?menuop=cadastroDepartamento">Cadastro de Departamento</a>
</div>

<table class="bg-info">
    <thead>
    <tr>
        <th> ID</th>
        <th> Departamento</th>
    </tr>
    </thead>

    <tbody>
    <?php
    $sql = "SELECT * FROM tb_departamento";
    $rs = mysqli_query($conexao,$sql) or die("Erro ao executar a consulta de Departamento" . mysqli_error($conexao));

    while ($dados = mysqli_fetch_assoc($rs)){
        ?>
        <tr>
            <td><?=$dados ["id_departaemtno"]?></td>
            <td><?=$dados ["nome_departamento"]?></td>
            <td><a href="index.php?menuop=editarDepartamento&id_departaemtno=<?=$dados["id_departaemtno"] ?>">Editar</a></td>
            <td><a href="index.php?menuop=excluirDepartamento&id_departaemtno=<?=$dados["id_departaemtno"] ?>">Excluir</a></td>
        </tr>

        <?php
    }
    ?>
    </tbody>

</table>
