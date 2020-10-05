<?php
include_once 'connection.php';

class Jogador extends connection {

    public function __construct($nome) {
        $this->nome = $nome;
    }

    public function cadastrarJogador($nmJogador, $idArtilharia) {
        
		$connection = new connection();
		$con = $connection->OpenCon();

        $sql = "INSERT INTO Jogador (nm_jogador, qt_ponto, fk_Ranking_id_ranking)
        VALUES ('$nmJogador', 0 ,'$idArtilharia')";
        
        mysqli_query($con, $sql);
		if(mysqli_errno($con)){
			throw new exception(mysqli_errno($con));
        }

        $connection->CloseCon($con);
    }

    public function getJogadoresArtilharia($idArtilharia){
        
		$connection = new connection();
		$con = $connection->OpenCon();
        
        $sql = "SELECT id_jogador, qt_ponto, nm_jogador FROM Jogador WHERE fk_Ranking_id_ranking = $idArtilharia ORDER BY qt_ponto DESC;";
        
        $result = mysqli_query($this->OpenCon(), $sql);

        $connection->CloseCon($con);

        return $result;

    }

    public function excluirJogador($idJogador, $idArtilharia){
        
		$connection = new connection();
		$con = $connection->OpenCon();

        $sql = "DELETE FROM Jogador WHERE id_jogador = $idJogador";

        mysqli_query($this->OpenCon(), $sql);

        $connection->CloseCon($con);
        
    }

    public function adicionarGol($idJogador, $idArtilharia, $qtGolAtual, $idUsuario){
        
		$connection = new connection();
		$con = $connection->OpenCon();
        
        $sql = "UPDATE Jogador SET qt_ponto = qt_ponto + 1 WHERE id_jogador = $idJogador";

        mysqli_query($this->OpenCon(), $sql);

        $connection->CloseCon($con);
    }

    public function tirarGol($idJogador, $idArtilharia, $qtGolAtual, $idUsuario){
        
		$connection = new connection();
		$con = $connection->OpenCon();
        
        $sql = "UPDATE Jogador SET qt_ponto = qt_ponto - 1 WHERE id_jogador = $idJogador";

        mysqli_query($this->OpenCon(), $sql);

        $connection->CloseCon($con);
    }

    public function updateJogador($idJogador, $nmJogador , $qtPontoNovo, $qtGolAtual, $idArtilharia, $idUsuario){
        
		$connection = new connection();
		$con = $connection->OpenCon();

        $sql = "UPDATE Jogador SET nm_jogador = '$nmJogador', qt_ponto = '$qtPontoNovo' WHERE id_jogador = $idJogador";

        mysqli_query($this->OpenCon(), $sql);

        $connection->CloseCon($con);
    }

    public function getJogadoresNome($idArtilharia, $nmJogador){
        
		$connection = new connection();
		$con = $connection->OpenCon();

        $sql = "SELECT id_jogador, qt_ponto, nm_jogador FROM Jogador WHERE fk_Ranking_id_ranking = $idArtilharia AND nm_jogador like('%$nmJogador%') ORDER BY qt_ponto DESC";
        
        $result = mysqli_query($this->OpenCon(), $sql);

        $connection->CloseCon($con);

        return $result;

    }

}
