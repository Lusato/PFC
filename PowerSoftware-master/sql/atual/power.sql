SELECT MAX(id_pergunta), conteudo_pergunta, id_user_fk FROM pergunta;
select * from user;

show columns from user;

alter table arquivo add arquivo_download varchar(200)not null;

insert into tipo_user (type, desc_user) values (1, "admin"), (2,"usuario");

create table atividade_user (
id_at int not null auto_increment primary key,
desc_at varchar(10) not null
);

insert into atividade_user (id_at, desc_at) values (1, "ativo"), (2,"inativo");

drop table arquivo;

ALTER TABLE `arquivo` ADD CONSTRAINT `fk_userid_user_fk` FOREIGN KEY ( `fk_id_user` ) REFERENCES `user` ( `id_user` ) ;

create table arquivo (
id_arquivo int not null auto_increment primary key,
arquivo_download varchar (200) not null,
id_usuario int not null,
nome_arquivo varchar (20) not null
);
show tables;

drop table arquivo;

create table denuncia (
id_denuncia int not null auto_increment primary key,
desc_denuncia varchar(20) not null
);

alter table arquivo add id_usuario int not null;

insert into resposta (id_pergunta_fk,conteudo_resposta, id_user_fk) values (1, "Clique em arquivo, depois em salvar como e selecione a extensão que deseja salvar o arquivo",1 );

select * from resposta;
show columns from arquivo;
 
show columns from resposta;

select * from user;

select nome, email, tipo_user_fk, atividade_user_fk from user;

update user set atividade_user_fk = '1' where atividade_user_fk='0';

ALTER TABLE pergunta ADD constraint `id_denuncia_fk_fk` FOREIGN KEY ( id_denuncia_fk ) REFERENCES `user` ( id_denuncia );

ALTER TABLE pergunta ADD id_denuncia_fk int not null;

show columns from pergunta;

truncate table resposta;

delete from arquivo where id_arquivo ='6';