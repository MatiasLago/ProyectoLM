<div class="container-ventas">
            <?php $session = session(); ?>
            <div class="bg-listar">
                <div class="ventas-table-title">
                    <?php if ($session->get('perfilID') == 1) : ?>
                        <h1>Envios Realizados</h1>
                    <?php else : ?>
                        <h1>Tus Envios</h1>
                    <?php endif; ?>
                </div>
                <?php if ($session->get('perfilID') == 1) : ?>
                    <div class="ventas-table-button">
                        <a href="<?= base_url('/listadoVentas') ?>" class="">Ver Ventas</a>
                    </div>
                <?php endif; ?>
                <table class="table-ventas-hechas">
                    <thead>
                        <tr>
                            <th scope="ventas-col">ID Orden</th>
                            <th scope="ventas-col">Direccion</th>
                            <th scope="ventas-col">Ciudad</th>
                            <th scope="ventas-col">Provincia</th>
                            <th scope="ventas-col">Codigo Postal</th>
                            <th scope="ventas-col">Metodo Envio</th>
                            <th scope="ventas-col">Precio Envio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($envios as $envio) : ?>
                            <tr>
                                <th scope="ventas-row"><?php echo $envio['orderID']; ?></th>
                                <td><?php echo $envio['direccion']; ?></td>
                                <td><?php echo $envio['ciudad']; ?></td>
                                <td><?php echo $envio['provincia']; ?></td>
                                <td><?php echo $envio['codPostal']; ?></td>
                                <td><?php echo $envio['metodoEnvio']; ?></td>
                                <td><?php echo $envio['precioEnvio']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>