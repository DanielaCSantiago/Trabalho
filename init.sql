USE loja_db;
CREATE TABLE IF NOT EXISTS clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    telefone VARCHAR(15),
    endereco TEXT    
);

CREATE TABLE IF NOT EXISTS produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT,
    preco DECIMAL(10,2) NOT NULL,
    estoque INT DEFAULT 0
);


INSERT INTO clientes (nome, email, telefone, endereco) VALUES
('Ana Maria', 'maria_ana@email.com', '(11) 99999-9999', 'Rua das Flores, 123'),
('Luiz da Silva', 'luizsilva@email.com', '(11) 88888-8888', 'Av. Principal, 456'),
('João Paulo', 'joaopaulo@email.com', '(11) 77777-7777', 'Rua do Comércio, 789');

INSERT INTO produtos (nome, descricao, preco, estoque) VALUES
('Produto 1', 'Descrição do Produto 1', 29.90, 100),
('Produto 2', 'Descrição do Produto 2', 45.50, 50),
('Produto 3', 'Descrição do Produto 3', 15.00, 200);