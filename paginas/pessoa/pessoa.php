<header>
    <h3>Cadastro de Pessoa</h3>
</header>

<div>
    <a href="index.php?menuop=cadastro">Cadastro</a>

</div>

<table border="1">
    <thead>
        <tr>
            <th> ID</th>
            <th> Nome</th>
            <th> Perfil</th>
        </tr>
    </thead>

<tbody>
    <?php
        $sql = "SELECT * FROM tb_pessoa";
        $rs = mysqli_query($conexao,$sql) or die("Erro ao executar a consulta" . mysqli_error($conexao));

        while ($dados = mysqli_fetch_assoc($rs)){
        ?>
    <tr>
        <td><?=$dados ["id_pessoa"]?>></td>
        <td><?=$dados ["nome_pessoa"]?></td>
        <td><?=$dados ["id_nivel_acesso"]?></td>
    </tr>

    <?php
        }
    ?>



</tbody>

</table>
