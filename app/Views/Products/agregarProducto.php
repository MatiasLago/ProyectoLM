<div class="fondo-gestores">
    <div class="panel-product-add-container">
        <h2 class="panel-product-add-title">Agregar Producto</h2>
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

        <form class="panel-product-add-form" action="<?= base_url('/guardarProducto') ?>" method="post">
            <div class="panel-form-group">
                <label for="panel-product-name">Nombre:</label>
                <input type="text" name="nombre" id="panel-product-name" required>
            </div>
            <div class="panel-form-group">
                <label for="panel-product-description">Descripción:</label>
                <textarea name="descripcion" id="panel-product-description" rows="4" required></textarea>
            </div>
            <div class="panel-form-group">
                <label for="panel-product-price">Precio:</label>
                <input type="number" name="precio" id="panel-product-price" step="0.01" required>
            </div>
            <div class="panel-form-group">
                <label for="panel-product-stock">Stock:</label>
                <input type="number" name="stock" id="panel-product-stock" required>
            </div>
            <div class="panel-form-group">
                <label for="panel-product-category">Categoría:</label>
                <select name="categoriaID" id="panel-product-category" required>
                    <option value="1">Panel</option>
                    <option value="2">Regulador</option>
                    <option value="3">Inversor</option>
                </select>
            </div>
            <div class="panel-form-group">
                <label for="panel-product-image">Imagen:</label>
                <input type="file" name="img" id="panel-product-image" accept="image/*">
            </div>
            <div class="panel-form-group">
                <label for="panel-product-activated">Activado:</label>
                <select name="activado" id="panel-product-activated" required>
                    <option value="0">Desactivado</option>
                    <option value="1">Activado</option>
                </select>
            </div>
            <button type="submit" class="panel-submit-button">Agregar Producto</button>
        </form>
    </div>
</div>