<?php

namespace Cleberson\ListaDeFilmes\Controller;

use Cleberson\ListaDeFilmes\Entity\User;
use Cleberson\ListaDeFilmes\Helper\ConectaBancoTrait;
use Cleberson\ListaDeFilmes\Helper\EncontrarUserTrait;
use PDOException;

class RegistrarUser  implements RequestHandler
{
  use ConectaBancoTrait;
  use EncontrarUserTrait;

  public function handle(array $request): void
  {
    $senha =  $request["senha"];
    $senhaHash = $this->gerarHash($senha);

    $emailSanitize = filter_var($request["email"], FILTER_SANITIZE_EMAIL);

    $user = new User(null, $emailSanitize, $senhaHash);

    $novoUser = $this->criarUser($user);

    if ($novoUser) {
      header('Location: /login');
    } else {
      header('Location: /novo-user');
    }
  }

  private function gerarHash(string $senha): string
  {
    $senhaSanitize = filter_var($senha, FILTER_SANITIZE_STRING);
    $senhaHash = password_hash($senhaSanitize, PASSWORD_ARGON2I);
    return $senhaHash;
  }

  private function criarUser(User $user): bool
  {
    $userEmail = $user->getEmail();
    $userSenha = $user->getSenha();

    $validandoEmail = $this->encontrarUser($userEmail);
    if ($validandoEmail) {
      return false;
    }

    $conexao = $this->conectaBanco();

    $inserirUser = "INSERT INTO Users (Email, Senha) VALUES (:Email, :Senha);";

    $prepatacao = $conexao->prepare($inserirUser);
    $prepatacao->bindParam(':Email', $userEmail);
    $prepatacao->bindParam(':Senha', $userSenha);

    try {
      return $prepatacao->execute();
    } catch (PDOException $error) {
      return false;
    }
  }
}
