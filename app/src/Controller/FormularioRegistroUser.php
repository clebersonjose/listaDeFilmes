<?php

namespace Cleberson\ListaDeFilmes\Controller;

use Cleberson\ListaDeFilmes\Helper\GetViewTrait;

class FormularioRegistroUser implements RequestHandler
{
  use GetViewTrait;

  public function handle(array $request): void
  {
    $html = $this->getView('FormularioUser.php', [
      'titulo' => "Registro de Usuario",
      'acao' => 'Finalizar registro',
      'urlAcao' => '/registrar-user',
      'acaoDois' => 'Já tenho conta',
      'urlAcaoDois' => '/login'
    ]);

    echo $html;
  }
}
