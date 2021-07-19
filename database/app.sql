use app;

CREATE TABLE IF NOT EXISTS Users
(
  Id INT NOT NULL AUTO_INCREMENT,
  Email VARCHAR(255) NOT NULL,
  Senha VARCHAR(255) NOT NULL,

  PRIMARY KEY (Id)
);

CREATE TABLE IF NOT EXISTS Filmes
(
  Id INT NOT NULL AUTO_INCREMENT,
  UserId INT NOT NULL,
  Nome VARCHAR(255) NOT NULL,
  Descricao VARCHAR(255),
  Link VARCHAR(255),

  PRIMARY KEY (Id),
  CONSTRAINT Filmes_Users FOREIGN KEY (UserId) REFERENCES Users(Id)
);
