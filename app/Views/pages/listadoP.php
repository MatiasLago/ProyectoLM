<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('titulo') ?>
Listado de Productos
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-end mb-3">
    <a href="<?= base_url('agregarProducto') ?>" class="btn btn-success">
        <i class="fa fa-plus"></i> Agregar Producto
    </a>
</div>

<table class="table">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Descripción</th>
      <th>Precio</th>
      <th>Imagen</th>
      <th>Stock</th>
      <th>Activo</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php if (!empty($products) && is_array($products)): ?>
      <?php foreach ($products as $product): ?>
        <?php if ($product['categoriaID'] == 1): ?>
          <tr>
            <td><?= $product['id']; ?></td>
            <td><?= $product['nombre']; ?></td>
            <td><?= $product['descripcion']; ?></td>
            <td><?= $product['precio']; ?></td>
            <td>
              <?php $img_url = base_url($product['img']); ?>
              <img src="<?= $img_url; ?>" alt="<?= $product['nombre']; ?>" width="100">
            </td>
            <td><?= $product['stock']; ?></td>
            <td><?= $product['activado']; ?></td>
            <td>
              <a href="<?= base_url('editarProducto/' . $product['id']); ?>"class="btn btn-sm btn-primary me-1">Editar</a>
              <a href="<?= base_url('eliminarProducto/' . $product['id']); ?>" class="btn btn-sm btn-danger me-1">Eliminar</a>
              <?php if ($product['activado'] == 1): ?>
                <a href="<?= base_url('bajaProducto/' . $product['id']); ?>"class="btn btn-sm btn-warning">Dar Baja</a>
              <?php else: ?>
                <a href="<?= base_url('altaProducto/' . $product['id']); ?>"class="btn btn-sm btn-success">Dar Alta</a>
              <?php endif; ?>
            </td>
          </tr>
        <?php endif; ?>
      <?php endforeach; ?>
    <?php else: ?>
      <tr>
        <td colspan="8">No hay productos disponibles.</td>
      </tr>
    <?php endif; ?>
  </tbody>

<?php if (!empty($products) && is_array($products)): ?>
      <?php foreach ($products as $product): ?>
        <?php if ($product['categoriaID'] == 2): ?>
          <tr>
            <td><?= $product['id']; ?></td>
            <td><?= $product['nombre']; ?></td>
            <td><?= $product['descripcion']; ?></td>
            <td><?= $product['precio']; ?></td>
            <td>
              <?php $img_url = base_url($product['img']); ?>
              <img src="<?= $img_url; ?>" alt="<?= $product['nombre']; ?>" width="100">
            </td>
            <td><?= $product['stock']; ?></td>
            <td><?= $product['activado']; ?></td>
            <td>
              <a href="<?= base_url('editarProducto/' . $product['id']); ?>"class="btn btn-sm btn-primary me-1">Editar</a>
              <a href="<?= base_url('eliminarProducto/' . $product['id']); ?>" class="btn btn-sm btn-danger me-1">Eliminar</a>
              <?php if ($product['activado'] == 1): ?>
                <a href="<?= base_url('bajaProducto/' . $product['id']); ?>"class="btn btn-sm btn-warning">Dar Baja</a>
              <?php else: ?>
                <a href="<?= base_url('altaProducto/' . $product['id']); ?>"class="btn btn-sm btn-success">Dar Alta</a>
              <?php endif; ?>
            </td>
          </tr>
        <?php endif; ?>
      <?php endforeach; ?>
    <?php else: ?>
      <tr>
        <td colspan="8">No hay productos disponibles.</td>
      </tr>
    <?php endif; ?>
  </tbody>

  <?php if (!empty($products) && is_array($products)): ?>
        <?php foreach ($products as $product): ?>
          <?php if ($product['categoriaID'] == 3): ?>
            <tr>
              <td><?= $product['id']; ?></td>
              <td><?= $product['nombre']; ?></td>
              <td><?= $product['descripcion']; ?></td>
              <td><?= $product['precio']; ?></td>
              <td>
                <?php $img_url = base_url($product['img']); ?>
                <img src="<?= $img_url; ?>" alt="<?= $product['nombre']; ?>" width="100">
              </td>
              <td><?= $product['stock']; ?></td>
              <td><?= $product['activado']; ?></td>
              <td>
                <a href="<?= base_url('editarProducto/' . $product['id']); ?>"class="btn btn-sm btn-primary me-1">Editar</a>
                <a href="<?= base_url('eliminarProducto/' . $product['id']); ?>" class="btn btn-sm btn-danger me-1">Eliminar</a>
                <?php if ($product['activado'] == 1): ?>
                  <a href="<?= base_url('bajaProducto/' . $product['id']); ?>"class="btn btn-sm btn-warning">Dar Baja</a>
                <?php else: ?>
                  <a href="<?= base_url('altaProducto/' . $product['id']); ?>"class="btn btn-sm btn-success">Dar Alta</a>
                <?php endif; ?>
              </td>
            </tr>
          <?php endif; ?>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="8">No hay productos disponibles.</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>

<?= $this->endSection() ?>
