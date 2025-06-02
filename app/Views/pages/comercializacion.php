<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('titulo') ?>Comercialización<?= $this->endSection() ?>

<?= $this->section('content') ?>

<h1 class="mb-4">Información de Comercialización</h1>
<hr>

<div class="mb-5">
    <h3>Tipos de entrega</h3>
    <ul>
        <li>📦 Entrega en local (retiro sin costo)</li>
        <li>🚚 Envío a domicilio en Corrientes Capital</li>
        <li>✈️ Envíos a otras provincias mediante transporte de encomiendas (Andreani, OCA, Correo Argentino, etc.)</li>
    </ul>
</div>

<div class="mb-5">
    <h3>Formas de envío</h3>
    <ul>
        <li>⏱️ Envíos estándar (3 a 5 días hábiles)</li>
        <li>⚡ Envíos express dentro de Corrientes (24 a 48hs)</li>
        <li>🔒 Seguimiento del envío con código</li>
    </ul>
</div>

<div class="mb-5">
    <h3>Formas de pago</h3>
    <ul>
        <li>💳 Tarjetas de crédito/débito (Visa, MasterCard, etc.)</li>
        <li>💰 Transferencia bancaria (CBU/CVU)</li>
        <li>📱 Pagos electrónicos (MercadoPago, Ualá, etc.)</li>
        <li>💵 Efectivo al retirar en local</li>
    </ul>
</div>

<div class="mb-4">
    <h3>Información adicional</h3>
    <p>✔ Todos nuestros productos tienen garantía oficial.  
       ✔ Podés solicitar factura A o B.  
       ✔ Para grandes volúmenes o compras institucionales, contactanos para descuentos personalizados.</p>
</div>

<?= $this->endSection() ?>
