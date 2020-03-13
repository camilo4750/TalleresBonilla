<?php require_once 'Views/sidebar.php'; ?>
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="text-info" href="<?= Base_url ?>modelo/crear">Crear modelo</a>
            </li>
            <li class="breadcrumb-item active">
                <a class="text-info" href="<?= Base_url ?>modelo/gestionar">Ver tabla modelo</a>
            </li>
        </ol>
        <div class="card mb-3">
            <?php if (isset($Editar) && isset($Modelo) && is_object($Modelo)) : ?>
                <div class="card-header">
                    <i class="fas fa-chart-area"></i>
                    Editar Modelo: <strong><?= $Modelo->Modelo ?></strong></div>
                <?php $Accion_url = Base_url . "modelo/save&id=" . $Modelo->IdM ?>
            <?php else: ?>
                <div class="card-header">
                    <i class="fas fa-chart-area"></i>
                    Crear Modelo
                </div>
                <?php $Accion_url = Base_url . "modelo/save" ?>
            <?php endif; ?>
            <div class="card-body">
                <form action="<?= $Accion_url ?>" method="POST">
                    <label>Modelo del vehiculo</label>
                    <input type="number" name="Modelo" class="form-control"
                           value="<?= isset($Modelo) && is_object($Modelo) ? $Modelo->Modelo : false; ?>">

                    <?php if (isset($Editar)) :?>
                        <button type="submit" class="btn btn-warning mt-3">Editar</button>
                    <?php else: ?>
                        <button type="submit" class="btn btn-success mt-3">Agregar</button>
                    <?php endif;?>

                </form>
            </div>
            <div class="card-footer small text-muted"></div>
        </div>
    </div>
<?php require_once 'Views/footer.php'; ?>