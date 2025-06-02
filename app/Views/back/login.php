
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">

    <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
        <h4 class="mb-4 text-center">Iniciar Sesión</h4>

        <?php if(session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('login/verificar') ?>" method="post">
            <?= csrf_field() ?>

            <div class="mb-3">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" name="email" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="password" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Ingresar</button>
        </form>

        <div class="mt-3 d-flex justify-content-between">
            <a href="javascript:history.back()" class="btn btn-outline-secondary">
             <i class="bi bi-arrow-left"></i> Volver
            </a>
            <a href="<?= base_url('registrarse') ?>" class="btn btn-outline-primary">
            <i class="bi bi-person-plus"></i> Registrarse
            </a>
        </div>

    </div>

</body>
</html>
