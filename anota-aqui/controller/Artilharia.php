<?php

include_once 'Jogador.php';

class Artilharia extends connection {

    public function __construct($nome) {
        $this->nome = $nome;
    }

    public function cadastrarArtilharia($nmArtilharia, $dtCriacao, $icPrivacidade, $ieModalidade, $idUsuario) {
        
		$connection = new connection();
		$con = $connection->OpenCon();

        // $sql = "INSERT INTO artilharia (nm_artilharia, dt_criacao, ic_privacidade, id_usuario)
        // VALUES ('$nmArtilharia', '$dtCriacao', '$icPrivacidade', '$idUsuario')";

        $sql = "INSERT INTO Ranking (nm_ranking, dt_criacao, ic_privacidade, ie_modalidade, fk_Usuario_id_usuario) 
        VALUES ('$nmArtilharia', curdate(), $icPrivacidade, $ieModalidade, $idUsuario)";
        
        // mysqli_query($con, $sql);
		// if(mysqli_errno($con)){
		// 	throw new exception(mysqli_errno($con));
        // }
        
        //throw Exception("INSERT INTO Ranking (nm_ranking, dt_criacao, ic_privacidade, ie_modalidade, fk_Usuario_id_usuario) VALUES ('$nmArtilharia', curdate(), $icPrivacidade, $ieModalidade, $idUsuario)");

        if ($con->query($sql) === FALSE){
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $connection->CloseCon($con);

        


        // $connection = new connection();
        // $con = $connection->OpenCon();

        // $query = "INSERT INTO usuario (nm_login, nm_senha, nm_email, nm_usuario) VALUES('','$nmSenha','$nmEmail','$nmUsuario');";
        
        // if ($con->query($query) === FALSE){
        //     echo "Error: " . $sql . "<br>" . $conn->error;
        // }

        // $connection->CloseCon($con);

    }

    public function getArtilhariasUsuario($idUsuario){
        
		$connection = new connection();
		$con = $connection->OpenCon();

        //$sql = "SELECT id_artilharia, nm_artilharia, dt_criacao, ic_privacidade FROM Artilharia WHERE id_usuario = '$idUsuario'";
        $sql = "SELECT id_ranking, nm_ranking, dt_criacao, ic_privacidade, ie_modalidade FROM Ranking WHERE fk_Usuario_id_usuario = '$idUsuario'";
        
        $result = mysqli_query($con, $sql);

        $connection->CloseCon($con);

        return $result;

    }

    public function excluirArtilharia($idUsuario, $idArtilharia){
        
		$connection = new connection();
		$con = $connection->OpenCon();

        $query = new Jogador("jogador");

        $jogadores = $query->getJogadoresArtilharia($idArtilharia);

        foreach ($jogadores as $jogador){
            $query->excluirJogador($jogador['id_jogador'], $idArtilharia);
        }

        $sql = "DELETE FROM artilharia WHERE id_usuario = $idUsuario AND id_artilharia = $idArtilharia";

        mysqli_query($con, $sql);

        $connection->CloseCon($con);
        
    }

    public function updateArtilharia($idArtilharia, $nmArtilharia ,$icPrivacidade){
        
		$connection = new connection();
		$con = $connection->OpenCon();

        $sql = "UPDATE artilharia SET nm_artilharia = '$nmArtilharia', ic_privacidade = '$icPrivacidade' WHERE id_artilharia = $idArtilharia";

        mysqli_query($con, $sql);

        $connection->CloseCon($con);
    }

    public function getArtilharias(){

		$connection = new connection();
		$con = $connection->OpenCon();

        //$sql = "SELECT a.id_artilharia, a.nm_artilharia, a.dt_criacao, a.ic_privacidade, u.nm_usuario FROM artilharia a, usuario u WHERE a.id_usuario = u.id_usuario AND a.ic_privacidade = '1'";
        $sql = "SELECT r.id_ranking, r.nm_ranking, r.dt_criacao, r.ic_privacidade, r.ie_modalidade, u.nm_usuario FROM Ranking r, Usuario u WHERE r.fk_Usuario_id_usuario = u.id_usuario AND r.ic_privacidade = 0";

        $result = mysqli_query($con, $sql);

        $connection->CloseCon($con);

        return $result;

    }
    
    public function getArtilhariasByName($name){

		$connection = new connection();
		$con = $connection->OpenCon();

        //$sql = "SELECT a.id_artilharia, a.nm_artilharia, a.dt_criacao, a.ic_privacidade, u.nm_usuario FROM artilharia a, usuario u WHERE a.id_usuario = u.id_usuario AND a.ic_privacidade = '1' AND a.nm_artilharia LIKE '$name%'";
        $sql = "SELECT r.id_ranking, r.nm_ranking, r.dt_criacao, r.ic_privacidade, r.ie_modalidade, u.nm_usuario FROM Ranking r, Usuario u WHERE r.fk_Usuario_id_usuario = u.id_usuario AND r.ic_privacidade = 0 AND r.nm_ranking LIKE '$name%'";
        

        $result = mysqli_query($con, $sql);

        $connection->CloseCon($con);

        return $result;

    }
    public function getDonoArtilharia($idArtilharia){
        
		$connection = new connection();
		$con = $connection->OpenCon();

        //$sql = "SELECT id_usuario FROM artilharia WHERE id_artilharia = '$idArtilharia'";

        $sql = "SELECT fk_Usuario_id_usuario FROM Ranking WHERE id_ranking = $idArtilharia";

        $result = mysqli_query($con, $sql);

        $connection->CloseCon($con);

        return $result;

    }

}
