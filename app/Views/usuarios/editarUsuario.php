<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('titulo') ?>
Editar Usuario
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="fondo-gestores">
  <div class="panel-usuario-edit-container">
    <?php 
      $session = session();
      $loggedIn = $session->get('loggedIn');
      $perfilID = $session->get('perfilID');
    ?>

    <?php if ($loggedIn == 1): ?>
      <h2 class="panel-usuario-edit-title">Editar Perfil</h2>

      <form class="panel-usuario-edit-form" action="<?= base_url('/updateUsuario') ?>" method="post">
        <input type="hidden" name="userID" value="<?= esc($user['userID']) ?>">

        <div class="panel-user-form-group">
          <label for="panel-user-nombre-label">Nombre:</label>
          <input type="text" name="nombre" id="panel-user-nombre-label" value="<?= esc($user['nombre']) ?>" required>
        </div>

        <div class="panel-user-form-group">
          <label for="panel-user-apellido-label">Apellido:</label>
          <textarea name="apellido" id="panel-user-apellido-label" rows="1" required><?= esc($user['apellido']) ?></textarea>
        </div>

        <div class="panel-user-form-group">
          <label for="panel-user-mail-label">Mail:</label>
          <input type="text" name="mail" id="panel-user-mail-label" value="<?= esc($user['mail']) ?>" required>
        </div>

        <div class="panel-user-form-group">
          <label for="panel-user-usuario-label">Usuario:</label>
          <input type="text" name="usuario" id="panel-user-usuario-label" value="<?= esc($user['usuario']) ?>" required>
        </div>

        <?php if ($perfilID == 1): ?>
          <div class="panel-user-form-group">
            <label for="panel-user-perfilID-label">PerfilID:</label>
            <select name="perfilID" id="panel-user-perfilID-label" required>
              <option value="1" <?= $user['perfilID'] == 1 ? 'selected' : '' ?>>Admin</option>
              <option value="2" <?= $user['perfilID'] == 2 ? 'selected' : '' ?>>Usuario</option>
            </select>
          </div>

          <div class="panel-user-form-group">
            <label for="panel-user-baja-label">Baja:</label>
            <select name="baja" id="panel-user-baja-label" required>
              <option value="1" <?= $user['baja'] == 1 ? 'selected' : '' ?>>De Baja</option>
              <option value="0" <?= $user['baja'] == 0 ? 'selected' : '' ?>>De Alta</option>
            </select>
          </div>

          <div class="panel-user-form-group">
            <label for="panel-user-password-label">Nueva Contraseña:</label>
            <input type="password" name="password" id="panel-user-password-label" placeholder="Dejar en blanco para no cambiar">
          </div>
        <?php endif; ?>

        <button type="submit" class="panel-submit-button">Guardar Cambios</button>
      </form>
    <?php else: ?>
      <h1>No puedes editar nada sin logearte</h1>
    <?php endif; ?>
  </div>
</div>

<?= $this->endSection() ?>
