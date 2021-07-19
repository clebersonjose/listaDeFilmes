<?php
require __DIR__ . '/../vendor/autoload.php';

/**
 * Database:
 * //TODO: Criar tabela de usuarios
 * //TODO: Criar tabela de Filmes
 *
 * Aplicação:
 * Todo: Registrar user
 * Todo: Criar login
 */


$requestData = $_POST;

$pagina = $_SERVER['REQUEST_URI'];
$rotas = require __DIR__ . '/../rotas.php';
$getPagina = $rotas[$pagina];

if (!$getPagina) {
  http_response_code(404);
  exit();
}

session_start();

$pagina = new $getPagina();
$handle = "handle";
$pagina->$handle($requestData);
