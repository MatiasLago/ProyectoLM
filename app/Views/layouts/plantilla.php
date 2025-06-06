<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $this->renderSection('titulo') ?></title>
  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/estilo.css') ?>">
</head>

<body>

  <?= view('partials/header') ?>

  <main class="container mt-5">
    <?= $this->renderSection('content') ?>
  </main>

  <?= view('partials/footer') ?>

  <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>
