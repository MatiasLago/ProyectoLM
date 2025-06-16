<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('titulo') ?>
Catálogo
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container">
  <h1 class="mb-4">Catálogo de productos</h1>
  
  <div class="mb-4">
  <a href="<?= base_url('catalogo') ?>" class="btn btn-outline-dark">Todos</a>
  <a href="<?= base_url('catalogo/categoria/1') ?>" class="btn btn-outline-primary">Paneles</a>
  <a href="<?= base_url('catalogo/categoria/2') ?>" class="btn btn-outline-success">Inversores</a>
  <a href="<?= base_url('catalogo/categoria/3') ?>" class="btn btn-outline-warning">Reguladores</a>
</div>

  <div class="row">
    <?php foreach ($productos as $producto): ?>
      <div class="col-md-4 mb-4">
        <div class="card shadow-sm">
          <img src="<?= base_url($producto['img']) ?>" alt="<?= esc($producto['nombre']) ?>" class="img-fluid">
          <div class="card-body">
            <h5 class="card-title"><?= esc($producto['nombre']) ?></h5>
            <p class="card-text"><?= esc($producto['descripcion']) ?></p>
            <p class="card-text"><strong>$<?= esc($producto['precio']) ?></strong></p>

            <?php if (session()->get('usuario')): ?>
              <form action="<?= base_url('/agregar-carrito') ?>" method="post">
                  <input type="hidden" name="id" value="<?= $producto['id'] ?>">
                  <input type="hidden" name="name" value="<?= $producto['nombre'] ?>">
                  <input type="hidden" name="price" value="<?= $producto['precio'] ?>">
                  <input type="hidden" name="categoriaID" value="<?= $producto['categoriaID'] ?>">
                  <input type="hidden" name="qty" value="1">
                  <button class="btn btn-primary w-100" type="submit">Agregar al carrito</button>
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
