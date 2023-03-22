<?php
$msg = '';
$dat[0] = "";
$dat[1] = "";
$dat[2] = "";
$dat[3] = "";
$dat[4] = "";


if ($hacer == "actualizar") {

  $nuevo = ProductosQuery::create()->findPk($_GET["reg"]);
  if ($nuevo != "") {
    $nuevo->setNombre($_POST["txtNombr"]);
    $nuevo->setClasificacion($_POST["lstClas"]);
    $nuevo->setPrecioCompra($_POST["txtPrecioCom"]);
    $nuevo->setPrecioVenta($_POST["txtPrecioVen"]);
    $nuevo->setStock($_POST["txtStoc"]);
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



$usu = ProductosQuery::create()->findPk($_GET["reg"]);
if ($usu != "") {
  $dat[0] = $usu->getNombre();
  $dat[1] = $usu->getClasificacion();
  $dat[2] = $usu->getPrecioCompra();
  $dat[3] = $usu->getPrecioVenta();
  $dat[4] = $usu->getStock();
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
          <h1 class="m-0">PRODUCTOS</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="app.php">Tablero</a></li>
            <li class="breadcrumb-item"><a href="app.php?pagina=productos">Productos</a></li>
            <li class="breadcrumb-item active">Editar</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <section class="content">
    <div class="container-fluid">
      <form action="app.php?pagina=productos&subpagina=editar&hacer=actualizar&reg=<?php echo $_GET["reg"]; ?>" method="POST">
        <div class="row">

          <div class="col-12">
            <?php echo $msg; ?>
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Ingrese los datos del producto</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <div class="card-body">
                <div class="form-group">
                  <label for="c1">Nombre</label>
                  <input value="<?php echo $dat[0]; ?>" name="txtNombr" type="text" class="form-control" id="c1" placeholder="" required>
                </div>


                <?php
                $opciones = array(
                  "abarrotes" => "",
                  "higiene" => "",
                  "salchichonería" => "",
                  "limpieza" => "",
                  "verduras" => ""
                );

                $opciones[$dat[1]] = "selected";
                ?>

                <div class="form-group">
                  <label for="exampleSelectBorder">Clasificacion del producto</label>
                  <select name="lstClas" class="custom-select form-control-border" id="exampleSelectBorder">
                    <?php
                    foreach ($opciones as $valor => $estado) {
                      echo "<option value='$valor' $estado>$valor</option>";
                    }
                    ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="c2">Precio Compra</label>
                  <input value="<?php echo $dat[2]; ?>" name="txtPrecioCom" type="text" class="form-control" id="c2" placeholder="">
                </div>
                <div class="form-group">
                  <label for="c3">Precio venta</label>
                  <input value="<?php echo $dat[3]; ?>" name="txtPrecioVen" type="text" class="form-control" id="c3" placeholder="">
                </div>
                <div class="form-group">
                  <label for="c3">Stock</label>
                  <input value="<?php echo $dat[4]; ?>" name="txtStoc" type="text" class="form-control" id="c3" placeholder="">
                </div>
              </div>
              <!-- /.card-body -->


            </div>

          </div>
          <input type="submit" value="Actualizar producto" class="btn btn-warning">

        </div>
      </form>
    </div>
  </section>

</div> <!-- div content -->



<!--

                $val[0] = "";
                $val[1] = "";
                $val[2] = "";
                $val[3] = "";
                $val[4] = "";

                if ($dat[1] == "verduras") {
                  $val[4] = "selected";
                } elseif ($dat[1] == "limpieza") {
                  $val[3] = "selected";
                } elseif ($dat[1] == "salchichonería") {
                  $val[2] = "selected";
                } elseif ($dat[1] == "higiene") {
                  $val[1] = "selected";
                } else {
                  $val[0] = "selected";
                }
                ?>
                <div class="form-group">
                  <label for="exampleSelectBorder">Clasificacion del productos</label>
                  <select name="lstClas" class="custom-select form-control-border" id="exampleSelectBorder">
                    <option value="abarrotes" <//?php echo $val[0]; ?>>abarrotes</option>
                    <option value="higiene" <//?php echo $val[1]; ?>>higiene</option>
                    <option value="salchichonería" <//?php echo $val[2] ?>>salchichonería</option>
                    <option value="limpieza" <//?php echo $val[3] ?>>limpieza</option>
                    <option value="verduras" <//?php echo $val[4] ?>>verduras</option>
                  </select>
                </div>
 !-->