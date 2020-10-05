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

<link rel="stylesheet" href="basqueteestilo.css" type="text/css">
<link rel="stylesheet" href="fontes/font-awesome.min.css">

<script src="https://kit.fontawesome.com/54f9cce8ca.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
<title>Basquete</title>

</head>
<body>

<!----------------------------------------Navbar------------------------------------------>

    <header class="header">  
        <nav class="navbar navbar-default fixed-top">
            <div class="container">
                <div class="navbar-header" >
                    <a href="#" class="navbar-brand" id="logo"> <img src="Imagens/Anota (1).png" alt=""></a>
                </div>
                <ul class="nav navbar-icones">
                    <div class="header-buttons text-center">
                        <a id="teste" href="../Escolher/escolher.php" class="btn btn-half">Mudar Esporte</a>
                    </div>
                    <div class="header-buttons text-center">
                        <a href="../Index/index.php" class="btn btn-half">Sair</a>
                    </div>
                </ul>
            </div>
        </nav>
    </header>


<!---------------------------------------------Atletas---+------------------------------------------------->

<section class="testimonials"> 
            <div class="conatiner">
                <div class="wrap">
                    <div class="box one">
                        <div class="date">
                        </div>
                        <h1>CRIAR <br> ARTILHARIA</h1>
                        <br>
                         <div class="text-box">
                        <div class="container">
                                <div class="center">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ExemploModalCentralizado">
                                    Entrar
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="ExemploModalCentralizado" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="TituloModalCentralizado">Criar Artilharia</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                        <form>
                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-2 col-form-label">Nome</label>
                                            <div class="col-sm-10">
                                            <input type="email" class="form-control" id="colFormLabel" placeholder="">
                                            </div>
                                        </div>
                                            <div class="form-row align-items-center">
                                            <label for="colFormLabel" class="col-sm-2 col-form-label">Privacidade</label>
                                                <div class="col-auto my-1">
                                                <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Privacidade</label>
                                                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                                    <option selected></option>
                                                    <option value="1">Privada</option>
                                                    <option value="2">Pública</option>
                                                </select>
                                                </div>
                                            </div>
                                        </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Sair</button>
                                            <button type="button" class="btn btn-primary">Criar</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                <div class="box two">
                    <div class="date">
                    </div>
                    <H1>MINHAS <br> ARTILHARIAS</H1>
                    <br>
                    <div class="container">
                            <div class="center">
                                <button class="btn1">
                                    <svg width="180px" height="60px" viewBox="0 0 180 60" class="border">
                                    <polyline points="179,1 179,59 1,59 1,1 179,1" class="bg-line" />
                                    <polyline points="179,1 179,59 1,59 1,1 179,1" class="hl-line" />
                                    </svg>
                                    <a href="#">Entrar</a>
                                </button>
                                </div>
                            </div>
                        </div>

                <div class="box three">
                    <div class="date">
                    </div>
                    <h1>MEU <br> PERFIL</h1>
                    <<div class="container">
                            <div class="center">
                                <button class="btn1">
                                    <svg width="180px" height="60px" viewBox="0 0 180 60" class="border">
                                    <polyline points="179,1 179,59 1,59 1,1 179,1" class="bg-line" />
                                    <polyline points="179,1 179,59 1,59 1,1 179,1" class="hl-line" />
                                    </svg>
                                    <a href="#">Entrar</a>
                                </button>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
    </section>
</section>
<!--------------------------------------teste------------------------------------------------------------->
