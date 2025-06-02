<div class="comprobante-wrapper">
        <div class="comprobante-container">
            <h2 class="comprobante-title">Zenith Energia</h2>
            <h2 class="comprobante-title">Comprobante de Compra</h2>
        
            <h3 class="comprobante-subtitle">Datos del Usuario</h3>
            <div class="comprobante-user-info">
                <p class="comprobante-info"><strong>Nombre:</strong> <?= $user['nombre'] ?></p>
                <p class="comprobante-info"><strong>Email:</strong> <?= $user['mail'] ?></p>
            </div>
            
            <h3 class="comprobante-subtitle">Detalles del Carrito</h3>
            <table class="comprobante-table">
                <thead>
                    <tr>
                        <th class="comprobante-th comprobante-p-nombre">Producto</th>
                        <th class="comprobante-th comprobante-p-precio">Precio</th>
                        <th class="comprobante-th comprobante-p-cantidad">Cantidad</th>
                        <th class="comprobante-th comprobante-p-subtotal">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orderDetails as $detail) : ?>
                        <tr>
                            <td class="comprobante-td comprobante-p-nombre"><?= $detail['productName'] ?></td>
                            <td class="comprobante-td comprobante-p-precio">$<?= number_format($detail['price'], 2) ?></td>
                            <td class="comprobante-td comprobante-p-cantidad"><?= $detail['cantidad'] ?></td>
                            <td class="comprobante-td comprobante-p-subtotal">$<?= number_format($detail['price'] * $detail['cantidad'], 2) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="comprobante-total-container">
                <p class="comprobante-total">Total: $<?= number_format($order['total_venta'], 2) ?></p>
            </div>

            <h3 class="comprobante-subtitle">Datos de Envío y Pago</h3>
            <div class="comprobante-shipping-info">
                <p class="comprobante-info"><strong>Dirección:</strong> <?= $envio['direccion'] ?></p>
                <p class="comprobante-info"><strong>Ciudad:</strong> <?= $envio['ciudad'] ?></p>
                <p class="comprobante-info"><strong>Provincia:</strong> <?= $envio['provincia'] ?></p>
                <p class="comprobante-info"><strong>Código Postal:</strong> <?= $envio['codPostal'] ?></p>
                <p class="comprobante-info"><strong>Método de Envío:</strong> <?= $envio['metodoEnvio'] == 1 ? 'Estándar - $4500' : 'Express - $6500' ?></p>
                <p class="comprobante-info"><strong>Tipo de Pago:</strong> <?= $order['tipoPagoId'] == 1 ? 'Débito' : 'Crédito' ?></p>
            </div>

            <!-- Botón para generar y descargar el PDF -->
            <button type="button" class="comprobante-button" id="generarPDFButton" onclick="generarPDF()">Generar PDF</button>
        </div>
    </div>

    <!-- Incluye jsPDF y html2canvas en tu vista -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

    <script>
        // Función para generar y descargar el PDF al hacer clic en el botón
        function generarPDF() {
            const { jsPDF } = window.jspdf;
            const element = document.querySelector('.comprobante-container');
            const button = document.getElementById('generarPDFButton');
            
            // Ocultar el botón
            button.classList.add('comprobante-button-hidden');

            html2canvas(element).then(canvas => {
                const imgData = canvas.toDataURL('image/png');
                const pdf = new jsPDF('p', 'mm', 'a4');
                const imgProps = pdf.getImageProperties(imgData);
                const pdfWidth = pdf.internal.pageSize.getWidth();
                const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;

                pdf.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfHeight);
                pdf.save('comprobante.pdf');

                // Mostrar el botón nuevamente
                button.classList.remove('comprobante-button-hidden');
            });
        }
    </script>