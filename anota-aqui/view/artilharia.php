<?php

require __DIR__ . '../../controller/Moderador.php';
require __DIR__ . '../../controller/Artilharia.php';

session_start();

$nomeArtilharia = null;
$idRankings = $_GET['idRankings'] ?? null;
$nmRankings = $_GET['nmRankings'] ?? null;
$nmRankings = strtoupper($nmRankings);
$query = new Jogador('jogador');
$registros = $query->getJogadoresArtilharia($idRankings);

$query2 = new Moderador('moderador');
$artilharia = new Artilharia('artilharia');
$art = $artilharia->getDonoArtilharia($idRankings);
$dono = mysqli_fetch_assoc($art);

$op = null;
$contador = 0;
$nmJogador = $_POST['nmJogador'] ?? null;
$op = $_POST['op'] ?? null;
$qtGol = $_POST['qtGolAtual'] ?? null;
//$controle = 0;

if ($op == "Criar") {
    $query->cadastrarJogador($nmJogador, $idRankings);
    $nmRankings = $_POST['nmRankings'] ?? null;
    header('LOCATION: artilharia.php?idRankings=' . $idRankings . "&nmRankings=" . $nmRankings);
}
if ($op == "+") {
    $query->adicionarGol($_POST['idJogador'], $_POST['idRankings'], $qtGol, $_SESSION['id']);
    $nmRankings = $_POST['nmRankings'] ?? null;
    header('LOCATION: artilharia.php?idRankings=' . $idRankings . "&nmRankings=" . $nmRankings);
}
if ($op == "-") {

    if ($qtGol > 0) {
        $query->tirarGol($_POST['idJogador'], $_POST['idRankings'], $qtGol, $_SESSION['id']);
        $nmRankings = $_POST['nmRankings'] ?? null;
        header('LOCATION: artilharia.php?idRankings=' . $idRankings . "&nmRankings=" . $nmRankings);
    }
}
if ($op == "Alterar") {
    $query->updateJogador($_POST['idJogadorUpdate'], $_POST['nmNomeUpdate'], $_POST['qtGolUpdate'], $qtGol, $_POST['idRankings'], $_SESSION['id']);
    $nmRankings = $_POST['nmRankings'] ?? null;
    header('LOCATION: artilharia.php?idRankings=' . $idRankings . "&nmRankings=" . $nmRankings);
}
if ($op == "Excluir") {
    $query->excluirJogador($_POST['idJogadorUpdate'], $_POST['idRankings']);
    $nmRankings = $_POST['nmRankings'] ?? null;
    header('LOCATION: artilharia.php?idRankings=' . $idRankings . "&nmRankings=" . $nmRankings);
}
if ($op == "Buscar") {
    $registros = null;
    $nmJogador = $_POST['nmJogador'] ?? null;
    $registros = $query->getJogadoresNome($idRankings, $nmJogador);
    //$op = null;
}
if ($op == "Adicionar Moderador") {
    
    $query2->cadastrarModerador($idRankings, $_POST['idModerador'], $dono['id_usuario']);
    header('LOCATION: artilharia.php?idRankings=' . $idRankings . "&nmRankings=" . $nmRankings, $_SESSION['id']);
}
if ($op == "Remover Moderador") {
    
    $query2->excluirModerador($idRankings, $_POST['idModerador']);
    header('LOCATION: artilharia.php?idRankings=' . $idRankings . "&nmRankings=" . $nmRankings, $_SESSION['id']);
}
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Artilharia - Anota Gols</title>
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
        <link href="../css/artilharia.css" rel="stylesheet">

    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
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
                                    <a class="dropdown-item" href="cadastro.php">Cadastre-se</a>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>

        </nav>
    <center>
    
        <h2><?= $nmRankings ?></h2>
        <hr class="star-dark mb-5">

        <hr/>
        <form method="post">
        <div class="col-6" >
        <div class="input-group border rounded">
            <input type="text" class="form-control border-0" placeholder="Buscar Jogador" aria-label="Buscar Jogador" aria-describedby="basic-addon2" name="nmJogador">
                <div class="input-group-append">
                <input type="hidden" name="nmRankings" value="<?= $nmRankings ?>">
                <input type="hidden" name="idRankings" value="<?= $idRankings ?>">
                <input class="btn btn-primary" type="submit" name="op" value="Buscar">
                </div>
            </div>
        </div>
        </form>
        <?php if ($op == "Buscar") {?>
        <a href="artilharia.php?idRankings=<?= $idRankings?>&nmRankings=<?=$nmRankings?>" ><button class="btn btn-primary">Mostrar todos os jogadores</button></a>
        <p>Resultados de: <?= $_POST['nmJogador']?></p>
        <?php }?>
        <hr/>
        <?php if (/*$controle == 1  ||*/ $_SESSION['id'] == $dono['fk_Usuario_id_usuario']) { ?>
            <button class="btn btn-primary" id='addJogador' data-toggle="modal" data-target="#CriarJogador">Adicionar Jogador</button>
        <?php }?>
        <?php
        if($registros != null){
        foreach ($registros as $jogador) {
            $contador++;
            ?>
            <div class="card" 
            <?php if ($contador == 1) {
                ?>
                     style="background-color: #FFD700"
                     <?php
                 } elseif ($contador == 2) {
                     ?>
                     style="background-color: #C0C0C0"

                     <?php
                 } elseif ($contador == 3) {
                     ?>
                     style="background-color: #D2691E"

                 <?php } ?>
                 >
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <h3 class="colocacao mx-auto"><?= $contador ?>°</h3>
                        </div>
                        <div class="col-md-4 mx-auto">
                            <!--Nome do Jogador-->
                            <h5 class="nome mt-4 mx-auto" style="font-size: 30px;"><?= $jogador['nm_jogador'] ?></h5>  
                        </div
                        <div class="col-auto mx-auto">
                            <!--Numero de gols do jogador-->
                            <h5 class="gols"><?= $jogador['qt_ponto'] ?> </h5>
                            <?php                            
                             if (/*$controle == 1 ||*/ $_SESSION['id'] == $dono['fk_Usuario_id_usuario']) { ?>
                                <div class="col-md-2">
                                    <div class="row" mx-auto>
                                        <!--Adiciona um gol-->
                                        <form method="POST">
                                            <input type="hidden" name="nmRankings" value="<?= $nmRankings ?>">
                                            <input type="hidden" name="idRankings" value="<?= $idRankings ?>">
                                            <input type="hidden" name="qtGolAtual" value="<?= $jogador['qt_ponto'] ?>">
                                            <input type="hidden" name="idJogador" value="<?= $jogador['id_jogador'] ?>">
                                            <input type="submit" name="op" value="+" class="btn btn-primary"/>
                                        </form>
                                        <!--Remove um gol-->
                                        <form method="POST">
                                            <input type="hidden" name="nmRankings" value="<?= $nmRankings ?>">
                                            <input type="hidden" name="idRankings" value="<?= $idRankings ?>">
                                            <input type="hidden" name="qtGolAtual" value="<?= $jogador['qt_ponto'] ?>">
                                            <input type="hidden" name="idJogador" value="<?= $jogador['id_jogador'] ?>">
                                            <input type="submit" name="op" value="-" class="btn btn-danger" <?php if($jogador['qt_ponto'] == 0){?>disabled<?php }?>/>
                                        </form>
                                    </div>
                                </div>

                                <div class="col-md-1">
                                    <button class="btn btn-secondary mx-autos" id='alteraJogador' data-toggle="modal" data-target="#AlterarJogador-<?= $jogador["id_jogador"]; ?>">...</button>
                                <?php } ?>
                                <!-- Modal Para Alteração de Jogaodr -->
                                <div class="modal fade" id="AlterarJogador-<?= $jogador["id_jogador"]; ?>" tabindex="-1" role="dialog"
                                     aria-labelledby="TituloModalLongoExemplo" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="TituloModalLongoExemplo"><?= $jogador['nm_jogador'] ?></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="POST">
                                                <div class="modal-body">
                                                    <p><input type="text" class="form-control" name="nmNomeUpdate" id="Nome" value="<?= $jogador['nm_jogador'] ?>"></p>
                                                    <p><input type="number" class="form-control" name="qtGolUpdate" id="Gol" value="<?= $jogador['qt_ponto'] ?>"></p>
                                                    <input type="hidden" name="idJogadorUpdate" value="<?= $jogador['id_jogador'] ?>">
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="submit" class="btn btn-primary" name="op" value="Alterar">
                                                    <input type="hidden" name="nmRankings" value="<?= $nmRankings ?>">
                                                    <input type="hidden" name="idRankings" value="<?= $idRankings ?>">
                                                    <input type="hidden" name="qtGolAtual" value="<?= $jogador['qt_ponto'] ?>">
                                                    <input type="submit" class="btn btn-danger" name="op" value="Excluir">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } }else{ ?>
                    <p>Nenhum jogador neste Ranking</p>
                <?php }?>

            <!-- Modal Para Cadastro de Jogaodor -->
            <div class="modal fade" id="CriarJogador" tabindex="-1" role="dialog"
                 aria-labelledby="TituloModalLongoExemplo" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="TituloModalLongoExemplo">Cadastro de Jogador</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="POST" action="artilharia.php?idRankings=<?= $idRankings ?>">
                            <div class="modal-body">
                                <p><input type="text" class="form-control  " name="nmJogador" id="Nome" placeholder="Nome do Jogador"></p>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                <input type="hidden" name="nmRankings" value="<?= $nmRankings ?>">
                                <input type="hidden" name="idRankings" value="<?= $idRankings ?>">
                                <input type="submit" class="btn btn-primary" name="op" value="Criar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

    </center>
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