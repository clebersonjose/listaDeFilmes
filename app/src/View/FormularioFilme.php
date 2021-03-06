<?php require __DIR__ . '/Header.php'; ?>

<div class="d-flex">

  <form class="p-2 flex-fill col" action="<?= $urlAcao; ?>" method="post">

    <div class="form-group mb-4">
      <label for="filmeNome">Nome</label>
      <input type="text" class="form-control" id="filmeNome" placeholder="Nome do filme" name="nome" value="<?= (isset($nome)) ? $nome : ''; ?>" required>
    </div>

    <div class="form-group mb-4">
      <label for="filmeDescricao">Descrição</label>
      <textarea class="form-control" id="filmeDescricao" name="descricao" rows="3" placeholder="Descrição do filme..."><?= (isset($descricao)) ? $descricao : ''; ?></textarea>
    </div>

    <div class="form-group mb-4">
      <label for="filmeLink">Link</label>
      <input type="url" class="form-control" id="filmeLink" placeholder="Link do filme na plataforma de streaming..." name="link" value="<?= (isset($link)) ? $link : ''; ?>">
    </div>

    <input type="hidden" name="userId" value="<?= $_SESSION['logado'] ?>" required>

    <button type="submit" class="btn btn-success me-3 mb-4"><?= $acao; ?></button>
    <a href="/lista-filmes" class="btn btn-outline-dark mb-4">Voltar para a lista de filmes</a>
  </form>
</div>

<?php require __DIR__ . '/Footer.php'; ?>
