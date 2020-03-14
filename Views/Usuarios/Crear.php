<?php require_once 'Views/sidebar.php'; ?>
<div class="container-fluid">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a class="text-info" href="<?= Base_url ?>registro/crear">Crear Usuario</a>
        </li>
        <li class="breadcrumb-item active">
            <a class="text-info" href="<?= Base_url ?>registro/gestionar">Ver tabla Usuarios</a>
        </li>
    </ol>
    <div class="card mb-3">
        <?php if (isset($Editar) && isset($Registro) && is_object($Registro)) : ?>
            <div class="card-header">
                <i class="fas fa-chart-area"></i>
                Editar Usuario: <strong><?= $Registro->Nombre ?></strong></div>
            <?php $Accion_url = Base_url . "registro/hacer&id=" . $Registro->idR ?>
        <?php else: ?>
            <div class="card-header">
                <i class="fas fa-chart-area"></i>
                Crear Usuario
            </div>
            <?php $Accion_url = Base_url . "registro/hacer" ?>
        <?php endif; ?>
        <div class="card-body">
            <form action="<?= $Accion_url ?>" method="POST">
                <div class="form-row">
                    <div class="col">
                        <label>Nombre Completo</label>
                        <input type="text" name="Nombre" class="form-control"  value="<?= isset($Registro) && is_object($Registro) ? $Registro->Nombre : false; ?>">
                    </div>
                    <div class="col">
                        <label>Correo Electronico</label>
                        <input type="text" name="Email" class="form-control" value="<?= isset($Registro) && is_object($Registro) ? $Registro->Email : false; ?>">
                    </div>
                </div>

                <div class="form-row">
                    <div class="col">
                        <label>Password</label>
                        <input type="text" name="Password" class="form-control" placeholder="<?= isset($Registro) && is_object($Registro) ? "Para modificar correctamente por favor dijite su nueva clave o dijite la anterior" : false; ?>" required>
                    </div>
                    <div class="col">
                        <label>Rol</label>
                        <select class="form-control" name="Rol" >
                            <option value="Administrador">Administrador</option>
                            <option value="Usuario">Usuario</option>
                        </select>
                    </div>

                </div>

                <button type="submit" class="btn btn-success mt-3">Agregar</button>
            </form>
        </div>
        <div class="card-footer small text-muted"></div>
    </div>
    <?php require_once 'Views/footer.php'; ?>
</div>

