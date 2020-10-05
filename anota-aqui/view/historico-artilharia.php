<?php
require __DIR__ . '../../controller/Artilharia.php';
session_start();
$nmArtilharia = $_GET['nmArtilharia'] ?? null;
$idArtilharia = $_GET['idArtilharia'] ?? null;
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <title>Artilharias Publicas - Anota Gols</title>
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
        <link href="../css/publicas.css" rel="stylesheet">

    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="../../index.php">Anota Gols</a>
                <?php if (!isset($_SESSION['id'], $_SESSION['nome'], $_SESSION['email'])) { ?>
                <div class="input-group mb-3">
                        <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <button type="button" onclick="window.location.href = '/view/login.php'" id="user" class="btn btn-outline-secondary">Entrar</button>
                        <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <form method="get" action="publicas.php?nomeArtilharia=<?= $nomeArtilharia ?>" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
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
                <?php } else { ?>

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
                    <?php } ?>
                </div>
            </nav>
            <br><br><br><br><br>
                <div class="container">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <h3>Historico da artilharia <?=$nmArtilharia?></h3>
                                <table class="table table-bordered table-hover">
                                    <thead class="thead-dark">
                                    <th class="nome">Nome</th>
                                    <th class="fez">Fez</th>
                                    </thead >
                                    <tbody>
                                        <?php
                                        $query = new Gol("gol");
                                        $gols = $query->getHistoricoArtilharia($idArtilharia);

                                        foreach ($gols as $gol) {
                                            ?>
                                            <tr>
                                                <td class="nome"><?= $gol['nm_usuario'] ?></td>
                                                <td class="fez"><?= $gol['desc_gol'] ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

    <center>
        <footer>

            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
            <hr width="">
            Copyright &copy AnotaGols - 2019
        </footer>
    </center>

</body>
</html>