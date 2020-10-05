-- Resultado protótipo
-- Utilizar essa view para buscar o ranking com a classificação
select row_number() over (order by qt_ponto desc), nm_jogador, qt_ponto, fk_Ranking_id_ranking from Jogador where fk_Ranking_id_ranking = 2;

create database db_prototipo_ranking;
use db_prototipo_ranking;

CREATE TABLE Usuario (
    id_usuario INTEGER PRIMARY KEY auto_increment,
    nm_usuario VARCHAR(80),
    nm_login VARCHAR(20),
    nm_senha VARCHAR(20),
    nm_email VARCHAR(50),
    nm_caminho_foto VARCHAR(200)
);

CREATE TABLE Ranking (
    id_ranking INTEGER PRIMARY KEY auto_increment,
    nm_ranking VARCHAR(20),
    dt_criacao DATE,
    ic_privacidade BOOL,
    ie_modalidade TINYINT,
    fk_Usuario_id_usuario INTEGER
);


CREATE TABLE Jogador (
    id_jogador INTEGER PRIMARY KEY auto_increment,
    nm_jogador VARCHAR(40),
    qt_ponto INTEGER,
    fk_Ranking_id_ranking INTEGER
);

ALTER TABLE Ranking ADD CONSTRAINT FK_Ranking_Usuario
    FOREIGN KEY (fk_Usuario_id_usuario)
    REFERENCES Usuario (id_usuario)
    ON DELETE CASCADE;

ALTER TABLE Jogador ADD CONSTRAINT FK_Jogador_Ranking
    FOREIGN KEY (fk_Ranking_id_ranking)
    REFERENCES Ranking (id_ranking)
    ON DELETE CASCADE;


select * from Ranking;
select * from Usuario;
select * from Jogador;

insert into Usuario(nm_usuario, nm_login, nm_senha, nm_email)values('dbUser6','dbLogin6','dbSenha6','dbEmail6');

insert into Ranking(nm_ranking, dt_criacao, ic_privacidade, ie_modalidade)values('dbRanking2',sysdate(),4,4);

insert into Jogador(nm_jogador, qt_ponto, fk_Ranking_id_ranking)values('dbUser4', 15, 2);
insert into Jogador(nm_jogador, qt_ponto, fk_Ranking_id_ranking)values('dbUser5', 12, 2);
insert into Jogador(nm_jogador, qt_ponto, fk_Ranking_id_ranking)values('dbUser6', 17, 2);

delete from Jogador where id_jogador in (4,5,6);

select * from Jogador;

create or replace view vw_ranking as;

-- Utilizar essa view para buscar o ranking com a classificação
select row_number() over (order by qt_ponto desc), nm_jogador, qt_ponto, fk_Ranking_id_ranking from Jogador where fk_Ranking_id_ranking = 2;

select * from vw_ranking where fk_Ranking_id_ranking = 1; 
