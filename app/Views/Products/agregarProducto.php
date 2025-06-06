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

    <?php if (!empty(session()->getFlashdata('fail'))): ?>
      <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
    <?php endif; ?>
    <?php if (!empty(session()->getFlashdata('success'))): ?>
      <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
    <?php endif; ?>

    <?php $validation = \Config\Services::validation(); ?>

    <form action="<?= base_url('/enviar-prod'); ?>" method="post" enctype="multipart/form-data">
      <div class="card-body">

        <div class="mb-2">
          <label for="nombre_prod" class="form-label">Producto</label>
          <input class="form-control" type="text" name="nombre_prod" id="nombre_prod" value="<?= set_value('nombre_prod'); ?>" placeholder="Nombre del producto" autofocus>
          <?php if ($validation->getError("nombre_prod")): ?>
            <div class="alert alert-danger mt-2"><?= $validation->getError("nombre_prod"); ?></div>
          <?php endif; ?>
        </div>

        <div class="mb-2">
          <select class="form-control" name="categoria" id="categoria">
            <option value="0">Seleccionar Categoría</option>
            <?php foreach ($categorias as $categoria): ?>
              <option value="<?= $categoria['id']; ?>">
                <?= $categoria['id'] . ". " . $categoria['description']; ?>
              </option>
            <?php endforeach; ?>
          </select>
          <?php if ($validation->getError('categoria')): ?>
            <div class="alert alert-danger mt-2"><?= $validation->getError('categoria'); ?></div>
          <?php endif; ?>
        </div>

        <div class="mb-2">
          <label for="precio" class="form-label">Precio de Costo</label>
          <input class="form-control" type="text" name="precio" id="precio" value="<?= set_value('precio'); ?>">
          <?php if ($validation->getError('precio')): ?>
            <div class="alert alert-danger mt-2"><?= $validation->getError('precio'); ?></div>
          <?php endif; ?>
        </div>

        <div class="mb-2">
          <label for="precio_vta" class="form-label">Precio de Venta</label>
          <input class="form-control" type="text" name="precio_vta" id="precio_vta" value="<?= set_value('precio_vta'); ?>">
          <?php if ($validation->getError('precio_vta')): ?>
            <div class="alert alert-danger mt-2"><?= $validation->getError('precio_vta'); ?></div>
          <?php endif; ?>
        </div>

        <div class="mb-2">
          <label for="stock" class="form-label">Stock</label>
          <input class="form-control" type="text" name="stock" id="stock" value="<?= set_value('stock'); ?>">
          <?php if ($validation->getError('stock')): ?>
            <div class="alert alert-danger mt-2"><?= $validation->getError('stock'); ?></div>
          <?php endif; ?>
        </div>

        <div class="mb-2">
          <label for="img" class="form-label">Nombre del archivo de imagen (sin subir)</label>
          <input class="form-control" type="text" name="img" id="img" value="<?= set_value('img'); ?>">
        </div>

        <button type="submit" class="btn btn-primary w-100">Cargar Producto</button>
      </div>
    </form>
  </div>
</div>

<?= $this->endSection() ?>
