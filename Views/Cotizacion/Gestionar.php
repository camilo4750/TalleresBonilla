<?php
require_once 'Views/sidebar.php';
?>
    <!-- DataTables Example -->
    <div class="container-fluid">

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="text-danger" href="<?=Base_url?>cotizacion/crear">Crear cotizacion</a>
            </li>
            <li class="breadcrumb-item active">
                <a class="text-danger" href="<?=Base_url?>cotizacion/gestionar">Ver tabla cotizacion</a>
            </li>
        </ol>

        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Tabla Cotizaciónes</div>
            <div class="card-body">
                <?php if (isset($_SESSION['Agregado'])) : ?>
                    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                        <strong><?=$_SESSION['Agregado']?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
                <?php if (isset($_SESSION['Editado'])) : ?>
                    <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                        <strong><?=$_SESSION['Editado']?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
                <?php if (isset($_SESSION['Borrado'])) : ?>
                    <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                        <strong><?=$_SESSION['Borrado']?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
                <?php Utilidades::DeleteSession(); ?>

                <div class="table-responsive">
                    <table id="example" class="display table responsive nowrap table-striped table-bordered" style="width:100%" >
                        <thead  class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Serial</th>
                            <th>Labor</th>
                            <th>Fecha inicio</th>
                            <th>Fecha fin</th>
                            <th>Abono</th>
                            <th>Servicio</th>
                            <th>Persona</th>
                            <th>Repuestos</th>
                            <th>Vehiculos</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                       <?php while ($cotizacion = $Cotizacion->fetch_object()) : ?>
                            <tr>
                                <td><?= $cotizacion->IdC ?></td>
                                <td><?= $cotizacion->N_Serial ?></td>
                                <td><?= $cotizacion->Labor ?></td>
                                <td><?= $cotizacion->Fecha ?></td>
                                <td><?= $cotizacion->Fecha_Fin ?></td>
                                <td><?= $cotizacion->Abono ?></td>
                                <td><?= $cotizacion->Servicio ?></td>
                                <td><a href="<?=Base_url?>persona/ver&id=<?=$cotizacion->Persona_idP?>" class="text-success"><?= $cotizacion->Persona ?></a></td>
                                <td><a href="<?=Base_url?>repuestos/ver&id=<?=$cotizacion->Repuestos_IdR?>" class="text-success"><?= $cotizacion->Repuestos ?></a></td>
                                <td><a href="<?=Base_url?>vehiculo/ver&id=<?=$cotizacion->Vehiculo_id?>" class="text-success"><?= $cotizacion->Placa ?></a></td>
                                <td>
                                    <a href="<?=Base_url?>cotizacion/crear&id=<?=$cotizacion->IdC?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                    <a href="<?=Base_url?>cotizacion/delete&id=<?=$cotizacion->IdC?>" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                                    <a href="<?=Base_url?>cotizacion/ver&id=<?=$cotizacion->IdC?>" class="btn btn-info btn-sm "><i class="fas fa-eye"></i></a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                        </tbody>

                        <tfoot  class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Serial</th>
                            <th>Labor</th>
                            <th>Fecha inicio</th>
                            <th>Fecha fin</th>
                            <th>Abono</th>
                            <th>Servicio</th>
                            <th>Persona</th>
                            <th>Repuestos</th>
                            <th>Vehiculos</th>
                            <th>Acciones</th>
                        </tr>
                        </tfoot>
                        <tbody>

                    </table>
                </div>
            </div>
            <div class="card-footer small text-muted"></div>
        </div>
    </div>
<?php require_once 'Views/footer.php'; ?>