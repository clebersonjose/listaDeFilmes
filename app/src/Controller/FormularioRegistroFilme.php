<?php

namespace Cleberson\ListaDeFilmes\Controller;

use Cleberson\ListaDeFilmes\Helper\GetViewTrait;

class FormularioRegistroFilme implements RequestHandler
{
  use GetViewTrait;

  public function handle(array $request): void
  {
    $html = $this->getView('FormularioRegistroFilme.php', [
      'titulo' => "Cadastrar um novo Filme"
    ]);

    echo $html;
  }
}
