<?php
    include ("db/conexao.php");

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agendador</title>
</head>
<body>
    <header>
        <h1>Sistema Agendador</h1>

        <nav>
            <a href="index.php?menuop=home">Home</a>|
            <a href="index.php?menuop=pessoa">Cadastro de Pessoas</a>|
            <a href="index.php?menuop=tarefas">Tarefas</a>|
            <a href="index.php?menuop=eventos">Eventos</a>
        </nav>
    </header>
    <main>
        <hr>
        <?php
            $menuop = (isset($_GET["menuop"]))?$_GET["menuop"]:"home";

            switch($menuop) {
                case 'home':
                    include("paginas/home/home.php");
                    break;
                case 'pessoa':
                    include("paginas/pessoa/pessoa.php");
                    break;
                case 'cadastro':
                    include("paginas/pessoa/cadastro.php");
                    break;
                case 'inserirPessoa':
                    include("paginas/pessoa/inserirPessoa.php");
                    break;
                case 'editarPessoa':
                    include("paginas/pessoa/editarPessoa.php");
                    break;
                case 'atualizarPessoa':
                    include("paginas/pessoa/atualizarPessoa.php");
                    break;
                case 'tarefas':
                    include("paginas/tarefas/tarefas.php");
                    break;
                case 'eventos':
                    include("paginas/eventos/eventos.php");
                    break;
                default:
                    include("paginas/home/home.php");
            }

        ?>



    </main>
</body>
</html>

<?php
