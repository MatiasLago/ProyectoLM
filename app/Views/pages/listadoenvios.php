<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('titulo') ?>
Listado de Envíos
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container mt-5">
  <?php $session = session(); ?>

  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="fw-bold">
      <?= $session->get('perfilID') == 1 ? 'Envíos Realizados' : 'Tus Envíos' ?>
    </h2>

    <?php if ($session->get('perfilID') == 1): ?>
      <a href="<?= base_url('/listadodeventas') ?>" class="btn btn-outline-primary">
        Ver Ventas
      </a>
    <?php endif; ?>
  </div>

  <div class="table-responsive">
    <table class="table table-bordered table-hover text-center align-middle">
      <thead class="table-dark">
        <tr>
          <th>ID Orden</th>
          <th>Dirección</th>
          <th>Ciudad</th>
          <th>Provincia</th>
          <th>Código Postal</th>
          <th>Método Envío</th>
          <th>Precio Envío</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($envios as $envio): ?>
          <tr>
            <td><?= $envio['orderID'] ?></td>
            <td><?= esc($envio['direccion']) ?></td>
            <td><?= esc($envio['ciudad']) ?></td>
            <td><?= esc($envio['provincia']) ?></td>
            <td><?= esc($envio['codPostal']) ?></td>
            <td><?= esc($envio['metodoEnvio']) ?></td>
            <td>$<?= number_format($envio['precioEnvio'], 2, ',', '.') ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>


<?= $this->endSection() ?>
