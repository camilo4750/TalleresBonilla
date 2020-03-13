<?php require_once 'Views/sidebar.php'; ?>
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="text-info" href="<?= Base_url ?>persona/crear">Crear persona</a>
            </li>
            <li class="breadcrumb-item active">
                <a class="text-info" href="<?= Base_url ?>persona/gestionar">Ver tabla persona</a>
            </li>
        </ol>
        <div class="card mb-3">
            <?php if (isset($Editar) && isset($Persona) && is_object($Persona)) : ?>
                <div class="card-header">
                    <i class="fas fa-chart-area"></i>
                    Editar Persona: <strong><?= $Persona->Nombres ?></strong></div>
                <?php $Accion_url = Base_url . "persona/save&id=" . $Persona->idP ?>
            <?php else: ?>
                <div class="card-header">
                    <i class="fas fa-chart-area"></i>
                    Crear Persona
                </div>
                <?php $Accion_url = Base_url . "persona/save" ?>
            <?php endif; ?>
            <div class="card-body">
                <form action="<?= $Accion_url ?>" method="POST">
                    <div class="form-row">
                        <div class="col">
                            <label>Nombre Completo</label>
                            <input type="text" name="Nombres" class="form-control"
                                   value="<?= isset($Persona) && is_object($Persona) ? $Persona->Nombres : false; ?>">
                        </div>
                        <div class="col">
                            <label>Tipo de documento</label>
                            <select class="form-control" name="TipoDoc">
                                <option value="C.C">C.C</option>
                                <option value="C.E">C.E</option>
                                <option value="P.A">P.A</option>
                                <option value="R.C">R.C</option>
                                <option value="T.I">T.I</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <label>Documento</label>
                            <input type="text" name="Documento" class="form-control"
                                   value="<?= isset($Persona) && is_object($Persona) ? $Persona->Documento : false; ?>">
                        </div>
                        <div class="col">
                            <label>Numero telefonico</label>
                            <input type="text" name="Numero" class="form-control"
                                   value="<?= isset($Persona) && is_object($Persona) ? $Persona->Numero : false; ?>">
                        </div>
                    </div>
                    <div class="form-row mt-3">
                        <div class="col">
                            <label>Direccion</label>
                            <input type="text" name="Direccion" class="form-control"
                                   value="<?= isset($Persona) && is_object($Persona) ? $Persona->Direccion : false; ?>">
                        </div>
                        <div class="col">
                            <label>Municipio</label>
                            <?php $Municipio= Utilidades::ShowMunicipio(); ?>
                            <select class="form-control" name="Municipio_Id">
                                <?php while ($municipio = $Municipio->fetch_object()) : ?>
                                    <option value="<?=$municipio->Id?>" <?= isset($Persona) && is_object($Persona) && $municipio->Id == $Persona->Municipio_Id ? 'selected' : ""?>>
                                        <?=$municipio->Nombre?>
                                    </option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mt-3">Agregar</button>
                </form>
            </div>
            <div class="card-footer small text-muted"></div>
        </div>
    </div>
<?php require_once 'Views/footer.php'; ?>