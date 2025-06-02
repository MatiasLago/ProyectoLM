<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('titulo') ?>
Inicio
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="text-center bg-light p-5 rounded shadow-sm mb-5">
    <h1 class="display-4 fw-bold">Bienvenido a Zenith Energía</h1>
    <p class="lead mt-3">Soluciones energéticas inteligentes para un futuro sustentable.</p>
    <p class="mt-4">
        En <strong>Zenith Energía</strong> nos especializamos en brindar tecnología solar y eficiencia energética para hogares, empresas e instituciones. 
        Nuestro compromiso es con la innovación, la calidad y el cuidado del medio ambiente.
    </p>
</section>

<section>
    <h2 class="text-center mb-4">Nuestros Productos</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">

        <div class="col">
            <div class="card h-100 shadow-sm">
                <img src="<?= base_url('assets/img/producto1.jpg') ?>" class="card-img-top" alt="Calefón Solar">
                <div class="card-body text-center">
                    <h5 class="card-title">Calefones Solares</h5>
                    <p class="card-text">Ahorra energía utilizando la radiación solar para calentar agua en tu hogar o negocio.</p>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 shadow-sm">
                <img src="<?= base_url('assets/img/producto2.jpg') ?>" class="card-img-top" alt="Paneles Solares">
                <div class="card-body text-center">
                    <h5 class="card-title">Paneles Fotovoltaicos</h5>
                    <p class="card-text">Generá tu propia energía eléctrica con paneles solares de alta eficiencia.</p>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 shadow-sm">
                <img src="<?= base_url('assets/img/producto3.jpg') ?>" class="card-img-top" alt="Inversor Solar">
                <div class="card-body text-center">
                    <h5 class="card-title">Inversores Solares</h5>
                    <p class="card-text">Transformá la energía solar en electricidad lista para usar con inversores confiables.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mt-5 bg-light p-4 rounded shadow-sm">
    <h2 class="text-center mb-4">Servicio Postventa e Instalación</h2>

    <div class="row align-items-center">
        <div class="col-md-6 mb-3">
            <img src="<?= base_url('assets/img/instalacion.jpg') ?>" alt="Instalación" class="img-fluid rounded shadow-sm">
        </div>
        <div class="col-md-6">
            <p>
                En <strong>Zenith Energía</strong> no solo vendemos productos, también te acompañamos en todo el proceso postventa.
            </p>
            <ul>
                <li>🔧 Instalación profesional de calefones solares, paneles e inversores.</li>
                <li>📞 Asesoramiento técnico personalizado.</li>
                <li>🛠️ Garantía de funcionamiento y revisiones periódicas.</li>
                <li>💬 Soporte técnico para resolver cualquier duda o inconveniente.</li>
            </ul>
            <p class="mt-3">Nuestro equipo se encarga de que todo funcione correctamente desde el primer día.</p>
        </div>
    </div>
</section>


<?= $this->endSection() ?>
