<?php
require_once 'Views/sidebar.php';
?>
    <!-- DataTables Example -->
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
            <div class="card-header">
                <i class="fas fa-table"></i>
                Datos de la persona: <strong><?= isset($Persona) && is_object($Persona) ? $Persona->Nombres : "" ?></strong>
            </div>
            <div class="card-body">

                <table class="table table-hover table-bordered table-responsive-sm">
                    <thead class="thead-dark">
                    <tr>
                        <th>Campo</th>
                        <th>Valor</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><strong>Serial:</strong></td>
                        <td><?= isset($Persona) && is_object($Persona) ? $Persona->Nombres : "" ?></td>
                    </tr>
                    <tr>
                        <td><strong>Tipo de documento:</strong></td>
                        <td><?= isset($Persona) && is_object($Persona) ? $Persona->TipoDoc : "" ?></td>
                    </tr>
                    <tr>
                        <td><strong>Documento:</strong></td>
                        <td><?= isset($Persona) && is_object($Persona) ? $Persona->Documento : "" ?></td>
                    </tr>
                    <tr>
                        <td><strong>Numero telefonico:</strong></td>
                        <td><?= isset($Persona) && is_object($Persona) ? $Persona->Numero : "" ?></td>
                    </tr>
                    <tr>
                        <td><strong>Direccion:</strong></td>
                        <td><?= isset($Persona) && is_object($Persona) ? $Persona->Direccion : "" ?></td>
                    </tr>

                    <tr>
                        <td><strong>Rol:</strong></td>
                        <td><?= isset($Persona) && is_object($Persona) ? $Persona->Rol : "" ?></td>
                    </tr>
                    <tr>
                        <td><strong>Municipio:</strong></td>
                        <td><?= isset($Persona) && is_object($Persona) ? $Persona->Municipio : "" ?></td>
                    </tr>

                    </tbody>
                </table>
            </div>
            <div class="card-footer small text-muted"></div>
        </div>
        <?php require_once 'Views/footer.php'; ?>
    </div>
