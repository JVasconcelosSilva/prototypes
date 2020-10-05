<?php
require __DIR__ . '../../../controller/Artilharia.php';
session_start();
$nomeArtilharia = $_GET['nomeArtilharia'] ?? null;
?>
<!DOCTYPE html>
<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="publicaestilo.css" type="text/css">
<link rel="stylesheet" href="fontes/font-awesome.min.css">

<script src="https://kit.fontawesome.com/54f9cce8ca.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
<title>Perfil</title>

</head>
<body>

<!----------------------------------------Navbar------------------------------------------>

<header class="header">  
        <nav class="navbar navbar-default fixed-top">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="../../index.php">Anota Gols</a>
                <?php
                if (isset($_SESSION['id'], $_SESSION['nome'], $_SESSION['email'])) {
                    ?>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <button type="button" onclick="window.location.href = '/view/minhas-informacoes.php'" id="user" class="btn btn-outline-secondary"><?php echo $_SESSION['nome']; ?></button>
                            <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <form method="get" action="publicas.php?nomeArtilharia=<?= $nomeArtilharia ?>" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                    <div class="input-group" id="menuPesquisa">
                                        <input type="text" name="nomeArtilharia" class="form-control bg-light border-0 small" placeholder="Procurar artilharia..." aria-label="Search" aria-describedby="basic-addon2">
                                    </div>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="publicas.php">Artilharias Públicas</a>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="minhas-informacoes.php">Minhas Informações</a>
                                    <a class="dropdown-item" href="pagina-principal.php">Minhas Artilharias</a>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="logout.php">Sair</a>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <button type="button" onclick="window.location.href = '/view/login.php'" id="user" class="btn btn-outline-secondary">Entrar</button>
                            <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <form method="get" action="/view/publicas.php?nomeArtilharia=<?= $nomeArtilharia ?>" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                    <div class="input-group" id="menuPesquisa">
                                        <input type="text" name="nomeArtilharia" class="form-control bg-light border-0 small" placeholder="Procurar artilharia..." aria-label="Search" aria-describedby="basic-addon2">
                                    </div>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <a class="dropdown-item active" href="publicas.php">Artilharias Públicas</a>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="cadastro.php">Cadastre-se</a>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            </div>
        </nav>
    </header>

<!---------------------------------------------Card's---+------------------------------------------------->
<br>
<br>
<section class="testimonials"> 
            <div class="container"> 
                <br>
                <br>
            <h1 id="nome">Artilharias Públicas</h1>
                <div class="wrap">
                    <div class="box one">
                        <div class="date">
                        </div>
                        <h1>Artilharia</h1>
                        <div class="date">
                        </div>
                        <h1 id="dono">Dono</h1>

                        <div class="date">
                        </div>
                        <h1 id="esporte">Esporte</h1>
                        
                        <br>

                        

                        <div class="container" id="lista">

                        <?php
                            $query = new Artilharia("artilharia");
                            $artilharias = $query->getArtilharias();
                            foreach ($artilharias as $artilharia) {
                        ?>
                            <div class="row">
                                <div class="col-sm">
                                <a href="artilharia.php?idArtilharia=<?= $artilharia['id_ranking'] ?>&nmArtilharia=<?= $artilharia['nm_ranking'] ?>"><?= $artilharia['nm_ranking'] ?></a>
                                </div>
                                |   
                                <div class="col-sm">
                                <?= $artilharia['nm_usuario'] ?>
                                </div>
                                |
                                <div class="col-sm">
                                    <?php
                                    if($artilharia['ie_modalidade'] == 0){?>
                                Basquete
                                <?php }else if($artilharia['ie_modalidade'] == 1){?>
                                    Futebol
                                <?php }?>
                                </div>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
    </section>
