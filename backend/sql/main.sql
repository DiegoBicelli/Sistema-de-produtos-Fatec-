/*DROP DATABASE IF EXISTS PowerStar;
CREATE DATABASE PowerStar;
USE PowerStar;

DROP TABLE IF EXISTS `perfil`;
CREATE TABLE `perfil` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome` (`nome`)
);

DROP TABLE IF EXISTS `permissoes`;
CREATE TABLE `permissoes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome` (`nome`)
);

DROP TABLE IF EXISTS `perfil_permissoes`;
CREATE TABLE `perfil_permissoes` (
  `perfilid` int NOT NULL,
  `permissao_id` int NOT NULL,
  PRIMARY KEY (`perfilid`,`permissao_id`),
  KEY `perfil_permissoes_ibfk_1` (`perfilid`),
  KEY `perfil_permissoes_ibfk_2` (`permissao_id`),
  CONSTRAINT `perfil_permissoes_ibfk_1` FOREIGN KEY (`perfilid`) REFERENCES `perfil` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `perfil_permissoes_ibfk_2` FOREIGN KEY (`permissao_id`) REFERENCES `permissoes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
);

DROP TABLE IF EXISTS `Usuario`;
CREATE TABLE Usuario ( 
    perfilid INT NOT NULL AUTO_INCREMENT,
    Nome VARCHAR(255) NOT NULL,
    senha VARCHAR(255),
    resenha VARCHAR(255),
    email VARCHAR(255),
    CONSTRAINT perfilid PRIMARY KEY (perfilid, Nome)
);

CREATE PROCEDURE `GetPermissoesPorPerfil`(IN perfilId INT)
BEGIN
    SELECT perm.nome 
    FROM permissoes perm
    JOIN perfil_permissoes pp ON perm.id = pp.permissao_id
    WHERE pp.perfilid = perfilId;
END ;;
*/

USE PowerStar;

CREATE TABLE produtos (
    produtoId INT NOT NULL AUTO_INCREMENT,
    Nome VARCHAR(255) NOT NULL,
    preco float,
    quantidade VARCHAR(255),
    CONSTRAINT perfilid PRIMARY KEY (produtoId, Nome)
);