<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('titulo') ?>Confirmar Compra<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="fondo-gestores">
  <div class="compra-container">
    <div class="titulo-compra">
      <h2>Confirmar Compra</h2>
    </div>
    
    <h3>Detalles del Carrito</h3>
    <table class="compra-item">
      <thead>
        <tr>
          <th class="p-nombre">Producto</th>
          <th class="p-precio">Precio</th>
          <th class="p-cantidad">Cantidad</th>
          <th class="p-subtotal">Subtotal</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($productos as $p) : ?>
          <tr>
            <td class="p-nombre"><?= $p['name'] ?></td>
            <td class="p-precio">$<?= number_format($p['price'], 2) ?></td>
            <td class="p-cantidad"><?= $p['qty'] ?></td>
            <td class="p-subtotal">$<?= number_format($p['price'] * $p['qty'], 2) ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <form class="form-compra" action="<?= base_url('/compra/finalizar') ?>" method="post">
      <h3>Datos de Envío y Pago</h3>
      <?= csrf_field() ?>

      <?php if (isset($errors)) : ?>
        <div class="alert alert-danger">
          <ul>
            <?php foreach ($errors as $error) : ?>
              <li><?= esc($error) ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>

      <label for="direccion">Dirección:</label>
      <input type="text" id="direccion" name="direccion" placeholder="Ingrese su dirección" required>

      <label for="ciudad">Ciudad:</label>
      <input type="text" id="ciudad" name="ciudad" placeholder="Ingrese su ciudad" required>

      <label for="provincia">Provincia:</label>
      <input type="text" id="provincia" name="provincia" placeholder="Ingrese su provincia" required>

      <label for="codPostal">Código Postal:</label>
      <input type="text" id="codPostal" name="codPostal" placeholder="Ingrese su código postal" required>

      <label for="metodoEnvio">Método de Envío:</label>
      <select name="metodoEnvio" id="metodoEnvio" onchange="calcularCostoEnvio()">
        <option value="" selected disabled>Ingrese la forma de envío</option>
        <option value="1">Estándar</option>
        <option value="2">Express</option>
      </select>

      <div id="costo_envio_container">
        <label for="precioEnvio">Costo de Envío:</label>
        <input type="hidden" name="precioEnvio" id="precioEnvio_hidden" value="">
        <span id="precioEnvio">...</span>
      </div>

      <label for="tipo_pago">Tipo de Pago:</label>
      <select name="tipoPagoId" id="tipoPagoId">
        <option value="" selected disabled>Ingrese la forma de pago</option>
        <option value="1">Débito</option>
        <option value="2">Crédito</option>
      </select>

      <label for="tarjeta">Nro de Tarjeta:</label>
      <input type="text" id="tarjeta" name="tarjeta" placeholder="Ingrese los 16 dígitos" required>

      <button type="submit" class="btn btn-success mt-3">Finalizar Compra</button>
    </form>
  </div>
</div>

<?= $this->endSection() ?>
