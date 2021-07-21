<?php

namespace Cleberson\ListaDeFilmes\Helper;

use Cleberson\ListaDeFilmes\Entity\User;
use PDOException;

trait EncontrarUserTrait
{
  use ConectaBancoTrait;

  public function encontrarUser(string $email): array
  {
    $conexao = $this->conectaBanco();
    $encontrarUser = "SELECT * FROM Users WHERE Email = :Email;";
    $requisicao = $conexao->prepare($encontrarUser);
    $requisicao->bindParam(':Email', $email);

    try {
      $requisicao->execute();
      $requisicaoDataList = $requisicao->fetchAll();
    } catch (PDOException $error) {
      return [];
    }

    $users = [];

    foreach ($requisicaoDataList as  $requisicaoData) {
      $users[] = new User(
        $requisicaoData['Id'],
        $requisicaoData['Email'],
        $requisicaoData['Senha']
      );
    }

    return $users;
  }
}
