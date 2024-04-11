CREATE TABLE conta (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    cpf CHAR(11) NOT NULL,
    nome VARCHAR(100) NOT NULL,
    saldo DECIMAL(10,2) DEFAULT 0
) ENGINE=INNODB;

INSERT INTO conta ( cpf, nome, saldo ) VALUES
( '11111111111', 'Tony Stark',  100000.00 ),
( '22222222222', 'Bruce Banner',  2000.00 ),
( '33333333333', 'Bruce Wayne',  50000.00 ),
( '44444444444', 'Peter Parker',     1.00 );