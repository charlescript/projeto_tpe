show databases;
-- CREATE DATABASE projeto_tpe;
-- use projeto_tpe;

use sansal26_projeto_tpe;

create table tb_events (
	id int primary key auto_increment,
    title varchar(220) not null,
    description varchar(500),
    color varchar(45),
    start datetime,
    end datetime
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE tb_users (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    cpf VARCHAR(20) NOT NULL unique,
    email VARCHAR(50) UNIQUE NOT NULL,
    senha VARCHAR(35) NOT NULL,
    senha_crip VARCHAR(255) NOT NULL,
    nivel VARCHAR(20) NOT NULL,
    dt_cadastro DATETIME
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

alter table tb_users modify email varchar(35) unique not null;
alter table tb_users modify cpf varchar(20) unique not null;


create table tb_event_user (
	id int auto_increment primary key ,
    id_event int not null,
    id_user int not null,
    CONSTRAINT `fk_event_user` FOREIGN KEY (`id_event`) REFERENCES `tb_events` (`id`),
    CONSTRAINT `fk_user_event` FOREIGN KEY (`id_user`) REFERENCES `tb_users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE tb_turma (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    descricao VARCHAR(500)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO tb_turma ( nome, descricao ) VALUES ( "DS1 - NOITE 3º CICLO", "Turma responsável por aprender as bases dos sistemas." ),
												( "DS2 - NOITE 4º CICLO", "Turma responsável por aprender diagramas UML");

INSERT INTO tb_turma (nome, descricao) 
VALUES 
    ("DS3 - TARDE 3º CICLO", "Turma responsável por aprender programação orientada a objetos."),
    ("DS4 - MANHÃ 4º CICLO", "Turma responsável por aprender desenvolvimento web"),
    ("DS5 - NOITE 5º CICLO", "Turma responsável por aprender desenvolvimento mobile"),
    ("DS6 - TARDE 5º CICLO", "Turma responsável por aprender inteligência artificial");
    
CREATE TABLE tb_turma_users (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_turma INT NOT NULL,
    id_user INT NOT NULL,
    CONSTRAINT fk_turma_user_turma FOREIGN KEY (id_turma) REFERENCES tb_turma(id) ON DELETE CASCADE,
    CONSTRAINT fk_turma_user_user FOREIGN KEY (id_user) REFERENCES tb_users(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE tb_turma_event (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_turma INT NOT NULL,
    id_event INT NOT NULL,
    CONSTRAINT fk_turma_event_turma FOREIGN KEY (id_turma) REFERENCES tb_turma(id) ON DELETE CASCADE,
    CONSTRAINT fk_turma_event_event FOREIGN KEY (id_event) REFERENCES tb_events(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

select * from tb_users;
SET foreign_key_checks = 1; 

select * from tb_event_user;
select * from tb_events;
select * from tb_turma;
select * from tb_turma_event;
select * from tb_turma_users;
select * from tb_users;

show tables;

INSERT INTO tb_users (nome, cpf, email, senha, senha_crip, nivel, dt_cadastro) 
VALUES ('Admin', '123.456.789-10', 'admin@example.com', 'senhaadmin', MD5('senhaadmin'), 'admin', NOW());

-- Inserir usuários professores
INSERT INTO tb_users (nome, cpf, email, senha, senha_crip, nivel, dt_cadastro) 
VALUES ('Professor 1', '987.654.321-10', 'professor1@example.com', 'senhaprofessor1', MD5('senhaprofessor1') , 'professor', NOW()),
       ('Professor 2', '543.210.987-10', 'professor2@example.com', 'senhaprofessor2', MD5('senhaprofessor2') , 'professor', NOW()),
       ('Professor 3', '246.810.975-10', 'professor3@example.com', 'senhaprofessor3', MD5('senhaprofessor3') , 'professor', NOW());