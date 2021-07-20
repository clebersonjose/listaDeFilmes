<?php require __DIR__ . '/Header.php'; ?>

<div class="d-flex">

  <form class="p-2 flex-fill col" action="/realizar-login" method="post">

    <div class="form-group mb-4">
      <label for="exampleInputEmail1">E-mail</label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Seu e-mail" name="email" required>
    </div>

    <div class="form-group mb-4">
      <label for="exampleInputPassword1">Senha</label>
      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Sua senha" name="senha" required>
    </div>

    <button type="submit" class="btn btn-success me-3">Logar</button>
    <a href="/novo-user" class="btn btn-outline-dark">Não tenho conta</a>
  </form>
</div>

<?php require __DIR__ . '/Footer.php'; ?>