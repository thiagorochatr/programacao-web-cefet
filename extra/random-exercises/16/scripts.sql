CREATE TABLE atleta (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	codigo CHAR(3) NOT NULL UNIQUE,
	nome VARCHAR(100) NOT NULL UNIQUE,
	peso DECIMAL(4,1) DEFAULT 0,
	altura DECIMAL(3,2) DEFAULT 0
) ENGINE=INNODB;

INSERT INTO atleta (codigo, nome, peso, altura) VALUES 
('001', 'João Silva', 70.5, 1.75),
('002', 'Maria Santos', 65.2, 1.68),
('003', 'Pedro Oliveira', 80.3, 1.80),
('004', 'Ana Costa', 55.8, 1.60),
('005', 'Carlos Ferreira', 90.0, 1.85);
