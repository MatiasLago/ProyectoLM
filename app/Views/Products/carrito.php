<?= $this->extend('layouts/plantilla') ?>
<?= $this->section('titulo') ?>Carrito<?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="cart-page container py-5">
  <h2 class="cart-title text-center mb-4">Tu Carrito</h2>

  <?php if (session()->getFlashdata('errorStock')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('errorStock') ?></div>
  <?php endif; ?>

  <?php if (!empty($productos)): ?>
    <div class="row">
      <!-- listado productos -->
      <?php foreach ($productos as $p): ?>
        <div class="col-12 cart-item d-flex align-items-center mb-3 p-2 bg-white shadow-sm">
          <!-- imagen -->
          <div class="item-img me-3">
            <img src="<?= base_url($p['img']) ?>" alt="<?= $p['nombre'] ?>" class="img-fluid" style="max-width: 80px;">
          </div>
          <!-- info -->
          <div class="item-info flex-grow-1">
            <h5 class="mb-1"><?= $p['nombre'] ?></h5>
            <p class="text-muted mb-0">Precio unitario: <strong>$ <?= number_format($p['precio'],2,',','.') ?></strong></p>
          </div>

          <!-- cantidad + acciones -->
          <div class="item-actions d-flex align-items-center">
            <form action="<?= base_url('carrito/update') ?>" method="post" class="me-2 d-flex align-items-center">
              <input type="hidden" name="rowid" value="<?= $p['rowid'] ?>">
              <input
                  type="number"
                  name="qty"
                  value="<?= $p['qty'] ?>"
                  min="1"
                  max="<?= $p['stock'] ?>"
                  data-stock="<?= $p['stock'] ?>"
                  data-prev="<?= $p['qty'] ?>"
                  class="form-control qty-input me-1"
                />
            </form>
            <form action="<?= base_url('carrito/remove/' . $p['rowid']) ?>" method="post">
              <?= csrf_field() ?>
              <button type="submit" class="btn btn-sm btn-outline-danger">Eliminar</button>
            </form>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- resumen / checkout -->
    <div class="cart-summary bg-white p-4 shadow-sm mt-4">
      <div class="d-flex justify-content-between align-items-center">
        <h4>Total:</h4>
        <h4 class="text-primary">$ <?= number_format($cart->total(),2,',','.') ?></h4>
      </div>
      <form action="<?= base_url('compra/confirmar') ?>" method="post" class="mt-3 text-end">
        <button type="submit" class="btn btn-lg btn-primary">Finalizar compra</button>
      </form>
    </div>

  <?php else: ?>
    <div class="alert alert-info text-center">No hay productos en el carrito.</div>
  <?php endif; ?>
</div>

  <script>
    document.querySelectorAll('.qty-input').forEach(input => {
      input.addEventListener('change', function() {
        const stock = parseInt(this.dataset.stock, 10);
        const nueva = parseInt(this.value, 10);
        const anterior = parseInt(this.dataset.prev, 10);

        if (isNaN(nueva) || nueva < 1) {
          // No permitimos valores < 1
          this.value = anterior;
          return;
        }

        //si el usuario quiere comprar mas unidades de las que hay dispoible, se emite el mensaje
        if (nueva > stock) {
          alert(`Lo siento, solo hay ${stock} unidades disponibles.`);
          this.value = anterior;
          return;
        }

        // Si pasa la validación, actualizamos el data-prev y enviamos el form
        this.dataset.prev = nueva;
        this.closest('form').submit();
      });
    });
  </script>


<?= $this->endSection() ?>
