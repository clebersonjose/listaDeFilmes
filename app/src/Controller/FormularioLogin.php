<?php

namespace Cleberson\ListaDeFilmes\Controller;

use Cleberson\ListaDeFilmes\Helper\GetViewTrait;

class FormularioLogin implements RequestHandler
{
  use GetViewTrait;

  public function handle(array $request): void
  {
    $html = $this->getView('FormularioLogin.php', [
      'titulo' => "Login"
    ]);

    echo $html;
  }
}
