<div class=fondo-gestores>

<div class="perfil-container">
        <h1><i class="fa-regular fa-user"></i></h1>
        <div class="profile-card">
            <div class="profile-info">
                <?php 
            $session = session();
            $id= $session->get('userID');
             ?>
                <h2>Datos Personales</h2>
                <p><strong>Nombre:</strong> <?php  echo($session->get("nombre"))?>   </p>
                <p><strong>Apellido:</strong> <?php  echo($session->get("apellido"))?></p>
                <p><strong>Correo Electrónico:</strong> <?php  echo($session->get("mail"))?></p>
                <p><strong>Nombre de usuario:</strong> <?php  echo($session->get("usuario"))?></p>
                <div class="perfil-acciones">
                <a href="<?=base_url('editarUsuario/' . $id); ?>">Editar Perfil</a>
                <?php if ($session->get("perfilID") == 2): ?>
                    <a href="<?=base_url('/listadoVentasU/' . $id); ?>">Ver Compras</a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="logout-button">
                <form action="<?= base_url('/logout') ?>" method="post">    
                    <button type="submit">Cerrar sesión</button>
                </form>
            </div>
        </div>
    </div>
</div>