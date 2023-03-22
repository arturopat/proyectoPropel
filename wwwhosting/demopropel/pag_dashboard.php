<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-O">Tablero</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="app.php">Tablero</a></li>
                    </ol>

                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <?php
                $usuariosQuery = UsuariosQuery::create();
                $cantidad = $usuariosQuery->count();
                echo '<div class="col-4">';
                echo '<div class="info-box">';
                echo 'Usuarios: ' . $cantidad;
                echo '</div>';
                echo '</div>';
                ?>

                <?php
                $usuariosQuery2 = ProductosQuery::create();
                $cantidad2 = $usuariosQuery2->count();
                echo '<div class="col-4">';
                echo '<div class="info-box">';
                echo 'Productos: ' . $cantidad2;
                echo '</div>';
                echo '</div>';
                ?>
                <?php
                $usuariosQuery3 = VentasQuery::create();
                $cantidad3 = $usuariosQuery3->count();
                echo '<div class="col-4">';
                echo '<div class="info-box">';
                echo 'Ventas: ' . $cantidad3;
                echo '</div>';
                echo '</div>';
                ?>
            </div>
        </div>
    </section>
</div>