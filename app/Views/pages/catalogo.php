<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('titulo') ?>
Catálogo
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container">
  <h1 class="mb-4">Catálogo de productos</h1>
  
  <div class="row">
    <?php foreach ($productos as $producto): ?>
      <div class="col-md-4 mb-4">
        <div class="card shadow-sm">
          <img src="<?= base_url('assets/img/' . $producto['img']) ?>" class="card-img-top" alt="<?= esc($producto['nombre']) ?>">
          <div class="card-body">
            <h5 class="card-title"><?= esc($producto['nombre']) ?></h5>
            <p class="card-text"><?= esc($producto['descripcion']) ?></p>
            <p class="card-text"><strong>$<?= esc($producto['precio']) ?></strong></p>

            <?php if (session()->get('usuario')): ?>
              <form action="<?= base_url('/agregar-carrito') ?>" method="post">
                <input type="hidden" name="productID" value="<?= $producto['id'] ?>">
                <button class="btn btn-primary w-100" type="submit">¡Lo quiero!</button>
              </form>
            <?php else: ?>
              <a href="<?= base_url('/login') ?>" class="btn btn-outline-secondary w-100">Iniciar sesión para comprar</a>
            <?php endif; ?>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<?= $this->endSection() ?>
