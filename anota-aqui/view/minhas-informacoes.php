<?php
require __DIR__ . '../../controller/Usuario.php';
require __DIR__ . '../../controller/session.php';

$e = null;
$op = $_POST['salvar'] ?? null;
$senha = $_POST['senha'] ?? null;
//session_start();
$query = new Usuario('usuarios');

if ($op == "Salvar") {
    //Mudar dados
    if ($_POST['nome'] != null || $_POST['email'] != null) {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && preg_match('/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/', $_POST['email'])) {
        try{
        $query->updateUsuario($_SESSION['id'], $_POST['nome'], $_POST['email']);
        $_SESSION['nome'] = $_POST['nome'];
        $_SESSION['email'] = $_POST['email'];
        }catch(exception$e){}
        } else{
            throw new exception('Email invalido');
        }
    }
} else if ($op == "Trocar") {
    //Mudar Senha
    echo "entro";
    $select = $query->loginUsuario($_SESSION['email']);
    $row = mysqli_fetch_assoc($select);
    if ((hash('md5', $senha) == $select["nm_senha"])) {

        if ($_POST['novaSenha'] === $_POST['cNovaSenha']) {
            $options = [
                'cost' => 12,
            ];
            $novaSenha = password_hash($_POST['novaSenha'], PASSWORD_BCRYPT, $options);
            $query->updateSenhaUsuario($_SESSION['id'], $novaSenha);
            echo "salvo";
        } else {

            echo "senha errada";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <title>Perfil - Anota Gols</title>
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
        <link href="../css/minhas-informacoes.css" rel="stylesheet">

    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="../../index.php">Anota Gols</a>
                <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
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
                                <a class="dropdown-item active" href="minhas-informacoes.php">Minhas Informações</a>
                                <a class="dropdown-item" href="pagina-principal.php">Minhas Artilharias</a>
                                <div role="separator" class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">Sair</a>
                            </form>
                        </div>
                    </div>
                </div>
        </nav>
        <div class="container">

            <center>
                <h2 style="margin-top: 150px">Informações </h2>
                <hr class="star-light mb-5">
                <div class="row">


                    <div class="col-6">
                        <h2 style="margin-top: 15px;">Mudar Informações </h2>
                        <hr class="star-dark mb-5">
                        <form method="post" style="width: 300px; ">
                            <input type="text" name="id" value="<?= $_SESSION['id'] ?>" class="form-control" style="margin-bottom: 20px;" readonly>
                            <input type="text" name="nome" value="<?= $_SESSION['nome'] ?>" class="form-control" style="margin-bottom: 20px;">
                            <input type="text" name="email" value="<?= $_SESSION['email'] ?>" class="form-control" style="margin-bottom: 20px;">
                            <input class="btn btn-primary" type="submit" name="salvar" value="Salvar">
                            <a class="btn btn-primary" href="excluir-usuario.php?sim=SIM">Excluir</a>
                        </form>
                        <?php if(!is_null($e)) { ?>
                <?php if($e->getMessage() == "1062"){?>
                    <div class="alert alert-danger" role="alert">
                    <?='Falha ao efetuar mudança: Email ja em uso'?>
                </div>
                <?php }else{?>
                    <div class="alert alert-danger" role="alert">
                    <?='Falha ao efetuar mudança: ' . $e->getMessage()?>
                </div>
                <?php }?>
                <?php }?>
                    </div>

                    <div class="col-6">
                        <form method="post" style=" width: 300px; ">

                            <h2 style="margin-top: 15px;">Alterar Senha</h2>
                            <hr class="star-dark mb-5">
                            <input type="password" name="novaSenha" placeholder="Nova senha" class="form-control" style="margin-bottom: 20px;">
                            <input type="password" name="cNovaSenha" placeholder="Confirme sua senha" class="form-control" style="margin-bottom: 20px;">
                            <input type="password" name="senha" placeholder="Digite sua senha atual" class="form-control" style="margin-bottom: 20px;">

                            <input class="btn btn-primary" type="submit" name="salvar" value="Trocar">
                        </form>
                    </div>
                </div>
            </center>
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