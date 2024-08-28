CREATE TABLE IF NOT EXISTS categoria  (
    id          INT         NOT NULL AUTO_INCREMENT PRIMARY KEY,
    descricao   VARCHAR(60) NOT NULL
) ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS equipamento  (
    id              INT             NOT NULL AUTO_INCREMENT PRIMARY KEY,
    codigo          CHAR(6)         NOT NULL,
    descricao       VARCHAR(100)    NOT NULL,
    situacao        CHAR(1)         DEFAULT 'E',
    cadastro        DATETIME,
    categoria_id    INT             NOT NULL,
    CONSTRAINT fk_equipamento__categoria_id
        FOREIGN KEY ( categoria_id ) REFERENCES categoria( id )
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=INNODB;

-- DADOS

INSERT INTO categoria ( descricao ) VALUES
( 'Elétrica' ),
( 'Marcenaria' ),
( 'Hidráulica' );

INSERT INTO equipamento
( codigo, descricao, situacao, cadastro, categoria_id )
VALUES
( '123456', 'Amperímetro', 'U', NOW(), 1 ),
( '111111', 'Metro', 'U', NOW(), 2 ),
( '222222', 'Lixa', 'E', NOW(), 2 ),
( '333333', 'Aplicador de Cola de PVC', 'D', NOW(), 3 );