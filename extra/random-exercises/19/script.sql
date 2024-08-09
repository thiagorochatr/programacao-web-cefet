-- Criação da tabela Cargo
CREATE TABLE cargo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL
);

-- Criação da tabela Funcionario
CREATE TABLE funcionario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    salario DECIMAL(10, 2) NOT NULL,
    cargo_id INT NOT NULL,
    FOREIGN KEY (cargo_id) REFERENCES cargo(id)
);

-- Inserção de alguns dados de exemplo na tabela Cargo
INSERT INTO cargo (nome) VALUES
('Gerente'),
('Analista'),
('Desenvolvedor'),
('Assistente');

-- Inserção de alguns dados de exemplo na tabela Funcionario
INSERT INTO funcionario (nome, salario, cargo_id) VALUES
('João Silva', 5000.00, 1),
('Maria Santos', 3500.00, 2),
('Pedro Oliveira', 4000.00, 3),
('Ana Rodrigues', 2500.00, 4);