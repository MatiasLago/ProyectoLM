<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('titulo') ?>
Listado de Ventas
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="fondo-gestores">
  <div class="container mt-5">
  <?php $session = session(); ?>
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="fw-bold">
      <?= $session->get('perfilID') == 1 ? 'Ventas Realizadas' : 'Tus Compras' ?>
    </h2>
    <?php if ($session->get('perfilID') == 1): ?>
      <a href="<?= base_url('/listadoenvios') ?>" class="btn btn-outline-primary">
        Ver envíos
      </a>
    <?php endif; ?>
  </div>

  <div class="table-responsive">
    <table class="table table-bordered table-hover align-middle text-center">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Fecha venta</th>
          <th>Email</th>
          <th>Total</th>
          <th>Tipo Pago</th>
          <th>Tarjeta</th>
          <th>Comprobante</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($ventas as $venta): ?>
          <tr>
            <td><?= $venta['id']; ?></td>
            <td><?= $venta['fecha']; ?></td>
            <td><?= $venta['userEmail']; ?></td>
            <td>$<?= number_format($venta['total_venta'], 2, ',', '.') ?></td>
            <td><?= $venta['tipoPago_descripcion']; ?></td>
            <td><?= $venta['tarjeta']; ?></td>
            <td>
              <a href="<?= base_url('compra/comprobante/' . $venta['id']) ?>" class="btn btn-sm btn-secondary">
                <i class="fa-solid fa-file"></i> Visualizar
              </a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>


<?= $this->endSection() ?>
