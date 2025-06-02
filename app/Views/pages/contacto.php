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

    <div class="col-md-6">
        <h2>Formulario de Contacto</h2>
        <p>Envíanos tu consulta directamente:</p>
            
            <div class="mb-3">
                <label for="formNombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="formNombre" name="nombre" required>
            </div>

            <div class="mb-3">
                <label for="formEmail" class="form-label">Email:</label>
                <input type="email" class="form-control" id="formEmail" name="email" required>
            </div>

            <div class="mb-3">
                <label for="formMensaje" class="form-label">Mensaje:</label>
                <textarea class="form-control" id="formMensaje" name="mensaje" rows="5" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
