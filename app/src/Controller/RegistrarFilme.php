<?php

namespace Cleberson\ListaDeFilmes\Controller;

use Cleberson\ListaDeFilmes\Entity\Filme;
use Cleberson\ListaDeFilmes\Helper\ConectaBancoTrait;
use PDOException;

class RegistrarFilme implements RequestHandler
{
  use ConectaBancoTrait;

  public function handle(array $request): void
  {
    $userId = filter_var($request['userId'], FILTER_SANITIZE_NUMBER_INT);
    $nome = filter_var($request['nome'], FILTER_SANITIZE_STRING);
    $descricao = filter_var($request['descricao'], FILTER_SANITIZE_STRING);
    $link = filter_var($request['link'], FILTER_SANITIZE_URL);

    $filme = new Filme(null, $userId, $nome, $descricao, $link);

    $novoFilme = $this->criarFilme($filme);

    if ($novoFilme) {
      header('Location: /lista-filmes');
    } else {
      header('Location: /novo-filme');
    }
  }

  private function criarFilme(Filme $filme): bool
  {
    $filmeUserId = $filme->getUserId();
    $filmeNome = $filme->getNome();
    $filmeDescricao = $filme->getDescricao();
    $filmeLink = $filme->getLink();

    $conexao = $this->conectaBanco();

    $inserirFilme = "INSERT INTO Filmes (UserId, Nome, Descricao, Link) VALUES (:UserId, :Nome, :Descricao, :Link);";

    $prepatacao = $conexao->prepare($inserirFilme);
    $prepatacao->bindParam(':UserId', $filmeUserId);
    $prepatacao->bindParam(':Nome', $filmeNome);
    $prepatacao->bindParam(':Descricao', $filmeDescricao);
    $prepatacao->bindParam(':Link', $filmeLink);

    try {
      return $prepatacao->execute();
    } catch (PDOException $error) {
      return false;
    }
  }
}
