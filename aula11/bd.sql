CREATE TABLE conta (
    id CHAR(10) NOT NULL PRIMARY KEY,
    descricao VARCHAR(100) NOT NULL,
    tipo CHAR(1) NOT NULL, -- C=Crédito, D=Débito
    valor DECIMAL(10,2) DEFAULT 0,
    vencimento DATE NOT NULL,
    paga TINYINT(1) DEFAULT 0 -- 0=Não paga, 1=paga    
) ENGINE = INNODB;

INSERT INTO conta ( id, descricao, valor, tipo, vencimento, paga )
VALUES
( '0000000001', 'Comprar cerveja',           50.00, 'P', '2024-07-04', 0 ),
( '0000000002', 'Receber aposta do João',   100.00, 'R', '2024-07-05', 0 ),
( '0000000003', 'Apostar no jogo do bicho',  10.00, 'P', '2024-07-06', 0 ),
( '0000000004', 'Comprar leite',              6.00, 'P', '2024-07-04', 1 );