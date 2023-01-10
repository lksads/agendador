<?php
    include ("db/conexao.php");
?>

<!doctype html>
    <html lang="en">
        <head>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" >
            <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

           <meta charset="UTF-8">
            <meta name="viewport"
                  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Agendador</title>
    </head>
    <body>
        <div class="container ">
        <header>
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand">Chronos</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" class="" href="index.php?menuop=home">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?menuop=pessoa">Pessoas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?menuop=agendamento">Agendamento</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?menuop=sala">Sala</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?menuop=departamento">Departamento</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?menuop=perfil">Perfil</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
    <main>
        <hr>
        <?php
            $menuop = (isset($_GET["menuop"]))?$_GET["menuop"]:"home";

            //rever dados para melhoria

            $pessoa= substr($menuop, -6);
            $departamento = substr($menuop, -12);
            $sala = substr($menuop, -4);
            $perfil = substr($menuop, -6);

            if($menuop == "cadastro" || $pessoa == "Pessoa"){
                include("paginas/pessoa/".$menuop.".php");
            }elseif ($menuop == "cadastroDepartamento" || $departamento == "Departamento") {
                include("paginas/departamento/" . $menuop . ".php");
            }elseif ($menuop == "cadastroSala" || $sala == "Sala"){
                include("paginas/sala/".$menuop.".php");
            }elseif ($menuop == "cadastroPerfil" || $perfil == "Perfil") {
                include("paginas/perfil/" . $menuop . ".php");
            }elseif ($pessoa != null){
                include("paginas/".$menuop."/".$menuop.".php");
            }else{
                include("paginas/home/home.php");
            }

        ?>

            </main>
        </div>
    </body>
    </html>

<?php
