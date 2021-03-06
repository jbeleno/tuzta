CREATE DATABASE IF NOT EXISTS tuzta DEFAULT CHARACTER SET = 'utf8' DEFAULT COLLATE 'utf8_general_ci';
USE tuzta;

CREATE TABLE questions (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    email TEXT NOT NULL,
    question TEXT NOT NULL,
    creationtTime DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);

CREATE TABLE entrepreneur (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name TEXT NOT NULL,
    company TEXT NOT NULL,
    email TEXT NOT NULL,
    thumbnail TEXT NOT NULL,
    creationtTime DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);

CREATE TABLE answers (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    idQuestion INT UNSIGNED NOT NULL,
    idEntrepreneur INT UNSIGNED NOT NULL,
    answer TEXT NOT NULL,
    creationtTime DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    FOREIGN KEY (idQuestion) REFERENCES questions(id),
    FOREIGN KEY (idEntrepreneur) REFERENCES entrepreneur(id)
);
