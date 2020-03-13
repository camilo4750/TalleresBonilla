<?php
require_once 'Views/sidebar.php';
?>
    <!-- DataTables Example -->
    <div class="container-fluid">

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="text-danger" href="<?=Base_url?>vehiculo/crear">Crear vehiculo</a>
            </li>
            <li class="breadcrumb-item active">
                <a class="text-danger" href="<?=Base_url?>vehiculo/gestionar">Ver tabla vehiculo</a>
            </li>
        </ol>

        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Tabla Vehiculos</div>
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
                            <th>Placa</th>
                            <th>Color</th>
                            <th>Modelo</th>
                            <th>Marca</th>
                            <th>Persona</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php while ($vehiculo = $Vehiculo->fetch_object()) :?>
                            <tr>
                                <td><?= $vehiculo->id ?></td>
                                <td><?= $vehiculo->Placa ?></td>
                                <td><?= $vehiculo->Color ?></td>
                                <td><?= $vehiculo->Modelo ?></td>
                                <td><?= $vehiculo->Marca ?></td>
                                <td><a href="<?=Base_url?>persona/ver&id=<?=$vehiculo->Persona_idP?>" class="text-success"><?= $vehiculo->Persona ?></a></td>
                                <td><?= $vehiculo->Fecha ?></td>
                                <td><?= $vehiculo->Estado ?></td>
                                <td>
                                    <a href="<?=Base_url?>vehiculo/crear&id=<?=$vehiculo->id?>" data-toggle="tooltip" data-placement="top" title="Editar" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                    <a href="<?=Base_url?>vehiculo/ver&id=<?=$vehiculo->id?>" data-toggle="tooltip" data-placement="top" title="Ver" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                                    <?php if ($vehiculo->Estado == 'Activo') : ?>
                                        <a href="<?= Base_url ?>vehiculo/inactivar&id=<?= $vehiculo->id ?>" type="button" data-toggle="tooltip" data-placement="top" title="Inactivar" class="btn btn-danger btn-sm"><i class="fas fa-bell"></i></a>
                                    <?php else : ?>
                                        <a href="<?= Base_url ?>vehiculo/activar&id=<?= $vehiculo->id ?>" type="button" data-toggle="tooltip" data-placement="top" title="Activar"  class="btn btn-info btn-sm"><i class="fas fa-bell"></i></a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                        </tbody>

                        <tfoot  class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Placa</th>
                            <th>Color</th>
                            <th>Modelo</th>
                            <th>Marca</th>
                            <th>Persona</th>
                            <th>Fecha</th>
                            <th>Estado</th>
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