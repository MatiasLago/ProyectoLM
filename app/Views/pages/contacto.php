<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('content') ?>

<h1 class="mb-4">Contacto</h1>
<hr>
<p class="lead mb-4">
    Utiliza la siguiente información o el formulario para ponerte en contacto con nosotros.
</p>

<div class="row g-4">
    <div class="col-md-6">
        <h2>Información de Contacto</h2>
        <p><strong>Email:</strong> <a href="mailto:solarCtes@gmail.com">ZenithEnergia@gmail.com</a></p> 
        <p><strong>Teléfono:</strong> 3794000001 </p>
        <p><strong>Dirección:</strong> 3 de Abril 420</p>
        <p><strong>Horario:</strong> Lunes a Viernes, 8:00 - 17:00 hs</p>
    </div>

    <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('error') ?>
                
            </div>
        <?php endif; ?>

    <?php if (!empty($error)): ?>
                <div class="alert alert-danger">
                    <?= $error ?>
                </div>
            <?php endif; ?>

            <?php if (!empty(session()->getFlashdata('mensaje'))): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('mensaje') ?>
            </div>
        <?php endif; ?>
        <form action="<?= base_url('/enviar-consulta') ?>" method="post">
            <div class="form-contact">
                <label for="name">Nombre:</label>
                <input type="text" id="nombre" name="nombre" placeholder="Tu nombre" required>
            </div>
            <div class="form-contact">
                <label for="email">Correo electrónico:</label>
                <input type="email" id="mail" name="mail" placeholder="example@example.com" required>
            </div>
            <div class="form-contact">
                <label for="message">Mensaje:</label>
                <textarea id="message" name="mensaje" rows="4" placeholder="Escribe tu mensaje aquí" required></textarea>
            </div>
            <button type="submit">Enviar</button>
        </form>
    </div>

<?= $this->endSection() ?>
