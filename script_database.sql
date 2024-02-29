create database projeto_tpe;

use projeto_tpe;

CREATE TABLE `tb_usuarios` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(35) NOT NULL,
  `senha_crip` varchar(150) NOT NULL,
  `nivel` varchar(20) NOT NULL,
  `dt_cadastro` datetime
) ENGINE=InnoDB DEFAULT CHARSET=utf8;