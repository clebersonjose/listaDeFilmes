<?php

namespace Cleberson\ListaDeFilmes\Entity;

class User
{
  private ?int $id;
  private string $email;
  private string $senha;

  public function __construct(?int $id, string $email, string $senha)
  {
    $this->id = $id;
    $this->email = $email;
    $this->senha = $senha;
  }

  public function getId(): ?int
  {
    return $this->id;
  }

  public function getEmail(): string
  {
    return $this->email;
  }

  public function getSenha(): string
  {
    return $this->senha;
  }

  public function validaSenha(string $senha): bool
  {
    return password_verify($senha, $this->senha);
  }
}
