<?php

namespace Cleberson\ListaDeFilmes\Controller;

use Cleberson\ListaDeFilmes\Entity\Filme;
use Cleberson\ListaDeFilmes\Helper\ConectaBancoTrait;
use PDOException;

class EditarFilme implements RequestHandler
{
  use ConectaBancoTrait;

  public function handle(array $request): void
  {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $userId = filter_var($request['userId'], FILTER_SANITIZE_NUMBER_INT);
    $nome = filter_var($request['nome'], FILTER_SANITIZE_STRING);
    $descricao = filter_var($request['descricao'], FILTER_SANITIZE_STRING);
    $link = filter_var($request['link'], FILTER_SANITIZE_URL);

    $filme = new Filme($id, $userId, $nome, $descricao, $link);

    $updateFilme = $this->editarFilme($filme);

    if ($updateFilme) {
      header('Location: /lista-filmes');
    } else {
      header('Location: /editar-filme?id=' . $id);
    }
  }

  private function editarFilme(Filme $filme): bool
  {
    $filmeId = $filme->getId();
    $filmeUserId = $filme->getUserId();
    $filmeNome = $filme->getNome();
    $filmeDescricao = $filme->getDescricao();
    $filmeLink = $filme->getLink();

    $conexao = $this->conectaBanco();

    $inserirFilme = "UPDATE Filmes SET UserId = :UserId, Nome = :Nome, Descricao = :Descricao, Link = :Link WHERE Id = :Id;";

    $prepatacao = $conexao->prepare($inserirFilme);
    $prepatacao->bindParam(':UserId', $filmeUserId);
    $prepatacao->bindParam(':Nome', $filmeNome);
    $prepatacao->bindParam(':Descricao', $filmeDescricao);
    $prepatacao->bindParam(':Link', $filmeLink);
    $prepatacao->bindParam(':Id', $filmeId);

    try {
      return $prepatacao->execute();
    } catch (PDOException $error) {
      return false;
    }
  }
}
