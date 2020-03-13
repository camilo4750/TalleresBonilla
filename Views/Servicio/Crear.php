<?php require_once 'Views/sidebar.php'; ?>
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="text-danger" href="<?= Base_url ?>servicio/crear">Crear servicio</a>
            </li>
            <li class="breadcrumb-item active">
                <a class="text-danger" href="<?= Base_url ?>servicio/gestionar">Ver tabla servicios</a>
            </li>
        </ol>
        <div class="card mb-3">
            <?php if (isset($Editar) && isset($Servicio) && is_object($Servicio)) : ?>
                <div class="card-header">
                    <i class="fas fa-chart-area"></i>
                    Editar Servicio: <strong><?= $Servicio->Nombre ?></strong></div>
                <?php $Accion_url = Base_url . "servicio/save&id=" . $Servicio->Id ?>
            <?php else: ?>
                <div class="card-header">
                    <i class="fas fa-chart-area"></i>
                    Crear Servicio
                </div>
                <?php $Accion_url = Base_url . "servicio/save" ?>
            <?php endif; ?>
            <div class="card-body">
                <form action="<?= $Accion_url ?>" method="POST">
                    <div class="form-row">
                        <div class="col">
                            <label>Nombre</label>
                            <input type="text" name="Nombre" class="form-control"
                                   value="<?= isset($Servicio) && is_object($Servicio) ? $Servicio->Nombre : false; ?>">                    </div>
                        <div class="col">
                            <label>Descripcion</label>
                            <input type="text" name="Descripcion" class="form-control"
                                   value="<?= isset($Servicio) && is_object($Servicio) ? $Servicio->Descripcion : false; ?>">                    </div>
                    </div>

                    <button type="submit" class="btn btn-success mt-3">Agregar</button>
                </form>
            </div>
            <div class="card-footer small text-muted"></div>
        </div>
    </div>
<?php require_once 'Views/footer.php'; ?>