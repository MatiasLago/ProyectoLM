<div class="fondo-gestores">
<div class="profile-list-container">
    <h2 class="profile-list-title">Listado de Perfiles</h2>
        <?php $session= session();
        $id= $session->get('userID');?>
    <div class="table-wrapper">
        <table class="profile-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Nombre Usuario</th>
                    <th>Rol</th>
                    <th>Estado</th>
                    <th>Loggeado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($users) && is_array($users)): ?>
                    <?php foreach ($users as $user): ?>
                        <?php if ($user['perfilID'] == 2 and $user['userID']!= $id): ?>
                            <tr>
                                <td perfil-label="ID"><?php echo $user['userID']; ?></td>
                                <td perfil-label="Nombre"><?php echo $user['nombre']; ?></td>
                                <td perfil-label="Apellido"><?php echo $user['apellido']; ?></td>
                                <td perfil-label="Email"><?php echo $user['mail']; ?></td>
                                <td perfil-label="Nombre Usuario"><?php echo $user['usuario']; ?></td>
                                <td perfil-label="Rol">User</td>
                                <td perfil-label="Estado"><?php if($user['baja']==1): echo 'DE BAJA'; else: echo 'ACTIVO'; endif; ?></td>
                                <td perfil-label="Loggeado"><?php if($user['loggedIn']==1): echo 'LOGEADO'; else: echo 'NO ESTA LOGEADO'; endif; ?></td>
                                <td perfil-label="Acciones">
                                    <a href="<?=base_url('editarUsuario/' . $user['userID']); ?>" class="profile-edit-link">Editar</a>
                                    <a href="<?=base_url('eliminarUsuario/' . $user['userID']); ?>" class="profile-delete-link">Eliminar</a>
                                    <?php if ($user['baja'] == 1): ?>
                                            <a href="<?= base_url('altaUsuario/' . $user['userID']); ?>"class="profile-delete-link">Dar Alta</a>
                                        <?php else: ?>
                                            <a href="<?= base_url('bajaUsuario/' . $user['userID']); ?>"class="profile-delete-link">Dar Baja</a>
                                        <?php endif; ?>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="table-wrapper">
        <table class="profile-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Nombre Usuario</th>
                    <th>Rol</th>
                    <th>Estado</th>
                    <th>Loggeado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($users) && is_array($users)): ?>
                    <?php foreach ($users as $user): ?>
                        <?php if ($user['perfilID'] == 1 and $user['userID']!= $id): ?>
                            <tr>
                                <td perfil-label="ID"><?php echo $user['userID']; ?></td>
                                <td perfil-label="Nombre"><?php echo $user['nombre']; ?></td>
                                <td perfil-label="Apellido"><?php echo $user['apellido']; ?></td>
                                <td perfil-label="Email"><?php echo $user['mail']; ?></td>
                                <td perfil-label="Nombre Usuario"><?php echo $user['usuario']; ?></td>
                                <td perfil-label="Rol">Admin</td>
                                <td perfil-label="Estado"><?php if($user['baja']==1): echo 'DE BAJA'; else: echo 'ACTIVO'; endif; ?></td>

                                <td perfil-label="Loggeado"><?php if($user['loggedIn']==1): echo 'LOGEADO'; else: echo 'NO ESTA LOGEADO'; endif; ?></td>
                                <td perfil-label="Acciones">
                                    <a href="<?=base_url('editarUsuario/' . $user['userID']); ?>" class="profile-edit-link">Editar</a>
                                    <a href="<?=base_url('eliminarUsuario/' . $user['userID']); ?>" class="profile-delete-link">Eliminar</a>
                                    <?php if ($user['baja'] == 1): ?>
                                            <a href="<?= base_url('altaUsuario/' . $user['userID']); ?>"class="profile-delete-link">Dar Alta</a>
                                        <?php else: ?>
                                            <a href="<?= base_url('bajaUsuario/' . $user['userID']); ?>"class="profile-delete-link">Dar Baja</a>
                                        <?php endif; ?>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<div class="pagination-container"><?= $pager->links() ?></div>

</div>