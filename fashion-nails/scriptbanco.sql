CREATE DATABASE nails;

USE nails;

CREATE TABLE agendamentos(
    id INT PRIMARY KEY,              -- Chave primária
    nome VARCHAR(100),               -- Nome do tipo texto com até 100 caracteres
    data DATE,                       -- Coluna para armazenar uma data (YYYY-MM-DD)
    hora TIME,                       -- Coluna para armazenar uma hora de início (HH:MM:SS)
    horafim TIME                    -- Coluna para armazenar uma hora de fim (HH:MM:SS)             
);

-- Criação da tabela
CREATE TABLE servicos (
    id INT PRIMARY KEY,
    servicos VARCHAR(100),
    valor DECIMAL(10, 2)
);


