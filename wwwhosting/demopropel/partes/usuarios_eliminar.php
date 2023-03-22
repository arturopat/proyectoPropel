<?php
$msg = '';
$dat[0] = "";
$dat[1] = "";
$dat[2] = "";
$dat[3] = "";
$dat[4] = "";
$dat[5] = "";


if ($hacer == "eliminar") {
    $nuevo = UsuariosQuery::create()->findPk($_GET["reg"]);


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







$usu = UsuariosQuery::create()->findPk($_GET["reg"]);
if ($usu != "") {
    $dat[0] = $usu->getNombres();
    $dat[1] = $usu->getLosApellidos();
    $dat[2] = $usu->getCorreo();
    $dat[3] = $usu->getTelefono();
    $dat[4] = $usu->getEstaVacunado();
    $dat[5] = $usu->getQueGenero();
} else {
    $msg = '<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-info"></i>El registro no se encontro en el sistema!</h5></div>';
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
                        <li class="breadcrumb-item active">Eliminar</li>
                    </ol>

                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <form action="app.php?pagina=usuarios&subpagina=eliminar&hacer=eliminar&reg=<?php echo $_GET["reg"] ?>" method="POST">
                <?php
                echo $msg;
                ?>
                <div class="row">
                    <div class="col-12">

                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">Ingrese los datos personales</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="c1">Nombres</label>
                                    <input disabled value="<?php echo $dat[0]; ?>" name="txtNombres" type="text" class="form-control" id="c1" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="c2">Apellidos</label>
                                    <input disabled value="<?php echo $dat[1]; ?>" name="txtApellidos" type="text" class="form-control" id="c2" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="c3">Correo electronico</label>
                                    <input disabled value="<?php echo $dat[2]; ?>" name="txtCorreo" type="text" class="form-control" id="c3" placeholder="">
                                </div>


                            </div>
                            <!-- /.card-body -->

                        </div>

                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">Ingrese los datos adicionales</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="c4">Telefono</label>
                                    <input disabled value="<?php echo $dat[3]; ?>" name="txtTelefono" type="text" class="form-control" id="c4" placeholder="">
                                </div>


                                <?php
                                $val[0] = "";
                                $val[1] = "";
                                if ($dat[4] == "Si") {
                                    $val[1] = "selected";
                                } else {
                                    $val[0] = "selected";
                                }

                                ?>

                                <div class="form-group">
                                    <label for="exampleSelectBorder">¿Estas vacunado?</label>
                                    <select disabled name="lstVacuna" class="custom-select form-control-border" id="exampleSelectBorder">
                                        <option value="NO" <?php echo $val[0]; ?>>No</option>
                                        <option value="Si" <?php echo $val[1]; ?>>Si</option>
                                    </select>
                                </div>

                                <?php
                                $val[0] = "";
                                $val[1] = "";
                                if ($dat[5] == "Hombre") {
                                    $val[1] = "selected";
                                } else {
                                    $val[0] = "selected";
                                }

                                ?>

                                <div class="form-group">
                                    <label for="exampleSelectBorder">Genero</label>
                                    <select disabled name="lstQueGenero" class="custom-select form-control-border" id="exampleSelectBorder">
                                        <option value="Mujer" <?php echo $val[1]; ?>>Hombre</option>
                                        <option value="Hombre" <?php echo $val[0]; ?>>Mujer</option>
                                    </select>
                                </div>


                            </div>
                            <!-- /.card-body -->

                        </div>
                    </div>
                    <input class="btn btn-danger" type="submit" value="Eliminar Usuarios">
                </div>
            </form>
        </div>
</div>
</section>
</div>