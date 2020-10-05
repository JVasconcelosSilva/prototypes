
<?php

//include_once '../Navbar/navbar.php';

require __DIR__ . '../../../controller/session.php';
require __DIR__ . '../../../controller/Artilharia.php';
require __DIR__ . '../../../controller/Usuario.php';

$numRankings = 0;
$query = new Artilharia('artilharia');
$registros = $query->getArtilhariasUsuario($_SESSION['id']);
$queryUsuario = new Usuario('usuario');
$infoUsuario = $queryUsuario->selectUsuario($_SESSION['id']);

$op = $_POST['op'] ?? null;

if ($op == "Excluir")
{
    $query->excluirArtilharia($_SESSION['id'], $_POST['idRankings']);

    header('LOCATION: perfil.php');
}


if ($op == "Criar")
{
    $dtCriacao = date_default_timezone_get();
    $query->cadastrarArtilharia($_POST['nmRankings'], $dtCriacao, $_POST['icPrivacidade'], $_POST['ieModalidade'], $_SESSION['id']);
    header('LOCATION: perfil.php');
}

if ($op == "Alterar")
{
    $query->updateArtilharia($_POST['idRankings'], $_POST['nmRankings'], $_POST['icPrivacidade']);
    header('LOCATION: perfil.php');
}
?>

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

<!--<link rel="stylesheet" href="perfilestilo.css" type="text/css">-->
<link rel="stylesheet" href="fontes/font-awesome.min.css">

<script src="https://kit.fontawesome.com/54f9cce8ca.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
<title>Perfil</title>

</head>
<body>
<h1>Test</h1>
<?=var_dump($infoUsuario)?>
<?php foreach($infoUsuario as $usuario){?>
    <h4>Nome: <?=$usuario['nm_usuario']?></h4>
    <h4>Email: <?=$usuario['nm_email']?></h4>
<p>Foto: <img src="../../controller/uploads/<?=$usuario['nm_caminho_foto']?>" alt=""></p>
<?php }?>

<form action="../../controller/Upload.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>

</body>
