CREATE DATABASE acme1;
USE acme1;

CREATE TABLE cliente (
	id		INT NOT NULL AUTO_INCREMENT,
	nome	VARCHAR(100) NOT NULL,
	CONSTRAINT `pk_cliente` PRIMARY KEY ( id )
) ENGINE=INNODB;

CREATE TABLE cliente_telefone (
	id			INT NOT NULL AUTO_INCREMENT,
	cliente_id	INT NOT NULL,
	numero		VARCHAR(11) NOT NULL,
	CONSTRAINT `pk_cliente_telefone` PRIMARY KEY ( id ),
	CONSTRAINT `fk_cliente_telefone__cliente_id` FOREIGN KEY ( cliente_id )
		REFERENCES cliente( id ) ON UPDATE CASCADE ON DELETE CASCADE,
	CONSTRAINT `unq_cliente_telefone__numero` UNIQUE( numero )
) ENGINE=INNODB;
