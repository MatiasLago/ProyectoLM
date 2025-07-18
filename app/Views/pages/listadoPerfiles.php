<?= $this->extend('layouts/plantilla') ?>
<?= $this->section('titulo') ?>
Listado de Usuarios
<?= $this->endSection() ?>

<?= $this->section('content') ?>
 <!-- Barra de búsqueda centrada tipo Cetrogar -->
<div class="container mt-4">
  <form class="d-flex justify-content-center" action="<?= base_url('/buscar') ?>" method="get" role="search" style="max-width: 700px; margin: 0 auto;">
    <div class="input-group w-100 shadow-sm">
      <input
        type="search"
        name="q"
        class="form-control border-end-0"
        placeholder="¿Qué estás buscando?"
        aria-label="Buscar"
        style="border-radius: 30px 0 0 30px; padding-left: 20px;"
      >
      <button
        class="btn btn-primary"
        type="submit"
        style="border-radius: 0 30px 30px 0;"
      >
        <i class="fas fa-search"></i>
      </button>
    </div>
  </form>
</div>
<div class="fondo-gestores">
  <div class="profile-list-container">
    <h2 class="profile-list-title">Listado de Usuarios</h2>
    <?php $session = session(); $id = $session->get('userID'); ?>

    <div class="table-wrapper">
      <table class="table table-bordered table-hover text-center align-middle">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Nombre Usuario</th>
            <th>Rol</th>
            <th>Estado</th>
            <th>Loggeado</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($users) && is_array($users)): ?>
            <?php foreach ($users as $user): ?>
              <?php if ($user['userID'] != $id): ?>
                <tr>
                  <td perfil-label="ID"><?= esc($user['userID']) ?></td>
                  <td perfil-label="Nombre"><?= esc($user['nombre']) ?></td>
                  <td perfil-label="Apellido"><?= esc($user['apellido']) ?></td>
                  <td perfil-label="Email"><?= esc($user['mail']) ?></td>
                  <td perfil-label="Nombre Usuario"><?= esc($user['usuario']) ?></td>
                  <td perfil-label="Rol"><?= $user['perfilID'] == 1 ? 'Admin' : 'User' ?></td>
                  <td perfil-label="Estado"><?= $user['baja'] == 1 ? 'DE BAJA' : 'ACTIVO' ?></td>
                  <td perfil-label="Loggeado"><?= $user['loggedIn'] == 1 ? 'LOGEADO' : 'NO ESTA LOGEADO' ?></td>
                  <td perfil-label="Acciones">
                    <a href="<?= base_url('editarUsuario/' . $user['userID']) ?>" class="btn btn-sm btn-primary me-1">Editar</a>
                   
                    <?php if ($user['baja'] == 1): ?>
                      <a href="<?= base_url('altaUsuario/' . $user['userID']) ?>" class="btn btn-sm btn-success">Dar Alta</a>
                    <?php else: ?>
                      <a href="<?= base_url('bajaUsuario/' . $user['userID']) ?>" class="btn btn-sm btn-warning">Dar Baja</a>
                    <?php endif; ?>
                  </td>
                </tr>
              <?php endif; ?>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="9" class="text-center">No hay usuarios registrados.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?= $this->endSection() ?>