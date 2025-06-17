<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('titulo') ?>
Alta de Productos
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container mt-1 mb-1 d-flex justify-content-center">
  <div class="card" style="width:75%;">
    <div class="card-header text-center">
      <h2>Alta de Productos</h2>
    </div>
    <?php if (session()->getFlashdata('error')): ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('error') ?>
      </div>
    <?php endif; ?>
    <?php if (!empty($mensaje)): ?>
      <div class="alert alert-success">
        <?= $mensaje ?>
      </div>
    <?php endif; ?>

    <form action="<?= base_url('/guardarProducto') ?>" method="post" enctype="multipart/form-data">
      <div class="card-body">
        <div class="mb-3">
          <label for="nombre" class="form-label">Nombre del producto</label>
          <input class="form-control" type="text" name="nombre" id="nombre" required>
        </div>

        <div class="mb-3">
          <label for="descripcion" class="form-label">Descripción</label>
          <textarea class="form-control" name="descripcion" id="descripcion" rows="3" required></textarea>
        </div>

        <div class="mb-3">
          <label for="precio" class="form-label">Precio</label>
          <input class="form-control" type="number" name="precio" id="precio" step="0.01" required>
        </div>

        <div class="mb-3">
          <label for="stock" class="form-label">Stock</label>
          <input class="form-control" type="number" name="stock" id="stock" required>
        </div>

        <div class="mb-3">
          <label for="categoriaID" class="form-label">Categoría</label>
          <select class="form-control" name="categoriaID" id="categoriaID" required>
            <option value="">Seleccionar Categoría</option>
            <option value="1">Panel</option>
            <option value="2">Inversor</option>
            <option value="3">Regulador</option>
          </select>
        </div>

        <div class="mb-3">
          <label for="img" class="form-label">Imagen (nombre del archivo)</label>
          <input class="form-control" type="text" name="img" id="img">
        </div>

        <div class="mb-3">
          <label for="activado" class="form-label">Activado</label>
          <select class="form-control" name="activado" id="activado" required>
            <option value="1" selected>Activado</option>
            <option value="0">Desactivado</option>
          </select>
        </div>

        <button type="submit" class="btn btn-primary w-100">Agregar Producto</button>
      </div>
    </form>
  </div>
</div>

<?= $this->endSection() ?>
