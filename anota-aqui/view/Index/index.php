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

<link rel="stylesheet" href="Style.css" type="text/css">
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
                <a class="navbar-brand js-scroll-trigger" href="../index.php">Anota Gols</a>
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
                                    <a class="dropdown-item" href="../Cadastro/cadastro.php">Cadastre-se</a>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>

        </nav>
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
                A equipe Avalon trabalha para sempre estar a frente no mercado e 
                desenvolver os melhores aplicativos para seus usuários. O nosso
                mais novo projeto é o Anota Aqui, um aplicativo que cativará todos
                os amantes de esporte, principalmente se você gosta de futebol e
                basquete. Caso tenha alguma dúvida ou deseja se comunicar com
                a equipe de alguma forma, acesse nossas redes sociais.
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
