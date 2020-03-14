<?php require_once 'Views/sidebar.php'; ?>
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="text-info" href="<?= Base_url ?>repuestos/crear">Crear repuestos</a>
            </li>
            <li class="breadcrumb-item active">
                <a class="text-info" href="<?= Base_url ?>repuestos/gestionar">Ver tabla repuestos</a>
            </li>
        </ol>
        <div class="card mb-3">
            <?php if (isset($Editar) && isset($Repuestos) && is_object($Repuestos)) : ?>
                <div class="card-header">
                    <i class="fas fa-chart-area"></i>
                    Editar Repuestos
                </div>
                <?php $Accion_url = Base_url . "repuestos/save&id=" . $Repuestos->IdR ?>
            <?php else: ?>
                <div class="card-header">
                    <i class="fas fa-chart-area"></i>
                    Crear Repuestos
                </div>
                <?php $Accion_url = Base_url . "repuestos/save" ?>
            <?php endif; ?>
            <div class="card-body">
                <form action="<?= $Accion_url ?>" method="POST">
                    <div class="form-row">
                        <div class="col">
                            <label>Repuestos</label>
                            <input type="" name="Repuestos" class="form-control"
                                   value="<?= isset($Repuestos) && is_object($Repuestos) ? $Repuestos->Repuestos : false; ?>">
                        </div>
                        <div class="col">
                            <label>Total</label>
                            <input type="number" name="Total" class="form-control"
                                   value="<?= isset($Repuestos) && is_object($Repuestos) ? $Repuestos->Total : false; ?>">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <label>Fecha</label>
                            <input type="date" name="Fecha" class="form-control"
                                   value="<?= isset($Repuestos) && is_object($Repuestos) ? $Repuestos->Fecha : false; ?>">
                        </div>
                        <div class="col">
                            <label>Garantia</label>
                            <select class="form-control" name="Garantia" <?= isset($Repuestos) && is_object($Repuestos)  ? 'selected' : "" ?>>
                                <option value="Si">Si</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row mt-3">
                        <div class="col">
                            <label>Vehiculo</label>
                            <?php $Vehiculo = Utilidades::ShowVehiculo() ?>
                            <select class="form-control" name="Vehiculo_id">
                                <?php while ($vehiculo = $Vehiculo->fetch_object()) : ?>
                                    <option value="<?= $vehiculo->id ?>" <?= isset($Repuestos) && is_object($Repuestos) && $vehiculo->id == $Repuestos->Vehiculo_id ? 'selected' : "" ?>>
                                        <?= $vehiculo->Placa ?>
                                    </option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="col">
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
        <?php require_once 'Views/footer.php'; ?>
    </div>
