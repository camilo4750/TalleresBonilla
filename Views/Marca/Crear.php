<?php require_once 'Views/sidebar.php'; ?>
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="text-info" href="<?= Base_url ?>marca/crear">Crear marca</a>
            </li>
            <li class="breadcrumb-item active">
                <a class="text-info" href="<?= Base_url ?>marca/gestionar">Ver tabla marca</a>
            </li>
        </ol>
        <div class="card mb-3">
            <?php if (isset($Editar) && isset($Marca) && is_object($Marca)) : ?>
                <div class="card-header">
                    <i class="fas fa-chart-area"></i>
                    Editar Marca: <strong><?= $Marca->Nombre ?></strong></div>
                <?php $Accion_url = Base_url . "marca/save&id=" . $Marca->idMarca ?>
            <?php else: ?>
                <div class="card-header">
                    <i class="fas fa-chart-area"></i>
                    Crear Marca
                </div>
                <?php $Accion_url = Base_url . "marca/save" ?>
            <?php endif; ?>
            <div class="card-body">
                <form action="<?= $Accion_url ?>" method="POST">
                    <label>Marca del vehiculo</label>
                    <input type="text" name="Nombre" class="form-control"
                           value="<?= isset($Marca) && is_object($Marca) ? $Marca->Nombre : false; ?>">

                    <button type="submit" class="btn btn-success mt-3">Agregar</button>
                </form>
            </div>
            <div class="card-footer small text-muted"></div>
        </div>
    </div>
<?php require_once 'Views/footer.php'; ?>