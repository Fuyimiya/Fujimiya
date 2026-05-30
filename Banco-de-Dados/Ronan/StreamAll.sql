-- Nome Completo: // Josué Rodrigues dos Santos
-- Trabalho  Sistema StreamAll

-- 1. Criação do Banco de Dados conforme instruções
DROP DATABASE IF EXISTS streamall;
CREATE DATABASE streamall;
USE streamall;

-- 2. Tabelas de Usuários e Assinaturas
CREATE TABLE usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_completo VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    cpf VARCHAR(14) NOT NULL UNIQUE,
    data_nascimento DATE NOT NULL,
    nome_exibicao VARCHAR(100) NOT NULL
);

CREATE TABLE plano (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    preco_mensal DECIMAL(10,2) NOT NULL,
    max_qualidade_audio VARCHAR(50) NOT NULL,
    max_qualidade_video VARCHAR(50) NOT NULL,
    max_telas_simultaneas INT NOT NULL
);

CREATE TABLE assinatura (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    plano_id INT NOT NULL,
    data_inicio DATE NOT NULL,
    data_fim DATE,
    status VARCHAR(20) NOT NULL,
    FOREIGN KEY (usuario_id) REFERENCES usuario(id) ON DELETE CASCADE,
    FOREIGN KEY (plano_id) REFERENCES plano(id) ON DELETE RESTRICT
);

-- 3. Catálogo e Especialização (Generalização correta conforme critério)
CREATE TABLE genero (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE conteudo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    duracao_segundos INT NOT NULL,
    data_launch DATE NOT NULL,
    tipo_conteudo ENUM('musica', 'filme', 'episodio') NOT NULL
);

-- Músicas e Artistas
CREATE TABLE artista (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_artistico VARCHAR(255) NOT NULL,
    pais_origem VARCHAR(100) NOT NULL,
    biografia TEXT
);

CREATE TABLE album (
    id INT AUTO_INCREMENT PRIMARY KEY,
    artista_id INT NOT NULL,
    titulo VARCHAR(255) NOT NULL,
    data_lancamento DATE NOT NULL,
    url_capa VARCHAR(500),
    FOREIGN KEY (artista_id) REFERENCES artista(id)
);

CREATE TABLE musica (
    conteudo_id INT PRIMARY KEY,
    album_id INT NOT NULL,
    letra TEXT,
    FOREIGN KEY (conteudo_id) REFERENCES conteudo(id) ON DELETE CASCADE,
    FOREIGN KEY (album_id) REFERENCES album(id)
);

-- Filmes e Séries
CREATE TABLE filme (
    conteudo_id INT PRIMARY KEY,
    sinopse TEXT,
    classificacao_etaria VARCHAR(20) NOT NULL,
    FOREIGN KEY (conteudo_id) REFERENCES conteudo(id) ON DELETE CASCADE
);

CREATE TABLE serie (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    sinopse TEXT,
    classificacao_etaria VARCHAR(20) NOT NULL,
    status_producao VARCHAR(50) NOT NULL
);

-- Temporadas e Episódios (Entidades Fracas)
CREATE TABLE temporada (
    id INT AUTO_INCREMENT PRIMARY KEY,
    serie_id INT NOT NULL,
    numero_ordem INT NOT NULL,
    ano_lancamento INT NOT NULL,
    FOREIGN KEY (serie_id) REFERENCES serie(id) ON DELETE CASCADE
);

CREATE TABLE episodio (
    conteudo_id INT PRIMARY KEY,
    temporada_id INT NOT NULL,
    numero_ordem INT NOT NULL,
    sinopse TEXT,
    FOREIGN KEY (conteudo_id) REFERENCES conteudo(id) ON DELETE CASCADE,
    FOREIGN KEY (temporada_id) REFERENCES temporada(id) ON DELETE CASCADE
);

-- Playlists (Conforme Regra 2.6)
CREATE TABLE playlist (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    nome VARCHAR(255) NOT NULL,
    visibilidade ENUM('publica', 'privada') DEFAULT 'privada',
    FOREIGN KEY (usuario_id) REFERENCES usuario(id) ON DELETE CASCADE
);

CREATE TABLE playlist_item (
    playlist_id INT NOT NULL,
    conteudo_id INT NOT NULL,
    ordem INT NOT NULL,
    PRIMARY KEY (playlist_id, ordem),
    FOREIGN KEY (playlist_id) REFERENCES playlist(id) ON DELETE CASCADE,
    FOREIGN KEY (conteudo_id) REFERENCES conteudo(id)
);