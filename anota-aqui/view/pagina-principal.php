<!DOCTYPE html>
<html>
    <?php

    require __DIR__ . '../../controller/session.php';
    require __DIR__ . '../../controller/Artilharia.php';

    $numRankings = 0;
    $query = new Artilharia('artilharia');
    $registros = $query->getArtilhariasUsuario($_SESSION['id']);
    $op = $_POST['op'] ?? null;

    if ($op == "Excluir")
    {
        $query->excluirArtilharia($_SESSION['id'], $_POST['idRankings']);

        header('LOCATION: pagina-principal.php');
    }


    if ($op == "Criar")
    {
        $dtCriacao = date_default_timezone_get();
        $query->cadastrarArtilharia($_POST['nmRankings'], $dtCriacao, $_POST['icPrivacidade'], $_POST['ieModalidade'], $_SESSION['id']);
        header('LOCATION: pagina-principal.php');
    }

    if ($op == "Alterar")
    {
        $query->updateArtilharia($_POST['idRankings'], $_POST['nmRankings'], $_POST['icPrivacidade']);
        header('LOCATION: pagina-principal.php');
    }
    ?>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <title>Página Principal</title>
        <link rel="icon" type="image/icon" href="img/favicon.png">
        <!-- Bootstrap core CSS -->
        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom fonts for this template -->
        <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

        <!-- Plugin CSS -->
        <link href="../vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">

        <!-- Custom styles for this template -->
        <link href="../css/freelancer.css" rel="stylesheet">
        <link href="../css/pagina-principal.css" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
             <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="../index.php">Anota Gols</a>
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
                                            <a class="dropdown-item active" href="pagina-principal.php">Minhas Artilharias</a>
                                            <div role="separator" class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="logout.php">Sair</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
            </div>
        </nav>
        <div class="container">
            <h1 style="margin-top: 170px; text-align: center">Minhas Artilharias</h1>
            <hr class="star-dark mb-5">
            <div class="row">
                <?php
                if (is_null($registros))
                {
                    ?>
                    <h2>Você ainda não tem artilharias</h2>
                    <?php
                }
                else
                {
                    foreach ($registros as $rankings)
                    {
                        $numRankings++;
                        ?>

                        <div class="col-md-4 mb-3 mb-md-0" style="margin-top: 50px;">
                            <div class="card py-4 h-100">
                                <div class="card-body text-center">
                                    <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                                    <h4 class="text-uppercase m-0" style="color: black "><?= $rankings['nm_ranking'] ?></h4>
                                    <hr class="my-4">
                                    <center>
                                        <div class="circle">
                                            <a href="artilharia.php?idRankings=<?= $rankings['id_ranking']?>&nmRankings=<?=strtoupper($rankings['nm_ranking'])?>"><button><img src="../img/artilharia<?= $numRankings ?>.jpeg"></button></a>
                                        </div>
                                    </center>
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#ExcluirArtilharia-<?= $rankings['id_ranking'] ?>" style="margin: 10px">Excluir</button>
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#AlterarArtilharia-<?= $rankings['id_ranking'] ?>">Alterar</button>
                                    <!-- Modal para alteração de artilharias -->
                                    <div class="modal fade" id="AlterarArtilharia-<?= $rankings['id_ranking'] ?>" tabindex="-1" role="dialog"
                                         aria-labelledby="TituloModalLongoExemplo" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="TituloModalLongoExemplo">Alterar de Artilharia</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post">
                                                        <div>
                                                        <p>Mudar nome da artilharia</p>
                                                        <input type="text" class="form-control" name="nmRankings" id="Nome" value="<?= $rankings['nm_ranking'] ?>">
                                                        </div>
                                                        <p style="margin-left: -370px; margin-top: 20px;">Privacidade:</p>
                                                        <div class="custom-control custom-radio custom-control-inline" style="position: absolute; margin-top: -40px; margin-left: -120px">
                                                            <input type="radio" id="customRadioInline1" name="icPrivacidade" class="custom-control-input" value="0" checked>
                                                            <label class="custom-control-label" for="customRadioInline1">Público</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline" style="position: absolute; margin-top: -40px; margin-left: -30px">
                                                            <input type="radio" id="customRadioInline2" name="icPrivacidade" class="custom-control-input" value="1">
                                                            <label class="custom-control-label" for="customRadioInline2">Privado</label>
                                                        </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                                    <input type="hidden" name="idRankings" value="<?= $rankings['id_ranking'] ?>">
                                                    <input type="submit" class="btn btn-primary" value="Alterar" name="op">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal para exclusão de artilharias -->
                                    <div class="modal fade" id="ExcluirArtilharia-<?= $rankings['id_ranking'] ?>" tabindex="-1" role="dialog"
                                         aria-labelledby="TituloModalLongoExemplo" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="TituloModalLongoExemplo">Excluir Artilharia</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h7>Certeza que deseja excluir a artilharia <?=$rankings['nm_ranking']?>?</h7>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                                    <form method="post">
                                                        <input type="hidden" name="idRankings" value="<?= $rankings['id_ranking'] ?>">
                                                        <input type="submit" class="btn btn-primary" name="op" value="Excluir">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                            </div>                            
                        </div>
                        
                        <?php
                    }
                }
                        ?>

                <?php
                if ($numRankings  < 3)
                {
                    ?>
                    <div class="col-md-4 mb-3 mb-md-0" style="margin-top: 50px;">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0" style="color: black ">Nova Artilharia</h4>
                                <hr class="my-4">
                                <center>
                                    <div class="circle">
                                        <!--onclick="window.location.href='/view/criar-artilharia.php'"-->
                                        <button id='addArtilharia' data-toggle="modal" data-target="#CriarArtilharia"><img id="botao-add" src="../img/botao-add.png"></button>

                                    </div>
                                    <!-- Modal Para Cadastro de Artilharias -->
                                    <div class="modal fade" id="CriarArtilharia" tabindex="-1" role="dialog"
                                         aria-labelledby="TituloModalLongoExemplo" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="TituloModalLongoExemplo">Cadastro de Artilharia</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post">
                                                        <input type="text" class="form-control" name="nmRankings" id="Nome" placeholder="Nome da Artilharia">
                                                        <p style="margin-left: -370px; margin-top: 20px;">Privacidade:</p>
                                                        <div class="custom-control custom-radio custom-control-inline" style="position: absolute; margin-top: -40px; margin-left: -120px">
                                                            <input type="radio" id="customRadioInline3" name="icPrivacidade" class="custom-control-input" value="0" checked>
                                                            <label class="custom-control-label" for="customRadioInline3">Público</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline" style="position: absolute; margin-top: -40px; margin-left: -30px">
                                                                <input type="radio" id="customRadioInline4" name="icPrivacidade" class="custom-control-input" value="1">
                                                                <label class="custom-control-label" for="customRadioInline4">Privado</label>
                                                        </div>
                                                        <div class="col-auto my-1">
                                                        <p style="margin-left: -370px; margin-top: 20px;">Modalidade</p>
                                                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="ieModalidade">
                                                    <option value="0" selected>1 - Basquete</option>
                                                    <option value="1">2 - Futebol</option>
                                                </select>
                                                </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                                    <input type="submit" class="btn btn-primary" value="Criar" name="op">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </center>
                            </div>
                        </div>
                    </div>

                <?php } ?>
            </div>
        </div>
    </div>

<center>
    <footer>
        <hr width="">
        Copyright &copy Equipe Null - 2019

        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

        <!-- Contact Form JavaScript -->
        <script src="js/jqBootstrapValidation.js"></script>
        <script src="js/contact_me.js"></script>

        <!-- Custom scripts for this template -->
        <script src="js/freelancer.min.js"></script>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </footer>
</center>
</body>
</html>
