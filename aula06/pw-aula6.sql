CREATE TABLE produto (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    descricao VARCHAR(200) NOT NULL,
    estoque INT DEFAULT 0,
    preco DECIMAL(10, 2) NOT NULL
) ENGINE = INNODB;

INSERT INTO produto ( descricao, estoque, preco ) VALUES
( 'Coca-cola', 10, 5.00 ),
( 'Água',      50, 2.00 ),
( 'Guaravita', 30, 2.50 );