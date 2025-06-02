<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    
    <link rel="shortcut icon" href='assets/img/faviconZ.png' />
      
    <title><?= $this->renderSection('titulo') ?> | Zenith Energia</title>

    <!-- Bootstrap CSS -->
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <!-- Estilos personalizados -->
    <link href="<?= base_url('assets/css/estilo.css') ?>" rel="stylesheet">
</head>
<body>

    <?= $this->include('partials/header') ?>

    <main class="container my-5">
        <?= $this->renderSection('content') ?>
    </main>

    <?= $this->include('partials/footer') ?>

    <!-- Bootstrap JS Bundle con Popper -->
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- Scripts personalizados -->
    <script src="<?= base_url('assets/js/main.js') ?>"></script>

</body>
</html>
