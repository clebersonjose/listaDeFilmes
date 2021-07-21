<?php

namespace Cleberson\ListaDeFilmes\Controller;

use Cleberson\ListaDeFilmes\Helper\ConectaBancoTrait;
use PDOException;

class RemoverFilmes implements RequestHandler
{
  use ConectaBancoTrait;

  public function handle(array $request): void
  {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    $this->removerFilme($id);

    header('Location: /lista-filmes');
  }

  private function removerFilme(int $id): bool
  {
    $conexao = $this->conectaBanco();

    $removerFilme = "DELETE FROM Filmes WHERE Id = :Id;";

    $prepatacao = $conexao->prepare($removerFilme);
    $prepatacao->bindParam(':Id', $id);

    try {
      return $prepatacao->execute();
    } catch (PDOException $error) {
      return false;
    }
  }
}
