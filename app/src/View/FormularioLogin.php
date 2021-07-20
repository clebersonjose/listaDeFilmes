<?php require __DIR__ . '/Header.php'; ?>

<div class="d-flex">

  <form class="p-2 flex-fill col" action="/realizar-login" method="post">

    <div class="form-group mb-4">
      <label for="userEmail">E-mail</label>
      <input type="email" class="form-control" id="userEmail" aria-describedby="emailHelp" placeholder="Seu e-mail" name="email" required>
    </div>

    <div class="form-group mb-4">
      <label for="userPassword">Senha</label>
      <input type="password" class="form-control" id="userPassword" placeholder="Sua senha" name="senha" required>
    </div>

    <button type="submit" class="btn btn-success me-3 mb-4">Logar</button>
    <a href="/novo-user" class="btn btn-outline-dark mb-4">Não tenho conta</a>
  </form>
</div>

<?php require __DIR__ . '/Footer.php'; ?>
