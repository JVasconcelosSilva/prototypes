<?php ?>
<!DOCTYPE html>
<html>
    <?php
    include __DIR__ . '../../libs/css/bootstrap.php';
    ?>
    <head>
        <meta charset="UTF-8">
        <title>Sobre - Anota Gols</title>
        <link rel="icon" type="image/icon" href="img/favicon.png">
    </head>
    <body>
        <?php
        include __DIR__ . '../../libs/css/menu.php';
        ?>
        <link rel="stylesheet" href="../css/sobre.css">
        <main>
            <div class='container'>
                <h1>Sobre</h1>
                <hr>
                <div class="col-md-12">
                    <p>A aplicação será baseada em uma artilharia online, onde um 
                        usuário (administrador) poderá cadastrar jogadores fictícios 
                        ou não, e assim atribuir gols a eles. Podendo também excluir e
                        alterar dados desses jogadores anteriormente cadastrados. O 
                        usuário poderá optar por adicionar mais administradores (no 
                        máximo três administradores), que poderão realizar as mesmas 
                        atividades que ele.</p>
                    <p>O administrador poderá compartilhar um link, que será 
                        disponibilizado nas funções da aplicação, onde usuários que não
                        são cadastrados poderão acessar a classificação de artilheiros 
                        cadastrados por esse administrador. O administrador também 
                        poderá criar mais de um tipo de artilharia em sua conta, podendo
                        optar por deixá-la pública ou privada.
                        A artilharia criada poderá durar até o momento que o administrador desejar. 
                        E também ele poderá optar por gerar uma artilharia mensal ou não, podendo 
                        escolher essa determinada função na criação da artilharia, ou mais tarde 
                        nas configurações dessa tal artilharia.
                    </p>
                </div>
                <hr>
                <p><a type="button" href="../index.php" class="btn btn-dark btn-block">Voltar para o início</a></p>
            </div>
        </main>
        <?php
        include __DIR__ . '../../libs/css/footer.php';
        ?>
    </body>
</html>
