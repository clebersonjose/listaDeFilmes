<?php

namespace Cleberson\ListaDeFilmes\Controller;

use Cleberson\ListaDeFilmes\Entity\User;
use PDO;

class RegistrarUser  implements RequestHandler
{
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

  private function conectaBanco()
  {
    $conexao = new PDO(
      'mysql:dbname=' . getenv("DB_NAME") . ';host=' . getenv('DB_HOST'),
      getenv("DB_USER"),
      getenv("DB_PASSWORD")
    );

    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexao->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    return $conexao;
  }

  private function criarUser(User $user): bool
  {
    $userEmail = $user->getEmail();
    $userSenha = $user->getSenha();

    $conexao = $this->conectaBanco();

    $inserirUser = "INSERT INTO Users (Email, Senha) VALUES (:Email, :Senha);";

    $prepatacao = $conexao->prepare($inserirUser);
    $prepatacao->bindParam(':Email', $userEmail);
    $prepatacao->bindParam(':Senha', $userSenha);

    return $prepatacao->execute();
  }
}
