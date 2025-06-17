<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('titulo') ?>
Listado de Consultas
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="fondo-gestores">
  <div class="admin-panel">
    <?php 
    $session = session();
    $perfilID = $session->get('perfilID');
    ?>
    <?php if (!empty($session->get('mensajeBorrado'))): ?>
      <div class="mensaje-exito"><?= esc($session->get('mensajeBorrado')) ?></div>
    <?php elseif (!empty($session->get('errorBorrado'))): ?>
      <div class="mensaje-error"><?= esc($session->get('errorBorrado')) ?></div>
    <?php endif; ?>

    <?php if ($perfilID == 1): ?>
      <div class="category-container panel-category">
        <h2>Consultas</h2>
        <div class="table-responsive">
          <table class="table table-bordered table-striped">
            <thead class="table-dark">
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Mail</th>
                <th>Mensaje</th>
                <th>Borrar</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($consultas as $consult): ?>
                <tr>
                  <td><?= $consult['id']; ?></td>
                  <td><?= $consult['nombre']; ?></td>
                  <td><?= $consult['mail']; ?></td>
                  <td><?= $consult['mensaje']; ?></td>
                  <td>
                    <a href="<?= base_url('eliminarConsulta/' . $consult['id']); ?>" class="btn btn-danger btn-sm">
                      Eliminar
                    </a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
  <?php endif; ?>

  </div>

  <div class="pagination-container">
    <div class="hidden-pagination">
      <?= $pager->links() ?>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
