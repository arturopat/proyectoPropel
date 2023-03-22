<?php
$msg = '';
$dat[0] = "";
$dat[1] = "";
$dat[2] = "";
$dat[3] = "";
$dat[4] = "";


if ($hacer == "actualizar") {

  $nuevo = VentasQuery::create()->findPk($_GET["reg"]);
  if ($nuevo != "") {
    $nuevo->setIdUsuarioComprador($_POST["lstClas"]);
    $nuevo->setFechaVenta($_POST["dateClas"]);
    $nuevo->setCostoTotal($_POST["txtPrecioCom"]);
    if ($nuevo->validate()) {
      $nuevo->save();
      $msg = '<div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h5><i class="icon fas fa-info"></i> Bien!</h5>
                      Se actualizó correctamente la información.
                    </div>';
    } else {
      $msg = '<div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h5><i class="icon fas fa-info"></i> Errores encontrados!</h5>';
      $msg .= "<ul>";
      foreach ($nuevo->getValidationFailures() as $error) {
        $msg .= "<li>" . $error->getMessage() . "</li>";
      }
      $msg .= "</ul>";
      $msg .= "</div>";
    }
  } else {
    $msg = '<div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h5><i class="icon fas fa-info"></i> El registro no se encontró en el sistema.</h5>
                      </div>';
  }
}



$usu = VentasQuery::create()->findPk($_GET["reg"]);
if ($usu != "") {
  $dat[0] = $usu->getIdUsuarioComprador();
  $dat[1] = $usu->getFechaVenta();
  $dat[2] = $usu->getCostoTotal();
} else {
  $msg = '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-info"></i> El registro no se encontró en el sistema.</h5>
                  </div>';
}



?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">VENTAS</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="app.php">Tablero</a></li>
            <li class="breadcrumb-item"><a href="app.php?pagina=ventas">Ventas</a></li>
            <li class="breadcrumb-item active">Editar</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <section class="content">
    <div class="container-fluid">
      <form action="app.php?pagina=ventas&subpagina=editar&hacer=actualizar&reg=<?php echo $_GET["reg"]; ?>" method="POST">
        <div class="row">

          <div class="col-12">
            <?php echo $msg; ?>
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Detalles de la venta</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <div class="card-body">



                <div class="form-group">
                  <?php
                  //VentasQuery solo selecciona la informacion de las ventas es decir no aparecen todos los usuarios
                  $consulta = UsuariosQuery::create();
                  $resultado = $consulta->find();
                  //verificamos si el tamaño de resultado es mayor a 0
                  if ($resultado->count() > 0) {
                    //como es mayor a 0 se crea un array llamado opciones
                    $opciones = array();
                    //llenamos el array opciones con la informacion de resulado
                    foreach ($resultado as $fila) {
                      //aqui se puede sustituir por Idcomprador o algo asi, pertenece cuando es ventasQuery
                      $opciones[$fila->getIdUsuarios()] = "";
                    }
                    //aqui verificamos 
                    $opciones[$dat[0]] = "selected";
                  } else {
                    echo "no hay usuarios disponibles";
                  }
                  ?>

                  <div class="form-group">
                    <label for="exampleSelectBorder">ID Usuario</label>
                    <select name="lstClas" class="custom-select form-control-border" id="exampleSelectBorder">
                      <?php
                      foreach ($opciones as $valor => $estado) {
                        echo "<option value='$valor' $estado>$valor</option>";
                      }
                      ?>
                    </select>
                  </div>
                </div>

                <!--fecha de venta -->
                <?php
                $consulta = VentasQuery::create();
                $resultado = $consulta->find();
                if ($resultado->count() > 0) {
                  $fecha_seleccionada = "";

                  foreach ($resultado as $fila) {
                    if ($fila->getFechaVenta() == $dat[1]) {
                      $fecha_seleccionada = date('Y-m-d', strtotime($fila->getFechaVenta()));
                      break;
                    }
                  }
                } else {
                  echo "no disponibles";
                }
                ?>

                <div class="form-group">
                  <label for="c3"> Fecha de venta</label>
                  <input name="dateClas" type="date" class="form-control" id="c3" placeholder="" value="<?php echo $fecha_seleccionada; ?>">
                </div>


                <!-- Costo total-->
                <div class="form-group">
                  <label for="c2">Costo total</label>
                  <input value="<?php echo $dat[2]; ?>" name="txtPrecioCom" type="text" class="form-control" id="c2" placeholder="">
                </div>
              </div>
              <!-- /.card-body -->


            </div>

          </div>
          <input type="submit" value="Actualizar venta" class="btn btn-warning">

        </div>
      </form>
    </div>
  </section>

</div> <!-- div content -->