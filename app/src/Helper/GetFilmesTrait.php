<?php

namespace Cleberson\ListaDeFilmes\Helper;

use Cleberson\ListaDeFilmes\Entity\Filme;

trait GetFilmesTrait
{
  use ConectaBancoTrait;

  public function getFilmes(int $userId): array
  {
    $userIdSanitize = filter_var($userId, FILTER_SANITIZE_NUMBER_INT);

    $conexao = $this->conectaBanco();
    $encontrarFilmes = "SELECT * FROM Filmes WHERE UserId = :UserId;";
    $requisicao = $conexao->prepare($encontrarFilmes);
    $requisicao->bindParam(':UserId', $userIdSanitize);
    $requisicao->execute();

    $requisicaoDataList = $requisicao->fetchAll();
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
