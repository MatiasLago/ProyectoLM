<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('titulo') ?>
Catálogo
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container">
  <h1 class="mb-4">Catálogo de productos</h1>
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
            <p class="card-text"><strong>
            <?= '$' . number_format($producto['precio'], 2, ',', '.') ?>
            </strong></p>

            <?php if (session()->get('usuario')): ?>
              <?php if ($producto['stock'] > 0): ?>
                <form action="<?= base_url('/agregar-carrito') ?>" method="post" class="d-flex">
                <?= csrf_field() ?>
                <!-- id del producto -->
                <input type="hidden" name="id" value="<?= $producto['id'] ?>">
                <!-- nombre del producto -->
                <input type="hidden" name="name" value="<?= esc($producto['nombre']) ?>">
                <!-- precio del producto -->
                <input type="hidden" name="price" value="<?= $producto['precio'] ?>">
                <!-- categoría (para redirección opcional) -->
                <input type="hidden" name="categoriaID" value="<?= $producto['categoriaID'] ?>">
                <!-- cantidad (opcional, si no lo envías el controlador lo pone en 1) -->
                <input type="hidden" name="qty" value="1">

                <button class="btn btn-primary w-100" type="submit">
                  Agregar al carrito
                </button>
              </form>

              <?php else: ?>
                <button class="btn btn-secondary w-100" disabled>
                  Sin stock
                </button>
              <?php endif; ?>
            <?php else: ?>
              <a href="<?= base_url('/login') ?>" class="btn btn-outline-secondary w-100">
                Iniciar sesión para comprar
              </a>
            <?php endif; ?>

          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>


<?= $this->endSection() ?>
