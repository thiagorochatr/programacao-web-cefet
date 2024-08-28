CREATE TABLE conta (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    descricao VARCHAR(100) NOT NULL,
    valor DECIMAL(10,2) NOT NULL
) ENGINE=INNODB;

INSERT INTO conta ( descricao, valor ) VALUES
( 'Pagar Internet', 99.90 ),
( 'Pagar Energia', 200.00 ),
( 'Pagar Gás', 100.00 ),
( 'Pagar Água', 60.00 );