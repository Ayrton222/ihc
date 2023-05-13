CREATE DATABASE ihc;

USE ihc;

CREATE TABLE usuario(
    idUsuario int(11) AUTO_INCREMENT not null,
    nome VARCHAR(200) NOT null,
    email VARCHAR(200) NOT NULL,
    senha VARCHAR(200) not null,
    motorista VARCHAR(200) not null,

    PRIMARY KEY(idUsuario)
);

CREATE TABLE carro(
    idCarro int(11) AUTO_INCREMENT NOT NULL,
    modelo VARCHAR(200) NOT NULL,
    placa VARCHAR(200) NOT NULL,

    PRIMARY KEY(idCarro)
);