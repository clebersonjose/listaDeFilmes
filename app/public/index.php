<?php
require __DIR__ . '/../vendor/autoload.php';

/**
 * Database:
 * //TODO: Criar tabela de usuarios
 * //TODO: Criar tabela de Filmes
 *
 * Aplicação:
 * //Todo: Registrar user
 * //Todo: Criar login
 * //TODO: Cadastrar filme
 * TODO: Listas filmes
 * TODO: Apagar filme
 * TODO: Ediar filme
 */

$requestData = $_POST;
$pagina = $_SERVER['REQUEST_URI'];
$rotas = require __DIR__ . '/../rotas.php';

if (!isset($rotas[$pagina])) {
  http_response_code(404);
  exit();
}

session_start();

if (
  !isset($_SESSION['logado']) &&
  $pagina !== '/novo-user' &&
  $pagina !== '/registrar-user' &&
  $pagina !== '/login' &&
  $pagina !== '/realizar-login'
) {
  header('Location: /login');
  exit();
}

$getPagina = $rotas[$pagina];
$pagina = new $getPagina();
$handle = "handle";
$pagina->$handle($requestData);
