<?php

namespace Cleberson\ListaDeFilmes\Helper;

use PDO;
use PDOException;

trait ConectaBancoTrait
{
  public function conectaBanco()
  {
    $conexao = new PDO(
      'mysql:dbname=' . getenv("DB_NAME") . ';host=' . getenv('DB_HOST'),
      getenv("DB_USER"),
      getenv("DB_PASSWORD")
    );

    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexao->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    try {
      return $conexao;
    } catch (PDOException $error) {
      return $error;
    }
  }
}
