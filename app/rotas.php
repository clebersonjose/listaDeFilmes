<?php

use Cleberson\ListaDeFilmes\Controller\FormularioLogin;
use Cleberson\ListaDeFilmes\Controller\FormularioRegistroUser;
use Cleberson\ListaDeFilmes\Controller\RegistrarUser;
use Cleberson\ListaDeFilmes\Controller\RealizarLogin;
use Cleberson\ListaDeFilmes\Controller\RealizarLogout;

return [
  '/novo-user' => FormularioRegistroUser::class,
  '/registrar-user' => RegistrarUser::class,
  '/' => FormularioLogin::class,
  '/login' => FormularioLogin::class,
  '/realizar-login' => RealizarLogin::class,
  '/logout' => RealizarLogout::class
];
