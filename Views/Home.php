<?php
require_once 'Views/sidebar.php';
?>
      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
              <strong>Gestion de datos</strong>
        </ol>

        <!-- Icon Cards-->
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-calculator"></i>
                </div>
                <div class="mr-5"><strong>Total Cotizaciones: <?= isset($TotalC) ? $TotalC->Cotizaciones : false;?> </strong></div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="<?=Base_url?>cotizacion/gestionar">
                <span class="float-left">Ver detalles</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-car-side"></i>
                </div>
                <div class="mr-5"><strong>Total Vehiculos: <?= isset($TotalV) ? $TotalV->Vehiculos : false;?> </strong></div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="<?=Base_url?>vehiculo/gestionar">
                <span class="float-left">Ver detalles</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-cogs"></i>
                </div>
                <div class="mr-5"><strong>Total Repuestos: <?= isset($TotalR) ? $TotalR->Repuestos : false;?> </strong></div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="<?=Base_url?>repuestos/gestionar">
                <span class="float-left">Ver detalles</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-user-friends"></i>
                </div>
                <div class="mr-5"><strong>Total personas: <?= isset($Total) ? $Total->Personas : false;?> </strong></div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="<?=Base_url?>persona/gestionar">
                <span class="float-left">Ver detalles</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>
<?php require_once 'Views/footer.php'; ?>