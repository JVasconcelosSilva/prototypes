<?php
session_start();
if (isset($_SESSION['id'], $_SESSION['nome'], $_SESSION['email'])) {
    header('LOCATION: ../../index.php');
}

$e = null;
$nomeArtilharia = $_GET['$nomeArtilharia'] ?? null;
$nmUsuario = $_POST['nmUsuario'] ?? null;
$nmLogin = $_POST['nmLogin'] ?? null;
$nmSenha = $_POST['nmSenha'] ?? null;
$nmSenha2 = $_POST['nmSenha2'] ?? null;
$nmEmail = $_POST['nmEmail'] ?? null;
$options = ['cost' => 12,];


if (!is_null($nmUsuario)) {
    require __DIR__ . '../../controller/Usuario.php';
    
    try{
            if(strlen($nmSenha) >= 6 && strlen($nmSenha) >= 6){
                if($nmSenha == $nmSenha2){
                if(preg_match('/^[a-zA-Z\s]+$/', $nmUsuario)){
                        $nmSenha = hash('md5', $nmSenha);
                        $query = new Usuario('usuarios');
                        $query->cadastrarUsuario($nmUsuario, $nmLogin, $nmSenha, $nmEmail);
                    }else{
                        throw new exception('Nome invalido, só é permitido letras.');
                    }
                }else{
                    throw new exception('Senhas diferentes.');
                }
                }else{
                    throw new exception('A senha precisa ter no mínimo 6 caracteres.');
                }
    header('LOCATION: login.php');
    }catch(Exception $e){}
}
?>
<html>
    <?php
    //include __DIR__ . '../../libs/css/bootstrap.php';
    ?>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro - Anota Gols</title>
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
        <link href="../css/cadastro.css" rel="stylesheet">

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
                                <div role="separator" class="dropdown-divider"></div>
                                <a class="dropdown-item" href="publicas.php">Artilharias Públicas</a>
                                <div role="separator" class="dropdown-divider"></div>
                                <a class="dropdown-item active" href="cadastro.php">Cadastre-se</a>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
        </nav>

    <center>
        <h2>Cadastro</h2> 
        <div class="form-cadastro">
            <form method="post" style="margin-top: 50px;">
                <input class="form-control" type="text" placeholder="Nome de Usuário" name="nmUsuario" style="margin-bottom: 20px;" required>
                <input class="form-control" type="text" placeholder="Login" name="nmLogin" style="margin-bottom: 20px;" required>
                <input class="form-control" type="password" placeholder="Senha" name="nmSenha" style="margin-bottom: 20px;" required>
                <input class="form-control" type="password" placeholder="Repita sua Senha" name="nmSenha2" style="margin-bottom: 20px;" required>
                <input class="form-control" type="email" placeholder="Email" name="nmEmail" style="margin-bottom: 20px;" required>
                <button class="btn btn-primary" name="login"><a style="text-decoration: none; color: black">Cadastrar</a></button>
            </form>
        </div>
        <br><p>Já possuí conta? <a href="login.php">Logar</a></p>
        <?php if(!is_null($e)) { ?>
                <?php if($e->getMessage() == "1062"){?>
                    <div class="alert alert-danger" role="alert">
                    <?='Falha ao efetuar cadastro: Email ja em uso'?>
                </div>
                <?php }else{?>
                    <div class="alert alert-danger" role="alert">
                    <?='Falha ao efetuar cadastro: ' . $e->getMessage()?>
                </div>
                <?php }?>
                <?php }?>
    </center>
    <center>
        <footer style=" bottom: 0; width: 100%">
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
            <hr width="">
            Copyright &copy Equipe Null - 2019
        </footer>
    </center>
</body>
</html>


