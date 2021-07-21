<?php

namespace Cleberson\ListaDeFilmes\Helper;

use Cleberson\ListaDeFilmes\Entity\Filme;
use PDOException;

trait GetFilmeTrait
{
  use ConectaBancoTrait;

  public function getFilme(int $id): array
  {
    $idSanitize = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

    $conexao = $this->conectaBanco();
    $encontrarFilme = "SELECT * FROM Filmes WHERE Id = :Id;";
    $requisicao = $conexao->prepare($encontrarFilme);
    $requisicao->bindParam(':Id', $idSanitize);

    try {
      $requisicao->execute();
      $requisicaoDataList = $requisicao->fetchAll();
    } catch (PDOException $error) {
      return [];
    }

    $filmes = [];

    foreach ($requisicaoDataList as  $requisicaoData) {
      $filmes[] = new Filme(
        $requisicaoData['Id'],
        $requisicaoData['UserId'],
        $requisicaoData['Nome'],
        $requisicaoData['Descricao'],
        $requisicaoData['Link']
      );
    }

    return $filmes;
  }
}
