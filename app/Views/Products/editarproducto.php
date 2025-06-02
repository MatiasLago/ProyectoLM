<div class='fondo-gestores'>
    <div class="panel-product-edit-container">
        <h2 class="panel-product-edit-title">Editar Producto</h2>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
        <form class="panel-product-edit-form" action="<?= base_url('/updateProducto') ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= esc($product['id']); ?>"> <!-- Aquí va el ID del producto a editar -->
            
            <div class="panel-product-form-group">
                <label for="panel-product-nombre-label">Nombre:</label>
                <input type="text" name="nombre" id="panel-product-nombre-label" value="<?= esc($product['nombre']); ?>" required>
            </div>
            
            <div class="panel-product-form-group">
                <label for="panel-product-descripcion-label">Descripción:</label>
                <textarea name="descripcion" id="panel-product-descripcion-label" rows="4" required><?= esc($product['descripcion']); ?></textarea>
            </div>
            
            <div class="panel-product-form-group">
                <label for="panel-product-precio-label">Precio:</label>
                <input type="number" name="precio" id="panel-product-precio-label" step="0.01" value="<?= esc($product['precio']); ?>" required>
            </div>
            
            <div class="panel-product-form-group">
                <label for="panel-product-stock-label">Stock:</label>
                <input type="number" name="stock" id="panel-product-stock-label" value="<?= esc($product['stock']); ?>" required>
            </div>
            
            <div class="panel-product-form-group">
                <label for="panel-product-categoria-label">Categoría:</label>
                <select name="categoriaID" id="panel-product-categoria-label" required>
                    <?php foreach ([1 => 'Paneles', 2 => 'Reguladores', 3 => 'Inversores'] as $value => $label): ?>
                        <option value="<?= $value ?>" <?= $product['categoriaID'] == $value ? 'selected' : ''; ?>><?= $label ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="panel-product-form-group">
                <label for="panel-product-img-label">Imagen:</label>
                <input type="file" name="img" id="panel-product-img-label" accept="image/*">
            </div>
            
            <div class="panel-product-form-group">
                <label for="panel-product-activado-label">Estado:</label>
                <select name="activado" id="panel-product-activado-label" required>
                    <option value="1" <?= $product['activado'] == 1 ? 'selected' : ''; ?>>Activado</option>
                    <option value="0" <?= $product['activado'] == 0 ? 'selected' : ''; ?>>Desactivado</option>
                </select>
            </div>
            
            <button type="submit" class="panel-submit-button">Guardar Cambios</button>
        </form>
    </div>
</div>