<?php require_once 'Views/sidebar.php'; ?>
<div class="container-fluid">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a class="text-danger" href="<?= Base_url ?>proveedor/crear">Crear proveedor</a>
        </li>
        <li class="breadcrumb-item active">
            <a class="text-danger" href="<?= Base_url ?>proveedor/gestionar">Ver tabla proveedores</a>
        </li>
    </ol>
    <div class="card mb-3">
        <?php if (isset($Editar) && isset($Proveedor) && is_object($Proveedor)) : ?>
            <div class="card-header">
                <i class="fas fa-chart-area"></i>
                Editar proveedor: <strong><?= $Proveedor->Razon_Social ?></strong></div>
            <?php $Accion_url = Base_url . "proveedor/save&id=" . $Proveedor->IdPr ?>
        <?php else: ?>
            <div class="card-header">
                <i class="fas fa-chart-area"></i>
                Crear Proveedor
            </div>
            <?php $Accion_url = Base_url . "proveedor/save" ?>
        <?php endif; ?>
        <div class="card-body">
            <form action="<?= $Accion_url ?>" method="POST">
                <div class="form-row">
                    <div class="col">
                        <label>Razon Social</label>
                        <input type="text" name="Razon_Social" class="form-control"
                               value="<?= isset($Proveedor) && is_object($Proveedor) ? $Proveedor->Razon_Social : false; ?>">
                    </div>
                    <div class="col">
                        <label>Nit</label>
                        <input type="text" name="Nit" class="form-control"
                               value="<?= isset($Proveedor) && is_object($Proveedor) ? $Proveedor->Nit : false; ?>">                    </div>
                </div>

                <div class="form-row">
                    <div class="col">
                        <label>Representante</label>
                        <input type="text" name="Representante" class="form-control"
                               value="<?= isset($Proveedor) && is_object($Proveedor) ? $Proveedor->Representante : false; ?>">                    </div>
                    <div class="col">
                        <label>Telefono</label>
                        <input type="text" name="Telefono" class="form-control"
                               value="<?= isset($Proveedor) && is_object($Proveedor) ? $Proveedor->Telefono : false; ?>">                    </div>
                </div>
                <div class="form-row mt-3">
                    <div class="col">
                        <label>Direccion</label>
                        <input type="text" name="Direccion" class="form-control"
                               value="<?= isset($Proveedor) && is_object($Proveedor) ? $Proveedor->Direccion : false; ?>">
                    </div>
                    <div class="col">
                        <label>Correo Electronico</label>
                        <input type="text" name="Correo" class="form-control"
                               value="<?= isset($Proveedor) && is_object($Proveedor) ? $Proveedor->Correo : false; ?>">
                    </div>
                </div>
                <?php if (isset($Editar)) : ?>
                    <button type="submit" class="btn btn-warning mt-3">Editar</button>
                <?php else: ?>
                    <button type="submit" class="btn btn-success mt-3">Agregar</button>
                <?php endif; ?>
            </form>
        </div>
        <div class="card-footer small text-muted"></div>
    </div>
</div>
<?php require_once 'Views/footer.php'; ?>