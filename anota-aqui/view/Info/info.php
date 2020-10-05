<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="estiloinfo.css">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@500&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Login</title>
  </head>
  <body>
    
<!----------------------------------------Navbar------------------------------------------>

<div class="login3">
        <h1>Minhas Informações</h1>
    </div>

    <div class="login">
        <img src="img/user.png" class="usuario" width="100" height="100" alt="">
        <h1>Mudar Informações</h1>
        <form id="box" method="POST">
            <input type="hidden" name="email" placeholder="Insira o seu ID" required>
            <p> Novo Nome</p>
            <input type="text" name="email" placeholder="Insira o seu novo nome" required>
            <p>Confirmar Nome</p>
            <input type="text" name="email" placeholder="Confirme o seu novo nome" required>
            <input type="submit" name="login" value="Alterar">
        </form>
    </div>

    <div class="login2">
        <img src="img/user.png" class="usuario" width="100" height="100" alt="">
        <h1>Alterar Senha</h1>
        <form method="POST">
            <p>Senha Atual</p>
            <input type="password" name="senha" placeholder="Insira a sua senha atual" required>
            <p>Nova Senha</p>
            <input type="password" name="senha" placeholder="Insira a nova senha" required>
            <p>Confirme a Senha</p>
            <input type="password" name="senha" placeholder="Insira a nova senha novamente" required>
            <input type="submit" name="login" value="Alterar">
        </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>