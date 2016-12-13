create table user(
id_user int not null auto_increment,
nome varchar(60) not null,
email varchar(60) not null,
senha varchar(60) not null,
tipo_user_fk int (3) not null,
primary key(id_user),
CONSTRAINT `fk_tipo_user_fk` FOREIGN KEY ( `tipo_user_fk` ) REFERENCES `tipo_user` ( `type` ));

create table tipo_user(
type int(3) not null primary key);

create table pergunta(
id_pergunta int not null auto_increment primary key,
conteudo_pergunta varchar(200) not null,
id_user_kf int not null,
id_resposta_fk int not null,
CONSTRAINT `fk_id_user_kf` FOREIGN KEY ( `id_user_kf` ) REFERENCES `user` ( `id_user` ));

create table arquivo(
id_arquivo int not null auto_increment primary key,
arquivo_download longblob NOT NULL,
fk_id_user int not null,
CONSTRAINT `fk_fk_id_user` FOREIGN KEY ( `fk_id_user` ) REFERENCES `user` ( `id_user` ));


create table post(
id_post int not null auto_increment primary key,
nome_post varchar(20) not null,
conteudo_post varchar(3000) not null,
id_user_for int not null,
imagem_post blob NOT NULL,
CONSTRAINT `fk_id_user_for` FOREIGN KEY ( `id_user_for` ) REFERENCES `user` ( `id_user` ));

create table resposta(
id_resposta int not null auto_increment primary key,
conteudo_resposta varchar(600) not null,
id_user_fk int not null,
id_pergunta_fk int not null,
CONSTRAINT `fk_id_user_fk` FOREIGN KEY ( `id_user_fk` ) REFERENCES `user` ( `id_user` ),
CONSTRAINT `fk_id_pergunta_fk` FOREIGN KEY ( `id_pergunta_fk` ) REFERENCES `pergunta` ( `id_pergunta` ));






conteudo_download longblob NOT NULL;