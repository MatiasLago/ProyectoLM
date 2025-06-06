<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('titulo') ?>
Editar Producto
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container mt-4 mb-4 d-flex justify-content-center">
  <div class="card" style="width: 75%;">
    <div class="card-header text-center">
      <h2>Editar Producto</h2>
    </div>

    <?php if (!empty(session()->getFlashdata('error'))): ?>
      <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <form action="<?= base_url('/updateProducto') ?>" method="post">
      <?= csrf_field() ?>
      <input type="hidden" name="id" value="<?= esc($product['id']) ?>">

      <div class="card-body">
        <div class="mb-3">
          <label for="nombre" class="form-label">Nombre</label>
          <input type="text" class="form-control" name="nombre" value="<?= esc($product['nombre']) ?>" required>
        </div>

        <div class="mb-3">
          <label for="descripcion" class="form-label">Descripción</label>
          <textarea name="descripcion" class="form-control" rows="2" required><?= esc($product['descripcion']) ?></textarea>
        </div>

        <div class="mb-3">
          <label for="precio" class="form-label">Precio</label>
          <input type="text" class="form-control" name="precio" value="<?= esc($product['precio']) ?>" required>
        </div>

        <div class="mb-3">
          <label for="stock" class="form-label">Stock</label>
          <input type="text" class="form-control" name="stock" value="<?= esc($product['stock']) ?>" required>
        </div>

        <div class="mb-3">
          <label for="categoriaID" class="form-label">Categoría</label>
          <select name="categoriaID" class="form-select" required>
            <option value="1" <?= $product['categoriaID'] == 1 ? 'selected' : '' ?>>Panel</option>
            <option value="2" <?= $product['categoriaID'] == 2 ? 'selected' : '' ?>>Caja</option>
            <option value="3" <?= $product['categoriaID'] == 3 ? 'selected' : '' ?>>Accesorios</option>
          </select>
        </div>

        <div class="mb-3">
          <label for="activado" class="form-label">Estado</label>
          <select name="activado" class="form-select" required>
            <option value="1" <?= $product['activado'] == 1 ? 'selected' : '' ?>>Activo</option>
            <option value="0" <?= $product['activado'] == 0 ? 'selected' : '' ?>>Inactivo</option>
          </select>
        </div>

        <div class="mb-3">
          <label for="img" class="form-label">Nombre del archivo de imagen (solo texto)</label>
          <input type="text" class="form-control" name="img" value="<?= esc(basename($product['img'])) ?>">
        </div>

        <button type="submit" class="btn btn-success w-100">Actualizar Producto</button>
      </div>
    </form>
  </div>
</div>

<?= $this->endSection() ?>
