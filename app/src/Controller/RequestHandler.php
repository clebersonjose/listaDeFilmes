<?php

namespace Cleberson\ListaDeFilmes\Controller;

interface RequestHandler
{
  public function handle(array $request): void;
}
