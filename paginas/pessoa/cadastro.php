<header>
    <h3>Cadastro de Pessoa</h3>
</header>

<div>
    <form action="index.php?menuop=inserirPessoa" method="post">
        <div>
            <label for="nome_pessoa">Nome</label>
            <input type="text" name="nome_pessoa">
        </div>
        <div>
            <label for="fk_nivel_acesso">Perfil</label>
            <input type="text" name="fk_nivel_acesso">
        </div>

        <div>
            <input type="submit" value="Salvar" name="btnSalvar">
        </div>


    </form>

</div>

