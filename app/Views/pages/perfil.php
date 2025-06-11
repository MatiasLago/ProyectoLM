<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('titulo') ?>
Perfil
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="fondo-gestores">
  <div class="perfil-container">
    <h1><i class="fa-regular fa-user"></i></h1>
    <div class="profile-card">
      <div class="profile-info">
        <?php 
          $session = session();
          $id = $session->get('userID');
        ?>
        <h2>Datos Personales</h2>
        <p><strong>Nombre:</strong> <?= $session->get("nombre") ?></p>
        <p><strong>Apellido:</strong> <?= $session->get("apellido") ?></p>
        <p><strong>Correo Electrónico:</strong> <?= $session->get("mail") ?></p>
        <p><strong>Nombre de usuario:</strong> <?= $session->get("usuario") ?></p>

        <a class="btn btn-outline-primary me-2" href="<?= base_url('editarUsuario/' . $id) ?>">Editar Perfil</a>
        <?php if ($session->get("perfilID") == 2): ?>
          <a class="btn btn-outline-success" href="<?= base_url('listadodeVentas/' . $id) ?>">Ver Compras</a>
        <?php endif; ?>

        </div>
      </div>

      <div class="logout-button">
        <form action="<?= base_url('/logout') ?>" method="post">    
          <button type="submit">Cerrar sesión</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
