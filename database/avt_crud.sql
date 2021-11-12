#CRIAR O BANCO DE DADOS:
create database atv_crud;

#HABILITAR O BANCO DE DADOS:
use atv_crud;

#CRIAR A TABELA DE PESSOAS NO BANCO DE DADOS:
create table tbl_pessoa(
cod_pessoa int unsigned auto_increment primary key,
nome varchar(250) not null,
sobrenome varchar(500) not null,
email varchar(500) not null,
celular varchar(20) not null
);

INSERT INTO 
tbl_pessoa (nome, sobrenome, email, celular)
VALUES
('CRISTIANO', 'CORREA DE MORAES', 'cristianocorrea3@gmail.com', '1100001111');

INSERT INTO 
tbl_pessoa (nome, sobrenome, email, celular)
VALUES
('Ana Beatriz', 'PEREIRA DE BRITO', 'anabeatrizpbrito02@gmail.com', '57855717');
