<?php
$msg = '';
if ($hacer == "guardar") {



    $nuevo = new Productos();
    $nuevo->setNombre($_POST["txtNombr"]);
    $nuevo->setClasificacion($_POST["lstClas"]);
    $nuevo->setPrecioCompra($_POST["txtPrecioCom"]);
    $nuevo->setPrecioVenta($_POST["txtPrecioVen"]);
    $nuevo->setStock($_POST["txtStoc"]);

    if ($nuevo->validate()) {
        $nuevo->save();
        $msg = '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-info"></i>Bien!</h5>
            Se registro correctamente la informacion. 
        </div>';
    } else {
        $msg = '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-info"></i>Errores encontrados!</h5>';
        $msg .= "<ul>";
        foreach ($nuevo->getValidationFailures() as $error) {
            $msg .= "<li>" . $error->getMessage() . "</li>";
        }
        $msg .= "</ul>";
        $msg .= "</div>";
    }
}

?>


<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-O">PRODUCTOS</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="app.php">Tablero</a></li>
                        <li class="breadcrumb-item"><a href="app.php?pagina=productos">Productos</a></li>
                        <li class="breadcrumb-item active">Registrar</li>
                    </ol>

                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <form action="app.php?pagina=productos&subpagina=registrar&hacer=guardar" method="POST">
                <?php
                echo $msg;
                ?>
                <div class="row">
                    <div class="col-12">

                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Ingrese la informacion del producto</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="c1">Nombre</label>
                                    <input name="txtNombr" type="text" class="form-control" id="c1" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelectBorder">Clasificacion del producto</label>
                                    <select name="lstClas" class="custom-select form-control-border" id="exampleSelectBorder">
                                        <option>abarrotes</option>
                                        <option>higiene</option>
                                        <option>salchichonería</option>
                                        <option>limpieza</option>
                                        <option>verduras</option>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="c3">Precio Compra</label>
                                    <input name="txtPrecioCom" type="text" class="form-control" id="c3" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="c3">Precio Venta</label>
                                    <input name="txtPrecioVen" type="text" class="form-control" id="c3" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="c3">Stock</label>
                                    <input name="txtStoc" type="text" class="form-control" id="c3" placeholder="">
                                </div>

                            </div>
                            <!-- /.card-body -->

                        </div>


                    </div>
                    <input class="btn btn-success" type="submit" value="Registrar Productos">
                </div>
            </form>
        </div>
</div>
</section>
</div>