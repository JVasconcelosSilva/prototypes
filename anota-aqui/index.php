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

    <link rel="stylesheet" href="view/Index/Style.css" type="text/css">
    <link rel="stylesheet" href="fontes/font-awesome.min.css">

    <script src="https://kit.fontawesome.com/54f9cce8ca.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
    <title>Index</title>

</head>

<body>

    <!----------------------------------------Navbar------------------------------------------>

    <header class="header">
        <nav class="navbar navbar-default fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <a href="#" class="navbar-brand" id="logo"> <img src="Imagens/Anota (1).png" alt=""></a>
                </div>

                <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">

                        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group" style="left: -250px">
                                <input type="text" class="form-control bg-light border-0 small" placeholder="Pesquise aqui..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button" style="height: 38px;">
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
                                    <button type="button" onclick="window.location.href = '/view/Perfil/_perfil.php'" id="user" class="btn btn-outline-secondary"><?php echo $_SESSION['nome']; ?></button>
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
                                            <a class="dropdown-item" href="view/Perfil/_perfil.php">Minhas Informações</a>
                                            <a class="dropdown-item" href="view/Perfil/perfil.php">Perfil</a>
                                            <div role="separator" class="dropdown-divider"></div>
                                            <a class="dropdown-item js-scroll-trigger" href="#estrelas">Estrelas</a>
                                            <a class="dropdown-item js-scroll-trigger" href="#informacoes">Informações</a>
                                            <div role="separator" class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="view/logout.php">Sair</a>
                                    </div>
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
                                        <a class="dropdown-item js-scroll-trigger" href="#estrelas">Estrelas</a>
                                        <a class="dropdown-item js-scroll-trigger" href="#informacoes">Informações</a>
                                        <div role="separator" class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="view/cadastro.php">Cadastre-se</a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                    </ul>
                </div>
            </div>
        </nav>

        <!----------------------------------------itens da primeira pag------------------------------------------>

        <div class="row">
            <div class="col-md-12 text-center">
                <img id="imghome" src="Imagens/Anota.png" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="hero-text text-center">
                    <h1> Anota Aqui </h1>
                </div>

                <div class="hero-text text-center">
                    <h3> Controle seu jogo ou alguém controlará por voce! </h4>
                </div>

                <!--
                <div class="header-buttons text-center">
                    <a href="" class="btn btn-full">botão 1</a>
                    <a href="" class="btn btn-half">botão 2</a>
                </div>
-->
            </div>
        </div>
    </header>

    <!----------------------------------------Quem Somos------------------------------------------>
    <br>
    <section class="offer">
        <div class="container-fluid">
            <h1 class="text-center text-uppercase"> Quem Somos </h1>
        </div>
        <div class="col-md-10">
            <p class="description">
                texto texto texto texto texto texto texto
                <br>
                texto texto texto texto texto texto texto
                <br>
                texto texto texto texto texto texto texto
            </p>
        </div>
    </section>
    <br>
    <!---------------------------------------------Atletas---+------------------------------------------------->
    <section class="testimonials">
        <div class="conatiner">
            <div class="wrap">

                <div class="box one">
                    <div class="date">
                    </div>
                    <h1>CRIE</h1>
                </div>

                <div class="box two">
                    <div class="date">
                    </div>
                    <H1>ANOTE</H1>
                </div>

                <div class="box three">
                    <div class="date">
                    </div>
                    <h1>COMPARTILHE</h1>
                </div>
            </div>
    </section>
    </section>
    <!--------------------------------------fim------------------------------------------------------------->
    <!--
<br>
        <section class="contato">
            <div class="container-fluid">
                <h1 class="text-center text-uppercase"> Contato </h1>
            </div>
            <div class="col-md-10">
                <p class="description"> 
                   texto texto texto texto texto texto texto 
                   <br>
                   texto texto texto texto texto texto texto 
                   <br>
                   texto texto texto texto texto texto texto 
                </p>
            </div>
        </section>
-->
    <!--------------------------------------fim------------------------------------------------------------->
    <!--
    <section class="testimonials2"> 
    <div class="conatiner">
                <div class="wrap">
                    <div class="box one">
                        <div class="date">
                        </div>
                        <h1>CRIE</h1>
                        <div class="poster p2">
			            <h4>
                            <a href="#" class="social">
                                <i class="fab fa-instagram"></i>
                                <i class="fab fa-instagram"></i>
                                <i class="fab fa-instagram"></i>
                            </a>
                        </h4>
		            </div>
                    </div>
                    
                <div class="box two">
                    <div class="date">
                    </div>
                    <H1>ANOTE</H1>
                    <div class="poster p2">
			            <h4>
                            <a href="#" class="social">
                                <i class="fab fa-instagram"></i>
                                <i class="fab fa-instagram"></i>
                                <i class="fab fa-instagram"></i>
                            </a>
                        </h4>
		            </div>
                </div>
	
                <div class="box three">
                    <div class="date">
                    </div>
                    <h1>COMPARTILHE</h1>
                    <div class="poster p2">
			            <h4>
                            <a href="#" class="social">
                                <i class="fab fa-instagram"></i>
                                <i class="fab fa-instagram"></i>
                                <i class="fab fa-instagram"></i>
                            </a>
                        </h4>
		            </div>
                </div>
                <div class="box three">
                    <div class="date">
                    </div>
                    <h1>COMPARTILHE</h1>
                    <div class="poster p2">
			            <h4>
                            <a href="#" class="social">
                                <i class="fab fa-instagram"></i>
                                <i class="fab fa-instagram"></i>
                                <i class="fab fa-instagram"></i>
                            </a>
                        </h4>
		            </div>
                </div>
            </div>
    </section>
<br>
-->
    <!---------------------------------------Footer------------------------------------------------------------>
    <!--
            <footer class="footer">
                <div class="container">
                    <div class="row">
                        <div class="primeiro-footer mx-auto">
                            <h4><strong>Futsoccer</strong></h4>
                            <p> Texto Opicional</p>
                       </div>
                        <div class="segundo-footer mx-auto">
                            <h4><strong>Contato</strong></h4>
                            <p> E-mail:</p>
                            <p> Telefone:</p>
                       </div>
                        <div class="terceiro-footer mx-auto">
                            <h4><strong>Redes Sociais</strong><h4>
                            <a href="#" class="social"> 
                                <i class="fab fa-facebook-square"></i>
                            </a>
                            <a href="#" class="social">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                        <div class="quarto-footer mx-auto">
                            <h4><strong>Links</strong></h4>
                            <ul>
                                <li><a href="#">Home</li>
                                <li><a href="#">Contato</li>
                            </ul>
                        </div>
                    </div>
                </div>
        </footer>
-->
</body>

</html>