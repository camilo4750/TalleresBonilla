<?php
require_once 'Views/sidebar.php';
?>
    <!-- DataTables Example -->
    <div class="container-fluid">

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="text-info" href="<?=Base_url?>repuestos/crear">Crear repuestos</a>
            </li>
            <li class="breadcrumb-item active">
                <a class="text-info" href="<?=Base_url?>repuestos/gestionar">Ver tabla repuestos</a>
            </li>
        </ol>

        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Tabla Repuestos</div>
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
                            <th>Repuestos</th>
                            <th>Total</th>
                            <th>Fecha</th>
                            <th>Garantia</th>
                            <th>Estado</th>
                            <th>Vehiculo</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php while ($repuestos = $Repuestos->fetch_object()) :?>
                            <tr>
                                <td><?= $repuestos->IdR ?></td>
                                <td><?= $repuestos->Repuestos ?></td>
                                <td><?= $repuestos->Total ?></td>
                                <td><?= $repuestos->Fecha ?></td>
                                <td><?= $repuestos->Garantia ?></td>
                                <?php if ($repuestos->Estado == 'Activo') : ?>
                                    <td class="text-success"><?= $repuestos->Estado ?></td><i class="fas fa-bell"></i></a>
                                <?php else : ?>
                                    <td class="text-danger"><?= $repuestos->Estado ?></td>
                                <?php endif; ?>
                                <td><a href="<?=Base_url?>vehiculo/ver&id=<?=$repuestos->Vehiculo_id?>" class="text-success"><?= $repuestos->Placa ?></a></td>
                                <td>
                                    <a href="<?=Base_url?>repuestos/crear&id=<?=$repuestos->IdR?>" data-toggle="tooltip" data-placement="top" title="Editar"  class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                    <a href="<?=Base_url?>repuestos/ver&id=<?=$repuestos->IdR?>" data-toggle="tooltip" data-placement="top" title="Ver" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                                    <?php if ($repuestos->Estado == 'Activo') : ?>
                                        <a href="<?= Base_url ?>repuestos/inactivar&id=<?= $repuestos->IdR ?>" type="button" data-toggle="tooltip" data-placement="top" title="Inactivar" class="btn btn-danger btn-sm"><i class="fas fa-bell"></i></a>
                                    <?php else : ?>
                                        <a href="<?= Base_url ?>repuestos/activar&id=<?= $repuestos->IdR ?>" type="button" data-toggle="tooltip" data-placement="top" title="Activar"  class="btn btn-info btn-sm"><i class="fas fa-bell"></i></a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                        </tbody>

                        <tfoot  class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Repuestos</th>
                            <th>Total</th>
                            <th>Fecha</th>
                            <th>Garantia</th>
                            <th>Estado</th>
                            <th>Vehiculo</th>
                            <th>Acciones</th>
                        </tr>
                        </tfoot>
                        <tbody>

                    </table>
                </div>
            </div>
            <div class="card-footer small text-muted"></div>
        </div>
        <?php require_once 'Views/footer.php'; ?>
    </div>
