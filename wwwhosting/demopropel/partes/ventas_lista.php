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
                        <li class="breadcrumb-item active">Ventas</li>
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
                            <h3 class="card-title">Lista de ventas Registrados</h3>
                            &nbsp;<a href="app.php?pagina=ventas&subpagina=registrar" class="btn btn-success btn-x5">Agregar</a>
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
                                        <th>ID Usuario</th>
                                        <th>Fecha venta</th>
                                        <th>Costo total</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>

                                    </tr>
                                </thead>
                                <tbody>



                                    <?php
                                    $ventas = VentasQuery::create()->orderBy('IdVentas')->find();

                                    foreach ($ventas as $v) {
                                        echo "<tr>";
                                        echo "<td>" . $v->getIdVentas() . "</td>";
                                        echo "<td>" . $v->getIdUsuarioComprador() . "</td>";
                                        echo "<td>" . $v->getFechaVenta() . "</td>";
                                        echo "<td>" . $v->getCostoTotal() . "</td>";
                                        echo '<td><a href="app.php?pagina=ventas&subpagina=editar&reg=' . $v->getIdVentas() . '" class="btn btn-outline-warning btn-block"><i class="fa fa-edit"></i>&nbsp;</a></td>';
                                        echo '<td><a href="app.php?pagina=ventas&subpagina=eliminar&reg=' . $v->getIdVentas() . '" class="btn btn-outline-danger btn-block"><i class="fa fa-trash"></i>&nbsp;</a></td>';

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