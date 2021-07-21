<?php

namespace Cleberson\ListaDeFilmes\Controller;

use Cleberson\ListaDeFilmes\Helper\GetViewTrait;

class FormularioLogin implements RequestHandler
{
  use GetViewTrait;

  public function handle(array $request): void
  {
    $html = $this->getView('FormularioUser.php', [
      'titulo' => "Login",
      'acao' => 'Logar',
      'urlAcao' => '/realizar-login',
      'acaoDois' => 'Não tenho conta',
      'urlAcaoDois' => '/novo-user'
    ]);

    echo $html;
  }
}
