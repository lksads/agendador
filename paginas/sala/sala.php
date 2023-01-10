<header>
    <h3>Sala</h3>
</header>

<div>
    <a class="btn btn-primary" href="index.php?menuop=cadastroSala">Cadastrar de Salas</a>
</div>
<br>
<table  class="table table-striped table-hover table-responsive " >
    <thead>
    <tr class="bg-info">
        <th> ID</th>
        <th> Nome da Sala</th>
        <th> Editar</th>
        <th> Excluir</th>
    </tr>
    </thead>

    <tbody>
    <?php
    $sql = "SELECT * FROM tb_sala";
    $rs = mysqli_query($conexao,$sql) or die("Erro ao buscar salas no banco de dados" . mysqli_error($conexao));

    while ($dados = mysqli_fetch_assoc($rs)){
        ?>
        <tr>
            <td><?=$dados ["id_sala"]?></td>
            <td><?=$dados ["nome_sala"]?></td>
            <td><a href="index.php?menuop=editarSala&id_sala=<?=$dados["id_sala"] ?>">Editar</a></td>
            <td><a href="index.php?menuop=excluirSala&id_sala=<?=$dados["id_sala"] ?>">Excluir</a></td>
        </tr>
        <?php
    }
    ?>
    </tbody>

</table>
