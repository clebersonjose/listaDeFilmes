<?php

namespace Cleberson\ListaDeFilmes\Controller;

class RealizarLogout implements RequestHandler
{
  public function handle(array $request): void
  {
    session_destroy();
    header('Location: /login');
  }
}
