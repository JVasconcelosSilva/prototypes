<!--<html>

    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Alterar Artilharia - Anota Gols</title>
        <link rel="icon" type="image/icon" href="img/favicon.png">
         Bootstrap core CSS 
        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

         Custom fonts for this template 
        <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

         Plugin CSS 
        <link href="../vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">

         Custom styles for this template 
        <link href="../css/freelancer.css" rel="stylesheet">
        <link href="../css/alterar-artilharia.css" rel="stylesheet">

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
                                        <form method="get" action="/view/publicas.php?nomeArtilharia=<?= $nomeArtilharia ?>" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                            <div class="input-group" id="menuPesquisa">
                                                <input type="text" name="nomeArtilharia" class="form-control bg-light border-0 small" placeholder="Procurar artilharia..." aria-label="Search" aria-describedby="basic-addon2">
                                            </div>
                                            <div role="separator" class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="view/publicas.php">Artilharias Públicas</a>
                                            <div role="separator" class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="minhas-informacoes.php">Minhas Informações</a>
                                            <a class="dropdown-item" href="pagina-principal.php">Minhas Artilharias</a>
                                            <div role="separator" class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="view/logout.php">Sair</a>
                                    </div>
                                </div>
                            </div>
        </nav>
        
    <center>
        <h2>Alterar Artilharia</h2>  
        <form method="post" style="margin-top: 50px;">
            <input class="form-control" type="text" value="" name="novoNomeArtilharia" maxlength="20" style="margin-bottom: 20px;" required>
                <button class="btn btn-primary" name="alterarArtilharia"><a style="text-decoration: none; color: black">Alterar</a></button>
        </form>
    </center>
    <center>
        <footer style=" position: absolute; bottom: 0px; width: 100%">
            <hr width="">
            Copyright &copy Anota Gols - 2019
        </footer>
    </center>
    </body>
</html>

-->
