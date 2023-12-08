CREATE DATABASE crud_cakephp;

USE crud_cakephp;

CREATE TABLE usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL,
    foto varchar(30) DEFAULT 'semImagem.png' NOT NULL,
    created DATETIME,
    modified DATETIME
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `brinquedo` (
  id INT AUTO_INCREMENT PRIMARY KEY,
  modelo varchar(50) DEFAULT NULL,
  marca varchar(40) DEFAULT NULL,
  faixa_etaria int(11) DEFAULT NULL,
  foto varchar(30) DEFAULT 'semImagem.png' NOT NULL,
  created DATETIME,
  modified DATETIME
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO usuario (email, senha, created, modified)
VALUES
('admin@example.com', '$2y$10$xUqczJzF3BLV57d9ztkbYuINfzQjSIDzhRAaBkmKpV29sS2almcq6', NOW(), NOW()),
('usuario@example.com', '$2y$10$hnh.JnkZQu5bWZRTm6nil.Ks.1mZYJknYpJjoAQ7pq7rayj3E1ovq', NOW(), NOW());

INSERT INTO `brinquedo` (`id`, `modelo`, `marca`, `faixa_etaria`, `created`, `modified`) VALUES
(1, 'carrinho', 'Hot Wheels', 2, NOW(), NOW());