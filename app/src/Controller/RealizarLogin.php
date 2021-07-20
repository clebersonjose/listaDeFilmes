<?php

namespace Cleberson\ListaDeFilmes\Controller;

use Cleberson\ListaDeFilmes\Entity\User;
use Cleberson\ListaDeFilmes\Helper\EncontrarUserTrait;

class RealizarLogin implements RequestHandler
{
  use EncontrarUserTrait;

  public function handle(array $request): void
  {
    $email = filter_var($request['email'], FILTER_SANITIZE_EMAIL);
    $senha = filter_var($request['senha'], FILTER_SANITIZE_STRING);

    $userArray = $this->encontrarUser($email);
    if (!$userArray) {
      header('Location: /login');
      exit();
    }

    $user = $userArray[0];
    if (!$user->validaSenha($senha)) {
      header('Location: /login');
      exit();
    }

    $_SESSION['logado'] = $user->getId();

    header('Location: /lista-filmes');
  }
}
