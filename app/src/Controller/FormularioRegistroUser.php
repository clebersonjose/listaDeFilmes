<?php

namespace Cleberson\ListaDeFilmes\Controller;

use Cleberson\ListaDeFilmes\Helper\GetViewTrait;

class FormularioRegistroUser implements RequestHandler
{
  use GetViewTrait;

  public function handle(array $request): void
  {
    $html = $this->getView('FormularioRegistroUser.php', [
      'titulo' => "Registro de Usuario"
    ]);

    echo $html;
  }
}
