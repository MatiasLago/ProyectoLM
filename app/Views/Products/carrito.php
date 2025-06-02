<div class="fondo-gestores">
    <div class="cart-container">
        <!-- Mostrar mensajes de error -->
        <?php if (session()->getFlashdata('errorStock')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('errorStock') ?>
            </div>
        <?php endif; ?>

        <h2>Carrito de Compras</h2>
        <div class="cart-items">
            <?php if (!empty($productos)): ?>
                <?php foreach ($productos as $p): ?>
                    <div class="cart-item">
                        <?php $img_url = base_url($p['img']); ?>
                        <div class="item-details">
                            <img src="<?php echo $img_url; ?>" alt="<?php echo $p['nombre']; ?>" class="product-image">
                            <div class="product-info">
                                <h3><?= $p['nombre'] ?></h3>
                                <p>Precio: $<?= $p['precio'] ?></p>
                            </div>
                        </div>
                        <form action="<?= base_url('carrito/update') ?>" method="post" class="item-form">
                            <input type="hidden" name="rowid" value="<?= $p['rowid'] ?>">
                            <input type="number" name="qty" value="<?= $p['qty'] ?>" min="1">
                            <input type="submit" value="Actualizar" class="btn-accion">
                        </form>
                        <form action="<?= base_url('carrito/remove/' . $p['rowid']) ?>" method="post" class="item-form">
                            <?= csrf_field() ?>
                            <input type="submit"  value="Eliminar" class="btn-accion">
                        </form>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No hay productos en el carrito.</p>
            <?php endif; ?>
        </div>
        <div class="cart-actions">
            <?php if (!empty($productos)): ?>
                <p class="total-amount">Total: $ <span id="carrito-total"><?= number_format($cart->total(), 2) ?></span></p>
                <form action="<?= base_url('compra/confirmar') ?>" method="post">
                    <button class="proceed-to-checkout">Proceder a Comprar</button>
                </form>
            <?php endif; ?>
        </div>
    </div>
</div>