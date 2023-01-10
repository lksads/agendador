<header>
    <h3>Cadastro de Perfil</h3>
</header>

<div>
    <a class="btn btn-primary" href="index.php?menuop=cadastroDepartamento">Cadastro de Departamento</a>
</div>
</br>

<table class="table table-striped table-hover table-responsive ">
    <thead>
    <tr class="bg-info">
        <th> ID</th>
        <th> Departamento</th>
        <th> Editar</th>
        <th> Excluir</th>
    </tr>
    </thead>

    <tbody>
    <?php
    $sql = "SELECT * FROM tb_departamento";
    $rs = mysqli_query($conexao,$sql) or die("Erro ao executar a consulta de Departamento" . mysqli_error($conexao));

    while ($dados = mysqli_fetch_assoc($rs)){
        ?>
        <tr>
            <td><?=$dados ["id_departamento"]?></td>
            <td><?=$dados ["nome_departamento"]?></td>
            <td><a href="index.php?menuop=editarDepartamento&id_departamento=<?=$dados["id_departamento"] ?>">Editar</a></td>
            <td><a href="index.php?menuop=excluirDepartamento&id_departamento=<?=$dados["id_departamento"] ?>">Excluir</a></td>
        </tr>

        <?php
    }
    ?>
    </tbody>

</table>
