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

<link rel="stylesheet" href="navbarestilo.css" type="text/css">
<link rel="stylesheet" href="fontes/font-awesome.min.css">

<script src="https://kit.fontawesome.com/54f9cce8ca.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
<title>Navbar</title>

</head>
<body>

<!----------------------------------------Navbar------------------------------------------>

<header class="header">  
    <nav class="navbar navbar-default fixed-top">
        <div class="container">
            <div class="navbar-header" >
                <a href="#" class="navbar-brand" id="logo"> <img src="Imagens/Anota (1).png" alt=""></a>

                <!-- Pesquisa -->
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group" style="left: -250px">
                        <input type="text" id="busca" class="form-control bg-light border-0 small" placeholder="Pesquise aqui..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button id="buscaicone" class="btn btn-primary" type="button" style="height: 38px;">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                    </div>
                </form>
                        
                <?php
                session_start();
                if (isset($_SESSION['id'], $_SESSION['nome'], $_SESSION['email'])) {
                ?>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <button type="button" onclick="window.location.href = '/view/minhas-informacoes.php'" id="user" class="btn btn-outline-secondary"><?php echo $_SESSION['nome']; ?></button>
                            <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>

                <div class="dropdown-menu dropdown-menu-right">
                    <form method="get" action="/view/publicas.php?nomeArtilharia=<?= $nomeArtilharia ?>" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group" id="menuPesquisa">
                            <input type="text" name="nomeArtilharia" class="form-control bg-light border-0 small" placeholder="Procurar artilharia..." aria-label="Search" aria-describedby="basic-addon2">
                        </div>
                    <div role="separator" class="dropdown-divider"></div>
                        <a class="dropdown-item" href="view/Publica/publica.php">Rankings Públicos</a>
                    <div role="separator" class="dropdown-divider"></div>
                        <a class="dropdown-item" href="view/minhas-informacoes.php">Minhas Informações</a>
                        <a class="dropdown-item" href="view/Perfil/perfil.php">Perfil</a>
                    <div role="separator" class="dropdown-divider"></div>
                        <a class="dropdown-item" href="view/logout.php">Sair</a>
                            </div>
                        </div>
                    <?php
                    } else {
                    ?>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <button type="button" onclick="window.location.href = '/view/Login/login.php'" id="user" class="btn btn-outline-secondary">Entrar</button>
                            <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <form method="get" action="/view/publicas.php?nomeArtilharia=<?= $nomeArtilharia ?>" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group" id="menuPesquisa">
                                <input type="text" name="nomeArtilharia" class="form-control bg-light border-0 small" placeholder="Procurar artilharia..." aria-label="Search" aria-describedby="basic-addon2">
                            </div>
                    </form>
                        <div role="separator" class="dropdown-divider"></div>
                        <a class="dropdown-item" href="view/publicas.php">Artilharias Públicas</a>
                    <div role="separator" class="dropdown-divider"></div>
                        <a class="dropdown-item" href="view/cadastro.php">Cadastre-se</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</body>