<?php
$email = $_POST['email'] ?? null;
$senha = $_POST['senha'] ?? null;
$nomeArtilharia = $_GET['nomeArtilharia'] ?? null;
$e = null;

session_start();
if (isset($_SESSION['id'], $_SESSION['nome'], $_SESSION['email'])) {
    header('LOCATION: ../../index.php');
}

if (!is_null($email)) {
    try {
        require_once __DIR__ . '../../controller/Usuario.php';

        $query = new Usuario('usuarios');
        $select = $query->loginUsuario($email);

        if ((hash('md5', $senha) == $select["nm_senha"])) {
            $id = $select["id_usuario"];
            $dados_usuario = $query->selectUsuario($id);
            $dado = mysqli_fetch_assoc($dados_usuario);

            $_SESSION['id'] = $dado['id_usuario'];
            $_SESSION['nome'] = $dado['nm_usuario'];
            $_SESSION['email'] = $dado['nm_email'];

            header('LOCATION: pagina-principal.php');
        } else {
            throw new exception('Falha ao efetuar login');
        }
    } catch (Exception $e) {
        echo 'Falha ao efetuar login!';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Login</title>
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

    <!--CSS Pagina-->
    <link href="../css/login.css" rel="stylesheet">

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="../index.php">Anota Gols</a>
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
                        </form>
                        <div role="separator" class="dropdown-divider"></div>
                        <a class="dropdown-item" href="publicas.php">Artilharias Públicas</a>
                        <div role="separator" class="dropdown-divider"></div>
                        <a class="dropdown-item" href="cadastro.php">Cadastre-se</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <center>
        <h2>Login</h2>
        <div class="form-login">
            <form method="post" style="margin-top: 50px; ">
                <input type="email" name="email" placeholder="E-mail" class="form-control" style="margin-bottom: 20px;" required>
                <input type="password" name="senha" placeholder="Senha" class="form-control" style="margin-bottom: 20px;" required>
                <?php if (!is_null($e)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?= 'Falha ao efetuar login!' ?>
                    </div>
                <?php } ?>
                <button class="btn btn-primary" name="login">Entrar</button>
            </form>
        </div>
        <br>
        <p>Não possuí conta? <a href="cadastro.php">Cadastre-se</a>
            <br><a href="esqueceu-senha.php">Esqueci minha senha</a></p>
    </center>
    <center>
        <footer style="position: absolute; bottom: 0; width: 100%">
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
            <hr width="">
            Copyright &copy Equipe Null - <?php echo date("Y"); ?>
        </footer>
    </center>
</body>

</html>