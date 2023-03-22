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
                        <li class="breadcrumb-item active">Usuarios</li>
                    </ol>

                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Lista de Usuarios Registrados</h3>
                            &nbsp;<a href="app.php?pagina=usuarios&subpagina=registrar" class="btn btn-success btn-x5">Agregar</a>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Apellidos</th>
                                        <th>Correo</th>
                                        <th>Telefono</th>
                                        <th>Vacunado</th>
                                        <th>Genero</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $usuarios = UsuariosQuery::create()->orderBy('id')->find();
                                    foreach ($usuarios as $u) {
                                        echo "<tr>";
                                        echo "<td>" . $u->getIdUsuarios() . "</td>";
                                        echo "<td>" . $u->getNombres() . "</td>";
                                        echo "<td>" . $u->getLosApellidos() . "</td>";
                                        echo "<td>" . $u->getCorreo() . "</td>";
                                        echo "<td>" . $u->getTelefono() . "</td>";
                                        echo "<td>" . $u->getEstaVacunado() . "</td>";
                                        echo "<td>" . $u->getQueGenero() . "</td>";
                                        echo '<td><a href="app.php?pagina=usuarios&subpagina=editar&reg=' . $u->getIdUsuarios() . '" class="btn btn-outline-warning btn-block"><i class="fa fa-edit"></i>&nbsp;</a></td>';
                                        echo '<td><a href="app.php?pagina=usuarios&subpagina=eliminar&reg=' . $u->getIdUsuarios() . '" class="btn btn-outline-danger btn-block"><i class="fa fa-trash"></i>&nbsp;</a></td>';

                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>