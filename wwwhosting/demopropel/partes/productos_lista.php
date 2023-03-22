<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-O">Productos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="app.php">Tablero</a></li>
                        <li class="breadcrumb-item active">Productos</li>
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
                            <h3 class="card-title">Lista de Productos Registrados</h3>
                            &nbsp;<a href="app.php?pagina=productos&subpagina=registrar" class="btn btn-success btn-x5">Agregar</a>
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
                                        <th>Clasificacion</th>
                                        <th>Precio Compra</th>
                                        <th>Precio Venta</th>
                                        <th>Stock</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $productos = ProductosQuery::create()->find();
                                    foreach ($productos as $u) {
                                        echo "<tr>";
                                        echo "<td>" . $u->getIdProductos() . "</td>";
                                        echo "<td>" . $u->getNombre() . "</td>";
                                        echo "<td>" . $u->getClasificacion() . "</td>";
                                        echo "<td>" . $u->getPrecioCompra() . "</td>";
                                        echo "<td>" . $u->getPrecioVenta() . "</td>";
                                        echo "<td>" . $u->getStock() . "</td>";
                                        echo '<td><a href="app.php?pagina=productos&subpagina=editar&reg=' . $u->getIdProductos() . '" class="btn btn-outline-warning btn-block"><i class="fa fa-edit"></i>&nbsp;</a></td>';
                                        echo '<td><a href="app.php?pagina=productos&subpagina=eliminar&reg=' . $u->getIdProductos() . '" class="btn btn-outline-danger btn-block"><i class="fa fa-trash"></i>&nbsp;</a></td>';

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