<?php

namespace Cleberson\ListaDeFilmes\Controller;

use Cleberson\ListaDeFilmes\Helper\GetFilmeTrait;
use Cleberson\ListaDeFilmes\Helper\GetViewTrait;

class FormularioEditarFilme implements RequestHandler
{
  use GetViewTrait;
  use GetFilmeTrait;

  public function handle(array $request): void
  {
    $filme = $this->getFilme($_GET['id']);

    $html = $this->getView('FormularioFilme.php', [
      'titulo' => "Editar Filme",
      'acao' => 'Editar filme',
      'urlAcao' => '/update-filme?id=' . $filme[0]->getId(),
      'nome' => $filme[0]->getNome(),
      'descricao' => $filme[0]->getDescricao(),
      'link' => $filme[0]->getLink()
    ]);

    echo $html;
  }
}
