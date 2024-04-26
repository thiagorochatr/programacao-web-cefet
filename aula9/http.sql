CREATE TABLE cidade (
    id   INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(60) NOT NULL UNIQUE
) ENGINE = INNODB;

CREATE TABLE contato (
    id   INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    telefone CHAR(11) NOT NULL UNIQUE,
    cidade_id INT NOT NULL,
    CONSTRAINT fk_contato__cidade_id FOREIGN KEY ( cidade_id )
    	REFERENCES cidade( id ) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE = INNODB;

INSERT INTO cidade ( nome ) VALUES ('Nova Friburgo'),('Bom Jardim'),('Duas Barras'), ('Cordeiro'), ('Cantagalo');