<?php

use Cleberson\ListaDeFilmes\Controller\FormularioLogin;
use Cleberson\ListaDeFilmes\Controller\FormularioRegistroUser;
use Cleberson\ListaDeFilmes\Controller\RegistrarUser;
use Cleberson\ListaDeFilmes\Controller\RealizarLogin;
use Cleberson\ListaDeFilmes\Controller\RealizarLogout;
use Cleberson\ListaDeFilmes\Controller\FormularioRegistroFilme;
use Cleberson\ListaDeFilmes\Controller\RegistrarFilme;

return [
  '/' => FormularioLogin::class,
  '/novo-user' => FormularioRegistroUser::class,
  '/registrar-user' => RegistrarUser::class,
  '/login' => FormularioLogin::class,
  '/realizar-login' => RealizarLogin::class,
  '/logout' => RealizarLogout::class,
  '/novo-filme' => FormularioRegistroFilme::class,
  '/registrar-filme' => RegistrarFilme::class
];
