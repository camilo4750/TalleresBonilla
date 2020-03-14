<?php
require_once 'Views/sidebar.php';
?>
    <!-- DataTables Example -->
    <div class="container-fluid">

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="text-info" href="<?= Base_url ?>persona/crear">Crear cotizacion</a>
            </li>
            <li class="breadcrumb-item active">
                <a class="text-info" href="<?= Base_url ?>persona/gestionar">Ver tabla cotizacion</a>
            </li>
        </ol>

        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Datos de la cotizacion N°: <strong><?= isset($Cotizacion) && is_object($Cotizacion) ? $Cotizacion->N_Serial : "" ?></strong>
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
                        <td><?= isset($Cotizacion) && is_object($Cotizacion) ? $Cotizacion->N_Serial : "" ?></td>
                    </tr>
                    <tr>
                        <td><strong>Trabajo a realizar:</strong></td>
                        <td><?= isset($Cotizacion) && is_object($Cotizacion) ? $Cotizacion->Labor : "" ?></td>
                    </tr>
                    <tr>
                        <td><strong>Fecha Inicio:</strong></td>
                        <td><?= isset($Cotizacion) && is_object($Cotizacion) ? $Cotizacion->Fecha : "" ?></td>
                    </tr>
                    <tr>
                        <td><strong>Fecha Fin:</strong></td>
                        <td><?= isset($Cotizacion) && is_object($Cotizacion) ? $Cotizacion->Fecha_Fin : "" ?></td>
                    </tr>
                    <tr>
                        <td><strong>Total:</strong></td>
                        <td><?= isset($Cotizacion) && is_object($Cotizacion) ? $Cotizacion->Abono : "" ?></td>
                    </tr>

                    <tr>
                        <td><strong>Tipo de servicio:</strong></td>
                        <td><?= isset($Cotizacion) && is_object($Cotizacion) ? $Cotizacion->Servicio : "" ?></td>
                    </tr>

                    <tr>
                        <td><strong>Persona:</strong></td>
                        <td><?= isset($Cotizacion) && is_object($Cotizacion) ? $Cotizacion->Persona : "" ?></td>
                    </tr>

                    <tr>
                        <td><strong>Repuestos:</strong></td>
                        <td><?= isset($Cotizacion) && is_object($Cotizacion) ? $Cotizacion->Repuestos : "" ?></td>
                    </tr>
                    <tr>
                        <td><strong>Vehiculo:</strong></td>
                        <td><?= isset($Cotizacion) && is_object($Cotizacion) ? $Cotizacion->Placa : "" ?></td>
                    </tr>

                    </tbody>
                </table>
                <a href="<?= Base_url ?>cotizacion/gestionar" class="btn btn-success">Volver</a>
            </div>
            <div class="card-footer small text-muted"></div>
        </div>
        <?php require_once 'Views/footer.php'; ?>
    </div>
