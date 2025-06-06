<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('titulo') ?>
Registro de Usuario
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow">
        <div class="card-header text-center">
          <h4>Crear Cuenta</h4>
        </div>

        <?php $validation = isset($validation) ? $validation : \Config\Services::validation(); ?>
        <form method="post" action="<?= base_url('/enviar-form') ?>">
          <?= csrf_field() ?>

          <div class="card-body">
            <div class="mb-3">
              <label for="nombre">Nombre</label>
              <input type="text" name="nombre" class="form-control" value="<?= old('nombre') ?>">
              <?php if ($validation->getError('nombre')): ?>
                <div class="alert alert-danger mt-2">
                  <?= $validation->getError('nombre'); ?>
                </div>
              <?php endif; ?>
            </div>

            <div class="mb-3">
              <label for="apellido">Apellido</label>
              <input type="text" name="apellido" class="form-control" value="<?= old('apellido') ?>">
              <?php if ($validation->getError('apellido')): ?>
                <div class="alert alert-danger mt-2">
                  <?= $validation->getError('apellido'); ?>
                </div>
              <?php endif; ?>
            </div>

            <div class="mb-3">
              <label for="mail">Correo electrónico</label>
              <input type="email" name="mail" class="form-control" value="<?= old('mail') ?>" required>
              <?php if ($validation->getError('mail')): ?>
                <div class="alert alert-danger mt-2">
                  <?= $validation->getError('mail'); ?>
                </div>
              <?php endif; ?>
            </div>

            <div class="mb-3">
              <label for="usuario">Nombre de Usuario</label>
              <input type="text" name="usuario" class="form-control" value="<?= old('usuario') ?>" required>
              <?php if ($validation->getError('usuario')): ?>
                <div class="alert alert-danger mt-2">
                  <?= $validation->getError('usuario'); ?>
                </div>
              <?php endif; ?>
            </div>

            <div class="mb-3">
              <label for="password">Contraseña</label>
              <input type="password" name="password" class="form-control" required>
              <?php if ($validation->getError('password')): ?>
                <div class="alert alert-danger mt-2">
                  <?= $validation->getError('password'); ?>
                </div>
              <?php endif; ?>
            </div>

            <div class="d-grid">
              <button type="submit" class="btn btn-primary">Registrarse</button>
            </div>
          </div>
        </form>

        <div class="card-footer text-center">
          ¿Ya tienes cuenta? <a href="<?= base_url('login') ?>">Inicia sesión</a>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
