<?php require_once 'Views/sidebar.php'; ?>
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="text-info" href="<?= Base_url ?>vehiculo/crear">Crear vehiculo</a>
            </li>
            <li class="breadcrumb-item active">
                <a class="text-info" href="<?= Base_url ?>vehiculo/gestionar">Ver tabla vehiculo</a>
            </li>
        </ol>
        <div class="card mb-3">
            <?php if (isset($Editar) && isset($Vehiculo) && is_object($Vehiculo)) : ?>
                <div class="card-header">
                    <i class="fas fa-chart-area"></i>
                    Editar Vehiculo - <strong><?= $Vehiculo->Placa ?></strong></div>
                <?php $Accion_url = Base_url . "vehiculo/save&id=" . $Vehiculo->id ?>
            <?php else: ?>
                <div class="card-header">
                    <i class="fas fa-chart-area"></i>
                    Crear Vehiculo
                </div>
                <?php $Accion_url = Base_url . "vehiculo/save" ?>
            <?php endif; ?>
            <div class="card-body">
                <form action="<?= $Accion_url ?>" method="POST">
                    <div class="form-row">
                        <div class="col">
                            <label>Color</label>
                            <input type="text" name="Color" class="form-control"
                                   value="<?= isset($Vehiculo) && is_object($Vehiculo) ? $Vehiculo->Color : false; ?>">
                        </div>
                        <div class="col">
                            <label>Placa automovil</label>
                            <input type="text" name="Placa" class="form-control"
                                   value="<?= isset($Vehiculo) && is_object($Vehiculo) ? $Vehiculo->Placa : false; ?>">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <label>Modelo</label>
                            <?php $Modelo = Utilidades::ShowModelo() ?>
                            <select class="form-control" name="Modelo_IdM">
                                <?php while ($modelo = $Modelo->fetch_object()) : ?>
                                    <option value="<?= $modelo->IdM ?>" <?= isset($Vehiculo) && is_object($Vehiculo) && $modelo->IdM == $Vehiculo->Modelo_IdM ? 'selected' : "" ?>>
                                        <?= $modelo->Modelo ?>
                                    </option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="col">
                            <label>Marca</label>
                            <?php $Marca = Utilidades::ShowMarca() ?>
                            <select class="form-control" name="Marca_idMarca">
                                <?php while ($marca = $Marca->fetch_object()) : ?>
                                    <option value="<?= $marca->idMarca ?>" <?= isset($Vehiculo) && is_object($Vehiculo) && $marca->idMarca == $Vehiculo->Marca_idMarca ? 'selected' : "" ?>>
                                        <?= $marca->Nombre ?>
                                    </option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row mt-3">
                        <div class="col">
                            <label>Persona</label>
                            <?php $Persona = Utilidades::ShowPersonas() ?>
                            <select class="form-control" name="Persona_idP">
                                <?php while ($persona = $Persona->fetch_object()) : ?>
                                    <option value="<?= $persona->idP ?>" <?= isset($Vehiculo) && is_object($Vehiculo) && $persona->idP == $Vehiculo->Persona_idP ? 'selected' : "" ?>>
                                        <?= $persona->Nombres ?>
                                    </option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="col">

                        </div>
                    </div>
                    <?php if (isset($Editar)) : ?>
                        <button type="submit" class="btn btn-warning mt-3">Agregar</button>
                    <?php else: ?>
                        <button type="submit" class="btn btn-success mt-3">Agregar</button>
                    <?php endif; ?>
                </form>
            </div>
            <div class="card-footer small text-muted"></div>
        </div>
        <?php require_once 'Views/footer.php'; ?>
    </div>
