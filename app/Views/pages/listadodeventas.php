<div class="fondo-gestores">
    <div class="container-ventas">
        <?php $session = session(); ?>
        <div class="bg-listar">
            <div class="ventas-table-title">
                <?php if ($session->get('perfilID') == 1) : ?>
                    <h1>Ventas Realizadas</h1>
                <?php else : ?>
                    <h1>Tus Compras</h1>
                <?php endif; ?>
            </div>
            <?php if ($session->get('perfilID') == 1) : ?>
                <div class="ventas-table-button">
                    <a href="<?= base_url('/listadoEnvios') ?>" class="">Ver envíos</a>
                </div>
            <?php endif; ?>
            <div class="table-responsive">
                <table class="table-ventas-hechas">
                    <thead>
                        <tr>
                            <th scope="ventas-col">ID</th>
                            <th scope="ventas-col">Fecha venta</th>
                            <th scope="ventas-col">Email</th>
                            <th scope="ventas-col">Total</th>
                            <th scope="ventas-col">Tipo Pago</th>
                            <th scope="ventas-col">Tarjeta</th>
                            <th scope="ventas-col">Comprobante</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ventas as $venta) : ?>
                            <tr>
                                <th scope="ventas-row"><?php echo $venta['id']; ?></th>
                                <td><?php echo $venta['fecha']; ?></td>
                                <td><?php echo $venta['userEmail']; ?></td>
                                <td><?php echo $venta['total_venta']; ?></td>
                                <td><?php echo $venta['tipoPago_descripcion']; ?></td>
                                <td><?php echo $venta['tarjeta']; ?></td>
                                <td><a href="<?= base_url('compra/comprobante/' . $venta["id"]); ?>"><i class="fa-solid fa-file"></i></a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</div>