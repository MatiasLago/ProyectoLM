<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('titulo') ?>
Iniciar Sesión
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="login-container">
    <form class="login-form" action="<?= base_url('/auth') ?> " method="post">
        <h2>Iniciar Sesión</h2>

        <?php if(session()->getFlashdata('msg')):?>
            <div class="alert alert-warning">
                <?= session()->getFlashdata('msg')?>
            </div>
        <?php endif;?>

        <div class="form-login">
            <label for="usuario"><i class="fas fa-user"></i> Usuario:</label>
            <input type="text" id="usuario" name="usuario" placeholder="Ingresa tu usuario" required>
        </div>

        <div class="form-login">
            <label for="password"><i class="fas fa-lock"></i> Contraseña:</label>
            <input type="password" id="password" name="password" placeholder="Ingresa tu contraseña" required>
        </div>

        <button type="submit" class="login-btn">Iniciar Sesión</button>

        <p class="signup-link">
            ¿No tienes una cuenta? 
            <a href="<?= base_url('/registro') ?>">Registrate aquí</a>
        </p>
    </form>
</div>

<?= $this->endSection() ?>
