<header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-lg">
    <div class="container">
      <a class="navbar-brand" href="<?= base_url('/') ?>">
        <img src="<?= base_url('assets/img/logo2.png') ?>" alt="Logo">
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
        <div class="navbar-nav">
          <a class="nav-link" href="<?= base_url('/catalogo') ?>">Catálogo</a>
          <a class="nav-link" href="<?= base_url('/contacto') ?>">Contacto</a>
          <a class="nav-link" href="<?= base_url('/nosotros') ?>">Nosotros</a>
        </div>

        <div class="navbar-nav">
          <?php if (session()->get('usuario')): ?>
            <?php if (session()->get('perfilID') == 1): ?>
              <a class="nav-link" href="<?= base_url('/usuarios') ?>">Usuarios</a>
              <a class="nav-link" href="<?= base_url('/listadoP') ?>">Gestión Productos</a>
              <a class="nav-link" href="<?= base_url('/listadodeventas') ?>">Ventas</a>
              <a class="nav-link" href="<?= base_url('/listadoenvios') ?>">Envíos</a>
              <a class="nav-link" href="<?= base_url('/consultas') ?>">Consultas</a>
            <?php endif; ?>

            <a class="nav-link" href="<?= base_url('/perfil') ?>">Perfil</a>

          <?php if (session()->get('loggedIn')): ?>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('/carrito') ?>">
                <i class="fa fa-shopping-cart"></i> Carrito
              </a>
            </li>
          <?php endif; ?>
          
            <form action="<?= base_url('/logout') ?>" method="post" class="d-inline">
              <button class="btn btn-outline-light btn-sm ms-2" type="submit">Cerrar Sesión</button>
            </form>
          <?php else: ?>
            <a class="nav-link" href="<?= base_url('/login') ?>">Login</a>
            <a class="nav-link" href="<?= base_url('/registro') ?>">Registrarse</a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </nav>
</header>
