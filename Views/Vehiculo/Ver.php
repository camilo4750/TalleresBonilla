<?php
require_once 'Views/sidebar.php';
?>
    <!-- DataTables Example -->
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
            <div class="card-header">
                <i class="fas fa-table"></i>
                Datos Vehiculo <strong><?= isset($Vehiculo) && is_object($Vehiculo) ? $Vehiculo->Placa : "" ?></strong>
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
                        <td><strong>Placa:</strong></td>
                        <td><?= isset($Vehiculo) && is_object($Vehiculo) ? $Vehiculo->Placa : "" ?></td>
                    </tr>
                    <tr>
                        <td><strong>Color:</strong></td>
                        <td><?= isset($Vehiculo) && is_object($Vehiculo) ? $Vehiculo->Color : "" ?></td>
                    </tr>
                    <tr>
                        <td><strong>Modelo:</strong></td>
                        <td><?= isset($Vehiculo) && is_object($Vehiculo) ? $Vehiculo->Modelo : "" ?></td>
                    </tr>
                    <tr>
                        <td><strong>Marca:</strong></td>
                        <td><?= isset($Vehiculo) && is_object($Vehiculo) ? $Vehiculo->Marca : "" ?></td>
                    </tr>
                    <tr>
                        <td><strong>Propietario:</strong></td>
                        <td><?= isset($Vehiculo) && is_object($Vehiculo) ? $Vehiculo->Persona : "" ?></td>
                    </tr>

                    <tr>
                        <td><strong>Fecha y hora de ingreso:</strong></td>
                        <td><?= isset($Vehiculo) && is_object($Vehiculo) ? $Vehiculo->Fecha : "" ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer small text-muted"></div>
        </div>
        <?php require_once 'Views/footer.php'; ?>
    </div>
