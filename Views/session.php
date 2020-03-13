
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="<?=Base_url?>assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="<?=Base_url?>assets/css/login.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
    <link href="<?=Base_url?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <title>Inicio session</title>
</head>
<body>
<?php if (isset($_SESSION['Agregado'])) : ?>
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        <strong><?=$_SESSION['Agregado']?></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>
<?php if (isset($_SESSION['error'])) : ?>
    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
        <strong><?=$_SESSION['error']?></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>
<?php Utilidades::DeleteSession(); ?>


<div class="col-md-12">
    <div class="formulario">
        <center>
            <div class="login mb-5">
                <article class="fondo">
                    <img src="<?=Base_url?>assets/Img/tuerca.png" class="img-fluid" alt="Responsive image">
                    <h3>Talleres Bonilla</h3>
                    <?php if (isset($_SESSION['Error_Login'])) : ?>
                        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                            <strong><?= $_SESSION['Error_Login'] ?></strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <?php Utilidades::DeleteSession(); ?>
                    <form action="<?= Base_url ?>registro/login" method="post">
                        <span><i class="fas fa-users"></i></span><input class="inp" type="text" name="Email" required><br>

                        <span><i class="fas fa-key"></i></span><input class="inp" type="password" name="Password" required><br>
                        <a href="" class="he">He olvidado mi contraseña</a>
                        <input class="boton" type="submit" value="Iniciar Sesion">
                    </form>
                </article>
            </div>
        </center>
    </div>
</div>

    <?php if (!isset($Registro)) :?>
        <button type="button" class="btn btn-success mb-3" style="height: 50px; width: 200px; margin-left: 650px" data-toggle="modal" data-target="#exampleModalScrollable">
            Agregar Usuario
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Agregar Usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?=Base_url?>registro/save" method="POST">
                            <div class="form-row">
                                <div class="col">
                                    <label>Nombre Completo</label>
                                    <input type="text" name="Nombre" class="form-control">
                                </div>
                                <div class="col">
                                    <label>Correo Electronico</label>
                                    <input type="text" name="Email" class="form-control">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col">
                                    <label>Password</label>
                                    <input type="text" name="Password" class="form-control">
                                </div>
                                <div class="col">
                                    <label>Rol</label>
                                    <select class="form-control" name="Rol">
                                        <option value="Administrador">Administrador</option>
                                        <option value="Usuario">Usuario</option>
                                    </select>
                                </div>

                            </div>

                            <button type="submit" class="btn btn-success mt-3">Agregar</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endif;?>
<script src="<?=Base_url?>vendor/jquery/jquery.min.js"></script>
<script src="<?=Base_url?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>