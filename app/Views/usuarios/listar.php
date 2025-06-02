<?= $this->extend('plantilla') ?>
<?= $this->section('content') ?>
<h1>Lista de Usuarios</h1>
<table class="table">
    <?php foreach($usuarios as $usuario): ?>
    <tr>
        <td><?= $usuario['nombre'] ?></td>
        <td><?= $usuario['email'] ?></td>
    </tr>
    <?php endforeach ?>
</table>
<?= $this->endSection() ?>