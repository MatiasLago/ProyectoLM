<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('content') ?>

<div class="container mt-5">
    <h1 class="mb-4">Sobre Nosotros</h1>
    <hr>

    <p class="lead mb-4">
        Conoce más sobre nuestra historia, misión y el equipo detrás de Zenith Energia.
    </p>

    <div class="row g-4">

        <div class="col-md-7">
            <h2>Nuestra Historia</h2>
            <p>
            Nuestra empresa nació en el año 2025 con el propósito de brindar soluciones energéticas sostenibles que respondan a los desafíos ambientales y económicos de hoy.
            </p>
            <p>
            Fundada por un equipo comprometido con la innovación y el desarrollo sustentable, surgimos con la visión de hacer accesible la energía solar y renovable a hogares, negocios y comunidades.
            </p>
            <p>
            Desde nuestros inicios, trabajamos con tecnología de vanguardia y un firme compromiso con la calidad, el ahorro energético y el cuidado del planeta.
            </p>
            <h2 class="mt-4">Misión y Visión</h2>
            <p>
                <strong>Misión:</strong> Ofrecer soluciones integrales en energía solar y renovable, mediante la venta de equipos de alta eficiencia, asesoría técnica personalizada y servicio postventa, con el fin de satisfacer las necesidades energéticas de nuestros clientes de manera sostenible, accesible y responsable con el medio ambiente.
            </p>
            <p>
                <strong>Visión:</strong> Ser una empresa líder en el mercado nacional e internacional de energía renovable, reconocida por su innovación, compromiso ambiental y excelencia en el servicio, contribuyendo activamente a la transición hacia un futuro energético limpio y sostenible.
            </p>
        </div>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Nuestro Equipo</h5>
                    <p class="card-text">Contamos con profesionales apasionados por las energías renovables.
                    </p>
                    <img src="<?= base_url('assets/img/Matias.jpg') ?>" class="card-img-top" alt="Lago Matias">
                    <img src="<?= base_url('assets/img/Lucas.jpg') ?>" class="card-img-top" alt="Mancuello Lucas">
                </div>
            </div>
        </div>

    </div>
</div>

<?= $this->endSection() ?>
