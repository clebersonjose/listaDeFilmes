<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title><?= $titulo; ?></title>
</head>

<body class="bg-light">
  <header>
    <nav class="navbar navbar-light bg-dark shadow p-3 mb-5">
      <div class="container-fluid">
        <a href="/" class="navbar-brand text-light">Lista de Filmes</a>
        <?php if (isset($_SESSION['logado'])) : ?>
          <a href="/logout" type="button" class="btn btn-light">Logout</a>
        <?php else : ?>
          <a href="/login" type="button" class="btn btn-light">Login</a>
        <?php endif; ?>
      </div>
    </nav>
  </header>

  <main class="container">
    <h1 class="text-center mb-4"><?= $titulo; ?></h1>
