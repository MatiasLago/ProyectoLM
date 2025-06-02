<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('titulo') ?>Productos<?= $this->endSection() ?>

<?= $this->section('content') ?>

<h1 class="mb-4">Nuestros Productos</h1>
<div class="row row-cols-1 row-cols-md-3 g-4">
    
    <!-- Producto 1 -->
    <div class="col">
        <div class="card h-100">
            <img src="<?= base_url('assets/img/producto1.jpg') ?>" class="card-img-top" alt="Producto 1">
            <div class="card-body text-center">
                <h5 class="card-title">Calefón Solar 120L</h5>
                <p class="card-text">$650.000</p>
            </div>
        </div>
    </div>

    <!-- Producto 2 -->
    <div class="col">
        <div class="card h-100">
            <img src="<?= base_url('assets/img/producto2.jpg') ?>" class="card-img-top" alt="Producto 2">
            <div class="card-body text-center">
                <h5 class="card-title">Panel Solar 300W</h5>
                <p class="card-text">$200.000</p>
            </div>
        </div>
    </div>

    <!-- Producto 3 -->
    <div class="col">
        <div class="card h-100">
            <img src="<?= base_url('assets/img/producto3.jpg') ?>" class="card-img-top" alt="Producto 3">
            <div class="card-body text-center">
                <h5 class="card-title">Inversor Solar 3kW</h5>
                <p class="card-text">$730.000</p>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection() ?>
