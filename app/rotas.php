<?php

use Cleberson\ListaDeFilmes\Controller\FormularioLogin;
use Cleberson\ListaDeFilmes\Controller\FormularioRegistroUser;
use Cleberson\ListaDeFilmes\Controller\RegistrarUser;
use Cleberson\ListaDeFilmes\Controller\RealizarLogin;
use Cleberson\ListaDeFilmes\Controller\RealizarLogout;
use Cleberson\ListaDeFilmes\Controller\FormularioRegistroFilme;
use Cleberson\ListaDeFilmes\Controller\RegistrarFilme;
use Cleberson\ListaDeFilmes\Controller\ListarFilmes;
use Cleberson\ListaDeFilmes\Controller\RemoverFilmes;
use Cleberson\ListaDeFilmes\Controller\FormularioEditarFilme;
use Cleberson\ListaDeFilmes\Controller\EditarFilme;

return [
  '/' => ListarFilmes::class,
  '/novo-user' => FormularioRegistroUser::class,
  '/registrar-user' => RegistrarUser::class,
  '/login' => FormularioLogin::class,
  '/realizar-login' => RealizarLogin::class,
  '/logout' => RealizarLogout::class,
  '/novo-filme' => FormularioRegistroFilme::class,
  '/registrar-filme' => RegistrarFilme::class,
  '/lista-filmes' => ListarFilmes::class,
  '/remover-filme' => RemoverFilmes::class,
  '/editar-filme' => FormularioEditarFilme::class,
  '/update-filme' => EditarFilme::class
];
