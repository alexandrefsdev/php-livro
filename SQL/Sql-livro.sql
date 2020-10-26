CREATE TABLE `livro`.`cidade` (
`id` integer primary key not null,
`nome` text,
`id_estado` integer references estado(id)
);

ALTER TABLE cidade
ADD FOREIGN KEY (id_estado) REFERENCES estado(id);

CREATE TABLE pessoa (
	id integer primary key not null,
    nome TEXT,
    endereco TEXT,
    bairro TEXT,
    telefone TEXT,
    email TEXT,
    id_cidade integer,
    CONSTRAINT FK_Pessoa_Cidade FOREIGN KEY (id_cidade)
    REFERENCES cidade(id)
);

INSERT INTO estado VALUES (1, 'AC', 'Acre');
INSERT INTO cidade VALUES (1, 'Rio Branco', '1');
INSERT INTO estado VALUES (2, 'BA', 'Salvador');
INSERT INTO cidade VALUES (2, 'Salvador', '2');


SELECT id, nome FROM cidade;