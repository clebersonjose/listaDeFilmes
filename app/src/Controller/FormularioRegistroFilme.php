<?php

namespace Cleberson\ListaDeFilmes\Controller;

use Cleberson\ListaDeFilmes\Helper\GetViewTrait;

class FormularioRegistroFilme implements RequestHandler
{
  use GetViewTrait;

  public function handle(array $request): void
  {
    $html = $this->getView('FormularioFilme.php', [
      'titulo' => "Cadastrar um novo Filme",
      'acao' => 'Cadastrar filme',
      'urlAcao' => '/registrar-filme'
    ]);

    echo $html;
  }
}
