<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('titulo') ?>
Recuperar contraseña
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="forgot-background">
  <div class="forgot-password-container">
    <h2 class="forgot-password-title">¿Olvidaste tu contraseña?</h2>
    <p class="forgot-password-description">Ingresa tu dirección de correo electrónico e ingresa la contraseña nueva a utilizar</p>

    <form action="#" method="post" class="forgot-password-form">
      <label for="mail" class="forgot-password-label">Correo Electrónico:</label>
      <input type="mail" id="mail" name="mail" class="forgot-password-input" required>

      <label for="password">Nueva Contraseña:</label>
      <input type="password" id="password" name="password" required>

      <label for="confirm_password">Confirmar Contraseña:</label>
      <input type="password" id="confirm_password" name="confirm_password" required>

      <button type="submit" class="forgot-password-button">Cambiar contraseña</button>
    </form>

    <a href="#" class="back-to-login-link">Volver al inicio de sesión</a>
  </div>
</div>

<?= $this->endSection() ?>
