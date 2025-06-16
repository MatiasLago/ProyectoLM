<div class="fondo-gestores">
    <div class="header-buttons">
        <a href="<?= base_url('/listado_productos/1') ?>" class="header-button">Panel</a>
        <a href="<?= base_url('/listado_productos/2') ?>" class="header-button">Caja</a>
        <a href="<?= base_url('/listado_productos/3') ?>" class="header-button">Accesorios</a>
    </div>

    <?php $session = session(); ?>
    <div class="product-catalog-container">
        <h1 class="catalog-title">Catálogo de Productos</h1>
        <div class="product-grid">
            <?php foreach ($product as $p): ?>
                <?php if ($p['activado'] == 1 && $p['stock'] > 0): ?>
                    <div class="product-item">
                        <?php $img_url = base_url($p['img']); ?>
                        <img src="<?= $img_url; ?>" alt="<?= $p['nombre']; ?>" width="100">
                        <div class="product-details">
                            <h3 class="product-name"><?= $p['nombre'] ?></h3>
                            <h4 class="product-desc"><?= $p['descripcion'] ?></h4>
                            <span class="product-price">$<?= $p['precio'] ?></span>
                            <div class="product-purchase">
                                <form action="<?= base_url('carrito/add') ?>" method="post">
                                    <!-- Datos del producto -->
                                    <input type="hidden" name="id" value="<?= $p['id'] ?>">
                                    <input type="number" class="product-quantity" name="qty" value="1" min="1">
                                    <input type="hidden" name="price" value="<?= $p['precio'] ?>">
                                    <input type="hidden" name="name" value="<?= $p['nombre'] ?>">
                                    <input type="hidden" name="categoriaID" value="<?= $p['categoriaID'] ?>">
                                    <!-- Botón de agregar al carrito -->
                                    <?php if ($session->get('loggedIn')) : ?>
                                        <button class="add-to-cart-button" type="submit"><i class="fa fa-shopping-cart"></i></button>
                                    <?php else : ?>
                                        <a href="<?= base_url('/login') ?>" class="btn-comprar">Agregar Carrito</a>
                                    <?php endif ?>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Paginación -->
    <div class="pagination-container">
        <div class="hidden-pagination">
            <?= $pager->links() ?>
        </div>
    </div>
</div>