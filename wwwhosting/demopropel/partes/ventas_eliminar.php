<?php
$msg = '';
$dat[0] = "";
$dat[1] = "";
$dat[2] = "";
$dat[3] = "";
$dat[4] = "";


if ($hacer == "eliminar") {
    $nuevo = VentasQuery::create()->findPk($_GET["reg"]);


    if ($nuevo != "") {
        $nuevo->delete();
        $msg = '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-info"></i>Bien!</h5>
            Se elimino correctamente la informacion. 
        </div>';
    } else {
        $msg = '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-info"></i>El registro no se encontro en el sistema!</h5></div>';
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
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-O">VENTAS</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="app.php">Tablero</a></li>
                        <li class="breadcrumb-item"><a href="app.php?pagina=ventas">Ventas</a></li>
                        <li class="breadcrumb-item active">Eliminar</li>
                    </ol>

                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <form action="app.php?pagina=ventas&subpagina=eliminar&hacer=eliminar&reg=<?php echo $_GET["reg"] ?>" method="POST">
                <!-- borrar este perro eco -->
                <?php
                echo $msg;
                ?>
                <!-- -->


                <div class="row">
                    <div class="col-12">
                        <?php echo $msg; ?>
                        <div class="card card-danger">
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
                                    if ($resultado->count() > 0) {
                                        $opciones = array();
                                        foreach ($resultado as $fila) {
                                            //aqui se puede sustituir por Idcomprador o algo asi, pertenece cuando es ventasQuery
                                            $opciones[$fila->getIdUsuarios()] = "";
                                        }
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
                    <input type="submit" value="Eliminar venta" class="btn btn-danger">
                </div>
            </form>
        </div>
</div>
</section>
</div>