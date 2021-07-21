<?php

namespace Cleberson\ListaDeFilmes\Helper;

trait GetViewTrait
{
  public function getView(string $view, array $dados): string
  {
    extract($dados);

    ob_start();
    require __DIR__ . '/../View/' . $view;
    $html = ob_get_clean();

    return $html;
  }
}
