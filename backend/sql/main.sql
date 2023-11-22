CREATE DATABASE PowerStar;
USE PowerStar;

CREATE TABLE Usuario ( 
    perfilid INT NOT NULL,
    Nome VARCHAR(255) NOT NULL,
    senha VARCHAR(255),
    resenha VARCHAR(255),
    email VARCHAR(255),
    CONSTRAINT perfilid PRIMARY KEY (perfilid, Nome)
);
