<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('titulo') ?>
En Construcción
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container-construccion">
  <main class="construction-container text-center">
    <h1>¡Sitio en Construcción!</h1>
    <p>Estamos trabajando en mejorar tu experiencia. ¡Vuelve pronto!</p>
    <img src="<?= base_url('assets/img/bob.png') ?>" alt="Sitio en construcción" class="img-fluid mt-3">
  </main>
</div>

<?= $this->endSection() ?>
