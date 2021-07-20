<?php require __DIR__ . '/Header.php'; ?>
<div class="container">

  <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
    <?php foreach ($filmes as $filme) : ?>
      <div class="col mb-4">
        <div class="card shadow h-100">
          <div class="card-body">
            <h5 class="card-title"><?= $filme->getNome(); ?></h5>

            <?php if ($filme->getDescricao()) : ?>
              <p class="card-text"><?= $filme->getDescricao(); ?></p>
            <?php endif; ?>

            <?php if ($filme->getLink()) : ?>
              <a href="<?= $filme->getLink(); ?>" class="btn btn-success" target="_blank" rel="noopener noreferrer">Assistir filme</a>
            <?php endif; ?>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <div class="d-grid gap-2 col-6 mx-auto mb-4">
    <a href="/novo-filme" class="btn btn-success">Cadastrar um novo filme</a>
  </div>
</div>

<?php require __DIR__ . '/Footer.php'; ?>