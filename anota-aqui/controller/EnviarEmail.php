<?php
include_once 'connection.php';
include 'ChromePhp.php';

class EnviarEmail extends connection {    
    
    /**
     * recuperarSenha
     *
     * @param  mixed $destinatario
     * @return void
     */
    public function recuperarSenha($destinatario){

        $connection = new connection();
		$con = $connection->OpenCon();

        // Verifica se email existe no banco
        $query = "SELECT nm_email, nm_usuario FROM usuario WHERE nm_email = '$destinatario';";

        $result = $con->query($query);

        // Se a conta existir, manda email
        if ($result->num_rows > 0) {
            try{

            while($row = $result->fetch_assoc()) {
                $retorno = $row;
            }
        
        // Cria uma nova senha para a conta
        $novaSenha = substr(md5(time()), 0, 6);

        // Cria o hash da senha que vai ser armazenada no banco
        $senhaCriptografada = hash('md5', $novaSenha);
        
        // enviar essa senha para o email
        $query = "UPDATE usuario SET nm_senha = '$senhaCriptografada' WHERE nm_email = '$destinatario'";
        
        $con->query($query);
        $connection->CloseCon($con);

        $name = $retorno['nm_usuario'];
        
        $body = "<h4>Olá, $name</h4>
        <p>Sua senha foi redefinida.
        Nova senha: <b>$novaSenha</b><br>
        Entre na sua conta clicando <a href=\"localhost:8080/view/login.php\">aqui</a>. <br>
        Não esqueça de redefinir sua senha.</p> <br>";

        $assunto = "Recuperação de Senha - Anota Gols";
    
        $headers = array(
            'Authorization: Bearer '. getenv('API_KEY_EMAIL') .'',
            'Content-Type: application/json'
        );
    
        $data = array(
            "personalizations" => array(
                array(
                    "to" => array(
                        array(
                            "email" => $destinatario,
                            "name" => $name
                        )
                    )
                )
            ),
            "from" => array(
                "email" => "naoresponda@anotagols.com"
            ),
            "subject" => $assunto,
            "content" => array(
                array(
                    "type" => "text/html",
                    "value" => $body
                )
            )
        );
    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.sendgrid.com/v3/mail/send");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);
    
        echo $response;
        echo "Um email foi enviado para $destinatario, verifique a caixa de email para recuperar a senha.";
        
        }catch(Exception $e){
            ChromePhp::log($e);
        }

        } else {
            echo "Email não cadastrado.";
        }
    
    }

    // Não implementado ainda
    public function senhaAlterada(){
    
         $connection = new connection();
         $con = $connection->OpenCon();
 
         $result = $con->query($query);
         $connection->CloseCon($con);
 
         $name = $dado['nm_usuario'];
         
         $body = "<h4>Olá, $name</h4>
         <p>Sua senha foi alterada.
         Não foi você? <a href='localhost:8080/view/esqueceu-senha.php'>Recupere sua conta</a>. <br>";
 
         $assunto = "Alteração de Senha - Anota Gols";
     
         $headers = array(
            'Authorization: Bearer '. getenv('API_KEY_EMAIL') .'',
             'Content-Type: application/json'
         );
     
         $data = array(
             "personalizations" => array(
                 array(
                     "to" => array(
                         array(
                             "email" => $destinatario,
                             "name" => $name
                         )
                     )
                 )
             ),
             "from" => array(
                 "email" => "naoresponda@anotagols.com"
             ),
             "subject" => $assunto,
             "content" => array(
                 array(
                     "type" => "text/html",
                     "value" => $body
                 )
             )
         );
     
         $ch = curl_init();
         curl_setopt($ch, CURLOPT_URL, "https://api.sendgrid.com/v3/mail/send");
         curl_setopt($ch, CURLOPT_POST, 1);
         curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
         curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
         curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
         $response = curl_exec($ch);
         curl_close($ch);
    }

    // Não implementado ainda
    public function contaCriada(){
        return null;
    }
}
