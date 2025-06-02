<div class="fondo-gestores">
    <div class="admin-panel">
        <?php 
        $session = session();
        $perfilID = $session->get('perfilID');
        ?>
        <?php if (!empty(session()->get('mensajeBorrado'))): ?>
            <div class="mensaje-exito"><?= session()->get('mensajeBorrado') ?></div>
        <?php elseif (!empty(session()->get('errorBorrado'))): ?>
            <div class="mensaje-error"><?= session()->get('errorBorrado') ?></div>
        <?php endif; ?>

        <?php if (!empty(session()->get('mensajeEditado'))): ?>
            <div class="mensaje-exito"><?= session()->get('mensajeEditado') ?></div>
        <?php elseif (!empty(session()->get('errorBorrado'))): ?>
            <div class="mensaje-error"><?= session()->get('errorEditado') ?></div>
        <?php endif; ?>

        <!-- Botón único para agregar producto -->
        <div class="add-product-button-container">
            <a href="<?= base_url('/agregarProducto') ?>" class="add-product-button">Agregar Producto</a>
        </div>

        <!-- Contenedor de categoría Panel -->
        <div class="category-container panel-category">
            <h2>Paneles</h2>
            <table class="product-table panel-table">
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
                                        <a href="<?= base_url('editarProducto/' . $product['id']); ?>">Editar</a> 
                                        <a href="<?= base_url('/eliminarProducto/' . $product['id']); ?>">Eliminar</a>
                                        <?php if ($product['activado'] == 1): ?>
                                            <a href="<?= base_url('bajaProducto/' . $product['id']); ?>">Dar Baja</a>
                                        <?php else: ?>
                                            <a href="<?= base_url('altaProducto/' . $product['id']); ?>">Dar Alta</a>
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
        </div>

        <!-- Contenedor de categoría Paneles -->
        <div class="category-container regulador-category">
            <h2>Reguladores</h2>
            <table class="product-table regulador-table">
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
                                        <a href="<?= base_url('editarProducto/' . $product['id']); ?>">Editar</a> 
                                        <a href="<?= base_url('/eliminarProducto/' . $product['id']); ?>">Eliminar</a>
                                        <?php if ($product['activado'] == 1): ?>
                                            <a href="<?= base_url('bajaProducto/' . $product['id']); ?>">Dar Baja</a>
                                        <?php else: ?>
                                            <a href="<?= base_url('altaProducto/' . $product['id']); ?>">Dar Alta</a>
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
        </div>

        <!-- Contenedor de categoría Tazas -->
        <div class="category-container inversor-category">
            <h2>Inversores</h2>
            <table class="product-table inversor-table">
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
                                        <a href="<?= base_url('editarProducto/' . $product['id']); ?>">Editar</a> 
                                        <a href="<?= base_url('/eliminarProducto/' . $product['id']); ?>">Eliminar</a>
                                        <?php if ($product['activado'] == 1): ?>
                                            <a href="<?= base_url('bajaProducto/' . $product['id']); ?>">Dar Baja</a>
                                        <?php else: ?>
                                            <a href="<?= base_url('altaProducto/' . $product['id']); ?>">Dar Alta</a>
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
        </div>
        
    </div>
</div>