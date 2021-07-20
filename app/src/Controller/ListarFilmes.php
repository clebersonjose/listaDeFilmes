<?php

namespace Cleberson\ListaDeFilmes\Controller;

use Cleberson\ListaDeFilmes\Helper\GetFilmesTrait;
use Cleberson\ListaDeFilmes\Helper\GetViewTrait;

class ListarFilmes implements RequestHandler
{
  use GetViewTrait;
  use GetFilmesTrait;

  public function handle(array $request): void
  {
    $filmes = $this->getFilmes($_SESSION["logado"]);

    $html = $this->getView('ListarFilmes.php', [
      'titulo' => "Lista de Filmes",
      'filmes' => $filmes
    ]);

    echo $html;
  }
}
