IF NOT EXISTS CREATE DATABASE leitor_manga;
use leitor_manga;

CREATE TABLE usuario(
    id int PRIMARY KEY auto_increment,
    nome VARCHAR(40),
    email VARCHAR(80) unique,
    senha VARCHAR(20),
    foto VARCHAR(255),
    data_c VARCHAR(10),
    status enum('user','adm'),
    status2 enum('excluida','online','banida')
);

insert usuario values(null,'adm','adm@gm','adm', 'perfil.png','','Adm','Online');
insert usuario values(null,'joao','joao@gm','joao', 'perfil.png','','User','Online');
insert usuario values(null,'test','test@gm','test', 'perfil.png','','User','Excluida');
insert usuario values(null,'test2','test2@gm','test2', 'perfil.png','','User','Banida');

create table manga (
    id int primary key auto_increment,
    nome varchar(80),
    capa varchar(30),
    estudio varchar(40),
    categoria varchar(150),
    tipo enum('manga','manhwa','webtoom'),
    data_lancamento varchar(10),
    avaliacao float,
    capitulos float,
    discricao varchar(200),
    vizu varchar(255),
    data_add varchar(10),
    status enum('Producao','Terminado'),
    status2 enum('Online', 'Offline', 'Manutenção')
);

INSERT manga values(null, 'teste', 'null', 'estudio', 'Categoria1, Categoria2', 'manga', '2023/06/22', '10', '5', 'um teste de um site feito para ler mangas que estou fazendo puramente para minha diversão e intretenimento e estudo', '0', '2023/06/22', 'Terminado', 'Online');
INSERT manga values(null, 'teste2', 'null', 'estudio', 'Categoria1, Categoria2', 'manga', '2023/06/22', '10', '5', 'um teste de um site feito para ler mangas que estou fazendo puramente para minha diversão e intretenimento e estudo', '1', '2023/06/22', 'Terminado', 'Online');
INSERT manga values(null, 'teste3', 'null', 'estudio', 'Categoria1, Categoria2', 'manhwa', '2023/06/22', '10', '5', 'um teste de um site feito para ler mangas que estou fazendo puramente para minha diversão e intretenimento e estudo', '0', '2023/06/22', 'Terminado', 'Online');
INSERT manga values(null, 'teste4', 'null', 'estudio', 'Categoria1, Categoria2', 'manhwa', '2023/06/22', '10', '5', 'um teste de um site feito para ler mangas que estou fazendo puramente para minha diversão e intretenimento e estudo', '1', '2023/06/22', 'Terminado', 'Online');
INSERT manga values(null, 'teste5', 'null', 'estudio', 'Categoria1, Categoria2', 'webtoom', '2023/06/22', '10', '5', 'um teste de um site feito para ler mangas que estou fazendo puramente para minha diversão e intretenimento e estudo', '0', '2023/06/22', 'Terminado', 'Online');
INSERT manga values(null, 'teste6', 'null', 'estudio', 'Categoria1, Categoria2', 'webtoom', '2023/06/22', '10', '5', 'um teste de um site feito para ler mangas que estou fazendo puramente para minha diversão e intretenimento e estudo', '0', '2023/06/22', 'Terminado', 'Online');

create table capitulos (
    id int primary key auto_increment,
    id_manga int,
    capitulos float,
    pagina float,
    img varchar(30),
    data_c varchar(10),
    foreign key (id_manga) references manga (id)
);

insert capitulos values(null, 2, 1, 1, null, '2023/06/23');
insert capitulos values(null, 2, 2, 1, null, '2023/06/23');
insert capitulos values(null, 7, 1, 1, null, '2023/06/23');
insert capitulos values(null, 7, 2, 1, null, '2023/06/23');

create table comentarios (
    id int primary key auto_increment,
    id_manga int,
    id_usuario int,
    comentario varchar(250),
    data_comentario varchar(10),
    foreign key (id_manga) references manga (id),
    foreign key (id_usuario) references usuario (id)
);

create table favoritos (
    id int primary key auto_increment,
    id_manga int unique,
    id_usuario int,
    foreign key (id_manga) references manga (id),
    foreign key (id_usuario) references usuario (id)
);

create table vistos (
    id INT PRIMARY KEY auto_increment,
    id_manga int unique,
    id_usuario int,
    foreign key (id_manga) references manga (id),
    foreign key (id_usuario) references usuario (id)
);