<?php

    $destinatario = $_POST['destinatario'] ?? null;

    if (!is_null($destinatario)) {
        require __DIR__ . '../../controller/EnviarEmail.php';
        $enviarEmail = new EnviarEmail();
        $enviarEmail->recuperarSenha($destinatario);
    }
?>

<form method="POST">
    <input value="<?php echo $destinatario;?>" type="email" placeholder="e-mail" name="destinatario" required> 
    <input type="submit" value="Enviar">
</form>
<a href='http://localhost:8080/view/login.php'>Voltar</a>