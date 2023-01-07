<header>
    <h3>Pessoa</h3>
</header>

<div>
    <a class="btn btn-primary" href="index.php?menuop=cadastro">Cadastrar Pessoa</a>
</div>
<br>
<table  class="table table-striped table-hover table-responsive " >
    <thead>
        <tr class="bg-info">
            <th> ID</th>
            <th> Nome</th>
            <th> Editar</th>
            <th> Excluir</th>
        </tr>
    </thead>

<tbody>
    <?php
        $sql = "SELECT * FROM tb_pessoa";
        $rs = mysqli_query($conexao,$sql) or die("Erro ao executar a consulta" . mysqli_error($conexao));

        while ($dados = mysqli_fetch_assoc($rs)){
        ?>
    <tr>
        <td><?=$dados ["id_pessoa"]?></td>
        <td><?=$dados ["nome_pessoa"]?></td>
        <td><a href="index.php?menuop=editarPessoa&id_pessoa=<?=$dados["id_pessoa"] ?>">Editar</a></td>
        <td><a href="index.php?menuop=excluirPessoa&id_pessoa=<?=$dados["id_pessoa"] ?>">Excluir</a></td>
    </tr>

    <?php
        }
    ?>
</tbody>

</table>
