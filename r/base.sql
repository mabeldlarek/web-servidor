/*CREATE DATABASE carros;*/

CREATE OR REPLACE TABLE Veiculo (
    id_veiculo INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    placa CHAR(7),
    modelo VARCHAR(20),
    ano YEAR,
    marca VARCHAR(20),
    cor VARCHAR(20),
    quilometragem DOUBLE,
    custo_dia DOUBLE,
    id_empresa INTEGER
);

CREATE OR REPLACE TABLE Emprestimo (
    id_emprestimo INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    data_emprestimo DATE,
    data_entrega DATE,
    id_veiculo iNTEGER,
    id_usuario INTEGER,
    id_empresa_emprestimo INTEGER,
    id_empresa_entrega INTEGER
);

CREATE OR REPLACE TABLE Usuario (
    id_usuario INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome VARCHAR(50),
    data_nascimento DATE,
    senha INTEGER,
    e_mail VARCHAR(50),
    telefone VARCHAR(20),
    cpf VARCHAR(20)
);

CREATE OR REPLACE TABLE Empresa (
    id_empresa INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    cnpj CHAR(14),
    razao_social VARCHAR(500),
    endereco VARCHAR(100),
    uf CHAR(2)
);

CREATE OR REPLACE TABLE Imagem (
    id_imagem INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    descricao VARCHAR(50),
    imagem LONGBLOB,
    id_veiculo INTEGER
);

ALTER TABLE Veiculo ADD CONSTRAINT FK_Veiculo_1
    FOREIGN KEY (id_empresa)
    REFERENCES Empresa (id_empresa)
    ON DELETE CASCADE;
 
ALTER TABLE Emprestimo ADD CONSTRAINT FK_Emprestimo_2
    FOREIGN KEY (id_veiculo)
    REFERENCES Veiculo (id_veiculo)
    ON DELETE CASCADE;
 
ALTER TABLE Emprestimo ADD CONSTRAINT FK_Emprestimo_3
    FOREIGN KEY (id_usuario)
    REFERENCES Usuario (id_usuario)
    ON DELETE CASCADE;
 
ALTER TABLE Emprestimo ADD CONSTRAINT FK_Emprestimo_4
    FOREIGN KEY (id_empresa_entrega)
    REFERENCES Empresa (id_empresa)
    ON DELETE CASCADE;

ALTER TABLE Emprestimo ADD CONSTRAINT FK_Emprestimo_5
    FOREIGN KEY (id_empresa_emprestimo)
    REFERENCES Empresa (id_empresa)
    ON DELETE CASCADE;
 
ALTER TABLE Imagem ADD CONSTRAINT FK_imagem_2
    FOREIGN KEY (id_veiculo)
    REFERENCES Veiculo (id_veiculo)
    ON DELETE CASCADE;
