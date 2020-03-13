<?php
require_once 'Views/sidebar.php';
?>
    <!-- DataTables Example -->
    <div class="container-fluid">

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="text-danger" href="<?= Base_url ?>repuestos/crear">Crear repuestos</a>
            </li>
            <li class="breadcrumb-item active">
                <a class="text-danger" href="<?= Base_url ?>repuestos/gestionar">Ver tabla repuestos</a>
            </li>
        </ol>

        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Datos de repuestos vehiculo: <strong><?= isset($Repuestos) && is_object($Repuestos) ? $Repuestos->Placa : "" ?></strong>
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
                        <td><strong>Repuestos:</strong></td>
                        <td><?= isset($Repuestos) && is_object($Repuestos) ? $Repuestos->Repuestos : "" ?></td>
                    </tr>
                    <tr>
                        <td><strong>Total:</strong></td>
                        <td><?= isset($Repuestos) && is_object($Repuestos) ? $Repuestos->Total : "" ?></td>
                    </tr>
                    <tr>
                        <td><strong>Fecha:</strong></td>
                        <td><?= isset($Repuestos) && is_object($Repuestos) ? $Repuestos->Fecha : "" ?></td>
                    </tr>
                    <tr>
                        <td><strong>Garantia:</strong></td>
                        <td><?= isset($Repuestos) && is_object($Repuestos) ? $Repuestos->Garantia : "" ?></td>
                    </tr>
                    <tr>
                        <td><strong>Estado:</strong></td>
                        <td><?= isset($Repuestos) && is_object($Repuestos) ? $Repuestos->Estado : "" ?></td>
                    </tr>

                    <tr>
                        <td><strong>Vehiculo:</strong></td>
                        <td><?= isset($Repuestos) && is_object($Repuestos) ? $Repuestos->Placa : "" ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer small text-muted"></div>
        </div>
    </div>
<?php require_once 'Views/footer.php'; ?>