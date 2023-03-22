<?php
$msg = '';
if ($hacer == "guardar") {

    $nuevo = new Usuarios();
    $nuevo->setNombres($_POST["txtNombres"]);
    $nuevo->setLosApellidos($_POST["txtApellidos"]);
    $nuevo->setCorreo($_POST["txtCorreo"]);
    $nuevo->setTelefono($_POST["txtTelefono"]);
    $nuevo->setEstaVacunado($_POST["lstVacuna"]);
    $nuevo->setQueGenero($_POST["lstQueGenero"]);

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
                    <h1 class="m-O">USUARIOS</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="app.php">Tablero</a></li>
                        <li class="breadcrumb-item"><a href="app.php?pagina=usuarios">Usuarios</a></li>
                        <li class="breadcrumb-item active">Registrar</li>
                    </ol>

                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <form action="app.php?pagina=usuarios&subpagina=registrar&hacer=guardar" method="POST">
                <?php
                echo $msg;
                ?>
                <div class="row">
                    <div class="col-12">

                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Ingrese los datos personales</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="c1">Nombres</label>
                                    <input name="txtNombres" type="text" class="form-control" id="c1" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="c2">Apellidos</label>
                                    <input name="txtApellidos" type="text" class="form-control" id="c2" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="c3">Correo electronico</label>
                                    <input name="txtCorreo" type="text" class="form-control" id="c3" placeholder="">
                                </div>


                            </div>
                            <!-- /.card-body -->

                        </div>

                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Ingrese los datos adicionales</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="c4">Telefono</label>
                                    <input name="txtTelefono" type="text" class="form-control" id="c4" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelectBorder">¿Estas vacunado?</label>
                                    <select name="lstVacuna" class="custom-select form-control-border" id="exampleSelectBorder">
                                        <option>No</option>
                                        <option>Si</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelectBorder">Genero</label>
                                    <select name="lstQueGenero" class="custom-select form-control-border" id="exampleSelectBorder">
                                        <option>Hombre</option>
                                        <option>Mujer</option>
                                    </select>
                                </div>


                            </div>
                            <!-- /.card-body -->

                        </div>
                    </div>
                    <input class="btn btn-success" type="submit" value="Registrar Usuarios">
                </div>
            </form>
        </div>
</div>
</section>
</div>