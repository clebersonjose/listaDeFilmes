<?php

namespace Cleberson\ListaDeFilmes\Entity;

class Filme
{
  private ?int $id;
  private int $userId;
  private string $nome;
  private ?string $descricao;
  private ?string $link;

  public function __construct(?int $id, int $userId, string $nome, string $descricao, string $link)
  {
    $this->id = $id;
    $this->userId = $userId;
    $this->nome = $nome;
    $this->descricao = $descricao;
    $this->link = $link;
  }

  public function getId(): ?int
  {
    return $this->id;
  }

  public function getUserId(): int
  {
    return $this->userId;
  }

  public function getNome(): string
  {
    return $this->nome;
  }

  public function getDescricao(): string
  {
    return $this->descricao;
  }

  public function getLink(): string
  {
    return $this->link;
  }
}
