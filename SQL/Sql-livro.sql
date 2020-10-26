CREATE TABLE livro.dbo.estado (
	id int primary key NOT NULL,
	sigla char(2),
	nome text
)

CREATE TABLE livro.dbo.cidade (
	id int PRIMARY KEY NOT NULL,
	nome text,
	id_estado int,
	CONSTRAINT Fk_Cidade_Estado FOREIGN KEY (id_estado)
	REFERENCES estado(id)
)

CREATE TABLE livro.dbo.pessoa (
	id int PRIMARY KEY NOT NULL,
	nome varchar(100),
	endereco varchar(200),
	bairro varchar(100),
	telefone varchar(30),
	email varchar(100),
	id_cidade int,
	CONSTRAINT FK_Pessoa_Cidade FOREIGN KEY (id_cidade)
	REFERENCES cidade(id)
);

INSERT INTO livro.dbo.estado VALUES (1, 'AC', 'Acre');
INSERT INTO livro.dbo.estado VALUES (2, 'BA', 'Bahia');
INSERT INTO livro.dbo.cidade VALUES (1, 'Rio Branco', '1');
INSERT INTO livro.dbo.cidade VALUES (2, 'Salvador', '2');

SELECT id, nome FROM livro.dbo.cidade;