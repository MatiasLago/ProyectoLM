
<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center w-100">
            <!-- Logo -->
            <a class="navbar-brand me-auto" href="<?= base_url() ?>" style="flex: 0 0 auto;">
                <img src="<?= base_url('assets/img/logo2.png') ?>" alt="Logo" style="height: 100px;">
            </a>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

            <!-- Botones -->
           <div class="mx-auto">
                <ul class="navbar-nav">
                    <li class="nav-item mx-2">
                        <a class="nav-link active fs-4 fw-semibold" href="<?= base_url() ?>">Inicio</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link active fs-4 fw-semibold" href="<?= base_url('catalogo') ?>">Productos</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link active fs-4 fw-semibold" href="<?= base_url('comercializacion') ?>">Comercialización</a>
                    </li>
                    <li class="nav-item dropdown mx-2">
                        <a class="nav-link dropdown-toggle active fs-4 fw-semibold" href="#" id="userDropdown" role="button">
                         <i class="bi bi-person"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="userDropdown">
                    <li><a class="dropdown-item" href="<?= base_url('login') ?>">Iniciar Sesión</a></li>
                     <li><a class="dropdown-item" href="<?= base_url('registrarse') ?>">Registrarse</a></li>
                        </ul>
                    </li>
                    </ul>
            </div>
            
        </div>
    </div>
</nav>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const dropdown = document.querySelector('.nav-item.dropdown');
        dropdown.addEventListener('mouseover', function () {
            this.classList.add('show');
            this.querySelector('.dropdown-menu').classList.add('show');
        });
        dropdown.addEventListener('mouseout', function () {
            this.classList.remove('show');
            this.querySelector('.dropdown-menu').classList.remove('show');
        });
    });
</script>
